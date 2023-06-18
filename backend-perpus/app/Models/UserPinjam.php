<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPinjam extends Model
{
    use HasFactory;

    protected $fillable = ['uuid_user', 'nama_lengkap', 'username', 'password'];
}
