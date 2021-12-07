<?php namespace Favik\Favik\Models;

use Illuminate\Database\Eloquent\Model;
use Favik\Favik\Models\Order;
use Favik\Favik\Models\User;
use Favik\Favik\Models\Merchant;

class Item extends Model {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $connection = 'mysql_favik';
  protected $table = 'items';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name','sku','ref2','price','priceSum','tax','cost','quantity','user_id','order_id','merchant_id','paid_status','attributes'];

  public function order() {
      return $this->belongsTo(Order::class);
  }
  public function user() {
      return $this->belongsTo(User::class);
  }
  public function merchant() {
      return $this->belongsTo(Merchant::class);
  }
  public function getTableColumns() {
      return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
  }
}
