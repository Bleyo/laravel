<?php

namespace App\Models;

use MindaUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $fillables = [
        'name', 'unique'
    ];

    public function teams()
    {
        $this->belongsToMany(Team::class)->using(Member::class)->withTimestamps();
    }
}
