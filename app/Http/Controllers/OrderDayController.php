<?php namespace Doenerbank\Http\Controllers\Admin;

use Doenerbank\Http\Requests;
use Doenerbank\Http\Controllers\Controller;

use Doenerbank\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$orderDays = Order::with('allocated_user')
			->get();

		return view('admin/oders/index', ['orders' => $orderDays]);
	}
}
