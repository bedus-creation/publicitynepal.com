<!DOCTYPE html>
<html lang="en">
<head>
    <title>PublicityNepal ! Admin Panel</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    @yield('head')
</head>
<body>
    <style type="text/css">
    .dropdown-menu{
        padding: 0;
    }
    .bg-sidebar{
        color: #fff;
        background-color:#115f9c;
    }
    #sidebar li{
        background-color:#115f9c;
    }
    #sidebar a{
        color: #fff;
        background-color:#115f9c;
    }
    .sidenav {
        background-color: #115f9c;
        top: 0px;
        height: 100%;
        width: 20%;
        z-index: 1;
        transition: 0.5s;
        padding-top: 10px;
        text-align:center;
        display: block;
        position:fixed;
        max-height: 100%;
        overflow-x: hidden;
    }
    #notification{
        display: none;
    }

    .notification{
        padding: 10px;
        top:40px;
        float: right;
        right: 10%;
        width: 400px;
        max-height: 400px;
        position:absolute;
        z-index: 9;
        background: #C9DAE1;
        overflow-y: auto;
    }
    #closeNav{
        display: none;
    }
    .dropdown-item{
        line-height: 30px ! important;
        border: 1px solid #f5f5f5 ! important;
        font-size: 16px;
        padding:10px 20px ! important;
    }
    #main{
        margin-left: 20%;
        position: relative;
        transition: 0.5s;
        overflow-x: hidden;
        width: 100%;
        padding: 0 10px 0 10px;
    }
    .navbar{
        float: left;
    }

    .sidenav a {
        text-decoration: none;
        transition: 0.3s;
    }
    img.cat-img{
        max-width: 10rem;
        max-height: 10rem;
    }

    @media screen and (max-width: 768px) {
        .sidenav{
            min-width: 18rem;
            display: none;
            width: 100%;
            overflow-y: auto;
            padding: 0;
            margin: 0;
        }
        #closeNav{
            display: block;
        }
        #main{
            margin-left: 0;
            padding:0;
            min-width:290px;
            width:100%;
        }
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div id="mySidenav" class="sidenav">
            <div class="d-flex flex-row-reverse">
                <div>
                    <button id="closeNav" onclick="openNav()" type="button" class="btn bg-sidebar border float-right mr-4">Close &times;</button>
                </div>
            </div>
            <div class="clearfix"></div>
            @yield('sidebar')
        </div>
        <div id="main" class="pl-md-4">
            <div class="clearfix"></div>
            <div class="d-flex flex-row justify-content-between w-100">
                <div>
                    <button onclick="openNav()" type="button" class="btn bg-primary"><span class="fa fa-bars"></span>&nbsp;  Menu</button>
                </div>
                <div>
                    <button type="button" class="btn btn-primary" onclick="$('#notification').toggle();">
                        <i class="fa fa-bell pr-2"></i> <span class="badge badge-light" id="notification-count">0</span>
                        <span class="sr-only">unread messages</span>
                    </button>

                </div>
            </div>
            @yield('content')
        </div>
        <div class="notification" id="notification">
        </div>    
    </div>
</div>
<script
src="https://code.jquery.com/jquery-3.2.1.js"
integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script type="text/javascript">
    function openNav() {
        $('#mySidenav').toggle();
        if ($('#mySidenav').is(":visible")) {
            if ($(window).innerWidth() <= 751) {
                $('#mySidenav').css({"width": "100%"});
                $('#main').css({"width": "0", "min-width": "0"});
            } else {

                $('#mySidenav').css({"max-width": "20%", "width": "100%"});
                $('#main').css({"margin-left": "20.5%", "min-width": "0", "width": "100%"});
            }
        } else {
            $('#mySidenav').css("width", "0");
            if ($(window).innerWidth() <= 751) {
                $('#main').css({"margin": "0", "padding": "0", "min-width": "290px", "width": "100%"});
            } else {
                $('#main').css({"margin": "0px", "padding": "0 10px 0 10px", "width": "100%"});
            }
        }
    }
</script>
@yield('script')
</body>
</html>