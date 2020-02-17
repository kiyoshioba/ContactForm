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
            'audio' => 'nullable',
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
        // バリデーションの実行
        $params = $request->validate([
            'user_name' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'audio' => 'nullable',
            'score'=> 'nullable',
            'body' => 'required',
        ]);
         // ファイルが複数の場合のアップロード処理
            if(is_array($request->file('audio')))
            {
            $audios=array();
            foreach($request->file('audio') as $file) {
                $uniqueid=uniqid();
                $original_name=$file->getClientOriginalName();
                $size=$file->getSize();
                $extension=$file->getClientOriginalExtension();
                $filename=Carbon::now()->format('Ymd').'_'.$uniqueid.'.'.$extension;
                $audiopath=url('/storage/upload/files/audio/'.$filename);
                $path=$file->storeAs('/upload/files/audio',$filename);
                array_push($audios,$audiopath);
            }
            $all_audios=implode(",",$audios);
            }else{ 
            // ファイルが一つの場合のアップロード処理
            if($request->hasFile('audio')){
                $uniqueid=uniqid();
                $original_name=$request->file('audio')->getClientOriginalName();
                $size=$request->file('audio')->getSize();
                $extension=$request->file('audio')->getClientOriginalExtension();
                $filename=Carbon::now()->format('Ymd').'_'.$uniqueid.'.'.$extension;
                $audiopath=url('/storage/upload/files/audio/'.$filename);
                $path=$file->storeAs('public/upload/files/audio/',$filename);
                $all_audios=$audiopath;
            }
        }
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
        // 送信完了ページのviewを表示させる。
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