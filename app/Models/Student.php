<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $hidden = [
        // 'name',
        // 'email',
    ];


    public function scopeMale($query)
    {
        return $query->where('gender', 'm')->where('age', 25);
    }

    public function scopeFemale($query)
    {
        return $query->where('gender', 'f')->where('age', 25);
    }

    public function scopeRecent($query)
    {
        return $query->where('created_at', '>=', now()->subDays(30));
    }
}
