function send(isUser,chatid)
{
   var message=document.getElementById("message").value;
   if(message=='')
   {
    alert('vui long nhap noi dung');
   }
   else{
    var data={
        'message': message,
        'is_user': isUser,
        'chatid': chatid,
    }
    $.ajax({
        type:'get',
        dataType:'html',
        url:'send',
        data: data,
        success:function(response){
           console.log(response);
           document.getElementById('message').value='';
        }}); 
   }
}

 
function reloadpage()
{
    $("#msg").load(document.URL+' #msg');
    setTimeout(reloadpage, 2000);
}
setTimeout(reloadpage, 2000);