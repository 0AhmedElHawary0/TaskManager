<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = ['title','description','priority','user_id'];
    protected $table = 'tasks';


    public function User()
    {
        return $this->belongsTo(User::class);
    }
}


