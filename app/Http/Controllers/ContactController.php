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
         //バリデーションの実行（問題があればエラーを表示）（ファイル形式やサイズの記述はまだ）
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
        // アップロードしたファイルの保存（パターン1：ファイルを保存できていないっぽい？？）
        // if($request->hasFile('file')){//バリデーションでチェックするなら、ここは無くてもいいかも
        //     //アップロードに成功しているか確認
        //     if($request->file('file')->isValid()){
        //       //ここの記述の参考URL（https://teratail.com/questions/128702）
        //     }
        //   }

        // アップロードしたファイルの保存（パターン2）
        // $request->file('file')->store('');
        // ↑参考URL（https://reffect.co.jp/laravel/how_to_upload_file_in_laravel）


        // バリデーションを実行
        $params = $request->validate([
            'user_name' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'file' => 'nullable',
            'score'=> 'nullable',
            'body' => 'required',
        ]);
        $inputs = $request->all();

        // フォームから受け取ったactionの値を取得
        $action = $request->input('action');
        // フォームから受け取ったactionを除いたinputの値を取得
        $inputs = $request->except('action');
        //actionの値で分岐
        if($action !== 'submit'){
            return redirect()
                ->route('contact.create')
                ->withInput($inputs);
        }else{
        // 新規パラメーターの作成
        Contact::create($params);
        // 入力されたメールアドレスにメールを送信
        \Mail::to($inputs['email'])->send(new ContactSendmail($inputs));
        // 再送信を防ぐためにトークンを再発行
        $request->session()->regenerateToken();
        // 送信完了ページのviewを表示させる
        return view('contact.thanks');
        }


    }

    // public function board(Request $request){
    //     $posts = Contact::orderBy('created_at', 'desc')->paginate(20);

    //     return view('board.index', ['posts' => $posts]);
    // }
    



    // public function show($post_id)
    // {
    //     $post = Contact::findOrFail($post_id);
    
    //     return view('posts.show', [
    //         'post' => $post,
    //     ]);
    // }

}