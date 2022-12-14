<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Content extends Pivot
{
    use HasFactory;

    /**
     * Pivot's table reference
     *
     * @var string
     */
    protected $table = 'team_milestone';
}
