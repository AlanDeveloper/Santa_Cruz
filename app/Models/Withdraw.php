<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;

    public $timestamps = true;
    public $incrementing = false;

    protected $table = 'withdraw';
    protected $primaryKey = ["cpfNurse", "cpfPac", "idMedicament", "date"];
    /* protected $keyType = 'string'; */

    protected $fillable = [
        'idMedicament',
        'amount',
        'date',
        'cpfPac',
        'cpfNurse'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
