<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Response;
use App\Http\Services\Admin\MenuService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    protected MenuService $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService=$menuService;
    }

    public function login(Request $request){

        $credentials = request(['name', 'password']);
        if (! $token = auth('admin')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return Response::format(200,['access_token'=>$token],'請求成功');
    }

    public function logout(Request $request){
        Auth::logout();
        return Response::format(200,[],'請求成功');
    }

    public function menuList(Request $request){
       $res= $this->menuService->menuList();
       return Response::format(200, $res,'請求成功');
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('admin')
        ]);
    }
}
