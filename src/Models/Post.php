<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'social_network','content_type','external_id','username','date','content','link','likes','comments','brand','attributes'];
    protected $casts = [
        'attributes' => 'array',
    ];

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
