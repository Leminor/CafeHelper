<?php
    $name = 111;
?>

@extends('layouts.main')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th>Order ID</th>
            <th>Creator</th>
            <th>Warehouse</th>
            <th>Client</th>
            <th>Product</th>
            <th>Amount</th>
            <th>Price</th>
            <th>Description</th>
            <th>Create Time</th>
            <th>Operation ID</th>
        </tr>
        </thead>
        <tbody>
        @foreach(\App\Models\Entities\RealizationsEntity::query()->with(['creator', 'warehouse', 'client', 'product'])->get() as $realization)
            <tr>
                <td>{{$realization->order_id}}</td>
                <td>{{$realization->creator->name}}</td>
                <td>{{$realization->warehouse->name}}</td>
                <td>{{$realization->client->name}}</td>
                <td>{{$realization->product->name}}</td>
                <td>{{$realization->amount}}</td>
                <td>{{$realization->price}}</td>
                <td>{{$realization->description}}</td>
                <td>{{$realization->created_at}}</td>
                <td>{{$realization->id}}</td>
            </tr>
        @endforeach
        </tbody>

    </table>

@stop
