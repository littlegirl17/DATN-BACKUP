<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderProduct; // Đảm bảo đường dẫn đúng
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'province',
        'district',
        'ward',
        'total',
        'payment',
        'status',
        'coupon_code',
        'note',
        'order_code'
    ];

    public function orderUser($user_id, $status = null)
    {
        $query = $this->where('user_id', $user_id);
        if (!is_null($status)) {
            $query = $query->where('status', $status);
        }
        return $query->get();
    }


    public function definePayment()
    {
        return [
            1 => 'Thanh toán bằng tiền mặt',
            2 => 'Thanh toán VNPAY',
            3 => 'Thanh toán MoMo',
        ];
    }
    public function statusOrder()
    {
        return [
            1 => 'Chờ xác nhận',
            2 => 'Đã xác nhận',
            3 => 'Đang vận chuyển',
            4 => 'Hoàn thành',
            5 => 'Đã hủy',
        ];
    }
    public function viewOrderUser($id_order)
    {
        return $this->where('id', $id_order->id)->first();
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }


    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'order_id'); // 'order_id' là khóa ngoại trong OrderProduct
    }

    public function countOrder($user_id)
    {
        return $this->where('user_id', $user_id)->count();
    }

    public function totalUserOrder($user_id)
    {
        return $this->where('user_id', $user_id)->sum('total');
    }
    // Mối quan hệ One-to-One với Assembly
    public function assembly()
    {
        return $this->hasOne(Assembly::class, 'order_id');
    }
    // gọi orderProducts() trên một đơn hàng,
    // nó sẽ trả về tất cả các sản phẩm liên quan đến đơn hàng đó. Điều này giúp bạn dễ dàng lấy thông tin sản phẩm cho từng đơn hàng.
    // Mô hình Order: Đây là mô hình đại diện cho bảng đơn hàng.
    // hasMany(OrderProduct::class, 'order_id'):
    // hasMany: Nghĩa là một đơn hàng có thể có nhiều sản phẩm.
    // OrderProduct::class: Chỉ đến mô hình sản phẩm liên quan.
    // 'order_id': Là khóa ngoại trong bảng order_products, kết nối sản phẩm với đơn hàng.


}
