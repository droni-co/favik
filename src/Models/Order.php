<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status', 'owner_status', 'merchant_status', 'payment_status','attributes','execution_status', 'subtotal', 'merchant_id',
        'shipping', 'discount', 'tax', 'total', 'user_id','is_shippable', 'crm_id','origin_id', 'extras','payment_method','paid_at','invoice_id','is_invoiced'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function merchant() {
        return $this->belongsTo('App\Models\Merchant');
    }

    public function items() {
        return $this->hasMany('App\Models\Item');
    }
    public function orderAddresses() {
        return $this->hasMany('App\Models\OrderAddress');
    }

}
