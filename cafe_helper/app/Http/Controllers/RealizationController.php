<?php


namespace App\Http\Controllers;


class RealizationController
{
    public function show()
    {
        return view('show.realizations');
    }

    public function create()
    {
        return view('create.realization');
    }
}
