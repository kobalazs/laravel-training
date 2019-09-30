<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public $fillable = ['name', 'description'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
