<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use App\Models\Multipicture;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class AboutController extends Controller
{
    public function homeAbout()
    {
        $homeAbout = HomeAbout::latest()->get();
        return view('admin.home.index', compact('homeAbout'));
    }
    public function addAbout()
    {
        return view('admin.home.create');
    }
    public function storeAbout(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:home_abouts|max:255',
            'short_desc' => 'required|unique:home_abouts|min:5',
            'long_desc' => 'required|unique:home_abouts|min:5',
        ],
            [
                'title.required' =>  'Please enter about title',
                'title.min' =>  'Category long than 5 chars',
            ]
        );
        HomeAbout::create([
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
        ]);
        return redirect()->route('home.about')->with('success', 'About inserted successfully');
    }
    public function editAbout($id)
    {
        $about = HomeAbout::findOrfail($id);
        return view('admin.home.edit', compact('about'));
    }
    // Update Brand
    public function updateAbout(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'short_desc' => 'required|min:5',
            'long_desc' => 'required|min:5',
        ],
            [
                'title.required' =>  'Please enter about title',
                'title.min' =>  'Category long than 5 chars',
            ]
        );
        HomeAbout::findOrfail($id)->update([
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            ]);
            $notification = array(
                'message' => 'About updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('home.about')->with($notification);
    }

    // Delete Brand
    public function deleteAbout($id)
    {
        HomeAbout::findOrFail($id)->delete();
        $notification = array(
            'message' => 'About deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }


    public function portfolio()
    {
        $images = Multipicture::all();
        return view('pages.portfolio', compact('images'));
    }
}
