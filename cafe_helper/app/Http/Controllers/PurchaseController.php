<?php

namespace App\Http\Controllers;


class PurchaseController
{
    public function index()
    {
        return view('show.purchases');
    }

    public function create()
    {
        return view('create.purchase');
    }
}
