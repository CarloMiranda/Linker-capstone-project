<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Linkr - @yield('title')</title>
    <style>
        /* body {
            background: url("https://w0.peakpx.com/wallpaper/239/25/HD-wallpaper-abstract-design-minimal-abstract-blue-white-dark-blue-design-flat-lines-modern-simple.jpg") no-repeat center center; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        } */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

* {
    margin: 0;
    padding: 0;
    font-family: 'poppins', sans-serif;
    box-sizing: border-box;
}

:root{
    --body-color: #efefef;
    --nav-color: #1876f2;
    --bg-color: #fff;
}

.dark-theme {
    /* --body-color: #091321; */
    --body-color: #000000;
    --nav-color: #0d0d0d;
    --bg-color: #242526;
}

#app {
    background: var(--body-color);
    transition: background 0.3s;
}

nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: var(--nav-color);
    padding: 5px 5%;
    top: 0;
    z-index: 100;
    position: sticky;
}

.logo {
    width: 160px;
    margin-right: 45px;
    margin-bottom: -12px;
}

.nav-left, .nav-right  {
    display: flex;
    align-items: center;
}

.nav-left ul li {
    display: inline-block;
    margin-top: 15px;
    border-radius: 5px;
}

.nav-left ul li ion-icon {
    font-size: 25px;
    color: #fff;
    margin: 0 15px;
}

.nav-left ul li:hover {
    background: #999
}

.nav-user-icon img {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    padding-top: 2px;
}

.nav-user-icon {
    margin-left: 10px;
}

.search-box{
  width: fit-content;
  height: fit-content;
  position: relative;
}
.input-search{
  border-style: none;
  padding: 10px;
  font-size: 15px;
  letter-spacing: 2px;
  outline: none;
  border-radius: 25px;
  background-color: #fff;
  padding-right: 40px;
  color:#333;
}

.btn-search{
  width: 40px;
  height: 40px;
  border-style: none;
  font-size: 18px;
  font-weight: bold;
  outline: none;
  border-radius: 50%;
  position: absolute;
  right: 0px;
  background-color:transparent;
  color: #333;
}


.online {
    position: relative;
    margin-top: 8px;
}

.online:after {
    content: '';
    width: 10px;
    height: 10px;
    border: 2px solid #fff;
    border-radius: 50%;
    background: #41db51;
    position: absolute;
    top: 0;
    right: 0;
}

.container {
    display: flex;
    justify-content: space-between;
    padding: 13px 5%;
}

.left-sidebar {
    position: sticky;  
    top: 70px;
    flex-basis: 25%;
    align-self: flex-start;
}   

.right-sidebar {
    position: sticky;
    top: 70px;
    flex-basis: 25%;
    align-self: flex-start;
    padding: 20px;
    border-radius: 4px;
    color: #626262;
    background: var(--bg-color);
}   

.main-content {
    flex-basis: 47%;
}

.imp-links a, .shorcut-links a {
    text-decoration: none;
    display: flex;
    align-items: center;
    margin-bottom: 30px;
    color: #626262;
    width: fit-content;
}

.imp-links a img{
    width: 40px;
    height: 40px;
    margin-right: 15px;
}

.imp-links a:last-child {
    color: #1876f2;
}

.imp-links {
    border-bottom: 1px solid #ccc;
}
.imp-links a:hover {
    background: #3333;

    border-radius: 5px;
    width: 100%;
}

.shorcut-links a img {
    width: 40px;
    border-radius: 4px;
    margin-right: 15px;
}

.shorcut-links p {
    margin: 25px 0;
    color: #626262;
    font-weight: 500;
}

.sidebar-title {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 18px;
}

.right-sidebar h4{
    font-weight: 600;
    font-size: 16px;
}   

.sidebar-title a {
    text-decoration: none;
    color: #1876f2;
    font-size: 12px;
}

.event {
    display: flex;
    font-size: 14px;
    margin-bottom: 20px;
}

.left-event {
    border-radius: 10px;
    height: 65px;
    width: 65px;
    margin-right: 15px;
    padding-top: 10px;
    text-align: center;
    position: relative;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    background: var(--body-color);
}

.event p {
    font-size: 12px;
}

.event a {
    font-size: 12px;
    text-decoration: none;
    color: #1876f2;
}

.left-event span{
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    background: #1876f2;
    color: #fff;
    font-size: 10px;
    padding: 4px 0;
}

