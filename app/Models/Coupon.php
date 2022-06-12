<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable =[
        'coupon_code',
        'coupon_amount',
        'coupon_quantity',
        'coupon_exp_date',
        'coupon_creator',
        'coupon_editor',
        'coupon_status',
    ];
}
