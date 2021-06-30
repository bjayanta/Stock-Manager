@extends('layout.master')

@section('title', $meta['title'])

@section('main')
    <div class="container">

        <div class="text-center p-3">
            <div class="float-end">
                <a class="p-2" href="{{ route('party.index') }}">Back</a>
                <span>||</span>
                <a class="p-2" href="#" onclick="window.print()">Print</a>
            </div>
            <br>
            
            <div class="p-2">
                <strong>ID :</strong>
                <strong>{{ $record->id }}</strong>
            </div>
            <div>
            <img src="{{ ($record->image != null) ? asset('storage/' . $record->image) : asset('images/default.jpg') }}" alt="Picture not found!" style="max-width: 100%;width:150px;">
            </div>
            <div class="d-flex justify-content-center">
                <table>
                    <tr>
                        <th class="text-start">Name</th>
                        <td class="text-start"><b>:</b> {{ $record->owner_name }}</td>
                    </tr>
                    <tr>
                        <th class="text-start" >Company Name</th>
                        <td class="text-start"><b>:</b> {{ $record->company_name }}</td>
                    </tr>
                    <tr>
                        <th class="text-start" >Phone Number</th>
                        <td class="text-start"><b>:</b> {{ $record->phone }}</td>
                    </tr>
                    <tr>
                        <th class="text-start" >Email Address</th>
                        <td class="text-start"><b>:</b> {{ $record->email }}</td>
                    </tr>
                    <tr>
                        <th class="text-start" >Party type</th>
                        <td class="text-start"><b>:</b> {{ ($record->party_type == 1) ? 'customer' : 'supplier' }}</td>
                    </tr>
                    <tr>
                        <th class="text-start" >Balance</th>
                        <td class="text-start {{ ($record->balance_type == true) ? 'text-success' : 'text-danger' }}"><b>:</b> {{ $record->balance }} {{ ($record->balance_type == 0) ? '   (Payable)': '   (Receivable)' }} </td>
                    </tr>
                    <tr>
                        <th class="text-start" >Address</th>
                        <td class="text-start"><b>:</b> {{ $record->address }}</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <th class="text-start">Description</th>
                        <td class="text-start"><b>:</b> {{ $record->description }}</td>
                    </tr>
                </table>
        </div >
    </div>
@endsection