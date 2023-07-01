
<style>
    .logout, .profile-menu {
        cursor: pointer;
    }

    .nav-user-icon ul {
        border: none;
    }

    .dropdown-item {
       display: flex;
    }

    .dropdown-item img {
        height: 50%;
    }
    .dropdown-item div p {
        margin-bottom: -6px !important;
        color: #626262;
    }
    .dropdown-item div a {
        font-size: 13px;
    }
    .settings-link a {
        display: flex;
        flex: 1;
        justify-content: space-between;
        color: #626262;
    }

    #dark-btn {
        position: absolute;
        top: 30px;
        right: 36px;
        background: #ccc;
        width: 45px;
        border-radius: 15px;
        padding: 2px 3px;
        cursor: pointer;
        display: flex;
        transition: padding-left 0.5s, background 0.5s;
    }

    #dark-btn span {
        width: 18px;
        height: 18px;
        background: #fff;
        border-radius: 50%;
        display: inline-block;
    }
    #dark-btn.dark-btn-on{
        padding-left: 23px;
        background: #091528;
    }

    .settings-menu {
        position: absolute;
        width: 90%;
        max-width: 350px;
        background: var(--bg-color);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
        border-radius: 4px;
        overflow: hidden;
        right: 5%;
        top: 75px;
        max-height: 0;
        transition: max-height 0.3s;
    }

    .settings-menu-height {
        max-height: 480px;
    }

    .top-menu {
        padding: 15px;
    }

    .bottom-menu {
        padding: 15px;
    }
    
</style>

<nav class=""> 
        <div class="nav-left">
            <a href="{{ route('home') }}"><img src="{{ asset('images/linkr_logo1.png') }}" class="logo"></a>
            <ul>
                <li><img src="{{ asset('images/notification.png') }}"></li>
                <li><img src="{{ asset('images/inbox.png') }}"></li>
                <li><img src="{{ asset('images/video.png') }}"></li>
            </ul>
        </div>
        <div class="nav-right">

            <div class="search-box">
                <img src="{{ asset('images/search.png') }}">
                <input type="text" placeholder="Search">
            </div>
            <div class="nav-user-icon">
                    @if ($user->profile_picture)
                    <a href="{{ route('profile', Auth::user()->id) }}"></a>
                    @endif
            <div class="nav-user-icon"> 
                @auth
                    <div class="profile-menu" style="text-decoration:none">
                        
                        @if ($user->profile_picture)
                            <img src="{{ asset('storage/' . $user->profile_picture) }}" onclick="settingsMenuToggle()" >
                        @else
                        @if ($user->gender === 'female')
                            <img src="{{ asset('images/female-avatar-profile-picture.png') }}" onclick="settingsMenuToggle()" alt="Profile Picture">
                        @else
                            <img src="{{ asset('images/male-avatar-profile-picture.jpg') }}" onclick="settingsMenuToggle()" alt="Profile Picture">
                        @endif
                        @endif
                    </div>
                    <div class="settings-menu">
                            <div class="top-menu shadow mx-3 mt-2">
                                <div id="dark-btn">
                                    <span></span>
                                </div>
                                <div class="dropdown-item mt-2 top">
                                @if ($user->profile_picture)
                                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture">
                                @else
                                @if ($user->gender === 'female')
                                    <img src="{{ asset('images/female-avatar-profile-picture.png') }}" alt="Profile Picture">
                                @else
                                    <img src="{{ asset('images/male-avatar-profile-picture.jpg') }}" alt="Profile Picture">
                                @endif
                                @endif
                                    <div class="ms-2 pt-2">
                                        <p>{{ Auth::user()->name }}</p>
                                        <a class="text-decoration-none" href="{{ route('profile', Auth::user()->id) }}">See your profile</a>
                                    </div>
                                </div>
                                <hr>
                                <div class="dropdown-item mt-2 bot">
                                    <img src="{{ asset('images/feedback.png') }}" alt="">
                                    <div class="ms-2 pt-2">
                                        <p>Give Feedback</p>
                                         <a class="text-decoration-none" href="#">Help us to improve the new design</a>
                                    </div>
                                </div>
                            </div>
    
                            <div class="bottom-menu my-2 mt-2">
                                <div class="dropdown-item settings-link">
                                    <img src="{{ asset('images/setting.png') }}" class="setting-icon">
                                    <a href="#" class="text-decoration-none ms-2 my-auto">Setting & Privacy <i class="fa-solid fa-angle-right"></i></a>
                                </div>
                                 
                                <div class="dropdown-item mt-2 settings-link">
                                    <img src="{{ asset('images/help.png') }}" class="setting-icon">
                                    <a href="#" class="text-decoration-none ms-2 my-auto">Help & Support <i class="fa-solid fa-angle-right"></i></a>
                                </div>
                                 
                                <div class="dropdown-item mt-2 settings-link">
                                    <img src="{{ asset('images/display.png') }}" class="setting-icon">
                                    <a href="#" class="text-decoration-none ms-2 my-auto">Display & Accessibility <i class="fa-solid fa-angle-right"></i></a>
                                </div>
                                
                                <div class="dropdown-item mt-2">
                                    <img src="{{ asset('images/logout.png') }}" class="setting-icon">
                                    <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="text-decoration-none ms-2 my-auto logout">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                 </div>
                            </div>
                        </div>
                 
                @endauth
            </div>
        </div>
    </nav>
    