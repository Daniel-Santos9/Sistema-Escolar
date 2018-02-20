
<!DOCTYPE HTML>
<html>
<head>
    <title>| Home |</title>
    <link href="{{asset('assets/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"/>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('assets/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- Custom Theme files -->
    <link href="{{asset('assets/css/style.css')}}" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--webfont-->
    <link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <!----font-Awesome----->
    <link rel="stylesheet" href="{{asset('assets/fonts/css/font-awesome.min.css')}}">
    <!----font-Awesome----->
    <!--Animation-->
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <link href="{{asset('assets/css/animate.css')}}" rel='stylesheet' type='text/css' />
    <script>
        new WOW().init();
    </script>

</head>
<body>

<div class="header-home">
    <div class="fixed-header">
        <div class="logo wow bounceInDown" data-wow-delay="0.4s">
            <a href="{{route('home')}}">
                <img src="{{asset('/img/logo.png')}}" class="img-responsive" alt=""/>
            </a>
        </div>
        <div class="top-nav wow bounce" data-wow-delay="0.4s">
            <span class="menu"> </span>
            <ul>
                @if(Auth::check())
                    <li class="active"><a href="{{route('admin')}}">Home</a></li>
                @else
                    <li class="active"><a href="{{route('home')}}">Home</a></li>
                @endif
                <li><a href="about.html">About</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="contact.html">Contact</a></li>
                @if(Auth::check())
                    <li><a href="{{route('usuario.edit', Auth::user()->id) }}"><span class="glyphicon glyphicon-user"></span> {{Auth::user()->name}} </a></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <span class="glyphicon glyphicon-log-in"></span> Sair
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @else
                    <li><a href="{{route('login')}}"><span class="glyphicon glyphicon-user"></span> Logar</a></li>
                @endif
            </ul>
            <!-- script-nav -->
            <script>
                $("span.menu").click(function(){
                    $(".top-nav ul").slideToggle(500, function(){
                    });
                });
            </script>
            <!-- //script-nav -->
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!--script-->
<script>
    $(document).ready(function(){
        $(".top-nav li a").click(function(){
            $(this).parent().addClass("active");
            $(this).parent().siblings().removeClass("active");
        });
    });
</script>
<!-- script-for sticky-nav -->
<script>
    $(document).ready(function() {
        var navoffeset=$(".header-home").offset().top;
        $(window).scroll(function(){
            var scrollpos=$(window).scrollTop();
            if(scrollpos >=navoffeset){
                $(".header-home").addClass("fixed");
            }else{
                $(".header-home").removeClass("fixed");
            }
        });

    });
</script>
<!-- /script-for sticky-nav -->
<!--//header-->
</div>
<div class="grid_1">
    <div class="container">
        <div class="box_1  wow fadeInUpBig" data-wow-delay="0.4s">
            <h3>Why Join Learn</h3>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
        </div>
        <div class="box_2">
            <div class="col-md-6">
                <div class="feature  wow fadeInRight" data-wow-delay="0.4s">
                    <i class="fa fa-film"> </i>
                    <h4>Video Lessons</h4>
                    <p>
                        Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="feature wow fadeInLeft" data-wow-delay="0.4s">
                    <i class="fa fa-check"> </i>
                    <h4>Trusted Certifications</h4>
                    <p>
                        Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.
                    </p>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="box_3 wow bounce" data-wow-delay="0.4s">
            <div class="col-md-6">
                <div class="feature">
                    <i class="fa fa-trophy"> </i>
                    <h4>Expert teachers</h4>
                    <p>
                        Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="feature">
                    <i class="fa fa-microphone"> </i>
                    <h4>Audio Lessons</h4>
                    <p>
                        Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.
                    </p>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div class="grid_2">
    <div class="container">
        <h3 class="head_1 wow rotateInUpLeft" data-wow-delay="0.4s">Latest Courses</h3>
        <div class="col-md-4 box_6 wow rotateInDownLeft " data-wow-delay="0.4s">
            <img src="{{asset('assets/images/pic1.jpg')}}" class="img-responsive" alt=""/>
            <div class="desc">
                <h4>Lorem Ipsum</h4>
                <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
                <div class="more"><a href="#"><img src="{{asset('assets/images/more.png')}}" alt=""></a></div>
            </div>
        </div>
        <div class="col-md-4 box_6 wow lightSpeedIn" data-wow-delay="0.4s">
            <img src="{{asset('assets/images/pic2.jpg')}}" class="img-responsive" alt=""/>
            <div class="desc">
                <h4>Lorem Ipsum</h4>
                <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
                <div class="more"><a href="#"><img src="{{asset('assets/images/more.png')}}" alt=""></a></div>
            </div>
        </div>
        <div class="col-md-4 box_6 wow rotateIn " data-wow-delay="0.4s">
            <img src="{{asset('assets/images/pic3.jpg')}}" class="img-responsive" alt=""/>
            <div class="desc">
                <h4>Lorem Ipsum</h4>
                <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
                <div class="more"><a href="#"><img src="{{asset('assets/images/more.png')}}" alt=""></a></div>
            </div>
        </div>
    </div>
</div>
<div class="team">
    <div class="container">
        <h3 class="head_2 wow rollIn" data-wow-delay="0.4s">Welcome to our team</h3>
        <div class="img-wrapper wow slideInLeft" data-wow-delay="0.4s">
            <a href="#"><img src="{{asset('assets/images/pic6.jpg')}}" class="img-responsive" alt=""/></a>
            <a href="#"><img src="images/pic7.jpg" class="img-responsive" alt=""/></a>
            <a href="#"><img src="images/pic4.jpg" class="img-responsive" alt=""/></a>
        </div>
        <blockquote class="blockquote1">
            <div class="block_info wow slideInRight" data-wow-delay="0.4s">
                <span class="heading">Lorem ipsum dolor sit amet, consectetuer</span>
                Dignissimos ducimus qui blanditiis praesentium voluptatum corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate nonrofficia deserunt mollitia animi id est.
            </div>
            <span class="author wow bounce" data-wow-delay="0.4s"><a href="#">Dolor Smith, (trainer)</a></span>
        </blockquote>
    </div>
</div>

<div class="footer wow fadeInRight" data-wow-delay="0.4s">
    <div class="container">
        <div class="footer_top">
            <div class="col-sm-4">
                <ul class="list1">
                    <h3>Browse</h3>
                    <li><a href="#">Prices</a></li>
                    <li><a href="#">Courses</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contacts</a></li>
                </ul>
            </div>

            <div class="col-sm-4">
                <ul class="list1">
                    <h3>About Learn</h3>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Apply</a></li>
                    <li><a href="#">Terms and Conditions</a></li>
                    <li><a href="#">Register</a></li>
                </ul>
            </div>
            <div class="col-sm-4">
                <ul class="socials">
                    <li><a href="#"><i class="fa fb fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa tw fa-twitter"></i></a></li>
                </ul>
                <ul class="list2">
                    <li><strong class="phone">+0018 58287 58</strong><br><small>Mon - Fri / 9.00AM - 06.00PM</small></li>
                    <li>Questions? <a href="malito:mail@demolink.org">mail(at)ability.com</a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div class="copy">
    <p>&copy; 2014 Design by <a href="http://w3layouts.com" target="_blank">w3layouts</a></p>
</div>
</body>
</html>