@extends('layout.master')

{{-- title --}}
@section('title', $meta['title'])

@section('main')
    <div class="container">
        <h4>Welcome To Dashboard!</h4>

        <div class="">
            <h3>50</h3>
            <strong>Total Supplier</strong>
        </div>

        <div class="">
            <h3>1780</h3>
            <strong>Total Customer</strong>
        </div>

        <div class="">
            <h3>BDT 50,00,000.00</h3>
            <strong>Total Stock</strong>
        </div>

        <div class="">
            <h3>BDT 10,80,482.80</h3>
            <strong>Total Receiveable </strong>
        </div>

        <div class="">
            <h3>BDT 8,84,427.12</h3>
            <strong>Total Payable </strong>
        </div>
    </div>
@endsection
