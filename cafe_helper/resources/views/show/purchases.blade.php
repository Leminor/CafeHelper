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
            <th>Supplier</th>
            <th>Product</th>
            <th>Amount</th>
            <th>Price</th>
            <th>Description</th>
            <th>Create Time</th>
            <th>Operation ID</th>
        </tr>
        </thead>
        <tbody>
        @foreach(\App\Models\Entities\PurchasesEntity::query()->with(['creator', 'warehouse', 'supplier', 'product'])->get() as $purchase)
            <tr>
                <td>{{$purchase->order_id}}</td>
                <td>{{$purchase->creator->name}}</td>
                <td>{{$purchase->warehouse->name}}</td>
                <td>{{$purchase->supplier->name}}</td>
                <td>{{$purchase->product->name}}</td>
                <td>{{$purchase->amount}}</td>
                <td>{{$purchase->price}}</td>
                <td>{{$purchase->description}}</td>
                <td>{{$purchase->created_at}}</td>
                <td>{{$purchase->id}}</td>
            </tr>
        @endforeach
        </tbody>

    </table>

@stop
