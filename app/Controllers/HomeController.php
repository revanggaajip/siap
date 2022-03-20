<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function __construct()
    {
        $this->title = "Home";
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['breadcrumb'] = $this->breadcrumb($this->title);
        return view('home/index', $data);
    }
}
