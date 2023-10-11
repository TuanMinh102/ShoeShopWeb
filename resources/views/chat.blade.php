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
   

</head>
<body>
<div > <h2 class="title">Chat với hệ thống</h2></div>
<div id="container">
    <div><p id="content">cuoc tro chuyen</p></div>
</div>
<div id="sendmessage">
    <input type="text" placeholder="nhập nội dung..." id="input" >
    <button onclick="send();">Gửi</button>
</div>


<style>
.title{
    width: 100%;
    height:200px;
    background-color:aqua;
    text-align:center;
}
#container{
    box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border:2px solid;
    width: 100%;
    height: 300px;
}
#container>div{
    margin-left:10px;
    width: fit-content;
    height: 25px;
    background-color:blue;
    border-radius:50px;
    color:white;
}
#sendmessage{
    margin-top:10px;
    margin-left:30%;
}
input{
    width: 50%;
    height: 30px;
}
button{
    height: 30px;
}
</style>
<script src="js/chat.js"></script>
</body>
</html>
