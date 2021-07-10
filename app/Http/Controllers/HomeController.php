<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Title;

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
        $new_books = Title::orderBy('updated_at', 'DESC')->limit(4)->get();//最新4つを取得
        return view('home', compact('new_books', 'pickup_books', 'data'));
       
    }
    
    public function create()
    {
        $books = Book::where('status', 1)->orderBy('updated_at', 'DESC')->get();
        return view('create', compact('books'));
    }
    
    public function title($id)
    {
        $user = \Auth::user();
        $title =  Book::where('status', 1)->where('title_id', $id)->first();
        $titles = Title::where('id',$title['title_id'])->first();
        $subtitles =  Book::where('status', 1)->where('title_id', $id)->get();
        // dd($title);
        return view('title', compact( 'title', 'titles', 'subtitles'));
    }
    
    public function author()
    {
        $user = \Auth::user();
        $count_user_books = Book::where('status', 1)->where('user_id',  $user['id'])->get()->count();//作品数を表示
        

        $titles =  Book::where('status', 1)->where('user_id',  $user['id'])->groupBy('title_id')->get(['title_id']);
        
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
        
        // 同じタイトルがあるか確認
        $exist_title = Title::where('name' , $data['title'])->where('user_id' , $data['user_id'])->first();
        // dd($exist_category);
        if (empty($exist_title['id']) ){
                //タイトルをインサート
                $title_id = Title::insertGetId(['name' => $data['title'],'user_id' => $data['user_id'] ]);
            }else{
                $title_id = $exist_title['id'];
            }

        
        // dd($title_id);

        
        
        // 同じカテゴリーがあるか確認
        $exist_category = Category::where('name' , $data['category'])->first();
        // dd($exist_category);
        if (empty($exist_category['id']) ){
                //カテゴリーをインサート
                $category_id = Category::insertGetId(['name' => $data['category'] ]);
            }else{
                $category_id = $exist_category['id'];
            }
        // dd($category_id);

        //タグのIDが判明する
        // タグIDをBooksテーブルに入れてあげる
        $book_id = Book::insertGetId([
            'image' => $path[1],
            'title_id' => $title_id,
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
        $user = \Auth::user();
        
        $book = Book::where('status', 1)->where('id', $id)->where('user_id',  $user['id'])->first();
        // dd($user);
        
        $books = Book::where('status', 1)->orderBy('updated_at', 'DESC')->limit(4)->get();//statusが1の全て取得:最新4つを取得
        // dd($books);
        
        $titles = Title::where('user_id', $user['id'])->get();
        $categories = Category::get()->all();
        // dd($categories);
        
        return view('edit', compact( 'book', 'books', 'titles', 'categories'));
    }
    
    public static function getMyCount() {
        $count_books = Book::where('status', 1)->get()->count();//作品数を表示
		return $count_books;
	}
    
    public function update(Request $request , $id){
        $inputs = $request->all();
        // dd($inputs);
        Book::where('id', $id)->update([
            'title_id' => $inputs['title_id'],
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
