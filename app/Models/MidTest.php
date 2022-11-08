<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MidTest extends Model
{
    use HasFactory;

    protected $table = 'mid_test';

    protected $fillable = ['nama_pembeli', 'menu', 'harga', 'banyak'];
}
