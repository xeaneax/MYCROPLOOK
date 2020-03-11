<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Lands;
use Charts;
use DB;
use App\Charts\productsChart;

class PagesController extends Controller
{
    public function index(){
        //return view('pages.index', compact('title'));

        //
        //$posts = Post::all();
        //return Post::where('crop_name','Cabbage')->get();
        //$posts = DB::select('SELECT * FROM posts');
        //$posts = Post::orderBy('crop_name','desc')->take(1)->get();
        $posts = Post::orderBy('crop_name','desc')->take(3)->get();

        // $allPosts = Post::orderBy('crop_name','desc')->get();
        $user_lands = Lands::orderBy('name_of_company','desc')->take(3)->get();

        // $allposts = Post::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->get();

        // $data = collect([]); // Could also be an array

    // for ($days_backwards = 10; $days_backwards >= 0; $days_backwards--) {
    //     // Could also be an array_push if using an array rather than a collection.
    //     $data->push(Lands::whereDate('created_at', today()->subDays($days_backwards))->count());
    // }

    // $chart = new productsChart;
    // $chart->labels(['10 days ago', 'Yesterday', 'Today']);
    // $chart->dataset('My dataset', 'line', $data);
        // $chart = new productsChart;
        // $chart->labels($allPosts->keys());
        // $chart->dataset('Crops', 'line', $allPosts->values());

        $chart = new productsChart;
        $chart->labels(['One', 'Two', 'Three']);
        $chart->dataset('My dataset', 'line', [1, 2, 3]);

        // $chart = Charts::database($allposts, 'bar', 'highcharts')
        // ->title('Product Details')
        // ->elementLabel('Total Products')
        // ->dimensions(1000, 500)
        // ->colors(['red', 'green', 'blue', 'yellow', 'orange', 'cyan', 'magenta'])
        // ->groupByMonth(date('Y'), true);
        //$posts = Post::orderBy('created_at','desc')->get();
        return view('pages.index')
        ->with('posts', $posts)
        ->with('user_lands', $user_lands)
        ->with('chart', $chart);

    }
    public function admin(){
        $title = "Admin Dashboard";
        return view('pages.admin')->with('title', $title);
    }
    public function products(){
        $data = array(

            'title' => 'Products!',
            'products' => ['Cabbage','Tomatoes','Corn','Potatoes','Coffee','Carrots','Lettuce']
        );
        return view('pages.products')->with($data);
    }
    public function homepage(){
        $title = "Home Page";
        return view('pages.homepage')->with('title', $title);
    }
}