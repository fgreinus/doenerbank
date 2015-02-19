<?php namespace Doenerbank\Http\Controllers\Admin;

use Doenerbank\Http\Requests;
use Doenerbank\Http\Controllers\Controller;

use Doenerbank\Models\OrderDay;
use Illuminate\Http\Request;

class OrderDayController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$orderDays = OrderDay::with('manager')
			->get();

		return view('admin/orderday/index', ['orderDays' => $orderDays]);
	}
}
