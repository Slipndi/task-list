<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    /**
     * Fillable variable in mass assignement
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'color'
    ];

    /**
     * Many to One relationship with TaskLists
     *
     * @return HasMany
     */
    public function taskList() : HasMany {
        return $this->hasMany(TaskList::class);
    }
}