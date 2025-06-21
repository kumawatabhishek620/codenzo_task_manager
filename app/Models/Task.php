<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = []; // allow mass assignment

    protected static function booted()
{
    static::addGlobalScope('notDeleted', function ($query) {
        $query->where('status', '!=', '5');
    });
}


    // Relations
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
