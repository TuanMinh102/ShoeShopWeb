<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    // view form thanh toan
  public function checkoutview()
  {
    if(isset($_COOKIE['id']))
     return view("checkout",['total'=>(new CartController)->gettotal()]);
    return view("checkout",['total'=>0]);
  }
  // thanh toan
  public function thanhtoan()
  {  
    $mahd=DB::table('hoadon')->max('MaHD');
    if(isset($_COOKIE['id']))
    {   
        DB::table('hoadon')->insert(
            array(
                    'MaHD' => ($mahd+1),
                   'NgayLapHD'  => Carbon::now(), 
                   'MaTaiKhoan' =>  $_COOKIE['id'],
                   'NoiChuyen'=>$_GET['address'],
                   'TinhTrang'=>'Đang Chờ',
            )
       );
       DB::table('ct_hoadon')->insert(
        array(
                'MaHD' => ($mahd+1),
               'MaGiay'  => $this->getProducts_string(), 
               'SoLuong' =>  $this->get_total_amount(),
               'DonGia'=> (new CartController)->gettotal(),
               'HoTen'=>$_GET['first_name'],
               'Email'=>$_GET['email'],
               'Phone'=>$_GET['phone'],
               'Note'=>$_GET['comment'],
        )
   );
        (new CartController)->xoatoanbo();
        $this->SendMail();
       return view("checkout",['total'=>(new CartController)->gettotal()]);
    }
    return (new UserController)->loginview();
  }
  // lay ma cac san pham trong gio hang
  public function getProducts_string()
  {  $string="";
    if(isset($_COOKIE['id']))
    {   
        $products = DB::table('giay')
        ->join('giohang', 'giay.MaGiay', '=', 'giohang.MaSanPham')->where('MaTaiKhoan',$_COOKIE['id'])
        ->select('giay.*', 'giohang.SoLuong')
        ->get();
        foreach($products as $row)
        {
            $tmp=strval($row->MaGiay);
           $string.= $tmp.",";
        }
       } return $string;
  }
  // lay tong so luong cac san pham trong gio hang
  public function get_total_amount()
  {   $amount=0;
    if(isset($_COOKIE['id']))
    {   
        $products = DB::table('giay')
        ->join('giohang', 'giay.MaGiay', '=', 'giohang.MaSanPham')
        ->where('MaTaiKhoan',$_COOKIE['id'])
        ->select('giay.*', 'giohang.SoLuong')
        ->get();
        foreach($products as $row)
        {
          $amount+=$row->SoLuong;
        }
       } return $amount;
  }
   public function SendMail()
   {
    if(isset($_COOKIE['id']))
    {
      $user=DB::table('ct_hoadon')
      ->join('hoadon','hoadon.MaHD','=','ct_hoadon.MaHD')
      ->where('hoadon.MaTaiKhoan','=',$_COOKIE['id'])
      ->select('ct_hoadon.HoTen','ct_hoadon.Email')
      ->get();
      foreach($user as $row)
      {
         $name=$row->HoTen;
        $mail=$row->Email;
      }
     
       Mail::send('mailform',compact('name','mail'),function($email){
      $user2=DB::table('ct_hoadon')
      ->join('hoadon','hoadon.MaHD','=','ct_hoadon.MaHD')
      ->where('hoadon.MaTaiKhoan','=',$_COOKIE['id'])
      ->select('ct_hoadon.HoTen','ct_hoadon.Email')
      ->get();
      foreach($user2 as $row2)
       $mail2=$row2->Email;
      $email->to($mail2);
    });
    }
   }
}
