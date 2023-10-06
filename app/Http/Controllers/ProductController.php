<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
      // Chi Tiet San Pham
      public function chitiet()
      {
          $giays = DB::table('giay')->select('*');
          $giays = $giays->get();  
          $products=DB::table('giay')->where('MaGiay',1)->select('*');
          $products = $products->get();
          return view("detail",compact('giays','products'));
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
 
}
