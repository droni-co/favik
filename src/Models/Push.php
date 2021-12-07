<?php

namespace Favik\Favik\Models;

use Illuminate\Database\Eloquent\Model;
use Favik\Favik\Models\User;

class Push extends Model
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
  protected $fillable = ['id', 'user_id', 'platform', 'object_id','credits'];
  
  public function user() {
      return $this->belongsTo(User::class);
  }
}
