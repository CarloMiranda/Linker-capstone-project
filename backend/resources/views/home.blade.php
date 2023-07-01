@extends('layouts.app')

@section('title', 'Home')
@section('content')
<main>
    <div class="container">
        <div class="row">
        <!-- left side bar  -->
        <div class="left-sidebar"> 
            <div class="imp-links">
                <a href="{{ route('profile', Auth::user()->id) }}"><img src="{{ asset('images/profile-pic.png') }}" style="border-radius: 50%;" alt="">{{ Auth::user()->name }}</a>
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
    <!-- <div class="row justify-content-center">
        Profile Section
        <div class="col-md-3">
            <div class="card p-3">
                <h4>Profile</h4>
                <p>
                    <span class="fw-bold">{{ Auth::user()->name }}</span>
                    <br>
                    <small>{{ Auth::user()->email }}</small>
                </p>
                <a href="{{ route('profile', Auth::user()->id) }}" class="btn btn-primary btn-sm">My Profile</a>
                @if(Auth::user()->type == 'admin')
                <a href="{{ route('admin') }}" class="btn btn-dark btn-sm mt-2">Admin Dashboard</a>
                @endif
                <hr>
                <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="btn btn-light btn-sm">← Logout</button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div> -->

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
            <!-- Write Twat -->
            <div class="write-post-container shadow">
                <div class="user-profile">
                    <img src="{{ asset('images/profile-pic.png') }}" alt="">
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
                                <input class="form-control" placeholder="Say anything you want..." type="text" name="content">
                                <div class="add-post-links d-flex justify-content-between">
                                    <a href=""><img src="images/live-video.png" alt=""> Live Video</a>
                                    <input class="form-control d-none" type="file" name="image" id="image" accept=".gif,.jpg,.jpeg,.png" onchange="imageUpload(event);">
                                    <label for="image" style="cursor: pointer;" id="imageUploadLabel"><img src="images/photo.png" alt=""> Photo/Video</label>
                                    <a href=""><img src="images/feeling.png" alt=""> Feeling/Activity</a>
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
                    <!-- Twat Area -->
                    @foreach($twats as $twat)
                        <div class="post-container">
                        @if($twat->user_id == Auth::user()->id)
                                <a href="#" class="float-end dropdown-toggle" style="text-decoration:none" data-bs-toggle="dropdown"></a>
                                <ul class="dropdown-menu floate-end">
                                    <li><a class="dropdown-item" href="{{ route('deletetwat', $twat->id) }}">Delete</a></li>
                                </ul>
                         @endif
                            <div class="post-row">
                            <div class="user-profile">
                                <img src="images/profile-pic.png" alt="">
                                <div>
                                    <p><a href="{{ route('profile', $twat->user->id) }}" style="text-decoration:none">{{ $twat->user->name }}</a></p>
                                    <span>⏲ {{ $twat->created_at->diffForHumans() }}</span>
                                </div>
                                
                                
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
                            <div class="card bg-light py-2 px-2 mb-2">
                                <small>
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('profile', $reply->user->id) }}" style="text-decoration:none">{{ $reply->user->name }}</a>
                                        <div>
                                            <span class="text-muted"><small>⏲ {{ $reply->created_at->diffForHumans() }}</small></span>
                                            @if($reply->user->id == Auth::user()->id)
                                            <a href="#" class="dropdown-toggle" style="text-decoration:none" data-bs-toggle="dropdown"></a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{ route('deletereply', $reply->id) }}">Delete</a></li>
                                            </ul>
                                            @endif
                                        </div>
                                    </div>
                                    {{ $reply->content }}
                                </small>
                            </div>
                            @endforeach
                            <form action="{{ route('createreply') }}" method="POST" class="mt-2">
                                @csrf
                                <input type="text" class="form-control" placeholder="💬 Add a reply..." name="content" required>
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="twat_id" value="{{ $twat->id }}">
                                <button type="submit" class="d-none"></button>
                            </form>
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