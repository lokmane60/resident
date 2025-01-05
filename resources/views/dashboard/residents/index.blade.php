@extends('layouts.app')

@section('content')
<link href="{{ asset('css/user_dashboard.css') }}" rel="stylesheet">

    <a class="addnew" href="{{ route('residents.create') }}">Add New Resident</a>

    <div class="container">
        <h1>Residents List</h1>
        <a  href="{{ route('residents.create') }}">Add New Resident</a>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Number</th>
                    <th>Currency Amount</th>
                    <th>Date of Birth</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($residents as $resident)
                    <tr>
                        <td>{{ $resident->name }}</td>
                        <td>{{ $resident->address }}</td>
                        <td>{{ $resident->number }}</td>
                        <td>{{ $resident->currency_amount }}</td>
                        <td>{{ $resident->date_of_birth }}</td>
                        <td>
                            <a href="{{ route('residents.edit', $resident) }}">Edit</a>
                            <form action="{{ route('residents.destroy', $resident) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection
