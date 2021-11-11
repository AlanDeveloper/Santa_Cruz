<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TakeExam extends Model
{
    use HasFactory;

    public $timestamps = true;
    public $incrementing = false;

    protected $table = 'takeExam';
    protected $primaryKey = ['idExam','cpfNurse','idAppointment'];
    /* protected $keyType = 'string'; */

    protected $fillable = [
        'date',
        'idAppointment',
        'idExam',
        'result',
        'cpfNurse'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
