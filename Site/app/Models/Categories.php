<?php
/**
 * Created by PhpStorm.
 * User: mst
 * Date: 9/7/2016
 * Time: 10:48 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    function videos(){

        return $this->hasMany('App\Models\Videos');
    }
    function articles(){

        return $this->hasMany('App\Models\Articles');
    }

}