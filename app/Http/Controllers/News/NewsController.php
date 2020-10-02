<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;

class NewsController extends Controller
{
    public function showAll()
    {

        $categories = (new Categories)->getData();
        $news = (new News)->getData();

        foreach ($categories as $k => $cat){
            $categories[$k]['link'] = route('slug', ['slug' => $cat['slug']]);
        }

        foreach ($news as $k => $article){

            $tempSlugs = [];
            foreach ($article['slugs'] as $slugId){
                if ($categories[$slugId]) $tempSlugs[] = $categories[$slugId];
            }
            $news[$k]['slugs'] = $tempSlugs;
        }

        return view(
            'news.all',
            [
                'aside' => true,
                'categories' => $categories,
                'news' => $news,
            ]
        );
    }

    public function showDetail($id){
        $article = (new News)->getById($id);

        if($article) return view('news.detail', $article);

        //return view('404');
    }
}
