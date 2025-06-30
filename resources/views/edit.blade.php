@include('templates.header')

<div id="editpage">
    <div id="container-todotable">
        <div class="make-todo-form">
            <h1 id="maketitle">Edit Todo</h1>
            <form action="{{ route('todo.update', $todo->id) }}" method="POST" style="display: flex; flex-direction: column; gap: 12px; max-width: 400px;">
                @csrf
                @method('PUT')
                <label>
                    Title:
                    <input type="text" name="title" value="{{ $todo->title }}" required>
                </label>
                <label>
                    Completed:
                    <span style="display: flex; align-items: center; gap: 10px;">
                        <input type="range" name="completed" min="0" max="100" value="{{ isset($todo) ? $todo->completed : 0 }}" oninput="this.nextElementSibling.value = this.value">
                        <output>{{ isset($todo) ? $todo->completed : 0 }}</output>%
                    </span>
                </label>
                <label>
                    Due date:
                    <input type="date" name="due_date" value="{{ $todo->due_date }}">
                </label>
                <label>
                    Description:
                    <textarea name="description">{{ $todo->description }}</textarea>
                </label>
                <button type="submit" class="btn-edit">Save</button>
            </form>
        </div>
    </div>
</div>

@include('templates.footer')