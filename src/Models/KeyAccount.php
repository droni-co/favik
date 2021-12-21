<?php

namespace Favik\Favik\Models;

use Illuminate\Database\Eloquent\Model;

class KeyAccount extends Model  {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $connection = 'mysql_favik';
  protected $table = 'key_accounts';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'account', 
    'position', 
    'engagement', 
    'followers', 
    'tags'
  ];

}
