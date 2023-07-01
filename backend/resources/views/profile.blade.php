@extends('layouts.app')

@section('title', 'Profile')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="d-flex align-items-center">
                    <h1 class="fw-bold">{{ $user->name }}</h1>
                    <form action="{{ route('upload-profile-picture') }}" method="POST" enctype="multipart/form-data" class="ms-3">
                        @csrf
                        <input type="file" name="profile_picture">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
                
                @if ($user->profile_picture)
                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="my-3" style="max-width: 200px; max-height: 200px;">
                @endif
                <p>
                    {{ $user->email }}
                    <br>
                    <span class="mb-3 badge text-bg-primary">Joined on {{ date_format($user->created_at, "F j, Y") }}</span>
                    <br>
                    <a href="{{ route('home') }} ">← Back to Home</a>
                    <hr>
                    <h4 class="fw-bold">
                        Recent Twats
                    </h4>
                    @foreach($user->twats as $twat)
                    <div class="card my-2">
                        <div class="card-body">
                            <h6 class="fw-bold">
                                {{ $twat->user->name }}
                                @if($twat->user_id == Auth::user()->id)
                                <a href="#" class="float-end dropdown-toggle" style="text-decoration:none" data-bs-toggle="dropdown"></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('deletetwat', $twat->id) }}">Delete</a></li>
                                </ul>
                                @endif
                            </h6>
                            
                            <p>
                                {{ $twat->content}}
                            </p>
                            <small class="text-muted float-end">{{ $twat->created_at->diffForHumans() }}</small>
                        </div>
                        @if($twat->image_path != NULL)
                            <img src="{{ Storage::url('images/'.$twat->image_path) }}" class="img-fluid">
                        @endif
                    </div>
                    @endforeach
                </p>
                

            </div>
        </div>
    </div>
</div>
@endsection