<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Faq;
use App\FaqCategory;
use App\Job;
use App\Policy;
use App\Portfolio;
use App\Product;
use Illuminate\Http\Request;

class CerveController extends Controller
{
    //
    public  function homepage(){
        $products=Product::where('is_active',1)->get();
        $posts=Blog::latest()->take(3)->get();

        return view('welcome', compact('products','posts'));
    }
    public  function about(){
        return view('about-us');
    }
    public  function blog(){
        $posts=Blog::where('is_active', 1)->get();
        return view('blog', compact('posts'));
    }
    public  function post($slug){
        $post=Blog::findBySlugOrFail($slug);
        $blogs=Blog::inRandomOrder()->limit(4)->get();
        $products=Product::where('is_active',1)->get();

        return view('post', compact('post', 'blogs','products'));
    }

    public  function policy(){
        $policies=Policy::where('category', 1)->get();
        return view('privacy-policy', compact('policies'));
    }

    public  function terms(){
        $policies=Policy::where('category', 0)->get();
        return view('terms-and-conditions', compact('policies'));
    }

    public  function portfolio(){
        $portfolios=Portfolio::where('is_active', 1)->paginate(9);

        return view('portfolio.index', compact('portfolios'));
    }

    public  function previousWork($slug){
        $portfolio=Portfolio::findBySlugOrFail($slug);
        $photos=$portfolio->getMedia('portfolio_photos');
        return view('portfolio.show', compact('portfolio','photos'));

    }

}
