<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','sku','ref2','price','priceSum','tax','cost','quantity','user_id','order_id','merchant_id','paid_status','attributes'];

    public function order() {
        return $this->belongsTo('App\Models\Order');
    }
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function merchant() {
        return $this->belongsTo('App\Models\Merchant');
    }
    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
