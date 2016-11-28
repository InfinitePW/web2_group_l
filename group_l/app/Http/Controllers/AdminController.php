<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menus;

class AdminController extends Controller
{
    public function index(){
    	$menu = new Menus();
        $result_menu = $menu->getParent();

    	return view('front.admin.page.index')->with('menu', $result_menu);
    }
    /*=============================== EDIT ===============================*/
    public function edit(Request $request){
    	$id = $request->input('id');
    	$menu = new Menus();
        $result_menu = $menu->getParentCond($id);
    	
    	return view('front.admin.edit.index')->with('menu', $result_menu);
    }
    public function update(Request $request){
    	$id = $request->input('menu_id');
    	$menu_title = $request->input('menu_title');
    	$menu_level = $request->input('menu_level');
    	
    	$menu = new Menus();
        $result_menu = $menu->updateMenu($id, $menu_title, $menu_level);

        return redirect()->to('/admin');
    }
    /*=============================== DELETE ===============================*/
    public function delete(Request $request){
    	$id = $request->input('id');

    	$menu = new Menus();
        $result_menu = $menu->deleteMenu($id);

        return redirect()->to('/admin');
    }
    /*=============================== ADD ===============================*/
    public function addView(Request $request){
    	return view('front.admin.add.index');
    }
    public function add(Request $request){
    	$id = $request->input('menu_id');
    	$menu_title = $request->input('menu_title');
    	$menu_level = $request->input('menu_level');
    	$menu_parents = $request->input('menu_parents');

    	$menu = new Menus();
        $result_menu = $menu->addMenu($id, $menu_title, $menu_level, $menu_parents);

    	return redirect()->to('/admin');
    }
}