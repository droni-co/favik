<?php

namespace Favik\Favik\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {
  public function user() {
    return $this->belongsTo(User::class);
  }
}