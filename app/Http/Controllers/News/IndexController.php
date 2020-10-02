<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;

class IndexController extends Controller
{
    public function index()
    {

        $categories = (new Categories)->getData();
        $news = (new News)->getData();

        foreach ($categories as $k => $cat){
            $categories[$k]['link'] = "/news/slug/{$cat['slug']}";
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
}
