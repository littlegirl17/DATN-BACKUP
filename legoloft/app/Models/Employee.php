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
    public function searchEmployee($filter_fullname, $filter_username, $filter_status)
    {
        $query = $this->query();

        if (!is_null($filter_fullname)) {
            $query->where('fullname', 'LIKE', "%{$filter_fullname}%");
        }

        if (!is_null($filter_username)) {
            $query->where('username', 'LIKE', "%{$filter_username}%");
        }

        if (!is_null($filter_status)) {
            $query->where('status', '=', (int)$filter_status);
        }

        return $query->paginate(10);
    }
}
