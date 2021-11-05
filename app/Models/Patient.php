<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    public $timestamps = true;
    public $incrementing = false;

    protected $table = 'patient';
    protected $primaryKey = 'cpf';
    protected $keyType = 'string';

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
