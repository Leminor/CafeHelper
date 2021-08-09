<?php


namespace App\Http\Controllers;


class RealizationController
{
    public function index()
    {
        return view('show.realizations');
    }

    public function create()
    {
        return view('create.realization');
    }
}
