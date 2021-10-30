<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacient extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'pacient';

    protected $fillable = [
        'cpf',
        'name',
        'email',
        'address',
        'telephone',
        'birth_date',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
