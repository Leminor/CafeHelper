<?php


namespace App\Http\Controllers;


class PurchaseController
{
    public function show()
    {
        return view('show.purchases');
    }

    public function create()
    {
        return view('create.purchase');
    }
}
