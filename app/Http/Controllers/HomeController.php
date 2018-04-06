<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$books      = Auth::user()->books;
		$addressees = Auth::user()->addressee;
		return view('home')->with(['books' => $books, 'addressees' => $addressees]);
	}

	/**
	 * 显示所有栏目
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function market(Request $request)
	{
		$tag        = $request->get('tag') ?: "全部";
		$allTag     = Book::all()->pluck('tag')->unique();
		$isErrorTag = (Book::where('tag', $tag)->count() == 0) && ($tag != "全部"); // 判断get提交的Tag是不是真的Tag
		if ($tag == "全部" || $isErrorTag) { // 全部书籍 或者 输入了错误的标签
			$books = Book::paginate(8);
		} else {
			$books = Book::where('tag', $tag)->paginate(8);
		}
		return view('market')->with([
			'books'      => $books,
			'isErrorTag' => $isErrorTag,
			'allTag'     => $allTag,
			'currentTag' => $tag
		]);
	}

	/**
	 * 书籍详情
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function bookDetail($id)
	{
		$book = Book::find($id);
		return view('detail')->with([
			'book' => $book
		]);
	}

	/**
	 * 获得文章列表
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function bookFeed($id)
	{
		$book = Book::find($id);
		// 测试数据
		return json_encode([
			['title' => '《System Shock》开源', 'link' => 'https://www.solidot.org/story?sid=56059'],
			['title' => '《System Shock》开源', 'link' => 'https://www.solidot.org/story?sid=56059'],
			['title' => '《System Shock》开源', 'link' => 'https://www.solidot.org/story?sid=56059'],
			['title' => '《System Shock》开源', 'link' => 'https://www.solidot.org/story?sid=56059'],
			['title' => '《System Shock》开源', 'link' => 'https://www.solidot.org/story?sid=56059'],
			['title' => '《System Shock》开源', 'link' => 'https://www.solidot.org/story?sid=56059'],
			['title' => '《System Shock》开源', 'link' => 'https://www.solidot.org/story?sid=56059']
		]);
	}
}
