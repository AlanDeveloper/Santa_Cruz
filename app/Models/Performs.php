<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performs extends Model
{
    use HasFactory;

    public $timestamps = true;
    public $incrementing = false;

    protected $table = 'performs';
    protected $primaryKey = ['cpfMed','idAppointment'];
    /* protected $keyType = 'string'; */

    protected $fillable = [
        'cpfMed',
        'idAppointment',
        'diagnosis',
        'date'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
