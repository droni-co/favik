<?php 
namespace Favik\Favik\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FileM;
use DB;
use Favik\Favik\Models\Product;
use Favik\Favik\Models\Item;
use Favik\Favik\Models\Plan;
use Favik\Favik\Models\Merchant;
use Favik\Favik\Models\Condition;


class ProductVariant extends Model {

	/**
   * The database table used by the model.
   *
   * @var string
   */
  protected $connection = 'mysql_favik';
  protected $table = 'product_variant';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['sku','product_id','ref2','type','description','is_digital','is_on_sale','is_shippable',
      'price','sale','tax','cost','quantity','min_quantity','weight','requires_authorization','attributes','isActive'];

  public function product() {
      return $this->belongsTo(Product::class);
  }
  public function items() {
      return $this->hasMany(Item::class);
  }
  public function plan() {
      return $this->hasOne(Plan::class);
  }
  public function merchant() {
      return $this->hasOne(Merchant::class);
  }
  public function conditions() {
      return $this->hasMany(Condition::class);
  }
  public function variantAttributes() {
      return $this->belongsToMany('App\Models\Attribute','product_variant_attribute_option','product_variant_id','attribute_id')->withTimestamps();
  }
  public function attributeOptions() {
      return $this->belongsToMany('App\Models\AttributeOption','product_variant_attribute_option','product_variant_id','attribute_option_id')->withTimestamps();
  }
  
  public function getCartImg() {
      $file = FileM::where("type","App\\Models\\Variant")->where("trigger_id", $this->id)->first();
      if($file){
          return $file;
      }
      $file = FileM::where("type","App\\Models\\Product")->where("trigger_id", $this->product_id)->first();
      if($file){
          return $file;
      }
      return null;
  }
  public function getActivePrice() {
      if($this->is_on_sale){
          return $this->sale;
      }
      return $this->price;
  }
  protected static function booted() {
      static::saved(function ($variant) {
          $product = $variant->product;
          $saveProduct = false;
          $actives = DB::table('product_variant')->where('product_id', $product->id)->where('isActive', true)->count();
          if($actives == 0 ){
              $product->isActive = false;
              $saveProduct = true;
          }
          if($variant->price > $product->high){
              $product->high = $variant->price;
              $saveProduct = true;
          }
          if($variant->price < $product->low){
              $product->low = $variant->price;
              $saveProduct = true;
          }
          if($product->low < 1){
              $product->low = $variant->price;
              $saveProduct = true;
          }
          if($saveProduct){
              $product->save();
          }
      });
  }
}
