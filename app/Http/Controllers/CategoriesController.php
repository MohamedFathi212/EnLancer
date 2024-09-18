<?php


namespace App\Http\Controllers;

use App\Models\Category;
use App\Rules\filterRules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{

    protected $rules = [
        'name' => [
        'required',
        'string',
        'between:3,255',
        'filter',
    ],

        'parent_id' => ['nullable', 'integer', 'exists:categories,id'],
        'description' => ['nullable', 'string'],  // Fixed 'descripton' typo
        'art_file' => ['nullable', 'image'],
    ];

    protected $message = [
        'name.required' => 'The :attribute field is mandatory',
    ];

    public function index()
    {
        $categories = Category::get();
        return view('categories.index', [
            'categories' => $categories,
            'title' => 'Categories',
            'flashMessage' => session('success'),
        ]);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.show', [
            'category' => $category
        ]);
    }

    public function create()
    {
        $parents = Category::all();
        $category = new Category();
        return view('categories.create', compact('parents', 'category'));
    }

    public function store(Request $request)
    {
        $clean = $request->validate($this->rules(), $this->message);

        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->parent_id = $request->input('parent_id');
        $category->slug = Str::slug($category->name);
        $category->save();

        return redirect('/categories')->with('success', 'Category Created');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $parents = Category::all();
        return view('categories.edit', compact('category', 'parents'));
    }

    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $clean = $request->validate($this->rules(), $this->message);

        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->parent_id = $request->input('parent_id');
        $category->slug = Str::slug($category->name);
        $category->save();

        return redirect('/categories')->with('success', 'Category Updated');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        Session::flash('success', 'Category Deleted');
        return redirect('/categories');
    }

    public function rules()
    {
        $rules = $this->rules;

        // $rules['name'][] = 'filter';
        // $rules['name'][] = new filterRules();    بس لازم تكون عامل rules وتستدعي منهاا object


        // Custom validation rule for name field
        // $rules['name'][] = function ($attribute, $value, $fail) {
            // if (strtolower($value) === 'god') {
            //     $fail('This word is not allowed in the :attribute field.');
        //     }
        // };

        return $rules;  // Ensure the rules array is returned
    }
}




###################################################################################################################
    ################################    Old Code           ###############################################
###################################################################################################################

// namespace App\Http\Controllers;

// use App\Models\Category;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Str;

// class CategoriesController extends Controller
// {


//     protected $rules = [
//         'name' => ['required', 'string', 'between:3,255'],
//         'parent_id' => ['nullable', 'integer', 'exists:categories,id'],
//         'descripton' => ['nullable', 'string'],
//         'art_file' => ['nullable', 'image'],
//         // 'art_file' =>['nullable','mimes:png,jpg1,jpeg'],
//     ];

//      protected $message = [
//         'name.required' => 'The :attribute field is mandatory',
//         // 'description.required' => 'The :attribute field is mandatory',
//         // 'image' => 'The :attribute must be an image',
//         // 'art_file.required' => 'The :attribute must be an image',
//     ];


//     public function index()
//     {
//         // $categories = DB::table('categories')->get();
//         $categories = Category::get();
//         $title = 'Categories';
//         return view('categories.index', [
//             'categories' => $categories,
//             'title' => 'Categories',
//             'flashMessage' => session('success'),
//         ]);
//     }

//     public function show($id)
//     {
//         // $category = DB::table('categories')->where('id', $id)->first();
//         // $category = Category::where( 'id', '=',$id)->first();
//         // $category = Category::find($id);
//         $category = Category::findOrFail($id); // equal 404
//         if ($category == null) {
//             abort(404);
//         }

//         return view('categories.show', [
//             'category' => $category
//         ]);
//     }


//     public function create()
//     {
//         $parents = Category::all();
//         $category = new Category();
//         return view('categories.create', compact('parents', 'category'));
//     }

//     public function store(Request $request)
//     {


//         // $rules =  $request->validate([
//         //     'name' =>['required','string','max:150,min:2'],
//         //     'parent_id' =>['nullable','integer','exists:categories,id'],
//         //     'descripton' => ['nullable','string'],
//         //     'art_file' =>['nullable','image'],
//         //     // 'art_file' =>['nullable','mimes:png,jpg1,jpeg'],
//         // ]);


//         $clean = $request->validate($this->rules, $this->message);

//         ///////1////////////

//         // dd($clean,$request->all());

//         ////// 2 ///////////
//         // $this->validate($request,$rules, $message);

//         ////// 3 ///////////
//         // $validator = Validator::make($request->all(),$rules,$message);
//         // $clean = $validator->validate();

//         // if($validator->fails()){
//         //     return redirect()->back()->withErrors($validator);
//         // }

//         //         dd($request->name,
//         //                 //   $request->input('name'),
//         //                 //   $request->post('name'),
//         //                 //   $request->get('name'),
//         //                 //   $request['name'],
//         //                 //   $request->query('name'),
//         // );

//         $category = new  Category();
//         $category->name = $request->input('name');
//         $category->description = $request->input('description');
//         $category->parent_id = $request->input('parent_id');
//         $category->slug = Str::slug($category->name);
//         $category->save();

//         // PRG => POST REDIRECT GET

//         return redirect('/categories')->with('success', 'Category Created');
//     }

//     public function edit($id)
//     {
//         $category = Category::findorFail($id);
//         $parents = Category::all();
//         return view('categories.edit', compact('category', 'parents'));
//     }

//     public function update(Request $request, string $id)
//     {
//         $category = Category::findorFail($id);
//         $clean = $request->validate($this->rules, $this->message);

//         $category->name = $request->input('name');
//         $category->description = $request->input('description');
//         $category->parent_id = $request->input('parent_id');
//         $category->slug = Str::slug($category->name);
//         $category->save();



//         // PRG => POST REDIRECT GET

//         return redirect('/categories')->with('success', 'Category Updated');;
//     }
//     public function destroy($id)
//     {
//         // DB::table('categories')->where('id',$id)->delete();

//         // Category::where( 'id', '=',$id)->delete();

//         // $category = Category::findOrFail($id);
//         // $category->delete();


//         Category::destroy($id);
//         // session()->flash('success','Category Deleted');
//         Session::flash('success', 'Category Deleted');
//         return redirect('/categories');
//         // ->with('success','Category Deleted');
//     }
// }
