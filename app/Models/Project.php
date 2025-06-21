<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    protected static function booted()
{
    static::addGlobalScope('notDeleted', function ($query) {
        $query->where('status', '!=', '6');
    });
}

}
