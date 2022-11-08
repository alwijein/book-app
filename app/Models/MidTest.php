<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MidTest extends Model
{
    use HasFactory;

    protected $table = 'mid_test';

    protected $fillable = ['user_id', 'team_name', 'player_id', 'player_fullname'];
}
