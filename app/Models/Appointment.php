<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    public $timestamps = true;
    public $incrementing = true;

    protected $table = 'appointment';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'date',
        'cpfRec',
        'cpfPac'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
