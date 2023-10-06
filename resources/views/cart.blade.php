

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce Template | Cart</title>

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
                    <li class="active"><a href="gh">Cart</a></li>
                    <li><a href="tt">Checkout</a></li>
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

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid parent">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                 <?php $count=1;?>
                                    @foreach($products as $row)
                                    <tr>
                                        <td class="cart_product_img">
                                            <a href="#"><img src="img/bg-img/{{$row->Anh}}" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>Modern {{$row->TenHang}}</h5>
                                        </td>
                                        <td class="price">
                                            <span>${{$row->GiaBan}}</span>
                                        </td>
                                        <td class="qty"> 
                                          
                                            <div class="qty-btn d-flex">
                                                <p>Qty</p>
                                                <div class="quantity">
                                                 <!-- <span class="qty-minus" onclick="var effect = do cument.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="{{$row->SoLuong}}">
                                                  <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i>-->
                                              
                                                <input type="number"  min="1" value="{{$row->SoLuong}}" id="upCart<?php echo $count;?>" >
                                                <input type="hidden"  value="{{$row->MaGiay}}" id="proid<?php echo $count;?>" >
                                                <input type="hidden"  value="{{$row->GiaBan}}" id="price<?php echo $count;?>" >
                                                <input type="hidden"  value="{{$row->SoLuong}}" id="old_amount<?php echo $count;?>" >  
                                                </div>   
                                                <a href="javascript:delProduct({{$row->MaGiay}});"  style="font-size:20px;margin-left:10px;"><i class="fa fa-trash" style="color:red;"></i></a>                                           
                                            </div> 
                                        </td>
                                    </tr>
                                     <?php $count++;?>                                     
                                   @endforeach
                                                                                        
                                   <div class="d-flex main justify-content-between" >
                                      <a href="del" style="color:red;">Xóa toàn bộ</a>  
                                      <a href="javascript:show_hide(0);"><i class="fa fa-history"></i> Lịch sử thanh toán</a>                 
                                   </div>
                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">               
                                <li><span>subtotal:</span> <span >${{$total}}</span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span> <span id="total">${{$total}}</span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <a href="tt" class="btn amado-btn w-100">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="child" >
                <div><button id="cancel" onclick="show_hide(1);"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg></button></div>
                <div style="text-align:center;">Lịch sử thanh toán</div>

                <div class="cart-table clearfix">
                <table class="table table-responsive">
                <thead style="background-color:#f8f9fa;">
                    <tr style="height: 50px;width:400px;">
                        <th>Mã các sản phẩm</th>
                        <th>Tên người nhận</th>
                        <th>Tổng số lượng</th>
                        <th>Đơn giá</th>
                        <th>Ngày Lập</th>
                        <th>Nơi nhận</th>
                        <th>Tình trạng</th>
                     </tr>
                </thead>
                     <tbody>
                    @foreach($bill as $row)
                    <tr style="height: 50px;width:400px;" class="tr">
                        <td>{{$row->MaGiay}}</td>
                        <td>{{$row->HoTen}}</td>
                        <td>{{$row->SoLuong}}</td>
                        <td>${{$row->DonGia}}</td>
                        <td>{{$row->NgayLapHD}}</td>
                        <td>{{$row->NoiChuyen}}</td>
                        <td>{{$row->TinhTrang}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>     
                </div>
            </div> 
        </div> 
    </div>
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
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->& Re-distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a>
</p>
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
                                            <a class="nav-link" href="tt">Checkout</a>
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
#child{
    z-index: 1;
    position:absolute;
    top: 10%;
    left: 15%;
    width: 700px;
    height: 300px;
    box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    background-color:white;
    border:1px solid;
    overflow-y: auto;
    overflow-x:auto;
    display:none;
}
#cancel{
   float:right;
   width: 20px;
   height: 20px;
   border:none;
}
.tr td{
    font-size:12px;
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

<script>
    
    $(document).ready(function(){
  <?php for($i=1;$i<$count;$i++){?>      
        $('#upCart<?php echo $i;?>').on('change keypress',function(){
           var newqty=$('#upCart<?php echo $i;?>').val();
           var proid=$('#proid<?php echo $i;?>').val();
           var data={
            'SoLuong':newqty,
            'MaSanPham':proid,
           }
           if(newqty<=0){
            alert('Vui lòng nhập số');
           }
          else{               
            $.ajax({
            type:'get',
            dataType:'html',
            url:'update'+proid,
            data:data,
            success:function(response){
                console.log(response);
               $('.summary-table').load(document.URL+' .summary-table');
            }
            });  
          }
        });     
        <?php }?>
    });

  function delProduct(id)
  {
    if(confirm('Xác nhận xóa sản phẩm này?')==true){
        $.ajax({
        type:'get',
        dataType:"html",
        url:'delProduct'+id,
        data:id,
        success:function(response){
                console.log(response);
               $('#tbody').load(document.URL+' #tbody');
               $('.summary-table').load(document.URL+' .summary-table');
            }
    });
    }
  }
  function show_hide(n)
  {
    if(n==1)
    document.getElementById("child").style.display = "none";
    else
    document.getElementById("child").style.display = "inline-block";
  }

//   var cursor=document.getElementById("child");
//   document.addEventListener("mousemove",function(e)
//   {
//     var x=e.clientX;
//     var y=e.clientY;
//     cursor.style.top=y+"px";
//     cursor.style.left=x+"px";
//   })
</script> 
</body>

</html>