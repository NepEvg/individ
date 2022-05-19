<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
	public function acMain () {
		$data = DB::table("posts")->where("name", "main")->first();
		$attachdata = DB::table("posts")->orderBy('id', 'desc')->where("parent", "=", $data->id)->limit(3)->get();
		$menu = DB::table("posts")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("posts")->where("parent", "!=", 0)->get();
		return view("main")->with(["data" => $data, "attachdata" => $attachdata, "menu" => $menu, "attachmenu" => $attachmenu]);
	}
	
	public function acBlog () {
	 	$data = DB::table("posts")->where("name", "blog")->first();
	 	$attachdata = DB::table("posts")->orderBy('id', 'desc')->where("parent", "=", $data->id)->limit(3)->get();
	 	$menu = DB::table("posts")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("posts")->where("parent", "!=", 0)->get();
		return view("blog")->with(["data" => $data, "attachdata" => $attachdata, "menu" => $menu, "attachmenu" => $attachmenu]);
	}

    public function acAssidents () {
		$data = DB::table("posts")->where("name", "assidents")->first();
		$attachdata = DB::table("posts")->where("parent", "=", $data->id)->get(); 
		$menu = DB::table("posts")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("posts")->where("parent", "!=", 0)->get();
		return view("assidents")->with(["data" => $data, "attachdata" => $attachdata, "menu" => $menu, "attachmenu" => $attachmenu]);
	}

	public function acWorld () {
		$data = DB::table("posts")->where("name", "world")->first();
		$attachdata = DB::table("posts")->where("parent", "=", $data->id)->get(); 
		$menu = DB::table("posts")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("posts")->where("parent", "!=", 0)->get();
		return view("world")->with(["data" => $data, "attachdata" => $attachdata, "menu" => $menu, "attachmenu" => $attachmenu]);
	}

	public function acWorldEconomy () {
		$data = DB::table("posts")->where("name", "economy")->first();
		$attachdata = DB::table("posts")->where("parent", "=", $data->id)->get(); 
		$menu = DB::table("posts")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("posts")->where("parent", "!=", 0)->get();
	    return view("economy")->with(["data" => $data, "attachdata" => $attachdata, "menu" => $menu, "attachmenu" => $attachmenu]);
    }

    public function acWorldPolitics () {
		$data = DB::table("posts")->where("name", "politics")->first();
		$attachdata = DB::table("posts")->where("parent", "=", $data->id)->get(); 
		$menu = DB::table("posts")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("posts")->where("parent", "!=", 0)->get();
		return view("politics")->with(["data" => $data, "attachdata" => $attachdata, "menu" => $menu, "attachmenu" => $attachmenu]);
	}

	public function acCulture () {
		$data = DB::table("posts")->where("name", "culture")->first();
		$attachdata = DB::table("posts")->where("parent", "=", $data->id)->get(); 
		$menu = DB::table("posts")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("posts")->where("parent", "!=", 0)->get();
		return view("culture")->with(["data" => $data, "attachdata" => $attachdata, "menu" => $menu, "attachmenu" => $attachmenu]);
	}

	public function acCultureScience () {
		$data = DB::table("posts")->where("name", "science")->first();
		$attachdata = DB::table("posts")->where("parent", "=", $data->id)->get(); 
		$menu = DB::table("posts")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("posts")->where("parent", "!=", 0)->get();
		return view("science")->with(["data" => $data, "attachdata" => $attachdata, "menu" => $menu, "attachmenu" => $attachmenu]);
	}

	public function acCultureSport () {
		$data = DB::table("posts")->where("name", "sport")->first();
		$attachdata = DB::table("posts")->where("parent", "=", $data->id)->get(); 
		$menu = DB::table("posts")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("posts")->where("parent", "!=", 0)->get();
		return view("sport")->with(["data" => $data, "attachdata" => $attachdata, "menu" => $menu, "attachmenu" => $attachmenu]);
	}

	public function acCultureTourism () {
		$data = DB::table("posts")->where("name", "tourism")->first();
		$attachdata = DB::table("posts")->where("parent", "=", $data->id)->get(); 
		$menu = DB::table("posts")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("posts")->where("parent", "!=", 0)->get();
		return view("tourism")->with(["data" => $data, "attachdata" => $attachdata, "menu" => $menu, "attachmenu" => $attachmenu]);
	}

	public function acCultureReligion () {
		$data = DB::table("posts")->where("name", "religion")->first();
		$attachdata = DB::table("posts")->where("parent", "=", $data->id)->get(); 
		$menu = DB::table("posts")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("posts")->where("parent", "!=", 0)->get();
		return view("religion")->with(["data" => $data, "attachdata" => $attachdata, "menu" => $menu, "attachmenu" => $attachmenu]);
	}

	public function acNewPage ($name) {
		$data = DB::table("posts")->where("name", "=", $name)->first();
		$attachdata = DB::table("posts")->where("parent", "=", $data->id)->get();
		$menu = DB::table("posts")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("posts")->where("parent", "!=", 0)->get();
		return view("console.newpage")->with(["name"=>$name,"data" => $data, "attachdata" => $attachdata, "menu" => $menu, "attachmenu" => $attachmenu]);
	}

	public function acNewPageChapter ($name, $chapter) {
		$data = DB::table("posts")->where("name", "=", $chapter)->first();
		$attachdata = DB::table("posts")->where("parent", "=", $data->id)->get();
		$menu = DB::table("posts")->where("parent", "=", 0)->get();
		$attachmenu = DB::table("posts")->where("parent", "!=", 0)->get();
		return view("console.newpage")->with(["name"=>$chapter,"data" => $data, "attachdata" => $attachdata, "menu" => $menu, "attachmenu" => $attachmenu]);
	}
}