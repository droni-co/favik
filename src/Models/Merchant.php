<?php

namespace Favik\Favik\Models;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model {
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $connection = 'mysql_favik';
  protected $table = 'merchants';
  

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['id','url', 'merchant_id',  'name', 'type', 'email', 'telephone','description','attributes','address'];

  protected $casts = [
      'attributes' => 'array',
  ];
}
