<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //All Category
    public function index()
    {
        $categories = Category::latest()->paginate(3);
//        $categories = DB::table('categories')->paginate(1);
//        Query Builder Join
//        $categories = DB::table('categories')->join('users', 'categories.user_id', 'users.id')
//            ->select('categories.*', 'users.name')->paginate(3);
        return view('admin.category.index', compact('categories'));
    }
    //Add Category
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
            [
                'category_name.required' =>  'Please enter category name',
                'category_name.max' =>  'Category less than 255 chars',
            ]
        );
        Category::create([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

//        $category = new Category;
//        $category->category_name = $request->category_name;
//        $category->user_id = Auth::user()->id;
//        $category->save();

        //Query Builder
//        $data = array();
//        $data[category_name] = $request->category_name;
//        $data[user_id] = Auth::user()->id;
//        DB::table('categories')->insert($data);

        return redirect()->back()->with('success', 'Category inserted successful');
    }

// Edit Category
    public function edit($id)
    {
        $categories = Category::findOrfail($id);
//        Query Builder
//        $categories = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.edit', compact('categories'));
    }
    // Update Category
    public function update(Request $request,$id)
    {
        $update = Category::findOrfail($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
        ]);
//        Query builder
//        $data = array();
//        $data['category_name'] = $request->category_name;
//        $data['user_id'] = Auth::user()->id;
//        DB::table('categories')->where('id', $id)->update($data);

        return redirect()->route('all_categories')->with('success', 'Category updated successfully');
    }
}
