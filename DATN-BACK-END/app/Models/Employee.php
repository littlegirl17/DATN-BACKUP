<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'fullname',
        'username',
        'email',
        'phone',
        'password',
        'image',
        'status',
        'admin_group_id',
    ];

    public function employeeAll()
    {
        return $this->orderBy('id', 'desc')->get();
    }
    public function employeeCheckLogin($username)
    {
        return $this->where('username', $username)->first();
    }
}
