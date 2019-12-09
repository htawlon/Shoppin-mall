<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class PostController extends Controller
{
    public function getCategories(){
        $cats=Category::get();
        return view ('posts.categories')->with(['cats'=>$cats]);
    }
    public function postNewCategory(Request $request){
        $this->validate($request,[
           'cat_name'=>'required|unique:categories'
        ]);
        $c=new Category();
        $c->cat_name=$request['cat_name'];
        $c->save();
        return redirect()->back()->with('info', 'The new category have been saved.');
    }
    public function getDeleteCategory($id){
       // $c=Category::where('id', $id)->firstOrFail();//first();
        $c=Category::whereId($id)->firstOrFail();//first();
        $c->delete();
        return redirect()->back()->with('info','The selected category have been deleted.');
    }
}
