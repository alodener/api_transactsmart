<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $table = 'peoples';

    protected $fillable = [
        'name', 
        'email', 
        'balance',
        'bonus',
        'available_withdraw',
        'banca_codigo', ];
}
