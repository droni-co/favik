<?php namespace Favik\Favik\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $connection = 'mysql_favik';
  protected $table = 'follows';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['followable_id', 'followable_type','username','user_social_id'];

  public function getTableColumns() {
      return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
  }
  public function followable()
  {
      return $this->morphTo();
  }
}
