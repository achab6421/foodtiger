<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\LoginRequest;
use App\Models\User;

/**
 * 處理使用者登入相關功能的控制器
 */
class LoginController extends Controller
{
    /**
     * 顯示登入表單頁面
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * 處理使用者登入請求
     * @param LoginRequest $request 登入請求資料
     * @return \Illuminate\Http\RedirectResponse
     * @throws ValidationException 當登入失敗時拋出驗證異常
     */
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        
        if (!$user) {
            return redirect()->back()
                ->with('error_msg', [
                    'title' => '登入失敗',
                    'text' => '沒有該帳號資料'
                ]);
        }
        
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard')
                ->with('success_msg', [
                    'title' => '登入成功',
                    'text' => '歡迎回來！'
                ]);
        }

        throw ValidationException::withMessages([
            'password' => ['密碼不正確。'],
        ]);
    }

    /**
     * 處理使用者登出請求
     * @param Request $request HTTP請求
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')
            ->with('success_msg', [
                'title' => '登出成功',
                'text' => '您已成功登出系統'
            ]);
    }
}
