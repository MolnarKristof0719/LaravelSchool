<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    /** @use HasFactory<\Database\Factories\SportFactory> */
    use HasFactory;
    protected $fillable = ['sportNev'];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'playingsports', 'sportId', 'studentId');
    }
}
