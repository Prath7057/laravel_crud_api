<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class omlayout extends Model
{
   protected $table = 'omlayout';
   protected $primaryKey = 'omly_id';
   protected $fillable = [
      'omly_own_id',
      'omly_option',
      'omly_value',
      'omly_indicator',
      'omly_panel_name',
      'omly_other_info'
   ];
   protected $timestamps = false;
}
