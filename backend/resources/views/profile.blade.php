@extends('layouts.app')

@section('title', 'Profile')
@section('content')
<style>
    .profile-container {
        padding: 20px 5%;
        color: #626262
    }

    .cover-img {
        width: 100%;
        border-radius: 6px;
        margin-bottom: -15px;
        height: 450px;
        background: linear-gradient(45deg, #1876f2 0%, #1876f2 35%, rgba(245,248,250,1) 110%);
    }

    .profile-details {
        background: var(--bg-color);
        padding: 20px;
        border-radius: 4px;
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
    }

    .pd-row {
        display: flex;
        align-items: flex-start;
    }

    .pd-image {
        width: 100px;
        margin-right: 20px;
        border-radius: 6px;
        position: absolute;
        overflow: hidden;
        object-fit: cover;
    }

    .profile-btn {
        border-radius: 50%;
        background: var(--bg-color);
        padding: 2px 7px;
        border: none;
        position: relative;
        top: 80px;
        left: 80px;
    }

    .profile-btn i{
        width: 15px;
    }

    .pd-row div h3 {
        font-size: 25px;
        font-weight: 600;
    }

    .pd-row div p {
        font-size: 13px;
    }

    .pd-row div img{
        width: 25px;
        border-radius: 50%;
        /* margin-top: 12px; */
    }

    .pd-right button {
        background: #1876f2;
        border: 0;
        outline: 0;
        padding: 6px 10px;
        display: inline-flex;
        align-items: center;
        color: #fff;
        border-radius: 3px;
        margin-left: 10px;
        cursor: pointer;
    }

    .pd-right button img{
        height: 15px;
        margin-right: 10px;
    }
    .pd-right button:first-child {
        background: #e4e6eb;
        color: #000;
    }
    .pd-right {
        text-align: right;
    }

    .profile-info{
        display: flex;
        align-self: flex-start;
        justify-content: space-between;
        margin-top: 20px;
    }
    .info-col{
        flex-basis: 33%
    }
    .post-col{
        flex-basis: 65%
    }
    .profile-intro {
        background: var(--bg-color);
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 4px;
    }
    .profile-intro h3 {
        font-weight: 600;
    }
    .intro-text{
        text-align: center;
        margin: 10px 0;
        font-size: 15px;
    }

    .profile-intro hr {
        border: 0;
        height: 1px;
        background: #ccc;
        margin: 24px 0;
    }

    .profile-intro ul li {
        list-style: none;
        font-size: 15px;
        margin: 15px 0;
        display: flex;
        align-items: center;
    }
    .profile-intro ul li img {
        width: 26px;
        margin-right: 10px;
    }
    .post-container {
        width: 100%;
        background: var(--bg-color);
        padding: 20px;
        color: #626262;
        margin: 20px 0;
    }

    .post-text {
        color: #9a9a9a;
        margin: 15px 0;
        font-size: 15px;
    }

    .post-text a {
        color: #1876f2;
        text-decoration: none;
    }

    .post-img{
        width: 100%;
        border-radius: 4px;
        margin-bottom: 5px;
    }

    .post-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .activity-icons div img {
        margin-right: 10px;
        width: 18px;
    }

    .activity-icons div {
        display: inline-flex;
        align-items: center;
        margin-right: 30px;
    }

    .activity-icons div i {
        width: 18px;
        font-size: 19px;
    }

    .comments img {
        margin-top: -4px !important;
    }

    .post-profile-icon {
        display: flex;
        align-items: center;
    }

    .post-profile-icon img {
        width: 20px;
        border-radius: 50%;
        margin-right: 5px;
    }

    .post-row a {
        color: #9a9a9a;
    }

    .load-more-button {
        display: block;
        margin: auto;
        cursor: pointer;
        padding: 5px 10px;
        border: 1px solid #9a9a9a;
        color: #626262;
        background: transparent;
        border-radius: 4px;
    }
    .reactions-container {
        display: none;
        z-index: 999;
    }

    .show-reactions .reactions-container {
        display: flex;
    } 
    .title-box {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .title-box a {
        text-decoration: none;
        color: #1876f2;
        font-size: 14px;
    }
    .photo-box {
        display: grid;
        grid-template-columns: repeat(3, auto);
        grid-gap: 10px;
        margin-top: 15px;
    }
    .photo-box div img {
        width: 100%;
        cursor: pointer;
    }
    .profile-intro p {
        font-size: 14px;
    }
    .friends-box{
        display: grid;
        grid-template-columns: repeat(3, auto);
        grid-gap: 10px;
        margin-top: 15px;
    }
    .friends-box div img {
        width: 100%;
        cursor: pointer;
        padding-bottom: 35px;
    }
    .friends-box div{
        position: relative;
    }
    .friends-box p {
        position: absolute;
        bottom: 0;
        left: 0;
    }

    .wallpaper img {
        position: relative;
        margin-bottom: 1rem;
    }

    .wall-display button {
        position: absolute;
        bottom: 33%;
        right: 7%;
    }
</style>
<div class="profile-container">
    <div class="">
        <div class="wallpaper">
            <img src="{{ asset('storage/' . $user->wallpaper_picture) }}" class="cover-img">

            <div class="wall-display">            
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-secondary add-cover-btn" data-bs-toggle="modal" data-bs-target="#cover_modal">
                    <i class="fa-solid fa-camera"></i><span> Add Cover Photo</span>
                </button>
            </div>
        </div>
            
            <!-- Modal -->
            <div class="modal fade" id="cover_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="background: var(--bg-color);">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Cover Photo</h1>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close" ><i class="fa-solid fa-x"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <form action="{{ route('upload-wallpaper-picture') }}" method="POST" enctype="multipart/form-data" class="ms-3">
                                @csrf
                                
                                <input type="file" name="wallpaper_picture">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        
        
        <div class="profile-details">
            <div class="pd-left">
                <div class="pd-row">
                @if ($user->profile_picture)
                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="pd-image">
                @elseif ($user->gender === 'female')
                     <img src="{{ asset('images/female-avatar-profile-picture.jpg') }}" alt="Profile Picture" class="pd-image">
                @else
                    <img src="{{ asset('images/male-avatar-profile-picture.jpg') }}" alt="Profile Picture" class="pd-image">
                @endif
                
                @if (Auth::check() && $user->id === Auth::user()->id)
                <button type="button" class="profile-btn" data-bs-toggle="modal" data-bs-target="#profile_modal">
                    <i class="fa-solid fa-camera"></i>
                </button>
                @endif
                
                <!-- Modal -->
                <div class="modal fade" id="profile_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" >
                    <div class="modal-content" style="background: var(--bg-color);">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Change Profile</h1>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-x"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex align-items-center">
                                <form action="{{ route('upload-profile-picture') }}" method="POST" enctype="multipart/form-data" class="ms-3">
                                    @csrf
                                    
                                    <input type="file" name="profile_picture">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                     @if (Auth::check() && $user->id === Auth::user()->id)
                    <div style="margin-left: 100px;">
                    @else
                    <div style="margin-left: 130px;">
                    @endif
                    @if ($user->twats()->count() > 0)
                        <h3>{{ $user->twats()->orderByDesc('created_at')->first()->user->name }}</h3>
                        @else
                        <h3>{{ Auth::user()->name }}</h3>
                    @endif
                        <p>120 Friends - 20 mutual</p>
                        <img src="{{ asset('images/member-1.png') }}">
                        <img src="{{ asset('images/member-2.png') }}">
                        <img src="{{ asset('images/member-3.png') }}">
                        <img src="{{ asset('images/member-4.png') }}">
                    </div>
                </div>
            </div>
            <div class="pd-right">

                @if (Auth::user()->id !== $user->id)
                    @if (Auth::user()->friends->contains($user))
                        <button class="btn btn-primary disabled">Friend</button>
                        <button type="button"><img src="{{ asset('images/message.png') }}">Message</button>
                    @elseif (Auth::user()->friendRequestsReceived->contains($user))
                        <button class="btn btn-primary disabled">Friend Request Sent</button>
                    @elseif (Auth::user()->friendRequestsSent->contains($user))
                        <button class="btn btn-primary disabled">Friend Request Received</button>
                        <button type="button"><img src="{{ asset('images/message.png') }}">Message</button>
                    @else
                        <form action="{{ route('addFriend', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit"><img src="{{ asset('images/add-friends.png') }}">Add Friends</button>
                        </form>
                    @endif
                @endif

                
                <br>
                <div class="btn-group dropstart more-btn">
                    <button type="button" title="Option" data-bs-toggle="dropdown" aria-expanded="false" style="background: var(--icon-color);">
                        <i class="fa-solid fa-ellipsis"></i>
                    </button>
                    <ul class="dropdown-menu p-1" style="background: var(--front-color); width: 195px !important;">
                      
                      <li style="border-bottom: 1px solid #626262; padding: 5px;"><a class="text-decoration-none text-secondary" type="button" data-bs-toggle="modal" data-bs-target="#background_photo"><i class="fa-solid fa-plus"></i> Add Wallpaper</a></li>
                      <li style="border-bottom: 1px solid #626262; padding: 5px;"><a class="text-decoration-none text-secondary" type="button"><i href="{{ route('delete-background-photo', ['id' => $user->id]) }}" class="fa-solid fa-circle-minus"></i> Remove Wallpaper</a></li>
                      <li style="border-bottom: 1px solid #626262; padding: 5px;"><a type="button" data-bs-toggle="modal" data-bs-target="#account_details">
                        <span class="text-decoration-none text-secondary"><i class="fa-solid fa-address-card"></i> Account Details</span>
                    </a></li>
                    <li style=" padding: 5px;"><a class="text-decoration-none text-secondary" href="{{ route('home') }} "><i class="fa-sharp fa-solid fa-house"></i> Return Home </a></li>
                    </ul>
                  </div>
            </div>
        </div>

        {{-- modal for add wallpaper  --}}
        <div class="modal fade" id="background_photo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" >
            <div class="modal-content" style="background: var(--bg-color);">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Wallpaper Background</h1>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-x"></i></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center">
                        <form action="{{ route('upload-background-photo') }}" method="POST" enctype="multipart/form-data" class="">
                            @csrf
                            
                            <input type="file" name="background_photo">
                            <button type="submit" class="btn btn-secondary">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>


        {{-- modal for account details --}}
        <div class="modal fade" id="account_details" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" >
            <div class="modal-content" style="background: var(--bg-color);">
                <div class="modal-header">
                <h1 class="modal-title fs-5" class="text-secondary" id="staticBackdropLabel">Account Details</h1>
                </div>
                <div class="modal-body">
                    <span>Email: {{ $user->email }}</span>
                    <hr>
                    <span class="mb-3">Joined on {{ date_format($user->created_at, "F j, Y") }}</span> 
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
            </div>
        </div>

        <div class="profile-info mt-4 col-md-12">
            <div class="info-col">

                <div class="profile-intro"> 
                    <h3>Intro</h3>
                    <p class="intro-text">"Don't stop believing. No matter how hard it is you can do it!" 😍😊</p>
                    <hr>
                    <ul>
                        <li><img src="{{ asset('images/profile-job.png') }}">Director at Anime.corps</li>
                        <li><img src="{{ asset('images/profile-study.png') }}">Studied at UA Academy</li>
                        <li><img src="{{ asset('images/profile-study.png') }}">Went to Saitama</li>
                        <li><img src="{{ asset('images/profile-home.png') }}">Lives in Tokyo, Japan</li>
                        <li><img src="{{ asset('images/profile-location.png') }}">From City Z</li>
                    </ul>
                </div>

                <div class="profile-intro">
                    <div class="title-box">
                        <h3>Photos</h3>
                         <a href="">All Photos</a>
                    </div>
                    
                    <div class="photo-box">
                        <div><img src="{{ asset('images/photo1.png') }}"></div>
                        <div><img src="{{ asset('images/photo2.png') }}"></div>
                        <div><img src="{{ asset('images/photo3.png') }}"></div>
                        <div><img src="{{ asset('images/photo4.png') }}"></div>
                        <div><img src="{{ asset('images/photo5.png') }}"></div>
                        <div><img src="{{ asset('images/photo6.png') }}"></div>
                    </div>
                </div>

                <div class="profile-intro">
                    <div class="title-box">
                        <h3>Friends</h3>
                         <a href="">All Friends</a>
                    </div>
                    <p>120 friends and 10 mutual</p>
                    <div class="friends-box">
                        <div><img src="{{ asset('images/member-1.png') }}"><p>Alice Mina</p></div>
                        <div><img src="{{ asset('images/member-2.png') }}"><p>Rannie Lim</p></div>
                        <div><img src="{{ asset('images/member-3.png') }}"><p>Jillian Ward</p></div>
                        <div><img src="{{ asset('images/member-4.png') }}"><p>Joe Doe</p></div>
                        <div><img src="{{ asset('images/member-5.png') }}"><p>Jr Smith</p></div>
                        <div><img src="{{ asset('images/member-6.png') }}"><p>Marie Curie</p></div>
                        <div><img src="{{ asset('images/member-7.png') }}"><p>Mark Doe</p></div>
                        <div><img src="{{ asset('images/member-8.png') }}"><p>Jess Doe</p></div>
                        <div><img src="{{ asset('images/member-9.png') }}"><p>Luke Lim</p></div>
                    </div>
                </div>
            </div>
            
    <div class="post-col">
        @if (Auth::check() && $user->id === Auth::user()->id)
        <div class="write-post-container shadow"> 
            <div class="user-profile">
                @if ($user->profile_picture)
                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture">
                @else
                    @if ($user->gender === 'female')
                        <img src="{{ asset('images/female-avatar-profile-picture.jpg') }}" alt="Profile Picture">
                    @else
                        <img src="{{ asset('images/male-avatar-profile-picture.jpg') }}" alt="Profile Picture">
                    @endif
                @endif
                <div>
                    <p>
                        <span class="fw-bold">{{ Auth::user()->name }}</span>
                    </p>
                    <small>Public <i class="fa-solid fa-caret-down"></i></small>
                </div>
            </div>
    
            <form action="{{ route('createtwat') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-10 mt-3" id="imageArea">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input class="form-control" placeholder="What's on your mind, {{ Auth::user()->name }}?" type="text" name="content">
                        <div class="row add-post-links mt-3">
                            <div class="col-md-4">
                                <a href=""><img src="{{ asset('images/live-video.png') }}" alt=""> Live Video</a>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control d-none" type="file" name="image" id="image" accept=".gif,.jpg,.jpeg,.png" onchange="imageUpload(event);">
                                <label for="image" style="cursor: pointer;" id="imageUploadLabel"><img src="{{ asset('images/photo.png') }}" alt=""> Photo/Video</label>
                            </div>
                            <div class="col-md-4">
                                <a href=""><img src="{{ asset('images/feeling.png') }}" alt=""> Feeling/Activity</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 mt-3">
                        <button type="submit" class="btn btn-primary ms-2">
                            Post
                        </button>
                    </div>
                </div>
            </form>
        </div>
        @endif




                <!-- User posted -->
                @foreach($user->twats()->orderByDesc('created_at')->get() as $twat)
                <div class="post-container my-2 mt-4">
                    <div class="post-row">
                        <div class="user-profile">
                            @if ($twat->user->profile_picture)
                            <img src="{{ asset('storage/' . $twat->user->profile_picture) }}" alt="Profile Picture">
                            @else
                            @if ($twat->user->gender === 'female')
                            <img src="{{ asset('images/female-avatar-profile-picture.jpg') }}" alt="Profile Picture">
                            @else
                            <img src="{{ asset('images/male-avatar-profile-picture.jpg') }}" alt="Profile Picture">
                            @endif
                            @endif
                            <div>
                            <p><a href="{{ route('profile', $twat->user->id) }}" style="text-decoration:none">{{ $twat->user->name }}</a></p>
                            <span>{{ $twat->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        @if($twat->user_id == Auth::user()->id)
                        <div class="dropdown float-end">
                            <a href="#" class=" text-secondary" style="text-decoration:none" data-bs-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('deletetwat', $twat->id) }}">Delete</a></li>
                                <li><a class="dropdown-item" href="{{ route('deletetwat', $twat->id) }}">Hide post</a></li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                            </ul>
                        </div>
                        @endif
                    </div>
                            <p class="post-text">
                                {{ $twat->content }}
                            </p>

                    @if($twat->image_path != NULL)
                        <img src="{{ Storage::url('images/'.$twat->image_path) }}" class="img-fluid">
                    @endif

                        @if(!Auth::user()->hasReaction($twat->id))
                        <div class="post-row">
                            <form action="{{ route('reaction.create') }}" method="POST" class="mt-2">
                                @csrf
                                <input type="hidden" name="reaction" id="reaction">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="twat_id" value="{{ $twat->id }}">
                                                        
                                <div class="reaction-button-container">
                                    <button type="button" class="btn-light btn btn-sm rounded-pill reaction-button"
                                            onmouseover="showReactions(this)" onmouseout="startHideTimer(this)">
                                        👍🏻
                                    </button>
                                                            
                                    <div class="reactions-container">
                                        <button type="submit" class="btn-light btn btn-sm rounded-pill"
                                                onclick="setReaction('like')">👍🏻</button>
                                        <button type="submit" class="btn-light btn btn-sm rounded-pill"
                                                onclick="setReaction('heart')">💖</button>
                                        <button type="submit" class="btn-light btn btn-sm rounded-pill"
                                                onclick="setReaction('laugh')">😂</button>
                                        <button type="submit" class="btn-light btn btn-sm rounded-pill"
                                                onclick="setReaction('angry')">😡</button>
                                        <button type="submit" class="btn-light btn btn-sm rounded-pill"
                                                onclick="setReaction('dislike')">👎🏻</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                            @endif

                            <p>
                                {{-- Total like --}}
                                @if($twat->countReaction('like'))
                                    <small><small><span class="badge bg-light text-dark">{{$twat->countReaction('like')}} 👍🏻</span></small></small>
                                @endif

                                {{-- Total heart --}}
                                @if($twat->countReaction('heart'))
                                    <small><small><span class="badge bg-light text-dark">{{$twat->countReaction('heart')}} 💖</span></small></small>
                                @endif

                                {{-- Total laugh --}}
                                @if($twat->countReaction('laugh'))
                                    <small><small><span class="badge bg-light text-dark">{{$twat->countReaction('laugh')}} 😂</span></small></small>
                                @endif

                                {{-- Total angry --}}
                                @if($twat->countReaction('angry'))
                                    <small><small><span class="badge bg-light text-dark">{{$twat->countReaction('angry')}} 😡</span></small></small>
                                @endif

                                {{-- Total dislike --}}
                                @if($twat->countReaction('dislike'))
                                    <small><small><span class="badge bg-light text-dark">{{$twat->countReaction('dislike')}} 👎🏻</span></small></small>
                                @endif
                            </p>
                            <hr>
                            <!-- Replies -->
                            @foreach($twat->replies as $reply)
                            <div id="reply-{{ $reply->id }}" class="card bg-light py-2 px-2 mb-2">
                                <small>
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('profile', $reply->user->id) }}" style="text-decoration:none">{{ $reply->user->name }}</a>
                                        <div>
                                            <span class="text-muted"><small>⏲ {{ $reply->created_at->diffForHumans() }}</small></span>
                                            @if($reply->user->id == Auth::user()->id)
                                            <div class="dropdown mx-3 float-end">
                                                <a href="#" class=" text-secondary" style="text-decoration:none" data-bs-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="{{ route('deletereply', $reply->id) }}">Delete</a></li>
                                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                                </ul>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    {{ $reply->content }}
                                </small>
                            </div>
                            @endforeach

                        <form action="{{ route('createreply') }}" method="POST" class="mt-2">
                        @csrf
                        <input type="text" class="form-control" placeholder="💬 Add a comment..." name="content" required>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="twat_id" value="{{ $twat->id }}">
                        <button type="submit" class="d-none"></button>
                        </form>
                </div>
                @endforeach
                    
            </div>
        </div>           
    </div>
</div>
<script>
        var hideTimer;
    
        function showReactions(button) {
            clearTimeout(hideTimer);
            button.parentNode.classList.add('show-reactions');
        }
        
        function startHideTimer(button) {
            hideTimer = setTimeout(function() {
                button.parentNode.classList.remove('show-reactions');
            }, 2000);
        }
        
        function setReaction(reaction) {
            document.getElementById('reaction').value = reaction;
        }
    </script>
@endsection