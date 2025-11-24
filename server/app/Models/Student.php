<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $fillable = [
    'diakNev',
    'schoolclassId',
    'neme',
    'iranyitoszam',
    'lakHelyseg',
    'lakCim',
    'szulHelyseg',
    'szulDatum',
    'igazolvanyszam',
    'atlag',
    'osztondij',
];

    // diák -> osztály (több diák tartozik egy osztályhoz)
    public function schoolclass()
    {
        return $this->belongsTo(Schoolclass::class, 'schoolclassId');
    }

    // diák -> sportok (N-N)
    public function sports()
    {
        return $this->belongsToMany(Sport::class, 'playingsports', 'studentId', 'sportId');
    }
}
