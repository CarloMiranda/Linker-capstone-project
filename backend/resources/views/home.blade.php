@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
@section('title', 'Home')
@section('content')
<main>
    <div class="container">
        <div class="row">
        <!-- left side bar  -->
        <div class="left-sidebar"> 
            <div class="imp-links">
                <a href="{{ route('profile', Auth::user()->id) }}">
                    @if ($user->profile_picture)
                        <img src="{{ asset('storage/' . $user->profile_picture) }}" style="border-radius: 50%; height: 40px; width: 40px;" alt="Profile Picture">
                    @elseif ($user->gender === 'female')
                        <img src="{{ asset('images/female-avatar-profile-picture.jpg') }}" style="border-radius: 50%; height: 40px; width: 40px;" alt="Profile Picture">
                    @else
                        <img src="{{ asset('images/male-avatar-profile-picture.jpg') }}" style="border-radius: 50%; height: 40px; width: 40px;" alt="Profile Picture">
                    @endif
                    {{ Auth::user()->name }}</a>
                <a href="#"><img src="images/news.png"> Latest News</a>
                <a href="#"><img src="images/friends.png"> Friends</a>
                <a href="#"><img src="images/group.png"> Groups</a>
                <a href="#"><img src="images/marketplace.png"> Market Place</a>
                <a href="#"><img src="images/watch.png"> Watch</a>
                <a href="#"> See More</a>
            </div>
            <div class="shorcut-links">
                <p>Your Shortcuts</p>
                <a href="#"><img src="images/shortcut-1.png" alt="">Web Developers</a>
                <a href="#"><img src="images/shortcut-2.png" alt="">Web Design Course</a>
                <a href="#"><img src="images/shortcut-3.png" alt="">Full Stack Web Developments</a>
                <a href="#"><img src="images/shortcut-4.png" alt="">Website Experts</a>
            </div>
        </div>

    <!-- main content  -->
    <div class="main-content">

        <div class="story-gallery ">
            <div class="story story1">
                <img src="{{ asset('images/upload.png') }}" alt="">
                <p>Post Story</p>
            </div>
            <div class="story story2">
                <img src="{{ asset('images/member-1.png') }}" alt="">
                <p>Alice</p>
            </div>
            <div class="story story3">
                <img src="{{ asset('images/member-2.png') }}" alt="">
                <p>Rannie</p>
            </div>
            <div class="story story4">
                <img src="{{ asset('images/member-3.png') }}" alt="">
                <p>Jillian</p>
            </div>
            <div class="story story5">
                <img src="{{ asset('images/member-4.png') }}" alt="">
                <p>Ariel</p>
            </div>
        </div>
        <!-- Twats Section -->

            @if(session('success'))
            <div class="alert alert-primary" role="alert">
            {{session('success')}}
            </div>
            @endif
            <!-- Write post area -->
            <div class="write-post-container shadow">
                <div class="user-profile" id="user-profile">
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
                            <div class="mt-3" id="imageArea">
                                <div class="input-post">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input class="form-control" placeholder="What's on your mind, {{ Auth::user()->name }}?" type="text" name="content">
                                        <button type="submit" class="btn btn-primary ms-2">
                                            Post
                                        </button>
                                </div>
                                <div class="row add-post-links mt-3">
                                    <div class="col">
                                        <a href=""><img src="images/live-video.png" alt=""> Live Video</a>
                                    </div>
                                    <div class="col">
                                        <input class="form-control d-none" type="file" name="image" id="image" accept=".gif,.jpg,.jpeg,.png" onchange="imageUpload(event);">
                                        <label for="image" style="cursor: pointer;" id="imageUploadLabel" class=""><img src="images/photo.png" class="me-2"> Photo/Video</label>
                                    </div>
                                    <div class="col">
                                        <a href=""><img src="images/feeling.png" alt=""> Feeling/Activity</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
                    <!-- Post Area -->
                    @foreach($twats as $twat)
                    <div class="post-container">
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
                            <div class="">
                            <div class="user-profile">
                            <a href="{{ route('profile', $twat->user->id) }}" style="text-decoration:none">
                                @if ($twat->user->profile_picture)
                                     <img src="{{ asset('storage/' . $twat->user->profile_picture) }}" alt="Profile Picture">
                                @else
                                    @if ($twat->user->gender === 'female')
                                        <img src="{{ asset('images/female-avatar-profile-picture.jpg') }}" alt="Profile Picture">
                                    @else
                                        <img src="{{ asset('images/male-avatar-profile-picture.jpg') }}" alt="Profile Picture">
                                    @endif
                                @endif
                                </a>
                                <div>
                                    <p><a href="{{ route('profile', $twat->user->id) }}" style="text-decoration:none">{{ $twat->user->name }}</a></p>
                                    <span>{{ $twat->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            <p class="post-text">
                                {{ $twat->content }}
                            </p>
                            @if($twat->image_path != NULL)
                            <img src="{{ Storage::url('images/'.$twat->image_path) }}" class="img-fluid">
                            @endif
                            <!-- Reactions -->
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
                                            <div class="dropdown ms-3 float-end">
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
                    </div>
                              @endforeach

                      {{ $twats->links() }}           
    </div>                

        <!-- right sidebar  -->
        <div class="right-sidebar">

            <div class="sidebar-title">
                <h4>Events</h4>
                <a href="">See All</a>
            </div>

            <div class="event">
                <div class="left-event">
                    <h6>18</h6>
                    <span>June</span>
                </div>
                <div class="right-event">
                    <h4>Social Media</h4>
                    <p><i class="fa-sharp fa-solid fa-location-dot"></i> Ramcar Tech Park</p>
                    <a href="">More Info</a>
                </div>
            </div>

            <div class="event">
                <div class="left-event">
                    <h6>22</h6>
                    <span>July</span>
                </div>
                <div class="right-event">
                    <h4>Mobile Marketing</h4>
                    <p><i class="fa-sharp fa-solid fa-location-dot"></i> Ramcar Tech Park</p>
                    <a href="">More Info</a>
                </div>
            </div>

            <div class="sidebar-title">
                <h4>Advertisement</h4>
                <a href="">Close</a>
            </div>
            <img src="images/advertisement.png" class="sidebar-ads">

            <div class="sidebar-title">
                <h4>Conversation</h4>
                <a href="">Hide Chat</a>
            </div>

            <div class="online-list">
                <div class="online">
                    <img src="images/member-1.png" alt="">
                </div>
                <p>Alice Mina</p>
            </div>
            <div class="online-list">
                <div class="online">
                    <img src="images/member-2.png" alt="">
                </div>
                <p>Rannie Lim</p>
            </div>
            <div class="online-list">
                <div class="online">
                    <img src="images/member-3.png" alt="">
                </div>
                <p>Jillian Ward</p>
            </div>
         </div>
        </div>
    </div>
</main>
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