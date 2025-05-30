@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Adres toevoegen</h1>

        <form method="POST" action="{{ route('adressen.store') }}">
            @csrf

            <div class="mb-3">
                <label for="naam" class="form-label">Naam</label>
                <input type="text" name="naam" id="naam" class="form-control @error('naam') is-invalid @enderror" value="{{ old('naam') }}" required>
                @error('naam')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="straat" class="form-label">Straat</label>
                <input type="text" name="straat" id="straat" class="form-control @error('straat') is-invalid @enderror" value="{{ old('straat') }}" required>
                @error('straat')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="huisnummer" class="form-label">Huisnummer</label>
                <input type="text" name="huisnummer" id="huisnummer" class="form-control @error('huisnummer') is-invalid @enderror" value="{{ old('huisnummer') }}" required>
                @error('huisnummer')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="postcode" class="form-label">Postcode</label>
                <input type="text" name="postcode" id="postcode" class="form-control @error('postcode') is-invalid @enderror" value="{{ old('postcode') }}" required>
                @error('postcode')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="stad" class="form-label">Stad</label>
                <input type="text" name="stad" id="stad" class="form-control @error('stad') is-invalid @enderror" value="{{ old('stad') }}" required>
                @error('stad')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <button type="submit" class="btn btn-primary">Opslaan</button>
            <a href="{{ route('adressen.index') }}" class="btn btn-secondary">Annuleren</a>
        </form>
    </div>
@endsection
