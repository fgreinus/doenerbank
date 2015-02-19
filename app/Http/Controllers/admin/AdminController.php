<?php namespace Doenerbank\Http\Controllers\Admin;

use Doenerbank\Http\Requests;
use Doenerbank\Http\Controllers\Controller;

use Doenerbank\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$users = User::all();

		return view('admin/index', ['users' => $users]);
	}

	public function getDeleteUser($userId)
	{
		/** @var User $user */
		$user = User::findOrFail($userId);
		$user->delete();

		return redirect(route('admin_index'));
	}

	public function getEditUser($userId)
	{
		$user = User::findOrFail($userId);

	}
}
