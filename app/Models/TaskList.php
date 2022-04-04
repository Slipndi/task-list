<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TaskList extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'category_id',
        'is_active'
    ];

    /**
     * One to many relationship with categories
     *
     * @return HasOne
     */
    public function category() : HasOne {
        return $this->hasOne(Category::class);
    }

    /**
     * Many to one relationship with tasks
     *
     * @return HasMany
     */
    public function tasks() : HasMany {
        return $this->hasMany(Task::class);
    }
}
