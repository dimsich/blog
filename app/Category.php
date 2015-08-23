<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    //получаем активные типы
    public static function getList()
    {
        $categories = DB::table('categories')->lists('name', 'id');
        return $categories;
    }
}