.sidebar-ads{
    width: 100%;
    margin-bottom: 20px;
    border-radius: 4px;
}

.online-list {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.online-list .online img {
    width: 40px;
    border-radius: 50%;
}

.online-list .online{
    width: 40px;
    border-radius: 50%;
    margin-right: 15px;
}

.online-list .online::after{
    top: unset;
    bottom: 5px;
}

.story-gallery {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.story {
    flex-basis: 18%;
    padding-top: 32%;
    position: relative;
    background-image: linear-gradient(transparent, rgba(0,0,0,0.5)), url(/capstone-project/frontend/images/status-1.png);
    background-position: center;
    background-size: cover;
    border-radius: 10px;
}

.story img{
    position: absolute;
    width: 45px;
    border-radius: 50%;
    top: 10px !important;
    left: 10px;
    border: 3px solid #1876f2;
}

.story1 img {
    margin-top: 50%;
}

.story p{
    position: absolute;
    bottom: 10px;
    width: 100%;
    text-align: center;
    color: #fff;
    font-size: 14px;
}

.story1 {
    @if ($user->profile_picture)
        background-image: linear-gradient(transparent, rgba(0,0,0,0.5)), url({{ asset('storage/' . $user->profile_picture) }});
    @else
        @if ($user->gender === 'female')
            background-image: linear-gradient(transparent, rgba(0,0,0,0.5)), url({{ asset('images/female-avatar-profile-picture.png') }});
        @else
            background-image: linear-gradient(transparent, rgba(0,0,0,0.5)), url({{ asset('images/male-avatar-profile-picture.jpg') }});
        @endif
    @endif
}


.story2 {
    background-image: linear-gradient(transparent, rgba(0,0,0,0.5)), url({{ asset('images/status-2.png') }});
}

.story3 {
    background-image: linear-gradient(transparent, rgba(0,0,0,0.5)), url({{ asset('images/status-3.png') }});
}

.story4 {
    background-image: linear-gradient(transparent, rgba(0,0,0,0.5)), url({{ asset('images/status-4.png') }});
}

.story5 {
    background-image: linear-gradient(transparent, rgba(0,0,0,0.5)), url({{ asset('images/status-5.png') }});
}

.story1 img{
    top: unset;
    left: 50%;
    bottom: 40px;
    transform: translateX(-50%);
    border: 0;
    width: 35px;
}

.write-post-container {
    width: 100%;
    background: var(--bg-color);
    border-radius: 6px;
    padding: 20px;
    color: #626262;
}

.user-profile {
    display: flex;
    align-items: center;
}

.user-profile img{
    width: 45px;
    height: 45px;
    border-radius: 50%;
    margin-right: 10px;
}

.user-profile p {
    margin-bottom: -5px;
    font-weight: 500;
    color: #626262;
}

.user-profile small{
    font-size: 12px;
}

.post-input-container {
    padding-left: 55px;
    padding-top: 20px;
}

.post-input-container textarea {
    width: 100%;
    border: 0;
    outline: 0;
    border-bottom: 1px solid #ccc;
    background: transparent;
    resize: none;
}
.input-post {
    display: flex;
    position: relative;
    align-items: center;
    justify-content: space-between;
}
.add-post-links {
    display: flex;
    margin-top: 10px;
    justify-content: space-between;
}

.add-post-links a {
    text-decoration: none;
    display: flex;
    align-items: center;
    color: #626262;
    font-size: 13px;
}

.add-post-links {
    text-decoration: none;
    display: flex;
    align-items: center;
    color: #626262;
    margin-right: 30px;
    font-size: 13px;
}

.add-post-links img {
    width: 20px;
}

.add-post-links label img {
    width: 20px;
}

.post-container {
    width: 100%;
    background: var(--bg-color);
    padding: 20px;
    color: #626262;
    margin: 20px 0;
}

.user-profile span {
    font-size: 13px;
    color: #9a9a9a;
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

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-toggle {
    color: #333;
    text-decoration: none;
}

.dropdown-menu {
    display: none;
    position: absolute;
    list-style: none;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

.dropdown-menu li:hover {
    background-color: #f5f5f5;
}

.dropdown:hover .dropdown-menu {
    display: block;
}
/* For Mobile Phones Portrait or Landscape View */
@media screen
    and (max-device-width: 640px) {
    nav {
        display: grid;
    }
    .logo {
    width: 100px;
    margin-right: 10px;
    }
    .nav-left {
    display: inline-block;
    }
    .nav-left ul {
    position: relative;
    left: 15%;
    }
    .nav-right {
    justify-content: end;
    }
    .nav-profile img {
    width: 30px;
    height: 30px;
    position: absolute;
    right: 2%;
    top: 50%;
    }
    .search-box{
    width: fit-content;
    height: fit-content;
    position: relative;
    right: 2%;
    top: 8%;
    position: absolute;
    }
    .input-search{
    height: 30px;
    width: 30px;
    border-style: none;
    padding: 10px;
    font-size: 12px;
    outline: none;
    border-radius: 25px;
    transition: all .5s ease-in-out;
    background-color: #fff;
    padding-right: 20px;
    color:#333;
    }
    .input-search::placeholder{
    color: #333;
    font-size: 12px;
    letter-spacing: 2px;
    font-weight: 100;
    }
    .btn-search{
    width: 30px;
    height: 30px;
    border-style: none;
    font-size: 12px;
    font-weight: bold;
    outline: none;
    cursor: pointer;
    border-radius: 50%;
    position: absolute;
    right: 0px;
    color:#333 ;
    background-color:transparent;
    pointer-events: painted;  
    }
    .btn-search:focus ~ .input-search{
    width: 200px;
    border-radius: 50px;
    background-color: #fff;
    border-bottom:1px solid rgba(255,255,255,.5);
    transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
    }
    .input-search:focus{
    width: 250px;
    border-radius: 50px;
    background-color: #fff;
    border-bottom:1px solid rgba(255,255,255,.5);
    transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
    }
    .left-sidebar {
    display: none;
    } 
    .right-sidebar {
    display: none;
    } 
    .main-content {
    flex-basis:  100%;
    }
    .story img{
    position: absolute;
    width: 20px;
    border-radius: 50%;
    top: 10px !important;
    left: 10px;
    border: 1px solid #1876f2;
    }
    .story p {
    font-size: 9px;
    }
    .story1 img {
    margin-top: 50%;
    left: 50%;
    }
    .add-post-links {
    display: flex;
    margin-top: 10px;
    font-size: 9px;
    }
    .col img, label img {
    width: 15px;
    }
    .col label img {
    width: 15px;
    }
    .add-post-links a {
    font-size: 9px;
    }
    .user-profile img {
    width: 25px;
    }
    #user-profile{
    display: none;
    }
    .dropdown {
    position: relative;
    display: inline-block;
    }

    .dropdown-toggle {
    color: #333;
    text-decoration: none;
    }

    .dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1;
    padding: 0;
    margin: 0;
    list-style: none;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    .dropdown-menu li {
    padding: 10px;
}

    .dropdown-menu li:hover {
    background-color: #f5f5f5;
    }

    .dropdown:hover .dropdown-menu {
    display: block;
    }
}

    </style>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Datatable -->
    <link href="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/904fa8d934.js" crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="{{ asset('ijaboCropTool/ijaboCropTool.min.css') }}"> --}}
</head>

<body>
    <div id="app">
        @include('layouts.nav')
        <main>
            @yield('content')
        </main>
        {{-- @include('layouts.footer') --}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        let settingsMenu = document.querySelector('.settings-menu');
        let darkBtn = document.querySelector('#dark-btn');
      
        function settingsMenuToggle(){
            settingsMenu.classList.toggle("settings-menu-height");
        }

        darkBtn.onclick = function(){
            darkBtn.classList.toggle("dark-btn-on");
            document.body.classList.toggle("dark-theme");

            if(localStorage.getItem("theme") == "light"){
                localStorage.setItem("theme", "dark");
            }
            else {
                localStorage.setItem("theme", "light");
            }
    }

    if(localStorage.getItem("theme") == "light"){
        darkBtn.classList.remove("dark-btn-on");
        document.body.classList.remove("dark-theme");
    }
    else if(localStorage.getItem("theme") == "dark"){
        darkBtn.classList.add("dark-btn-on");
        document.body.classList.add("dark-theme");
    }
    else {
        localStorage.setItem("theme", "light");
    }

    </script>
    {{-- <script src="{{ asset('ijaboCropTool/ijaboCropTool.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body> 

</html>