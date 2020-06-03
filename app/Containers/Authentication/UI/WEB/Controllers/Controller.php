<?php

namespace App\Containers\Authentication\UI\WEB\Controllers;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Authentication\UI\WEB\Requests\LoginRequest;
use App\Containers\Authentication\UI\WEB\Requests\LoginUserRequest;
use App\Containers\Authentication\UI\WEB\Requests\LogoutRequest;

use App\Ship\Parents\Controllers\WebController;
use App\Ship\Transporters\DataTransporter;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

/**
 * Class Controller
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class Controller extends WebController
{
  /**
   * @return  \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function showLoginPage()
  {
    return view('authentication::login');
  }

  /**
   * @return  \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function logoutAdmin(LogoutRequest $request)
  {
    Apiato::call('Authentication@WebLogoutAction');
    return redirect('login');
  }

  /**
   * @param \App\Containers\Authentication\UI\WEB\Requests\LoginRequest $request
   *
   * @return  \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function loginAdmin(LoginRequest $request)
  {
    try {
      $result = Apiato::call('Authentication@WebAdminLoginAction', [new DataTransporter($request)]);
    } catch (Exception $e) {
      return redirect('login')->with('status', $e->getMessage());
    }

    return is_array($result) ? redirect('login')->with($result) : redirect('dashboard');
  }

  public function loginUser(LoginUserRequest $request)
  {
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
      return response(['message' => true], Response::HTTP_OK);
    }
    return response(['Не правильный логин или пароль'], Response::HTTP_CONFLICT);
  }

  public function logoutUser()
  {
    Auth::logout();
    return redirect('/');
  }
}
