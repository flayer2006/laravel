<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

class UserController extends Controller{
    /**
     * The user repository implementation
     * @var UserRepository
    */
    protected $users;
    /**
     * Create a new controller instance
     * @param UserRepository $users
     * @return void
     */
    public function __construct(UserRepository $users){
        $this->users = $users;
    }
    /**
     * Show the profile for the given user
     * @param int $id
     * @return Response
     */
    public function show($id){
        $user = $this->users->find($id);
        return view('user.profile',['user' => $user]);
    }
}