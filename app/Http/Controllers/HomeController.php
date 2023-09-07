<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Load San Pham
    public function homeview()
    {
        $giays = DB::table('giay')->select('*');
        $giays = $giays->get();     
        return view("home",compact('giays'));
    }
    // Chi Tiet San Pham
    public function chitiet()
    {
        $giays = DB::table('giay')->select('*');
        $giays = $giays->get();  
        $products=DB::table('giay')->where('MaGiay',1)->select('*');
        $products = $products->get();
        return view("detail",compact('giays','products'));
    }
   // Dang Nhap
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
    public function logout()
    {
        setcookie("id", null, time()-3600); 

        return view("login",['loginError'=>"",'SignUpError'=>""]);
    }
    // Dang Nhap
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
    // Phan loai san pham
    public function Shopview()
    {
        $cats = DB::table('loaigiay')->select('*');
        $cats = $cats->get(); 
        $brand = DB::table('nhacungcap')->select('*');
        $brand = $brand->get(); 
        $products = DB::table('giay')->select('*');
        $products = $products->get(); 
         return view("shop",compact('cats','brand','products'));
    }
    //phan loai theo the loai
    public function Catogories($id)
    { 
        $cats = DB::table('loaigiay')->select('*');
        $cats = $cats->get(); 
        $brand = DB::table('nhacungcap')->select('*');
        $brand = $brand->get(); 
        $products = DB::table('giay')->where('MaLoai',$id)->select('*');
        $products =  $products->get(); 
          return view("shop",compact('cats','brand','products'));
    }
    // phan loai theo hang
    public function Brands($id)
    { 
        $cats = DB::table('loaigiay')->select('*');
        $cats = $cats->get(); 
        $brand = DB::table('nhacungcap')->select('*');
        $brand = $brand->get(); 
        $products = DB::table('giay')->where('MaNcc',$id)->select('*');
        $products =  $products->get(); 
          return view("shop",compact('cats','brand','products'));
    }
    // chi tiet san pham
    public function details($id)
    { 
        $giays = DB::table('giay')->select('*');
        $giays = $giays->get();  
        $products=DB::table('giay')->where('MaGiay',$id)->select('*');
        $products=$products->get();
          return view("detail",compact('products','giays'));
    }
    // tim kiem san pham
    public function timkiem()
    { 
        $cats = DB::table('loaigiay')->select('*');
        $cats = $cats->get(); 
        $brand = DB::table('nhacungcap')->select('*');
        $brand = $brand->get(); 
        $products = DB::table('giay')->where('TenGiay','like','%'.$_GET['search'].'%')->select('*');
        $products = $products->get();  
          return view("shop",compact('products','brand','cats'));
    }

    // lay du lieu gio hang tu tai khoan
    public function getcart()
    {      
        if(isset($_COOKIE['id'])){
        $products = DB::table('giay')
        ->join('giohang', 'giay.MaGiay', '=', 'giohang.MaSanPham')->where('MaTaiKhoan',$_COOKIE['id'])
        ->select('giay.*', 'giohang.SoLuong')
        ->get();
        }
        else
        {
            $products = DB::table('giay')
            ->join('giohang', 'giay.MaGiay', '=', 'giohang.MaSanPham')->where('MaTaiKhoan',0)
            ->select('giay.*', 'giohang.SoLuong')
            ->get();
        }

        return view("cart",compact('products'),['total'=>$this->gettotal()]);
    }
    //xoa toan bo san pham khoi gio hang
    public function xoatoanbo()
    {
        if(isset($_COOKIE['id']))
        {  
            $products = DB::table('giay')
            ->join('giohang', 'giay.MaGiay', '=', 'giohang.MaSanPham')->where('MaTaiKhoan',$_COOKIE['id'])
            ->select('giay.*', 'giohang.SoLuong')
            ->get();
            foreach($products as $row)
            {
                $del=DB::table('giohang')
                ->where('MaSanPham',$row->MaGiay)
                ->delete();
            }
            return view("cart",compact("products"),['total'=>$this->gettotal()]);
        }
        else
        {
            $products = DB::table('giay')
            ->join('giohang', 'giay.MaGiay', '=', 'giohang.MaSanPham')->where('MaTaiKhoan',0)
            ->select('giay.*', 'giohang.SoLuong')
            ->get();
            return view("cart",compact("products"),['total'=>$this->gettotal()]);
        }
        
    }
    //them 1 san pham vao gio hang
    public function addcart($id)
    { 
        if(isset($_COOKIE['id']))
        {
            $flag=false;
            $cart= DB::table('giohang')->where('MaTaiKhoan',$_COOKIE['id'])->select('*');
            $cart=$cart->get();
            foreach($cart as $row)
              {
                    if($row->MaSanPham==$id)
                    {
                        $them= DB::table('giohang')
                        ->where('MaSanPham', $id)
                        ->update(['SoLuong'=>($row->SoLuong)+1]);
                        $flag=true;
                    }
              }  
              if($flag==false)
              {
                DB::table('giohang')->insert(
                    array(
                            'MaGioHang' => (DB::table('giohang')->max('MaGioHang'))+1,
                            'MaTaiKhoan'=>$_COOKIE['id'],
                            'MaSanPham'=>$id,
                            'SoLuong'=> 1,
                    )
               );
              }
              $products = DB::table('giay')
              ->join('giohang', 'giay.MaGiay', '=', 'giohang.MaSanPham')->where('MaTaiKhoan',$_COOKIE['id'])
              ->select('giay.*', 'giohang.SoLuong')
              ->get();
            return view("cart",compact('products'),['total'=>$this->gettotal()]);
        }
        else 
        {
            $giays = DB::table('giay')->select('*');
            $giays = $giays->get();     
            return $this->loginview();
        }
    }
  //lay tong tien trong gio hang
  public  function gettotal()
    {
        if(isset($_COOKIE['id']))
        {
        $sum=0;
        $products = DB::table('giay')
        ->join('giohang', 'giay.MaGiay', '=', 'giohang.MaSanPham')->where('MaTaiKhoan',$_COOKIE['id'])
        ->select('giay.*', 'giohang.SoLuong')
        ->get();
        foreach($products as $row)
        {
            $sum2=($row->SoLuong*$row->GiaBan);
            $sum+=$sum2;
        }
        return $sum;
    }
        else
        return 0;
    }
    public function checkoutview()
    {
        return view("checkout");
    }
}
