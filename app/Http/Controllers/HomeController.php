<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

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
        $data = Book::where('status', 1)->get();
        // dd($data);
        // ピックアップ
        $pickup_books = Book::inRandomOrder()->where('status', 1)->get();//ランダムに表示
        //最新情報
        $new_books = Book::where('status', 1)->orderBy('updated_at', 'DESC')->limit(4)->get();//statusが1の全て取得:最新4つを取得
        return view('home', compact('new_books', 'pickup_books', 'data'));
    }
    
    public function create()
    {
        $books = Book::where('status', 1)->orderBy('updated_at', 'DESC')->get();
        return view('create', compact('books'));
    }
    
    public function title()
    {
        return view('title');
    }
    
    public function author()
    {
        $count_user_books = Book::where('status', 1)->where('user_id',  $user['id'])->get()->count();//作品数を表示
        

        $titles =  Book::where('status', 1)->where('user_id',  $user['id'])->groupBy('title')->get(['title']);
        // dd($titles);
        
        return view('author', compact('count_user_books','titles'));
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
        
        // 同じカテゴリーがあるか確認
        $exist_category = Category::where('name' , $data['category'])->first();
        // dd($exist_category);
        if (empty($exist_category['id']) ){
                //カテゴリーをインサート
                $category_id = Category::insertGetId(['name' => $data['category'] ]);
            }else{
                $category_id = $exist_category['id'];
            }
        dd($category_id);
// 
        //タグのIDが判明する
        // タグIDをBooksテーブルに入れてあげる
        $book_id = Book::insertGetId([
            'image' => $path[1],
            'title' => $data['title'],
            'subtitle' => $data['subtitle'],
            'author' => $data['author'],
            'content' => $data['content'],
            'category_id' => $category_id,
             'user_id' => $data['user_id'], 
             'status' => 1
        ]);
        
        // リダイレクト処理
        return redirect()->route('home');
    }
    
    public function edit($id){
        $book = Book::where('status', 1)->where('id', $id)->where('user_id',  $user['id'])->first();
        // dd($book);
        
        $books = Book::where('status', 1)->orderBy('updated_at', 'DESC')->limit(4)->get();//statusが1の全て取得:最新4つを取得
        // dd($books);
        
        $categories = Category::get()->all();
        // dd($categories);
        
        return view('edit', compact( 'book', 'books', 'categories'));
    }
    
    public static function getMyCount() {
        $count_books = Book::where('status', 1)->get()->count();//作品数を表示
		return $count_books;
	}
    
    public function update(Request $request , $id){
        $inputs = $request->all();
        // dd($inputs);
        Book::where('id', $id)->update([
            'title' => $inputs['title'],
            'subtitle' => $inputs['subtitle'],
            'author' => $inputs['author'],
            'author' => $inputs['author'],
            'category_id' => $inputs['category_id'],
            'content' => $inputs['content']  ] );
        return redirect()->route('home')->with('success', '更新しました！');
    }
    
    public function delete(Request $request , $id){
        $inputs = $request->all();
        // 論理削除
        Book::where('id', $id)->update(['status' => 2 ] );
        // 物理削除
        // Book::where('id', $id)->delete();
        return redirect()->route('home')->with('success', '削除しました！');
    }

}
