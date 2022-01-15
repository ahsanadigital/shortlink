<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
  use HasFactory;

  protected $guarded = [];

  /**
   * The function make connection to visitor
   *
   * @return array If you set to array
   * @return object If you not set visitor
   */
  public function visitor()
  {
    return $this->hasMany(\App\Models\Visitor::class, 'id_link', 'short');
  }
}
