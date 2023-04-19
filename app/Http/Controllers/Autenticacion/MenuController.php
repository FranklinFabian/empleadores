<?php

namespace App\Http\Controllers\Autenticacion;


use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;


class MenuController extends Controller
{

    public static function getMenu(){
        $menu = new Menu();
        $item= $menu->getMenu(Auth::user()->id);
        $contador = 0;
        foreach ( $item as $first_level) {
            $res[$contador]['section'] = $first_level->section;
            $submodules = $menu->getSubMenu($first_level->id,Auth::user()->id);
            $contador++;
            foreach ($submodules as $second_level){
                $res[$contador]['title'] = $second_level->title;
                $res[$contador]['root'] = $second_level->root;
                $res[$contador]['icon'] = $second_level->icon;
                $res[$contador]['page'] = $second_level->page;
                $res[$contador]['new-tab'] = $second_level->newtab;
                $contador++;
            }
            $contador++;
        }

        return $res;
    }
}
