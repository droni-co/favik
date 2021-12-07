<?php

namespace Favik\Favik\Models;

use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Grimzy\LaravelMysqlSpatial\Types\Point;

use Favik\Favik\Models\Order;

class OrderAddress extends Model
{
  use SpatialTrait;
  
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $connection = 'mysql_favik';
  protected $table = 'order_addresses';
  
  protected $spatialFields = [
    'position'
  ];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['id','name', 'city','region','country', 'address', 'lat','long','type','order_id',
      'postal','phone','notes'];

  public function order() {
      return $this->belongsTo(Order::class);
  }
  protected static function booted() {
      static::saving(function ($address) {
        if($address->lat){
          $address->position = new Point($address->lat, $address->long); // (lat, lng)
        }
      });
  }
}
