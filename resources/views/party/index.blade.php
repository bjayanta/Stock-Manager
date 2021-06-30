@extends('layout.master')

@section('title', $meta['title'])

@section('main')
    <div class="container">
        @if(Session::has('success'))
        {{ Session::get('success') }} 
        @endif
        <h4>Party</h4>
        <a href="{{ route('party.create') }}">Create a new party</a> | 
        <a href="#" onclick="window.print()">Print</a>

        {{-- {{ $records }} --}}

        @if ($records != null)
        @php
            $receivable = 0;
            $payable = 0;
        @endphp

        <table class="table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Pic</th>
                    <th>Phone Num</th>
                    <th>Type</th>
                    <th class="text-end">Amount (BDT)</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($records as $key => $row)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $row->owner_name }}</td>
                    <td>
                        <img 
                            src="{{ ($row->image != null) ? asset('storage/' . $row->image) : asset('images/default.jpg') }}" 
                            alt="Pic"
                            style="max-width: 100%;width:96px;">
                    </td>
                    <td>{{ $row->phone }}</td>
                    <td>{{ ($row->party_type == 1) ? 'Customer' : 'Supplier' }}</td>

                    <td class="text-end {{ ($row->balance_type == true) ? 'text-success' : 'text-danger' }}">
                        {{ ($row->balance_type == false) ? (0-$row->balance) : (0+$row->balance) }}
                        {{ ($row->balance_type == true) ? '(Receivable)' : '(Payable)' }}
                    </td>

                    <td class="text-end">
                        <a href="{{ route('party.show', $row->id) }}">Details</a>
                        <a href="{{ route('party.edit', $row->id) }}">Edit</a>

                        <a href="{{ route('party.show', $row->id) }}" onclick="if(confirm('Are you sure to delete this record?')) {event.preventDefault();document.getElementById('delete-{{ $row->id }}').submit();} else {event.preventDefault();}">Delete</a>
                        <form action="{{ route('party.destroy', $row->id) }}" method="POST" id="delete-{{ $row->id }}">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>

                @php
                    $receivable += ($row->balance_type == 1) ? $row->balance : 0;
                    $payable += ($row->balance_type == 0) ? $row->balance : 0;
                @endphp
                @endforeach

                <tr>
                    <td colspan="4" class="text-end">Total =</td>
                    <td class="text-end {{ (($payable - $receivable) >= 0) ? 'text-success' : 'text-danger' }}">
                        {{ $payable - $receivable }}
                        {{ (($payable - $receivable) >= 0) ? '(Receivable)' : '(Payable)' }}

                        {{-- {{ $records->sum('balance') }} --}}
                    </td>
                    <td>&nbsp;</td>
                </tr>
            </tbody>
        </table>
        @endif

    </div>
    
@endsection