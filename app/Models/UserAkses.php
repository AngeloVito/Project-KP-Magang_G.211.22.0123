<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class UserAkses extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;
    protected $table = "profile";
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'username',
        'email',
        'password',
        'nama_lengkap',
        'nip',
        'jabatan',
        'alamat',
        'no_hp',
        'tanggal_masuk',
        'file_pdf',
    ];

    public $timestamps = true;
}