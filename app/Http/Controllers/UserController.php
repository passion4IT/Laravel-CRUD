<?php

namespace App\Http\Controllers;

use App\APIUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use function redirect;
use function route;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        $users = APIUser::all();
        return view('users.index', ['users' => $users]);
    }

    /**
     * @param APIUser $user
     *
     * @return View
     */
    public function showUser(APIUser $user)
    {
        return view('users.show', [
            'user' => $user,
            'action' => route('edit_user', ['apiUser' => $user->id]),
            'methodType' => 'PUT'
        ]);
    }

    /**
     * @return View
     */
    public function createUser()
    {
        return view('users.show', [
            'user' => new APIUser(),
            'action' => route('store_user'),
            'methodType' => 'POST'
        ]);
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'country' => 'required'
        ]);

        APIUser::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'active' => true,
            'country' => $request->input('country'),

        ]);

        return redirect('/');
    }

    /**
     * @param APIUser $apiUser
     * @param Request $request
     *
     * @return RedirectResponse|Redirector
     */
    public function edit(APIUser $apiUser, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'country' => 'required'
        ]);

        $apiUser->update($request->all());
        return redirect('/');
    }
}
