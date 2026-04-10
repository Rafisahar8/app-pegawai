<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee; 

class Position extends Model
{
    use HasFactory;

    protected $table = 'positions';

    protected $fillable = [
        'position_name',
        'department_id',
        'gaji_pokok',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'jabatan_id', 'id');
    }

    protected static function booted()
    {
        static::updated(function ($position) {
            if ($position->isDirty('gaji_pokok')) {
                $position->employees()->update(['gaji' => $position->gaji_pokok]);
            }
        });
    }
}
