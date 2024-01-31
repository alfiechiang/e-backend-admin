<?php

namespace Database\Seeders;

use App\Models\AdminMenu;
use App\Models\AdminMenuRole;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::truncate();
        Role::create([
            'en_name'=>'ADMIN',
            'cn_name'=>'超級管理員',
            'level'=>0
        ]);
        Role::create([
            'en_name'=>'EMPLOYEE_A',
            'cn_name'=>'員工A',
            'level'=>1
        ]);
        Role::create([
            'en_name'=>'EMPLOYEE_B',
            'cn_name'=>'員工B',
            'level'=>2
        ]);

        $menu1 =AdminMenu::where('name','用戶詳情')->first();
        $menu2 =AdminMenu::where('name','商品中心')->first();
        $menu3 =AdminMenu::where('name','商品列表')->first();
        $menu4 =AdminMenu::where('name','商品種類')->first();
        $menu5 =AdminMenu::where('name','訂單資訊')->first();
        AdminMenuRole::truncate();
        $admin =Role::where('en_name','ADMIN')->first();

        $adminPriviledge =[
            ['role_id'=>$admin->id,'menu_id'=>$menu1->id],
            ['role_id'=>$admin->id,'menu_id'=>$menu2->id],
            ['role_id'=>$admin->id,'menu_id'=>$menu3->id],
            ['role_id'=>$admin->id,'menu_id'=>$menu4->id],
            ['role_id'=>$admin->id,'menu_id'=>$menu5->id]
        ];

        AdminMenuRole::insert($adminPriviledge);
    }
}
