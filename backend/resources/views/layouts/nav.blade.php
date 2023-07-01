<nav class="">
        <div class="nav-left">
            <img src="{{ asset('images/linkr_logo1.png') }}" class="logo">
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
            <div class="nav-user-icon online">
                @auth
                    <a href="{{ route('profile', Auth::user()->id) }}"><img src="{{ asset('images/profile-pic.png') }}"></a>
                @endauth
            </div>

            <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="btn btn-light btn-sm mt-2 ms-2">Logout</button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
        </div>
    </nav>