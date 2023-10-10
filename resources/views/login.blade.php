<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce Template | Checkout</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="home"><img src="img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="home"><img src="img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li><a href="home">Home</a></li>
                    <li><a href="shop">Shop</a></li>
                    <li><a href="ct">Product</a></li>
                    <li><a href="gh">Cart</a></li>
                    <li class="active"><a href="login">Login</a></li>
                </ul>
            </nav>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                <a href="#" class="btn amado-btn mb-15">%Discount%</a>
                <a href="#" class="btn amado-btn active">New this week</a>
            </div>
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="gh" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart <span>(0)</span></a>
                <a href="#" class="fav-nav"><img src="img/core-img/favorites.png" alt=""> Favourite</a>
                <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Search</a>
            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->
                    @empty($ck)
                    <div class="form-container">
                         <div id="loginform">
                            <form action="dn" method="get" >
                                <h2 >Login</h2> 
                                    <div>
                                        <b>Tài khoản <a style="color:red;">*</a></b>                                                                  
                                       <input type="text"  id="" name="user_name" value="" placeholder="Username" required>
                                    </div>
                                    <div>
                                       <b>Mật khẩu <a style="color:red;">*</a></b>      
                                        <input type="password"  id="" name ="pass_word" value="" placeholder="Password" required>
                                    </div>  
                                    <i>Chưa có tài khoản?<a href="javascript:show_hide(1);" style="color:blue;"> Đăng ký</a></i><br>
                                    <i>Quên mật khẩu?<a href="javascript:show_hide(2);" style="color:blue;"> Khôi phục</a></i><br>
                                    
                                    <input type="submit" class="btn btn-success" style="width: 100px; margin-left:35%;" id="login" value="Login" name="" >		
                                <h4 style="color:red;">{{$loginError}}</h4>
                            </form>
                         </div>
                         <div id="signUpform" >
                            <form action="dk" method="get" >
                                <h2>Sign up</h2> 
                                <div>                             
                                <b>Tài khoản<a style="color:red;">*</a></b>
                                <input type="text"  id="" name="user_name" value="" placeholder="Username" required></div>
                                <div>
                                <b>Mật khẩu <a style="color:red;">*</a></b>
                                <input type="password"  id="" name ="pass_word" value="" placeholder="Password" required></div>
                               <div>
                                <b>Xác nhận mật khẩu <a style="color:red;">*</a></b>
                                <input type="password"  id="" name ="confirm_pass" value="" placeholder="Confirm Password" required>
                                </div>
                                <br>
                                <input type="submit" class="btn btn-success" style="width: 100px; margin-left:35% ;" id="logup" value="Sign up" name="" >										
                                <h4 style="color:red;">{{$SignUpError}}</h4>
                            </form>
                        </div> 
                        <div id="recoverPassform" > 
                            <form action="#" method="get" >
                             <h2>Khôi phục mật khẩu</h2>
                             <div>
                                <b>Email<a style="color:red;">*</a></b><br>
                                <input type="email" id="email_otp" name ="email" value="" placeholder="Mã OTP sẽ gửi về địa chỉ email tại đây!" required>
                            </div>
                            <br>                                           
                            </form>
                            <button class="btn btn-success" style="margin-left:35%;" onclick="next();"  id="next">Tiep tuc</button>                     
                        </div>
                        <div id="OTPform" > 
                            <form action="#" method="get">
                             <h2>Xác nhận mã OTP</h2>
                             <p>Mã sẽ được gửi về địa chỉ Email bạn vừa nhập</p>
                                    <p id ="email_to"></p>
                             <div id="inputs" class="inputs"> 
                                 <input class="input-otp" id="i1" type="text" inputmode="numeric" maxlength="1" require/>   
                                 <input class="input-otp" id="i2" type="text" inputmode="numeric" maxlength="1" require/>          
                                 <input class="input-otp" id="i3" type="text" inputmode="numeric" maxlength="1" require/>
                                 <input class="input-otp" id="i4" type="text" inputmode="numeric" maxlength="1" require/>
                                 <input class="input-otp" id="i5" type="text" inputmode="numeric" maxlength="1" require/>
                            </div><br>                        
                            </form>
                            <button onclick="checkcode();" class="btn btn-success" style="margin-left:35%;"  id="confirm_code">Xác nhận</button>
                            <br>   
                            <h4 style="color:red;text-align:center;margin-top:15px;" id="error-otp"></h4>
                        </div>
                        <div id="newPassform"> 
                            <form action="#" method="get">
                             <h2>Xác nhận mật khẩu mới</h2>
                             <p>Mật khẩu mới gồm ...</p>
                             <div> 
                             <b>Mật khẩu mới<a style="color:red;">*</a></b><br>
                                 <input  id="new_pass" type="password" placeholder="Mật khẩu mới"  require/>             
                            </div>
                            <div>
                            <b>Nhập lại mật khẩu mới<a style="color:red;">*</a></b><br>
                            <input id="confirm_pass" type="password"  placeholder="Nhập lại mật khẩu mới" require/>
                            </div> <br>                     
                            </form>
                            <button onclick="checkpass();" class="btn btn-success" style="margin-left:35%;"  id="confirm_newPass">Xác nhận</button>   
                        </div>
                    </div> 

                    @endempty

                      @isset($ck)
                      @foreach($info as $row)
                      <div>
                      <h3>Thông tin tài khoản</h3>
                      <p><b>Tài Khoản:</b> {{$row->TaiKhoan}}</p>
                      <p><b>Email:</b> {{$row->Email}}</p>
                      <p><b>Số Điện Thoại:</b> {{$row->Phone}}</p>
                      <p><b>Địa Chỉ:</b> {{$row->DiaChi}}</p>
                      <p><b>Họ Tên:</b> {{$row->HoTen}}</p>
                      <a href="login0" style="color:red;">Đăng Xuất</a>
                      </div>
                      @endforeach
                      @endisset
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Newsletter Text -->
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>Subscribe for a <span>25% Discount</span></h2>
                        <p>Nulla ac convallis lorem, eget euismod nisl. Donec in libero sit amet mi vulputate consectetur. Donec auctor interdum purus, ac finibus massa bibendum nec.</p>
                    </div>
                </div>
                <!-- Newsletter Form -->
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-form mb-100">
                        <form action="#" method="post">
                            <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-4">
                    <div class="single_widget_area">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="home"><img src="img/core-img/logo2.png" alt=""></a>
                        </div>
                        <!-- Copywrite Text -->
                        <p class="copywrite"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> & Re-distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-8">
                    <div class="single_widget_area">
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <nav class="navbar navbar-expand-lg justify-content-end">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse" id="footerNavContent">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="home">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="shop">Shop</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="ct">Product</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="gh">Cart</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="login">Login</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <style>
    .form-container{
        margin-left: 20%;
        margin-top: 10%;
        width: 25%;
        height: 400px;
        box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border:1px solid;
        overflow-y: auto;
    }
    i{
        margin-left:25px;
    }
   
    #signUpform, #recoverPassform,#OTPform,#newPassform{
        display: none;
    }
    h2{
        text-align:center;
    }
   form>div
   {
    margin-top:15px;
     margin-left:25px;
   }
   #OTPform p{
    text-align:center;
   }
    input{
        height:35px;
        width: 85%;
        border: 1px solid #ccc;
        font-size:15px;
    }
  .inputs{
    display: flex; 
    justify-content: center;  
    justify-content: space-around;
  }  
.input-otp{
   width: 40px;
   border:none;
   border-bottom: 3px solid grey;
   text-align: center; 
}
.input-otp:focus{
  outline:none;
}
</style>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
    <script src="js/login.js"></script>

</body>
</html>
