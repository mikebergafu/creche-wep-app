<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Child extends Model
{
    use Notifiable;
    /*public function guardian(){
        return $this->hasMany('guardian', 'guardian1_id');
    }*/

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'child_fullname',
    ];


}
