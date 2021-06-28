@extends('layout.master')

@section('title', $meta['title'])

@section('main')
    <div class="container">

        @if(Session::has('success'))
        {{ Session::get('success') }} 
        @endif
        <h3 class="mt-4 mb-3">Update {{ ($record->party_type == 1) ? 'customer' : 'supplier' }} informatoin</h3>

        <form action="{{ route('party.update', $record->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="mb-3 col-sm-4">
                    <label for="companyName" class="form-label">Organization/Company Name :</label>
                    <input type="text" name="company_name" value="{{ old('company_name', $record->company_name) }}" class="form-control" id="companyName">

                    @error('company_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3 col-sm-4">
                    <label for="ownerName" class="form-label">Owner Name :</label>
                    <input type="text" name="owner_name" value="{{ old('owner_name', $record->owner_name) }}" class="form-control" id="ownerName">
                </div>

                <div class="mb-3 col-sm-4">
                    <label class="form-label">&nbsp;</label>
                    <select name="party_type" class="form-select">
                        <option value="1" {{ ($record->party_type == 1) ? 'selected' : '' }}>Customer</option>
                        <option value="2" {{ ($record->party_type == 2) ? 'selected' : '' }}>Supplier</option>
                    </select>
                </div>

                <div class="mb-3 col-sm-12">
                    <label for="email" class="form-label">Email :</label>
                    <input type="email" name="email" value="{{ old('email', $record->email) }}" class="form-control" id="email" placeholder="example@gmail.com">
                </div>

                <div class="mb-3 col-sm-8">
                    <label for="address" class="form-label">Address :</label>
                    <input type="text" name="address" value="{{ old('address', $record->address) }}" class="form-control" id="address">
                </div>

                <div class="mb-3 col-sm-4">
                    <label for="phone" class="form-label">Phone No :</label>
                    <input type="text" name="phone" value="{{ old('phone', $record->phone) }}" class="form-control" id="phone">

                    @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-text fw-bold ">BDT</span>
                        <input type="text" name="balance" value="{{ old('balance', $record->balance) }}" class="form-control form-control-lg" id="number" placeholder="0.00">
                    </div>
                    @error('balance')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <small>Possitive(+) balance receiveable & negative(-) balance payable.</small>
                </div>

                <div class="mb-3 col-sm-6">
                    <select name="balance_type" class="form-select form-select-lg" >
                        <option value="0" {{ ($record->balance_type == 0) ? 'selected' : '' }}>Payable</option>
                        <option value="1" {{ ($record->balance_type == 1) ? 'selected' : '' }}>Receiveable</option>
                    </select>
                </div>

                <div class="mb-3 col-sm-12">
                    <label for="image" class="form-label">Upload Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <div>
                        <img src="{{ ($record->image != null) ? asset('storage/' . $record->image) : '#' }}" alt="Picture not found!" style="max-width: 100%;width:128px;">
                    </div>
                </div>

                <div class="mb-3 col-sm-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="3">{{ old('owner_name', $record->description) }}</textarea>
                </div>

                <div class="mb-3 col-sm-12">
                    <button type="submit" class="btn btn-primary">
                        <span>+</span>
                        <span>Save & Update</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection