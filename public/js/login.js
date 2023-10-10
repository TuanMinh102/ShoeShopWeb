class OTP{
    otpcode;
    constructor()
    {
        this.otpcode='';
    }
    set(code)
    {
        this.otpcode=code;
    }
    get()
    {
        return this.otpcode;
    }
}
    // Ẩn hiện các form đăng nhập,đăng ký,lấy lại mật khẩu...
    function show_hide(n)
    {
        if(n==0)
        {
            document.getElementById("loginform").style.display="block";
            document.getElementById("signUpform").style.display="none";
            document.getElementById("recoverPassform").style.display="none";
        }
        else if(n==1)
        {
            document.getElementById("loginform").style.display="none";
            document.getElementById("signUpform").style.display="block";
            document.getElementById("recoverPassform").style.display="none";
        }
        else
        {
            document.getElementById("loginform").style.display="none";
            document.getElementById("signUpform").style.display="none";
            document.getElementById("recoverPassform").style.display="block";
        }
    }

    // Sự kiện gửi và xác nhận mã OTP
   function next(){
    seconds=60;
    var mail=$('#email_otp').val();
    var random_otp=Math.floor(Math.random() * (99999 - 10000)) + 10000;
        otp_object=new OTP();
        otp_object.set(String(random_otp));
      var data={
      'email': mail,
      'random_otp': otp_object.get(),
      };
      $.ajax({
            type:'get',
            dataType:'html',
            url:'otp',
            data:data,
            success:function(){
                document.getElementById("recoverPassform").style.display="none";
                document.getElementById("OTPform").style.display="block";
                document.getElementById("email_to").innerHTML=mail;
            }
            });  
    };
    // Chuyển đến thẻ input tiếp theo
const inputs = document.getElementById("inputs"); 
  
inputs.addEventListener("input", function (e) { 
    const target = e.target; 
    const val = target.value; 
    if (isNaN(val)) { 
        target.value = ""; 
        return; 
    } 
    if (val != "") { 
        const next = target.nextElementSibling; 
        if (next) { 
            next.focus(); 
        } 
    } 
}); 
  
inputs.addEventListener("keyup", function (e) { 
    const target = e.target; 
    const key = e.key.toLowerCase(); 
  
    if (key == "backspace" || key == "delete") { 
        target.value = ""; 
        const prev = target.previousElementSibling; 
        if (prev) { 
            prev.focus(); 
        } 
        return; 
    } 
});

// kiem tra ma OTP
function checkcode()
{
    var code_input="";
    for(var i=1;i<=5;i++)
    {
         code_input+=document.getElementById("i"+i).value;
    }
    if(code_input==this.otp_object.get())
    {
       document.getElementById("newPassform").style.display="block";
       document.getElementById("OTPform").style.display="none";
    }
    else{
        document.getElementById("error-otp").style.display="block";
        document.getElementById("error-otp").innerHTML="Sai mã OTP";
        setTimeout(()=>{
            document.getElementById("error-otp").style.display="none";
        },4000);
    }
}
//kiem tra mat khau de cap nhat mat khau moi
function checkpass()
{
    var new_pass=document.getElementById("new_pass").value;
    var confirm_pass=document.getElementById("confirm_pass").value;
    var gmail=document.getElementById("email_to").textContent;
    if(new_pass==confirm_pass)
    { 
        var data2={
            'gmail': gmail,
            'newpassword': confirm_pass,
        };
        $.ajax({
            type:'get',
            dataType:'html',
            url:'recoverpass',
            data: data2,
            success:function(response){
                console.log(response);      
                    alert("Cập nhật mật khẩu thành công");
                    document.getElementById("loginform").style.display="block";
                    document.getElementById("newPassform").style.display="none";               
            }});  
    }
    else{
        document.getElementById("error-newpass").style.display="block";
        document.getElementById("error-newpass").innerHTML="Mật khẩu không trùng khớp";
        setTimeout(()=>{
            document.getElementById("error-newpass").style.display="none";
        },4000);
    }
}
//dang ky
function signUp()
{
    var username=document.getElementById("user_name").value;
    var passwordconfirm=document.getElementById("confirm_pass-signup").value;
    var password=document.getElementById("pass_word").value;
    if(username==''||passwordconfirm==''||password=='')
    {
        document.getElementById("error-signUp").style.display="block";
        document.getElementById("error-signUp").innerHTML='Vui lòng nhập đầy đủ';
        setTimeout(()=>{
            document.getElementById("error-signUp").style.display="none";
        },4000);
    }
    else{
        var data3 ={
            'tendangnhap':username,
            'matkhau':password,
            'xacnhanmatkhau':passwordconfirm,
        }
        $.ajax({
            type:'get',
            dataType:'html',
            url:'dk',
            data: data3,
            success:function(response){
                var data = $.parseJSON(response); 
                if(data.flag=='false')
                {
                    document.getElementById("error-signUp").style.display="block";
                      document.getElementById("error-signUp").innerHTML=data.SignUpError;
                    setTimeout(()=>{
                        document.getElementById("error-signUp").style.display="none";
                    },4000);
                }              
                else{      
                     clear_input();
                     document.getElementById("loginform").style.display="block";
                    document.getElementById("signUpform").style.display="none";  
                    alert("Đăng ký thành công");
                }          
            }}); 
     }
}
// Gui lai ma OTP
function reloadcode()
{
    seconds=60;
    document.getElementById('countdown').style.color="black";
    var mail=$('#email_otp').val();
    var random_otp = Math.floor(Math.random() * (99999 - 10000)) + 10000;
    this.otp_object.set(random_otp);
      var data={
      'email': mail,
      'random_otp': random_otp,
      };
      $.ajax({
            type:'get',
            dataType:'html',
            url:'otp',
            data:data,
            success:function(){}});  
}
//Xoa du lieu nhap cua the input
function clear_input()
{
    document.getElementById("user_name").value='';
    document.getElementById("confirm_pass-signup").value='';
    document.getElementById("pass_word").value='';
    document.getElementById("error-signUp").innerHTML='';
    //
    document.getElementById("new_pass").value='';
    document.getElementById("confirm_pass").value='';
    document.getElementById("email_to").textContent='';
    //
    for(var i=1;i<=5;i++)
    document.getElementById("i"+i).value='';
}

var countdownEL= document.getElementById('countdown');
let seconds=60;
setInterval(Countdown,1000);
function Countdown()
{
   countdownEL.innerHTML=seconds;
   if(seconds>0)
   {
     seconds--;
   }
   else{
    this.otp_object.set('');
   }
    if(seconds==9)
    {
        document.getElementById('countdown').style.color="red";
    }
}
