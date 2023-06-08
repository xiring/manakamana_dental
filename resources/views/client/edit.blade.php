@extends('layouts.app')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">Edit Client</div>

        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <form method="POST" action="{{ route('client.update') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $client->id }}">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="first_name" class="col-form-label text-md-right">First name</label>
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $client->first_name }}" required autocomplete="first_name" autofocus>

                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="middle_name" class="col-form-label text-md-right">Middle name</label>
                        <input id="middle_name" type="text" class="form-control" name="middle_name" value="{{ $client->middle_name }}" autocomplete="middle_name">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="last_name" class="col-form-label text-md-right">Last name</label>
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $client->last_name }}" required autocomplete="last_name">

                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="gender" class="col-form-label text-md-right">Gender</label>
                        <select class="form-control" required name="gender">
                            <option disabled selected>Please Select </option>
                            <option value="male" {{ ($client->gender == 'male') ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ ($client->gender == 'female') ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ ($client->gender == 'other') ? 'selected' : '' }}>Other</option>
                        </select>

                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="age" class="col-form-label text-md-right">Age</label>
                        <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ $client->age }}" required autocomplete="age">

                        @error('age')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email" class="col-form-label text-md-right">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $client->email }}" required autocomplete="email">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="mobile_number" class="col-form-label text-md-right">Mobile Number</label>
                        <input id="mobile_number" type="text" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{ $client->mobile_number }}" required autocomplete="mobile_number">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="address" class="col-form-label text-md-right">Address</label>
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $client->address }}" required autocomplete="address">

                        @error('address')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="blood_group" class="col-form-label text-md-right">Blood Group</label>
                        <input id="blood_group" type="text" class="form-control @error('blood_group') is-invalid @enderror" name="blood_group" value="{{ $client->blood_group }}" required autocomplete="blood_group">

                        @error('blood_group')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <hr/>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mb-2"> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
