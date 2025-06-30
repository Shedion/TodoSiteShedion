<?php

namespace App\Http\Controllers;

use App\Models\TodoItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Add at the top

class TodoController extends Controller
{
    //
    public function home(Request $request)
    {
        $userId = session('user_id');
        if (!$userId) {
            // Show a welcome or guest view, or just an empty list
            return view('home', ['list' => collect()]); // empty collection
        }

        // Show only the todo items for the logged-in user
        $list = TodoItem::where('user_id', $userId)->get();
        return view('home', ['list' => $list]);
    }

    public function library(Request $request)
    {
        $userId = session('user_id');
        if (!$userId) {
            return view('library', ['list' => collect()]);
        }
        $list = TodoItem::where('user_id', $userId)->get();
        return view('library', ['list' => $list]);
    }

    public function about()
    {
        // Logic for the about page
        return view('about');
    }
    public function contact()
    {
        // Logic for the contact page
        return view('contact');
    }
    public function login()
    {
        // Logic for the login page
        return view('login');
    }
    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,Username',
            'password' => 'required|min:1', // alles mag, evt. min:1
        ]);

        User::create([
            'Username' => $request->username,
            'Password' => $request->password, // GEEN Hash::make()
        ]);

        return redirect('/login')->with('success', 'Registration successful! Please log in.');
    }
    public function edit($id)
    {
        $todo = TodoItem::findOrFail($id);
        return view('edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $todo = TodoItem::findOrFail($id);
        $todo->title = $request->input('title');
        $todo->completed = $request->input('completed');
        $todo->due_date = $request->input('due_date');
        $todo->description = $request->input('description');
        $todo->save();

        return redirect()->route('home')->with('success', 'Todo updated!');
    }

    public function destroy($id)
    {
        $todo = TodoItem::findOrFail($id);
        $todo->delete();

        return redirect()->route('home')->with('success', 'Todo deleted!');
    }
    public function progress(Request $request, $id)
    {
        $todo = TodoItem::findOrFail($id);
        $todo->completed = $request->input('completed');
        $todo->save();

        return redirect()->route('home')->with('success', 'Progress updated!');
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect('/login');
        }
        $todo = new TodoItem();
        $todo->title = $request->input('title');
        $todo->completed = $request->input('completed');
        $todo->due_date = $request->input('due_date');
        $todo->description = $request->input('description');
        $todo->user_id = $userId; // Link to logged-in user
        $todo->save();

        return redirect()->route('home')->with('success', 'Todo added!');
    }
    public function doLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('Username', $request->username)->first();

        if ($user && $user->Password === $request->password) { // Vergelijk direct
            session(['user_id' => $user->id, 'username' => $user->Username]);
            return redirect('/home')->with('success', 'Logged in!');
        } else {
            return back()->withErrors(['login' => 'Invalid credentials.']);
        }
    }
}
