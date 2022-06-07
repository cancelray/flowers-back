<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;

class Order extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $primaryKey = 'id';
    protected $table = 'orders';
    protected $fillable  = [
                'name', 
                'phone', 
                'email',
                'recipient_phone', 
                'recipient_name', 
                'comment', 
                'delivery_type', 
                'delivery_city', 
                'delivery_street', 
                'delivery_bldng', 
                'delivery_house', 
                'delivery_room', 
                'delivery_time', 
                'payment_type', 
                'full_price',
                'is_paid',
                'is_complite',
                'created_at', 
                'updated_at'];

                
    protected $allowedSorts = ['id', 'name', 'phone', 'email', 'recipient_name', 'delivery_type', 'delivery_city', 'full_price', 'is_paid', 'is_complite', 'created_at', 'updated_at'];

    protected $allowedFilters = [
                'id', 
                'name', 
                'phone', 
                'email',
                'recipient_phone', 
                'recipient_name', 
                'comment', 
                'delivery_type', 
                'delivery_city', 
                'delivery_street', 
                'delivery_bldng', 
                'delivery_house', 
                'delivery_room', 
                'delivery_time', 
                'payment_type', 
                'full_price',
                'is_paid',
                'is_complite',
                'created_at'
            ];
}

