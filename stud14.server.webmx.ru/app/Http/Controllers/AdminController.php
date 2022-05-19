<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
	
	public function acConsole () {
		$data = DB::table("posts")->where("parent", "=", 0)->get();
		$attachdata = DB::table("posts")->where("parent", "!=", 0)->get();
		return view("console.index")->with(["data" => $data,  "attachdata" => $attachdata]);
	}
	
	//update/{id}
	public function acConsoleFormUpdate ($id) {
		$data = DB::table("posts")->where("id", "=", $id)->first();
		$attachdata = DB::table("posts")->where("parent", "=", $data->id)->get();
		$flag = 1;
		$menu = DB::table("posts")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("posts")->where("parent", "!=", 0)->get();
		return view("console.modification")->with(["data" => $data,  "attachdata" => $attachdata, "flag" => $flag, "menu" => $menu, "attachmenu" => $attachmenu]);
	}

	//add
	public function acConsoleFormAdd (Request $request) {
		$flag = 1;
		$menu = DB::table("posts")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("posts")->where("parent", "!=", 0)->get();
		return view("console.modification")->with(["parent" => $request->input("parent"),"flag" => $flag, "menu" => $menu, "attachmenu" => $attachmenu]);
	}
	
	public function acModification (Request $request) {
		//добавление страницы
		if ($request->input("id") == null) {
			$id = DB::table("posts")->insertGetId(
				[
					'title' => $request->input('title'),
					'content' => '',
					'name' => $request->input('name'),
					'parent' => $request->input('parent'),
					'menu' => $request->input('menu'),
					'img' => ''
				]);
		}
		//изменение страницы
		else {
			$id = $request->input("id");
			DB::table("posts")->where("id", $id)->update(
				[
					'title' => $request->input('title'),
					'content' => '',
					'name' => $request->input('name'),
					'parent' => $request->input('parent'),
					'menu' => $request->input('menu'),
					'img' => ''
				]
			);
		}
		return redirect ('/console/update/' . $id);
	}

	//admin/modification
	public function acDataModification (Request $request) {
		//добавление раздела
		if ($request->input("parent") != "0" && $request->input("menu") == "1" && $request->input("id") == null) {
			$id = DB::table("posts")->insertGetId(
				[
					'title' => $request->input('title'),
					'content' => '',
					'name' => $request->input('name'),
					'parent' => $request->input('parent'),
					'menu' => $request->input('menu'),
					'img' => ''
				]
			);
		}
		elseif ($request->input("parent") != "0" && $request->input("menu") == "1") {
			$id = $request->input("id");
			DB::table("posts")->where("id", $id)->update(
				[
					'title' => $request->input('title'),
					'content' => '',
					'name' => $request->input('name'),
					'parent' => $request->input('parent'),
					'menu' => $request->input('menu'),
					'img' => ''
				]
			);
		}
		//изменение записи
		elseif ($request->input("id") != null) {
			if ($request->hasFile('image')) {
				$image = $request->file('image')->getClientOriginalName();
				$request->file('image')->move("images/asset/", $image);
			} else $image = $request->input('path');	
			$id = $request->input("id");
			DB::table("posts")->where("id", $id)->update(
				[
					'title' => $request->input('title'),
					'content' => $request->input('content'),
					'name' => $request->input('name'),
					'menu' => $request->input('menu'),
					'img' => $image
				]
			);
		}
		//добавление записи
		else {
			if ($request->hasFile('image')) {
				$image = $request->file('image')->getClientOriginalName();
				$request->file('image')->move("images/asset/", $image);
			} else $image = '';	
			$id = DB::table("posts")->insertGetId(
				[
					'title' => $request->input('title'),
					'content' => $request->input('content'),
					'name' => $request->input('name'),
					'parent' => $request->input('parent'),
					'menu' => $request->input('menu'),
					'img' => $image
				]
			);
		
		}
		return redirect ('/console/update/' . $id);
	}	

	function acAddPage() {
		$flag = 2;
		$menu = DB::table("posts")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("posts")->where("parent", "!=", 0)->get();
		return view("console.modification")->with(["flag" => $flag, "menu" => $menu, "attachmenu" => $attachmenu]);
	}

	//admin/delete/{id}
	function acDataDelete ($id) {
		DB::table("posts")->where("id", $id)->delete();
		DB::table("posts")->where("parent", $id)->delete();
		return back();
	}

	function acAddChapter (Request $request) {
		$flag = 3;
		$menu = DB::table("posts")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("posts")->where("parent", "!=", 0)->get();
		return view("console.modification")->with(["parent" => $request->input("parent"),"flag" => $flag, "menu" => $menu, "attachmenu" => $attachmenu]);
	}
	
}