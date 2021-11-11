<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    public $timestamps = true;
    public $incrementing = true;

    protected $table = 'exam';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'description',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
