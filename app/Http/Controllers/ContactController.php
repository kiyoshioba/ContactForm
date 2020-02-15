<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use DB;
use App\Mail\ContactSendmail;
use App\Contact;

class ContactController extends Controller
{

    public function create()
    {
        // フォーム入力画面の表示
        return view('contact.create');
    }
    // 問い合わせ情報の保存兼確認画面の表示
    public function confirm(Request $request)
    {
         //バリデーションの実行（問題があればエラーを表示）
        $request->validate([
            'user_name' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'file' => 'nullable',
            'score'=> 'nullable',
            'body'  => 'required',
        ]);
         // 入力画面から受け取ったinput値の取得
        $inputs = $request->all();

        //確認画面に入力内容を反映
        return view('contact.confirm', [
            'inputs' => $inputs,
        ]);
    }
    // 問い合わせ情報の保存＆メールの送信
    public function store(Request $request)
    {
        $params = $request->validate([
            'user_name' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'file' => 'nullable',
            'score'=> 'nullable',
            'body' => 'required',
        ]);

        Contact::create($params);

        return view('contact.thanks');

    }


    public function board(Request $request){
        $posts = Contact::orderBy('created_at', 'desc')->paginate(20);

        return view('board.index', ['posts' => $posts]);
    }
    




    public function show($post_id)
    {
        $post = Contact::findOrFail($post_id);
    
        return view('posts.show', [
            'post' => $post,
        ]);
    }

}