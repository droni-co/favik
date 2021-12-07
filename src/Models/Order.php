<?php

namespace Favik\Favik\Models;

use Illuminate\Database\Eloquent\Model;
use Favik\Favik\Models\User;
use Favik\Favik\Models\Merchant;
use Favik\Favik\Models\Item;
use Favik\Favik\Models\OrderAddress;


class Order extends Model {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $connection = 'mysql_favik';
  protected $table = 'orders';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['status', 'owner_status', 'merchant_status', 'payment_status','attributes','execution_status', 'subtotal', 'merchant_id',
      'shipping', 'discount', 'tax', 'total', 'user_id','is_shippable', 'crm_id','origin_id', 'extras','payment_method','paid_at','invoice_id','is_invoiced'];

  public function user() {
      return $this->belongsTo(User::class);
  }

  public function merchant() {
      return $this->belongsTo(Merchant::class);
  }

  public function items() {
      return $this->hasMany(Item::class);
  }
  public function orderAddresses() {
      return $this->hasMany(OrderAddress::class);
  }

}
