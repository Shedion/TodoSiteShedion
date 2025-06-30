<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TodoItem extends Model
{
    protected $fillable = ['title', 'completed', 'due_date', 'description', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
