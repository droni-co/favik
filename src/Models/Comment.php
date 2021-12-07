<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'social_network', 'external_user_id', 'comment', 'date', 'external_post_id', 'parent_id', 'user_id'];
    protected $dates = [
        'created_at',
        'updated_at',
        'date'
    ];

    public function post() {
        return $this->belongsTo('App\Models\Post');
    }

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    public function commentable() {
        return $this->morphTo();
    }

}
