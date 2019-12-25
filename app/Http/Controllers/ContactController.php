<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Mail\ContactSendmail;
use App\Contact;

class ContactController extends Controller
{
    public function index()
    {
        // フォーム入力画面の表示
        return view('contact.index');
    }

    public function confirm(Request $request)
    {
         //バリデーションの実行（問題があればエラーを表示）
        $request->validate([
            'user_name' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'body'  => 'required',
        ]);
        
         // 入力画面から受け取ったinput値の取得
        $inputs = $request->all();

        //確認画面に入力内容を反映
        return view('contact.confirm', [
            'inputs' => $inputs,
        ]);
    }
        //添付ファイルの保存
    public function store(Request $request){
        $request->file('file')->store('');
     }

    public function send(Request $request)
    {
        //バリデーションを実行（結果に問題があれば処理を中断してエラーを返す）
        $request->validate([
            'user_name' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'body'  => 'required'
        ]);

        //入力画面からactionの値を取得
        $action = $request->input('action');
        
        //入力画面からaction以外の値を取得
        $inputs = $request->except('action');

        //actionの値で(内容の修正と送信確定に分岐
        if($action !== 'submit'){
            return redirect()
                ->route('contact.index')
                ->withInput($inputs);

        } else {
            $data = session()->all();
            DB::table('ContactForm')->insert([
                    'user_name' => $data["user_name"],
                    'email' => $data["email"],
                    'title' => $data["title"],
                    'body' => $data["body"],
            ]);
            //メールアドレスにメールを送信
            // \Mail::to($inputs['email'])->send(new ContactSendmail($inputs));
            //トークンの発効（再送信防止用）
            $request->session()->regenerateToken();

            //送信完了画面表示
            return view('contact.thanks');
        }
    }
}