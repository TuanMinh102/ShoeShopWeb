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
    var mail=$('#email_otp').val();
    var random_otp=Math.floor(Math.random() * (99999 - 10000)) + 10000;
         otp_object=new OTP();
        otp_object.set(String(random_otp));
      var data={
      'email': mail,
      'random_otp': otp_object.get(),
      }
      $.ajax({
            type:'get',
            dataType:'html',
            url:'otp',
            data:data,
            success:function(response){
                console.log(response);
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
        document.getElementById("error-otp").innerHTML="Sai mã OTP";
    }
}
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
        }
        $.ajax({
            type:'get',
            dataType:'html',
            url:'recoverpass',
            data: data2,
            success:function(response){
                console.log(response);
                document.getElementById("loginform").style.display="block";
                document.getElementById("recoverPassform").style.display="none";                 
            }
            });  
    }
}