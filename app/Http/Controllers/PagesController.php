<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to laravel !';
       // return view('pages.index', compact('title'));
        return view('pages.index')->with('title',$title);
    }
    public function about(){
        $title = 'Welcome about';
        return view('pages.about')->with('title',$title);
    }
    public function services(){

        $data = array(

            'title' => 'Welcome Services',
            'services' => ['Web Desgin','Programming','SEO']

        );

        return view('pages.services')->with($data);
    }
}
