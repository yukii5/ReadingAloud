<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //book一覧を取得
        // ピックアップ
        $pickup_books = Book::inRandomOrder()->where('status', 1)->get();//ランダムに表示
        // dd($pickup_books);
        //最新情報
        $new_books = Book::where('status', 1)->orderBy('updated_at', 'DESC')->limit(4)->get();//statusが1の全て取得:最新4つを取得
        return view('home', compact('new_books', 'pickup_books'));
    }
    
    public function create()
    {
        
        $user = \Auth::user();
        return view('create', compact('user'));
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        $image = $request->file('image');
            if($request->hasFile('image')){
                $path = \Storage::put('/public', $image);
                $path = explode('/', $path);
            }else{
                $path[1] = null;
            }
        // dd($data);
        // POSTされたデータをDB（booksテーブル）に挿入
        // BookモデルにDBへ保存する命令を出す

        //タグのIDが判明する
        // タグIDをBooksテーブルに入れてあげる
        $book_id = Book::insertGetId([
            'image' => $path[1],
            'title' => $data['title'],
            'subtitle' => $data['subtitle'],
            'author' => $data['author'],
            'content' => $data['content'],
            // 'category_id' => $category_id,
             'user_id' => $data['user_id'], 
             'status' => 1
        ]);
        
        // リダイレクト処理
        return redirect()->route('home');
    }
    
    public function edit($id){
        $user = \Auth::user();
        $book = Book::where('status', 1)->where('id', $id)->where('user_id',  $user['id'])->first();
        // dd($book);
        
        $books = Book::where('status', 1)->orderBy('updated_at', 'DESC')->limit(4)->get();//statusが1の全て取得:最新4つを取得
        // dd($books);
        return view('edit', compact('user', 'book', 'books'));
    }
    
    public static function getMyCount() {
        $count_books = Book::where('status', 1)->get()->count();//作品数を表示
		return $count_books;
	}

}
