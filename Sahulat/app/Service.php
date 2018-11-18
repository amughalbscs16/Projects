<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  protected $table = 'services';
  public $timestamps = false;
     protected $fillable = [ 'name','count',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

   	protected $guarded = [
      'id',
   	];
}
