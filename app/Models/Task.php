<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $guarded = ['id'];
    protected $table = 'tasks';


    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Categories()
    {
        return $this->belongsToMany(Category::class,'category_task');
    }
}


