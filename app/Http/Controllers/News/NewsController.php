<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;

class NewsController extends Controller
{
    public function showAll(News $newsModel,Categories $categoriesModel)
    {

        $categories = $categoriesModel->getData();
        $news = $newsModel->getData();

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

    public function showDetail($id, News $news){
        try{
            $article = $news->getById($id);
        } catch(\Exception $e){
            return response(view('news.detail404'), 404);
        }
        $similarNews = $news->getBySlugId($article['slugs'],4 , true);

        return view('news.detail',
            [
                'article' => $article,
                'similarNews' => $similarNews,
                'aside' => true
            ]
        );

    }
}
