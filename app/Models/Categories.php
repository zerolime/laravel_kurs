<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    static protected $data = [
        1 => [
            'id' => 1,
            'name' => 'Игры',
            'slug' => 'games',
        ],
        2 => [
            'id' => 2,
            'name' => 'Спорт',
            'slug' => 'sport',
        ],
        3 => [
            'id' => 3,
            'name' => 'НРИ',
            'slug' => 'brpg',
        ],
        4 => [
            'id' => 4,
            'name' => 'YouTube',
            'slug' => 'youtube',
        ],
    ];

    public function getData(){
        return static::$data;
    }

    public function getById($id){
        return static::$data[$id];
    }

    public function getIdBySlug($slug){

        foreach (static::$data as $cat){
            if($cat['slug'] === $slug) return $cat['id'];
        }

        throw new \Exception("category {$slug} not exist");
    }
}
