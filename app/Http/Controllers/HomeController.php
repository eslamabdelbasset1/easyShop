<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Slider;
use Illuminate\Http\Request;
// import the Intervention Image Manager Class
use Illuminate\Support\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
class HomeController extends Controller
{
    public function slider()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function addSlider()
    {
        return view('admin.slider.create');
    }
    public function storeSlider(Request $request)
    {
//    Generate new image if found??!
        $slider_image = $request->file('image');

        // Intervention Image
        $name_generation = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('images/slider/'.$name_generation);
        $last_image = 'images/slider/'.$name_generation;
        Slider::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_image,
            ]);
        return redirect()->route('home.slider')->with('success', 'Slider inserted successfully');
    }
    // Edit Brand
    public function editSlider($id)
    {
        $sliders = Slider::findOrfail($id);
        return view('admin.slider.edit', compact('sliders'));
    }
    // Update Brand
    public function updateSlider(Request $request, $id)
    {
        $old_image = $request->old_image;
        //    Generate new image if found??!
        $slider_image = $request->image;
        if ($slider_image != '') {
//            $name_generation = hexdec(uniqid());
//            $img_extension = strtolower($slider_image->getClientOriginalExtension());
////            dd($img_extension);
//            $img_name = $name_generation.'.'. $img_extension;
//            $upload_location = 'images/slider/';
//            $last_image = $upload_location.$img_name;
//            $slider_image->move($upload_location,$img_name);
            // Intervention Image
            $name_generation = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
            Image::make($slider_image)->resize(1920,1088)->save('images/slider/'.$name_generation);
            $last_image = 'images/slider/'.$name_generation;
            unlink($old_image);
            Slider::findOrfail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_image,
            ]);
            $notification = array(
                'message' => 'Contact updated successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('home.slider')->with($notification);
        }else {
            Slider::findOrfail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            $notification = array(
                'message' => 'Contact updated successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('home.slider')->with($notification);
        }
    }

    // Delete Brand
    public function deleteSlider($id)
    {
        $image = Slider::findOrFail($id);
        $old_image = $image->image;
        unlink($old_image);
        Slider::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Slider deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
