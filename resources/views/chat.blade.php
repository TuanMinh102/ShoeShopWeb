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
    <link rel="stylesheet" href="css/chat.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" type="text/css" rel="stylesheet">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/vue/2.6.14/vue.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/socket.io/2.4.0/socket.io.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.11.0/echo.common.min.js"></script>
    <!-- Core Style CSS -->
   

</head>
<body>
<div>

    <div>
      <a href="/logout">Logout</a>
    </div>
  </div>
  <div id="app" class="container">
    @if($cookie==0)
    <h3 class=" text-center">Messaging | User: Nguyen Minh Tuan</h3>
    @else 
    <h3 class=" text-center">Messaging | Admin</h3>@endif
    <div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="inbox_chat">
            @foreach($list as $row)
            <div  class="chat_list" id="user{{$row->MaTaiKhoan}}" >
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5> {{$row->TaiKhoan}} <span class="chat_date">Dec 25</span></h5>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div> 
        <div class="mesgs">
          <div class="msg_history" id="msg">
          @foreach($chat as $row)
            <div>
               @if($row->IsUser != $cookie)
              <div  class="incoming_msg">
                <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                </div>
                <div class="received_msg">
                  <div class="received_withd_msg">
                    <p>{{$row->NoiDung}}</p>
                    <span class="time_date" style="font-size:10px;">{{$row->ThoiGian}}</span>
                  </div>
                </div>
              </div>
              @else
              <div class="outgoing_msg">
                <div class="sent_msg">
                  <p>{{$row->NoiDung}}</p>
                  <span class="time_date" style="font-size:10px;">{{$row->ThoiGian}}</span>
                </div>
              </div>@endif
            </div>
            @endforeach
          </div>
          <div class="type_msg">
            <div class="input_msg_write">
              <input  type="text" class="write_msg" placeholder="Type a message" id="message" />
              <button class="msg_send_btn" type="button" onclick="send({{$cookie}},1)"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="js/chat.js"></script>
</body>
</html>
