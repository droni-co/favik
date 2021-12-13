<?php

namespace Favik\Favik\Models;

use Illuminate\Database\Eloquent\Model;

use Favik\Favik\Models\Item;
use Favik\Favik\Models\Order;

class User extends Model
{

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $connection = 'mysql_favik';
  protected $table = 'push';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name',
      'email',
      'password',
      'status',
      'firstName',
      'gender',
      'city',
      'country',
      'crm_id',
      'origin_id',
      'total_purchases',
      'orders_count',
      'created_at',
      'email_verified_at',
      'dob',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password',
      'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
      'email_verified_at' => 'datetime',
  ];
  public function items() {
    return $this->hasMany(Item::class);
  }
  public function orders() {
    return $this->hasMany(Order::class);
  }
}
