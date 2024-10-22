<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assembly extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'user_id',
        'product_id',
        'employee_id',
        'fee'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function assemblyAll()
    {
        return $this->orderBy('id', 'desc')->get();
    }

    public function assmblyOrderId($order_id)
    {
        return $this->where('order_id', $order_id)->first();
    }

    public function statusAssembly()
    {
        return [
            1 => 'Đơn lắp mới',
            2 => 'Đang trong quá trình lắp ráp',
            3 => 'Hoàn thành lắp ráp',
            4 => 'Hủy đơn lắp ráp',
        ];
    }
}
