<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // ログイン機能を使うために必要！
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Adminuser;

class AuthController extends Controller
{
    // GETに対応：画面を表示
    public function showRegister()
    {
        return view('auth.register');
    }

    // POSTに対応：データを保存
    public function register(RegisterRequest $request)
    {
        $data = $request->only(['name', 'email', 'password']);
        $data['password'] = Hash::make($data['password']);
        $user = Adminuser::create($data);
        Auth::login($user);
        return redirect('/admin');
    }

    // 1. ログイン画面を表示する (GET)
    public function showLogin()
    {
        return view('auth.login');
    }
    // 2. ログイン処理を実行する (POST)
    public function login(Request $request)
    {
        $user = Adminuser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // ハッシュ化を忘れずに！
        ]);
        Auth::login($user);

        return redirect('/admin');
    }

    // 3. ログアウト処理 (POST)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
