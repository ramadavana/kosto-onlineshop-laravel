<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = ['invoice','user_id','no_resi','status_order_id','metode_pembayaran','subtotal','start_date','end_date','diff_date','pesan','no_hp'];
}
