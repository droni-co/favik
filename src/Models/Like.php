<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'likes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['likeable_id','likeable_type','username','user_social_id'];

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
    public function likeable()
    {
        return $this->morphTo();
    }
}
