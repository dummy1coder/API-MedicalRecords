<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'diagnosis',
        'medicines',
        'tests',
        'allergies',
        'immunizations',
        'treatmentplan'
    ];
}
