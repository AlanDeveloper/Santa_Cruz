<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;

    public $timestamps = true;
    public $incrementing = true;

    protected $table = 'medicament';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'amount',
        'description',
        'cpfNurse',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
