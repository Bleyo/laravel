<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\TeamMember;
use App\Models\TeamContent;

class Team extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillables = [
        'name', 'unique', 'owner_id'
    ];

    protected $attributes = [
        'unique' => true
    ];

    public function milestones()
    {
        return $this->belongsToMany(Milestone::class)
            ->using(TeamContent::class)->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->using(TeamMember::class)->withTimestamps();
    }
}
