<?php

namespace App\Http\Dao\Admin;

use App\Models\AdminMenu;
use App\Models\AdminMenuRole;
use App\Models\AdminMenuTree;
use Illuminate\Support\Facades\Log;

class MenuDao{

    public function menuList(array $data){

        $menu_ids =AdminMenuRole::where('role_id',$data['role_id'])->pluck('menu_id');
        $menuMap =AdminMenu::all()->keyBy('id');

        $root_ids = AdminMenuTree::where('root',1)->pluck('ancestor');
        $trees=AdminMenuTree::whereIn('ancestor',$root_ids)->get();
        $menus= $this->bigMenu($root_ids,$trees,$menuMap);
        return $menus;
    }

    private function bigMenu($menu_ids,$trees,$menuMap){

        $menus=[];

        foreach($menu_ids as $menu_id){
            $menu=[
                'name'=>$menuMap[$menu_id]->name,
                'flag'=>$menuMap[$menu_id]->flag,
                'menus'=>[]
            ];

            foreach($trees as $tree){
                if($tree->ancestor==$menu_id && $tree->distance==1){
                    Log::info($menu_id);
                    $menu['menus'][]=$this->bigMenu([$tree->descendant],$trees,$menuMap);
                }

            }

            $menus[]=$menu;
        }

        return  $menus;
    }
}