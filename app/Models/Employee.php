<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'nama_lengkap',
        'email',
        'nomor_telepon',
        'tanggal_lahir',
        'alamat',
        'tanggal_masuk',
        'jabatan_id',
        'departemen_id',
        'status',
        'gaji',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'departemen_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'jabatan_id');
    }

    protected static function booted()
    {
        static::creating(function ($employee) {
            if ($employee->jabatan_id) {
                $pos = Position::find($employee->jabatan_id);
                if ($pos) {
                    $employee->gaji = $pos->gaji_pokok;
                }
            }
        });

        static::updating(function ($employee) {
            if ($employee->jabatan_id) {
                $pos = Position::find($employee->jabatan_id);
                if ($pos) {
                    $employee->gaji = $pos->gaji_pokok;
                }
            }
        });
    }
}
