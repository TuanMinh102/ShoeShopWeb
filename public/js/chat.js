
// var i=1;
// function sendit()
// {
//     i++;
//     alert(i);
//     setTimeout(sendit, 5000);
// }
// setTimeout(sendit, 5000);
function send()
{
    document.getElementById('content').innerHTML=document.getElementById('input').value;
}