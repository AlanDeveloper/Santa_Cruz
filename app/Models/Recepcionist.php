<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recepcionist extends Model
{
    use HasFactory;

    public $timestamps = true;
    public $incrementing = false;

    protected $table = 'recepcionist';
    protected $primaryKey = 'cpf';
    protected $keyType = 'string';

    protected $fillable = [
        'cpf',
        'name',
        'email',
        'address',
        'telephone',
        'experience',
        'knowledge',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
