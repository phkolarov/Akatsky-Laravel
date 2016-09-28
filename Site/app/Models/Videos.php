<?php
/**
 * Created by PhpStorm.
 * User: mst
 * Date: 9/4/2016
 * Time: 12:15 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{


    public function category(){
        return $this->belongsTo('App\Models\Videos');
    }
}