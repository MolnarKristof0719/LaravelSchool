<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schoolclass extends Model
{
    /** @use HasFactory<\Database\Factories\SchoolclassFactory> */
    use HasFactory;
    protected $fillable = ['osztalyNev'];

    // osztály -> diákok
    public function students()
    {
        return $this->hasMany(Student::class, 'schoolclassId');
    }
}
