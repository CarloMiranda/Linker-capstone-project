@extends('layouts.log')

@section('content')
@section('title', 'Register')
<div class="container">
    <div class="row justify-content-around">
        <div class="col-md-6">
            <img src="https://www.mnhealthnetwork.com/images/landing/people-2.png" class="img-fluid" alt="">
         </div>
        <div class="col-md-6 mt-5">
            <h1 class="fw-bold text-white">Create an account</h1>
            <p class="text-white">You're almost there!</p>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row my-3">
                            <div class="col-md-12">
                                <input placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input placeholder="Confirm password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="gender" class="form-label">{{ __('Gender') }}</label>
                                <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required>
                                    <option value="" selected disabled>Select gender</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                </select>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            {{-- <small><a href="{{ route('login') }}"> Already have account?</a></small> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Update profile picture based on selected gender
    const genderMaleCheckbox = document.getElementById('genderMale');
    const genderFemaleCheckbox = document.getElementById('genderFemale');
    const profilePicture = document.getElementById('profilePicture');

    genderMaleCheckbox.addEventListener('change', function() {
        if (this.checked) {
            profilePicture.src = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnaICsbsCV3xXHVLkcIbNF7N8BlzP6ZTjZWNcdquuXMZsDGHLNvlOfH2hTeJblYT3HexA&usqp=CAU';
        }
    });

    genderFemaleCheckbox.addEventListener('change', function() {
        if (this.checked) {
            profilePicture.src = 'https://example.com/female-profile-picture.jpg';
        }
    });
</script>

@endsection
