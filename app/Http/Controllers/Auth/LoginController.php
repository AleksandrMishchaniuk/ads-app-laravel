<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Factories\Interfaces\UserFactoryInterface;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    protected $user_repository;

    /**
     * @var UserFactoryInterface
     */
    protected $user_factory;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        UserRepositoryInterface $user_repository,
        UserFactoryInterface $user_factory
    ) {
        $this->user_repository = $user_repository;
        $this->user_factory = $user_factory;
    }

    /**
     * Login or register user.
     */
    public function login(LoginRequest $request)
    {
        if (\Auth::attempt($request->only(['username', 'password']))) {
            return redirect()->route('root');
        }

        $username = $request->input('username');

        $user = $this->user_repository->getByUsername($username);

        if (!$user) {
            $user = $this->user_factory->create($request->only(['username', 'password']));
        } else {
            $request->session()->flash('error', "User with name '$username' already exists and password is wrong");
            return redirect()->route('root');
        }

        $this->user_repository->save($user);

        \Auth::login($user);

        return redirect()->route('root');
    }

    public function logout()
    {
        \Auth::logout();
        return redirect()->route('root');
    }
}
