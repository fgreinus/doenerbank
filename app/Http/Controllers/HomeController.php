<?php namespace Doenerbank\Http\Controllers;

use Doenerbank\Models\Article;
use Doenerbank\Models\Order;
use Doenerbank\Models\OrderLine;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

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
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        $articles = Article::all();
        $orders = Order::with('orderLines', 'allocatedUser')
            ->orderBy('date', 'DESC')
            ->get();

		return view('home', ['articles' => $articles, 'orders' => $orders]);
	}

    public function postIndex()
    {
        $data = [
            'article_id' => Input::get('article_id'),
            'order_id' => Input::get('order_id'),
            'amount' => Input::get('amount'),
            'notes' => Input::get('notes')
        ];

        $rules = [
            'article_id' => 'required|exists:articles,id',
            'order_id' => 'required|exists:orders,id',
            'amount' => 'required|numeric'
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails())
            return Redirect::back()->withErrors($validator);

        OrderLine::create(array_merge($data, [
            'user_id' => Auth::user()->id
        ]));

        return Redirect::back();
    }

}
