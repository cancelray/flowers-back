<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Order extends Model
{
    use HasFactory;
    use AsSource;

    protected $primaryKey = 'id';
    protected $table = 'orders';
    protected $fillable  = [
                'name', 
                'phone', 
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
                'created_at', 
                'updated_at'];
}

