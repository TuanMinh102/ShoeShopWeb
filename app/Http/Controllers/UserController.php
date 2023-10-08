<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
     // View dang nhap
     public function loginview()
     {
         if(empty($_COOKIE['id']))
         {
         $cookie=0;
         }
         else
         $cookie=$_COOKIE['id'];
         if(isset($cookie)){
         $info=DB::table('taikhoan')->where('MaTaiKhoan',$cookie)->select('*');
         $info = $info->get();
         return view("login",['loginError'=>"",'SignUpError'=>"",'ck'=>$cookie],compact('info'));
         } 
         else
         {
             $info=null;
         return view("login",['loginError'=>"",'SignUpError'=>"",'ck'=>$cookie],compact('info'));
         }
     }
    
     //Dang xuat
     public function logout()
     {
         setcookie("id", null, time()-3600); 
         return view("login",['loginError'=>"",'SignUpError'=>""]);
     }
     // Kiem Tra Dang Nhap
     public function dangnhap()
     {
         $username= $_GET['user_name'];
         $password=$_GET['pass_word'];
         $tk = DB::table('taikhoan')->select('*');
         $tk=$tk->get();
         foreach($tk as $row)
            {
         if($username==$row->TaiKhoan && $password==$row->MatKhau)
         {
             $giays = DB::table('giay')->select('*');
             $giays = $giays->get();
             setcookie("id",$row->MaTaiKhoan, time()+3600);
             return view("home",compact('giays'));break;
         }
     }
          return view("login",['loginError'=>"Sai mật khẩu hoặc tài khoản",'SignUpError'=>""]);
     }
     // Dang Ky
     public function dangky()
     {
         $username= $_GET['user_name'];
         $password=$_GET['pass_word'];
         $confirm=$_GET['confirm_pass'];
         $tk = DB::table('taikhoan')->select('*');
         $tk=$tk->get();
         foreach($tk as $row){
         if($username==$row->TaiKhoan)
         {
             return view("login",['SignUpError'=>"Tên Đăng Nhập Tồn Tại",'loginError'=>""]);
         }}
        if($password!=$confirm)
        {
         return view("login",['SignUpError'=>"Mật Khẩu Không Trùng khớp",'loginError'=>""]);
        }
        else
        {
         DB::table('taikhoan')->insert(
             array(
                     'MaTaiKhoan' => (DB::table('taikhoan')->max('MaTaiKhoan'))+1,
                    'TaiKhoan'     =>   $username, 
                    'MatKhau'   =>   $password,
                    'Email'=>'',
                    'Phone'=>'',
                    'DiaChi'=>'',
                    'HoTen'=>'',
                    'IsAdmin'=> 0,
                    'Avatar'=>'',
                    'TrangThai'=>''
             )
        );
        return view("login",['SignUpError'=>"Đăng Ký Thành Công",'loginError'=>""]);
     }
     }
     public function SendOTP(Request $request)
     {  
        $random_otp=rand(9999,99999); 
        $mail=$request->email;
        Mail::send('otpform',compact('random_otp'),function($email) use ($mail){
        $email->to($mail);
      });
     }
}
