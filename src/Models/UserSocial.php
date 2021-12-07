<?php

namespace Favik\Favik\Models;

use Illuminate\Database\Eloquent\Model;

class UserSocial extends Model  {

    use Authenticatable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql_favik';
    protected $table = 'users_social';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'avatar', 'email', 'provider', 'provider_id', 'user_id'];


    public function user() {
        return $this->belongsTo('App\Models\User');
    }

}
