<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Task extends Model
{
    use HasFactory;

    /**
     * Fillable variable in mass assignement
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'task_lists_id',
        'is_done'
    ];

    /**
     * One to many relationship with tasklist
     *
     * @return HasOne
     */
    public function taskList() : HasOne {
        return $this->hasOne(TaskList::class, 'id', 'task_lists_id');
    }
}
