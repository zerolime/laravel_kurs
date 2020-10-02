<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;

//use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showAll(Categories $categoriesModel)
    {
        $categories = $categoriesModel->getData();

        foreach ($categories as $k => $cat) {
            $categories[$k]['link'] = route('slug', ['slug' => $cat['slug']]);
            $categories[$k]['news'] = News::getBySlugId($cat['id'], 2, true);
        }

        return view('news.slug.all',
            [
                'aside' => true,
                'categories' => $categories,
            ]
        );
    }

    public function showBySlug($slug)
    {
//        Categories::getBySlug($slug);
//        News::getBySlug($slug);

        return view('news.slug.categoryNews',[]);
    }
}
