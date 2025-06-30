<?php

namespace Database\Seeders;

use App\Models\TodoItem;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
           $x = new TodoItem([
            'title' => 'Sample Todo Item',
            'description' => 'This is a sample todo item for testing purposes.',
            'completed' => 0,
            'due_date' => now()->addDays(7),
            // Assuming the first user is the one we created above
        ]);
        $x->save();

        
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    
      
    }
}
