<?php

class UserController extends BaseController {

  public function getIndex() {
    if (Auth::guest()) {
      return Redirect::to('user/login');
    } else {
      return 'Hello, ' . Auth::user()->username;
    }
  }

  public function getLogin() {
    if (Auth::guest()) {
      return View::make('login');
    } else {
      return Redirect::to('subs');
    }
  }

  public function postLogin() {
    $userdata = array(
      'username' => Input::get('username'),
      'password' => Input::get('password'),
    );

    if (Auth::attempt($userdata)) {
      return Redirect::to('user');
    } else {
      return Redirect::to('user/login')->with('login_errors', true);
    }
  }

  public function getRegister() {
    if (Auth::guest()) {
      return View::make('register');
    } else {
      return Redirect::to('subs');
    }
  }

  public function postRegister() {
    if (false) {
      return Redirect::to('user/register')->with('registration_errors', true);
    }
    $user = new User;
    $user->username = Input::get('username');
    $user->email = Input::get('email');
    $user->password = Hash::make(Input::get('password'));
    $user->save();
    return Redirect::to('user/login');
  }

  public function getLogout() {
    Auth::logout();
    return Redirect::to('user/login');
  }

}
