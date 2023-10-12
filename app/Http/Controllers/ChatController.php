<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChatController extends Controller
{
    public function chatview()
    {
        if(empty($_COOKIE['id']))
         {
         $cookie='0';
         }
         else
         $cookie='1';
        $list=DB::table('chatbox')->join('taikhoan','chatbox.MaTK','=','taikhoan.MaTaiKhoan')->select('*')->get();
        return view("chat",compact('list','cookie'));
    }
    public function get_content_chat($id)
    {
        if(empty($_COOKIE['id']))
        {
        $cookie='0';
        }
        else
        $cookie='1';
        $chat=DB::table('chatbox')->join('history_chat','chatbox.chatID','=','history_chat.MaChat')->where('chatbox.MaTK',$id)->select('*')->get();
        $list=DB::table('chatbox')->join('taikhoan','chatbox.MaTK','=','taikhoan.MaTaiKhoan')->select('*')->get();
        return view('chat',compact('chat','list','cookie'));
    }
    public function sendMessage(Request $request)
    {
        $history=DB::table('history_chat')->insert(
            array(
                'MaChat'=>$request->chatid,
                'NoiDung'=> $request->message,
                'ThoiGian'=> Carbon::now(),
                'IsUser'=>$request->is_user,
            ));
    }
}
