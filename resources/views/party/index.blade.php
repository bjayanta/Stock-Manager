@extends('layout.master')

@section('title', $meta['title'])

@section('main')
    <div class="container">
        <h4>Party</h4>
        <a href="{{ route('party.create') }}">Create a new party</a>

        <table class="table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Phone Num</th>
                    <th>Type</th>
                    <th class="text-end">Amount (BDT)</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>01</td>
                    <td>Md. Ananda</td>
                    <td>01775219458</td>
                    <td>Customer</td>
                    <td class="text-end text-danger">-15,00,000.00</td>
                    <td class="text-end">
                        <a href="{{ route('party.show', 1) }}">Details</a>
                        <a href="{{ route('party.edit', 1) }}">Edit</a>
                        <a href="{{ route('party.destroy', 1) }}">Delete</a>
                    </td>
                </tr>

                <tr>
                    <td>01</td>
                    <td>Md. Ananda</td>
                    <td>01775219458</td>
                    <td>Customer</td>
                    <td class="text-end text-success">15,00,000.00</td>
                    <td class="text-end">
                        <a href="{{ route('party.show', 1) }}">Details</a>
                        <a href="{{ route('party.edit', 1) }}">Edit</a>
                        <a href="{{ route('party.destroy', 1) }}">Delete</a>
                    </td>
                </tr>

                <tr>
                    <td>01</td>
                    <td>Md. Ananda</td>
                    <td>01775219458</td>
                    <td>Customer</td>
                    <td class="text-end text-success">15,00,000.00</td>
                    <td class="text-end">
                        <a href="{{ route('party.show', 1) }}">Details</a>
                        <a href="{{ route('party.edit', 1) }}">Edit</a>
                        <a href="{{ route('party.destroy', 1) }}">Delete</a>
                    </td>
                </tr>

                <tr>
                    <td>01</td>
                    <td>Md. Ananda</td>
                    <td>01775219458</td>
                    <td>Customer</td>
                    <td class="text-end text-success">15,00,000.00</td>
                    <td class="text-end">
                        <a href="{{ route('party.show', 1) }}">Details</a>
                        <a href="{{ route('party.edit', 1) }}">Edit</a>
                        <a href="{{ route('party.destroy', 1) }}">Delete</a>
                    </td>
                </tr>

                <tr>
                    <td>01</td>
                    <td>Md. Ananda</td>
                    <td>01775219458</td>
                    <td>Customer</td>
                    <td class="text-end text-success">15,00,000.00</td>
                    <td class="text-end">
                        <a href="{{ route('party.show', 1) }}">Details</a>
                        <a href="{{ route('party.edit', 1) }}">Edit</a>
                        <a href="{{ route('party.destroy', 1) }}">Delete</a>
                    </td>
                </tr>

                <tr>
                    <td colspan="4" class="text-end">Total</td>
                    <td class="text-end text-success">60,00,000.00</td>
                    <td>&nbsp;</td>
                </tr>
            </tbody>
        </table>
    </div>
    
@endsection