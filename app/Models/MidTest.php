<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MidTest extends Model
{
    use HasFactory;

    protected $table = 'mid_test';

    protected $fillable = ['nama_pemesan', 'no_hp', 'nama_kereta', 'stasiun_tujuan','harga_tiket','jumlah_tiket',];
}
