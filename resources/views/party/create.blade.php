@extends('layout.master')

@section('title', $meta['title'])

@section('main')
    <div class="container">
        <h3 class="mt-4 mb-3 text-center fw-bold">Party Informatoin</h3>
        <form action="{{ route('party.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="mb-3 col-sm-4">
                    <label for="companyName" class="form-label">Organization/Company Name :</label>
                    <input type="text" name="company_name" class="form-control" id="companyName">

                    @error('company_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3 col-sm-4">
                    <label for="ownerName" class="form-label">Owner Name :</label>
                    <input type="text" name="owner_name" class="form-control" id="ownerName">
                </div>

                <div class="mb-3 col-sm-4">
                    <label class="form-label">&nbsp;</label>
                    <select name="party_type" class="form-select" >
                        <option selected disabled>Select party type</option>
                        <option value="1">Customer</option>
                        <option value="2">Supplier</option>
                    </select>
                </div>

                <div class="mb-3 col-sm-12">
                    <label for="email" class="form-label">Email :</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="example@gmail.com">
                </div>

                <div class="mb-3 col-sm-8">
                    <label for="address" class="form-label">Address :</label>
                    <input type="text" name="address" class="form-control" id="address">
                </div>

                <div class="mb-3 col-sm-4">
                    <label for="phone" class="form-label">Phone No :</label>
                    <input type="text" name="phone" class="form-control" id="phone">
                </div>

                <div class="mb-3 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-text fw-bold ">BDT</span>
                        <input type="text" name="balance" class="form-control form-control-lg" id="number" placeholder="0.00">
                    </div>
                    @error('balance')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <small>Possitive(+) balance receiveable & negative(-) balance payable.</small>
                </div>

                <div class="mb-3 col-sm-6">
                    <select name="balance_type" class="form-select form-select-lg" >
                        <option selected disabled>Balance Type</option>
                        <option value="1">Payable</option>
                        <option value="2">Receiveable</option>
                    </select>
                </div>

                <div class="mb-3 col-sm-12">
                    <label for="image" class="form-label">Upload Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3 col-sm-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                </div>

                <div class="mb-3 col-sm-12">
                    <button type="submit" class="btn btn-primary">
                        <span>+</span>
                        <span>Create</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection