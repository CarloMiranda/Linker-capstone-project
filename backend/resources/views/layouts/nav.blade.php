
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
        width: 45px;
        height: 45px;
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
        top: 72px;
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
                <li>
                    <a href="{{ route('home') }}" class="{{ Request::is('/') ? 'active' : '' }}" acive>
                        <ion-icon title="Home" name="{{ Request::is('home') ? 'home' : 'home-outline' }}"></ion-icon>
                    </a>
                </li>
                <li>
                    <a href="#"><ion-icon title="Notifications" name="{{ Request::is('notifications') ? 'notifications' : 'notifications-outline' }}"></ion-icon></a>
                </li>
                <li>
                    <a href="#"><ion-icon title="Messages" name="{{ Request::is('mail') ? 'mail' : 'mail-outline' }}"></ion-icon></a>
                </li>
                <li>
                    <a href="#"><ion-icon title="Videos" name="{{ Request::is('play') ? 'play-circle' : 'play-circle-outline' }}"></ion-icon></a>
                </li>
            </ul>
        </div>
        <div class="nav-right">

            <div class="search-box">
                <button class="btn-search"><i class="fas fa-search"></i></button>
                <input type="text" class="input-search" placeholder="Type to Search...">
            </div>
            <div class="nav-user-icon"> 
                @auth
                    <div class="nav-profile" style="text-decoration:none">  
                   
                        
                    @if ($user->gender === 'female')
                        <img src="{{ asset('images/female-avatar-profile-picture.png') }}" onclick="settingsMenuToggle()" alt="Profile Picture">
                    @elseif ($user->gender === 'male')
                        <img src="{{ asset('images/male-avatar-profile-picture.jpg') }}" onclick="settingsMenuToggle()" alt="Profile Picture">
                    @else 
                        <img src="{{ asset('storage/' . ($user->id === Auth::id() ? $user->profile_picture : Auth::user()->profile_picture)) }}" onclick="settingsMenuToggle()">
                    @endif
                    </div>
                    <div class="settings-menu">
                            <div class="top-menu shadow mx-3 mt-2">
                                <div id="dark-btn">
                                    <span></span>
                                </div>
                                <div class="dropdown-item mt-2 top">
                                <a href="{{ route('profile', Auth::user()->id) }}">  
                                @if ($user->gender === 'female')
                                    <img src="{{ asset('images/female-avatar-profile-picture.png') }}" onclick="settingsMenuToggle()" alt="Profile Picture">
                                @elseif ($user->gender === 'male')
                                    <img src="{{ asset('images/male-avatar-profile-picture.jpg') }}" onclick="settingsMenuToggle()" alt="Profile Picture">
                                @else 
                                    <img src="{{ asset('storage/' . ($user->id === Auth::id() ? $user->profile_picture : Auth::user()->profile_picture)) }}" onclick="settingsMenuToggle()">
                                @endif
                                </a>
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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    