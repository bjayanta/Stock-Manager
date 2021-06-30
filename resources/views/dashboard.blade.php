@extends('layout.master')

{{-- title --}}
@section('title', $meta['title'])

@section('main')
<h4 class="p-5 fs-1 d-flex justify-content-center">Welcome To Dashboard!</h4>
    <div class="container">
        <div class="row">
            <div class="gap-3  d-flex flex-wrap justify-content-center">
                <div class=" p-5 text-center bg-secondary text-white border border-warning">
                    <h3 class="p-2">50</h3>
                    <strong class="fs-6">Total Supplier</strong>
                </div>

                <div class="p-5 text-center bg-secondary text-white border border-success">
                    <h3 class="p-2">1780</h3>
                    <strong class="fs-6">Total Customer</strong>
                </div>

                <div class="p-5 text-center bg-primary text-white border border-success">
                    <h3 class="p-2">BDT 10,80,482.80</h3>
                    <strong class="fs-6">Total Receiveable </strong>
                </div>

                <div class="p-5 text-center bg-danger text-white border border-success">
                    <h3  class="p-2">BDT 8,84,427.12</h3>
                    <strong class="fs-6">Total Payable </strong>
                </div>

                <div class="p-5 text-center bg-success text-white border border-success">
                    <h3 class="p-2">BDT 50,00,000.00</h3>
                    <strong class="fs-6">Total Stock</strong>
                </div>
            </div>
        </div>
    </div>
@endsection
