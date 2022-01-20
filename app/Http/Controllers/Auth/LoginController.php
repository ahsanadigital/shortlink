<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  /*
   |--------------------------------------------------------------------------
   | Login Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles authenticating users for the application and
   | redirecting them to your home screen. The controller uses a trait
   | to conveniently provide its functionality to your applications.
   |
   */

  use AuthenticatesUsers;

  /**
   * Where to redirect users after login.
   *
   * @var string
   */
  protected $redirectTo = RouteServiceProvider::HOME;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  /**
   * Create custom validation to validate
   *
   * @param  \Illuminate\Http\Request  $request->username
   * @param  \Illuminate\Http\Request  $request->password
   * @param  \Illuminate\Http\Request  $request->remember
   * @return \Illuminate\Support\Facades\Response
   */
  private function __login($credentials, $remember)
  {
    $remember     = filter_var($remember, FILTER_VALIDATE_BOOLEAN);
    $authenticate = Auth::attempt($credentials, $remember);

    if($authenticate)
    {
      return response()->json([
        'message' => 'Anda telah berhasil terautentikasi, sistem akan mengarahkan anda ke halaman dasbor dalam waktu 5 detik.',
        'error'   => false,
        'success' => true,
        'status'  => 200,
      ], 200);
    }

    return response()->json([
      'message' => 'Kredensial anda masih salah, silahkan cek kembali apa yang anda ketikan tadi.',
      'error'   => true,
      'success' => false,
      'status'  => 401,
      'throw'   => [
        [
          'file'  => 'LoginController.php',
          'line'  => 96,
          'trace' => 'Illuminate\Support\Facades\Auth',
        ]
      ],
    ], 401);
  }

  /**
   * Handle a login request to the application.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Support\Facades\Response
   */
  public function login(Request $request)
  {
    // Validate User First
    // This is to validate inputs that must be filled
    // during validation
    $request->validate([
      'username' => 'required',
      'password' => 'required|min:5',
    ]);

    // Authenticate user
    $login = $this->__login($request->except(['remember', '_token']), $request->remember);
    return $login;
  }
}
