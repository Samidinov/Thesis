@extends('layouts.app')
@section('content')
    <div class="card col-8 offset-2">
        <div class="card-header">
            {{ __('form.label_edit') }}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('user.update',$user->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('user.name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('user.surname') }}</label>
                    <div class="col-md-6">
                        <input id="surname" type="text" class="form-control" name="surname" value="{{ $user->surname }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone-number" class="col-md-4 col-form-label text-md-right">{{ __('user.phone_number') }}</label>

                    <div class="col-md-6">
                        <input id="phone-number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $user->phone_number }}" required autocomplete="name">

                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('user.email') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success">
                            {{ __('form.btn_save') }}
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
