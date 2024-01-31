<?php

namespace App\Http\Services\Admin;

use App\Http\Dao\Admin\MenuDao;
use Illuminate\Support\Facades\Auth;

class MenuService{


    protected MenuDao $menuDao;

    public function __construct(MenuDao $menuDao)
    {
        $this->menuDao=$menuDao;
    }

    public function menuList(){
        $auth =Auth::user();
        $data=['role_id'=>$auth->role_id];
        return $this->menuDao->menuList($data);
    }





}
