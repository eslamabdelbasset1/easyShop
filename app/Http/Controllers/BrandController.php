<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    //All Category
    public function index()
    {
        $brands = Brand::latest()->paginate(3);
//        $trash_cat = Brand::onlyTrashed()->latest()->paginate(3);

//        $brands = DB::table('brands')->paginate(1);
//        Query Builder Join
//        $brands = DB::table('brands')->join('users', 'brands.user_id', 'users.id')
//            ->select('brands.*', 'users.name')->paginate(3);
        return view('admin.brand.index', compact('brands'));
    }

    //Add Brand
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|min:5',
            'brand_image' => 'required|mimes:jpg,png,jpeg',
        ],
            [
                'brand_name.required' =>  'Please input brand name',
                'brand_name.min' =>  'Brand longer than 5 chars',
            ]
        );
        //    Generate new image if found??!
        $brand_image = $request->file('brand_image');
        $name_generation = hexdec(uniqid());
        $img_extension = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_generation.'.'. $img_extension;
        $upload_location = 'images/brand/';
        $last_image = $upload_location.$img_name;
        $brand_image->move($upload_location,$img_name);

        Brand::create([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_image,
            'created_at' => Carbon::now()
        ]);

//        $brand = new Category;
//        $brand->brand_name = $request->brand_name;
//        $brand->user_id = Auth::user()->id;
//        $brand->save();

        //Query Builder
//        $data = array();
//        $data[brand_name] = $request->brand_name;
//        $data[user_id] = Auth::user()->id;
//        DB::table('brands')->insert($data);

        return redirect()->back()->with('success', 'Brand inserted successfully');
    }

    // Edit Brand
    public function edit($id)
    {
        $brands = Brand::findOrfail($id);
//        Query Builder
//        $brands = DB::table('brands')->where('id', $id)->first();
        return view('admin.brand.edit', compact('brands'));
    }
    // Update Brand
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'brand_name' => 'required|min:5',
        ],
            [
                'brand_name.required' =>  'Please input brand name',
                'brand_name.min' =>  'Brand longer than 5 chars',
            ]
        );
        $old_image = $request->old_image;
        //    Generate new image if found??!
        $brand_image = $request->brand_image;
        if ($brand_image != '') {
            $name_generation = hexdec(uniqid());
            $img_extension = strtolower($brand_image->getClientOriginalExtension());
//            dd($img_extension);
            $img_name = $name_generation.'.'. $img_extension;
            $upload_location = 'images/brand/';
            $last_image = $upload_location.$img_name;
            $brand_image->move($upload_location,$img_name);
            unlink($old_image);
            Brand::findOrfail($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_image,
                'created_at' => Carbon::now()
            ]);

            return redirect()->route('all_brand')->with('success', 'Brand updated successfully');
        }else {
            $x = Brand::findOrfail($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('all_brand')->with('success', 'Brand updated successfully');
        }


    }
}
