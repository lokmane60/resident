@extends('layouts.app')

@section('content')
<link href="{{ asset('css/create_resident.css') }}" rel="stylesheet">

<div class="container">
    <h1>{{ isset($resident) ? 'Update Resident' : 'Create Resident' }}</h1>
    <form action="{{ isset($resident) ? route('residents.update', $resident) : route('residents.store') }}" method="POST">
        @csrf
        @if(isset($resident))
            @method('PUT')
        @endif

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $resident->name ?? old('name') }}" required>

        <label for="address">Address:</label>
        <input type="text" name="address" id="address" value="{{ $resident->address ?? old('address') }}" required>

        <label for="number">Number:</label>
        <input type="text" name="number" id="number" value="{{ $resident->number ?? old('number') }}" required>

        <label for="currency_amount">Currency Amount:</label>
        <input type="number" step="0.01" name="currency_amount" id="currency_amount" value="{{ $resident->currency_amount ?? old('currency_amount') }}" required>

        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" name="date_of_birth" id="date_of_birth" value="{{ $resident->date_of_birth ?? old('date_of_birth') }}" required>

        <label for="notes">Notes:</label>
        <textarea name="notes" id="notes">{{ $resident->notes ?? old('notes') }}</textarea>

        <button type="submit">{{ isset($resident) ? 'Update' : 'Create' }}</button>
    </form>
</div>

@endsection
