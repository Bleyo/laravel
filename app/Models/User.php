<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Events\Authenticated;
use App\Models\TeamMember;
use App\Models\TeamContent;

class User extends Authenticated
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
