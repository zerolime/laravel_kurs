<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    static protected $data = [
            1 => [
               'id' => 1,
               'title' => 'новость 1',
               'text' => 'какой-то текст новость 1',
               'author'=> 'автор 1',
               'slugs' => [1,3],
               'private' => false
            ],
            2 => [
               'id' => 2,
               'title' => 'новость 2',
               'text' => 'какой-то текст новость 2',
               'author'=> 'автор 3',
               'slugs' => [2],
               'private' => false
            ],
            3 => [
               'id' => 3,
               'title' => 'новость 3',
               'text' => 'какой-то текст новость 3',
               'author'=> 'автор 1',
               'slugs' => [4],
               'private' => false
            ],
            4 => [
               'id' => 4,
               'title' => 'новость 4',
               'text' => 'какой-то текст новость 4',
               'author'=> 'автор 2',
               'slugs' => [4],
               'private' => true
            ],
            5 => [
               'id' => 5,
               'title' => 'новость 5',
               'text' => 'какой-то текст новость 5',
               'author'=> 'автор 2',
               'slugs' => [3,4],
               'private' => false
            ],
            6 => [
               'id' => 6,
               'title' => 'новость 6',
               'text' => 'какой-то текст новость 6',
               'author'=> 'автор 3',
               'slugs' => [1,2],
               'private' => false
            ],
            7 => [
               'id' => 7,
               'title' => 'новость 7',
               'text' => 'какой-то текст новость 7',
               'author'=> 'автор 1',
               'slugs' => [3],
               'private' => true
            ],
            8 => [
               'id' => 8,
               'title' => 'новость 8',
               'text' => 'какой-то текст новость 8',
               'author'=> 'автор 2',
               'slugs' => [3],
               'private' => false
            ],
            9 => [
               'id' => 9,
               'title' => 'новость 9',
               'text' => 'какой-то текст новость 9',
               'author'=> 'автор 3',
               'slugs' => [1],
               'private' => false
            ],
        ];

    public function getData(){
        return static::$data;
    }

    public function getById(int $id){
        return static::$data[$id];
    }

    public function getBySlug($slug, int $limit = 0){

        $data = [];

        try {
            $slugId = (new Categories)->getIdBySlug($slug);
        } catch (\Exception $e){
            return [];
        }

        foreach (static::$data as $k => $newsItem){
            if (in_array($slugId, $newsItem['slugs'])){

                $data[$k] = $newsItem;

                if($limit && count($data) == $limit) break;
            }
        }

        return $data;
    }
}
