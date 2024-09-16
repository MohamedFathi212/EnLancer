<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function index()
    {
        // $categories = DB::table('categories')->get();
        $categories = Category::get();
        $title = 'Categories';
        return view('categories.index', [
            'categories' => $categories,
            'title' => 'Categories',
        ]);
    }

    public function show($id)
    {
        // $category = DB::table('categories')->where('id', $id)->first();
        // $category = Category::where( 'id', '=',$id)->first();
        // $category = Category::find($id);
        $category = Category::findOrFail($id); // equal 404
        if($category == null){
            abort(404);
        }

        return view('categories.show', [
            'category' => $category
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
//         dd($request->name,
//                 //   $request->input('name'),
//                 //   $request->post('name'),
//                 //   $request->get('name'),
//                 //   $request['name'],
//                 //   $request->query('name'),
// );

                $category = new  Category();
                $category->name = $request->input('name');
                $category->description = $request->input('description');
                $category->parent_id= $request->input('parent_id');
                $category->slug =Str::slug($category->name);
                $category->save();

                // PRG => POST REDIRECT GET

                return redirect('/categories');
            }

    public function edit($id)
    {
        $category = Category::findorFail($id);
        return view('categories.edit',compact('category'));
    }

    public function update( Request $request ,string $id)
    {
        $category =Category::findorFail($id);
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->parent_id= $request->input('parent_id');
        $category->slug =Str::slug($category->name);
        $category->save();

        // PRG => POST REDIRECT GET

        return redirect('/categories');
}
    public function destroy($id)
    {
        Category::where( 'id', '=',$id)->delete();
        return redirect('/categories'); 
    }


}
