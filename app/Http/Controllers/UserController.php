<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller {

    public function register(Request $request) {
        $hasher = app()->make('hash');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $hasher->make($request->input('password'));
        $register = User::create([
                    'username' => $username,
                    'email' => $email,
                    'password' => $password,
        ]);
        if ($register) {
            $res['success'] = true;
            $res['message'] = 'Success register!';
            return response($res);
        } else {
            $res['success'] = false;
            $res['message'] = 'Failed to register!';
            return response($res, 400);
        }
    }

    public function get_user(Request $request, $id) {
        $user = User::where('id', $id)->get();
        if ($user) {
            $res['success'] = true;
            $res['message'] = $user;

            return response($res);
        } else {
            $res['success'] = false;
            $res['message'] = 'Cannot find user!';

            return response($res, 400);
        }
    }

    public function get_all_user(Request $request) {
        $user = User::all();
        if ($user) {
            $res['success'] = true;
            $res['message'] = $user;

            return response($res);
        } else {
            $res['success'] = false;
            $res['message'] = 'Cannot find user!';

            return response($res, 400);
        }
    }

    public function get_loged_in_user(Request $request, $token) {
        $user = User::where('api_token', $token)->get();
        if ($user) {
            $res['success'] = true;
            $res['message'] = $user;
            return response($res);
        } else {
            $res['success'] = false;
            $res['message'] = 'Cannot find user!';

            return response($res, 400);
        }
    }

}
