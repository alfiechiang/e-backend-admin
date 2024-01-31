<?php

namespace Database\Seeders;

use App\Models\AdminMenu;
use App\Models\AdminMenuTree;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminMenu::truncate();
        $insertData=[
            ['name'=>'用戶詳情' ,'flag'=>1],
            ['name'=>'商品中心' ,'flag'=>1],
            ['name'=>'商品列表' ,'flag'=>0],
            ['name'=>'商品種類' ,'flag'=>0],
            ['name'=>'訂單資訊' ,'flag'=>0],
        ];

        DB::table('admin_menus')->insert($insertData);
        
        $menu1 =AdminMenu::where('name','用戶詳情')->first();
        $menu2 =AdminMenu::where('name','商品中心')->first();
        $menu3 =AdminMenu::where('name','商品列表')->first();
        $menu4 =AdminMenu::where('name','商品種類')->first();
        $menu5 =AdminMenu::where('name','訂單資訊')->first();

        AdminMenuTree::truncate();
        $insertData=[
            ['root'=>1,'ancestor'=>$menu1->id,'descendant'=>$menu1->id,'distance'=>0],
            ['root'=>1,'ancestor'=>$menu2->id,'descendant'=>$menu2->id,'distance'=>0],
            ['root'=>0,'ancestor'=>$menu3->id,'descendant'=>$menu3->id,'distance'=>0],
            ['root'=>0,'ancestor'=>$menu2->id,'descendant'=>$menu3->id,'distance'=>1],
            ['root'=>0,'ancestor'=>$menu4->id,'descendant'=>$menu4->id,'distance'=>0],
            ['root'=>0,'ancestor'=>$menu2->id,'descendant'=>$menu4->id,'distance'=>1],
            ['root'=>0,'ancestor'=>$menu5->id,'descendant'=>$menu5->id,'distance'=>0],
            ['root'=>0,'ancestor'=>$menu2->id,'descendant'=>$menu5->id,'distance'=>1],
        ];

        DB::table('admin_menu_trees')->insert($insertData);

    }
}
