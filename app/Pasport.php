<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

 class Pasport extends Model
{
    use SoftDeletes;

    public $timestamps=false;
    /*protected $fillable=['nom','prenom','CIN','email','NUP','user_id'];*/



   public function user()
   {
       $this->BelongsTo('App/User');
   }
}
