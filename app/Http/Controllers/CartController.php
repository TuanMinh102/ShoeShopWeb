<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserController;

class CartController extends Controller
{
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
         return view("cart",compact('products'),['total'=>$this->gettotal(),'bill'=>$this->get_historyBill()]);
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
             return back(); // reload lai gio hang khi xoa
         }
         else
         {
             return back();
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
             return redirect()->to("/gh");
         }
         else 
         {   
             return (new UserController)->loginview();
         }
     }
 
   //cap nhat gio hang
   public function capnhatgh(Request $request,$id)
     {   
             $cart= DB::table('giohang')->where('MaTaiKhoan',$_COOKIE['id'])->select('*');
             $cart=$cart->get();
             foreach($cart as $row)
               {
                     if($row->MaSanPham==$id)
                     {
                         $them= DB::table('giohang')
                         ->where('MaSanPham', $id)
                         ->update(['SoLuong'=>$request->SoLuong]);
                     }
               }
 } 
 //lay tong tien trong gio hang
 public  function gettotal()
 {    
   $sum=0;
  if(isset($_COOKIE['id']))
  {   
     $products = DB::table('giay')
     ->join('giohang', 'giay.MaGiay', '=', 'giohang.MaSanPham')->where('MaTaiKhoan',$_COOKIE['id'])
     ->select('giay.*', 'giohang.SoLuong')
     ->get();
     foreach($products as $row)
     {
         $sum2=($row->SoLuong*$row->GiaBan);
         $sum+=$sum2;
     }
    } return $sum;
 }
 // Xoa 1 san pham trong gio hang
 public function delProduct($id)
 {
  DB::table('giohang')->where('MaSanPham',$id)->delete();
 }

 public function get_historyBill()
 {
  if(isset($_COOKIE['id']))
  {
    $his=DB::table('hoadon')->join('ct_hoadon', 'hoadon.MaHD', '=', 'ct_hoadon.MaHD')->where('MaTaiKhoan',$_COOKIE['id'])
   ->select('hoadon.*', 'ct_hoadon.MaGiay','ct_hoadon.SoLuong','ct_hoadon.DonGia','ct_hoadon.HoTen')
   ->get();
  } 
  else{
      $his=DB::table('hoadon')->join('ct_hoadon', 'hoadon.MaHD', '=', 'ct_hoadon.MaHD')->where('MaTaiKhoan',0)
      ->select('hoadon.*', 'ct_hoadon.MaGiay','ct_hoadon.SoLuong','ct_hoadon.DonGia','ct_hoadon.HoTen')
      ->get();
  }
    return $his;
 }
}
