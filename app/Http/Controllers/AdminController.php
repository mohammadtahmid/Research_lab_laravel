<?php

namespace App\Http\Controllers;
use App\Models\Logo;

use App\Models\Slider;
use App\Models\Student;
use Illuminate\Http\Request;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    //view logo
    public function view_logo(){
        $logos = Logo::all();

        return view('admin.logo', compact('logos'));
    }


    //Add logo
    public function add_logo(Request $request){
    $request->validate([
        'logo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
    ]);

    if ($request->hasFile('logo')) {
        $file = $request->file('logo');

        $fileName = time() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('uploads/logo'), $fileName);

        $logo = new Logo;
        $logo->image = 'uploads/logo/' . $fileName;
        $logo->save();

        return redirect()->back()->with('success', 'Logo uploaded successfully!');
    }

    return redirect()->back()->with('error', 'No file selected.');

    }

    //delete logo
        public function delete_logo($id){
            $logo = Logo::find($id);

            if ($logo) {
                // check if file exists in public folder
                if (file_exists(public_path($logo->image))) {
                    unlink(public_path($logo->image)); // delete the file
                }

                $logo->delete();

                return redirect()->back()->with('success', 'Logo deleted successfully!');
            } else {
                return redirect()->back()->with('error', 'Logo not found!');
            }
        }


    //Slider page open
    public function view_slide(){
        $sliders = Slider::paginate(3);
        return view('admin.view_slide',compact('sliders'));
    }

    public function upload_slider(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'title' => 'required|string|max:255',
            'description'  => 'required|string',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/sliders'), $imageName);

        $slider = new Slider();
        $slider->image = 'uploads/sliders/' . $imageName;
        $slider->title = $request->title;
        $slider->description  = $request->description;
        $slider->save();

        return redirect()->back()->with('success', 'Slider uploaded successfully!');
    }

    //Delete Slider
    public function delete_slider($id){
        $slider = Slider::findOrFail($id);

        if(file_exists(public_path($slider->image))){
            unlink(public_path($slider->image));
        }

        $slider->delete();

        return redirect()->back()->with('success', 'Slider deleted successfully!');
    }

    // Show edit form
    public function edit_slider($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.edit_slider', compact('slider'));
    }

    // Update data
    public function update_slider(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $slider = Slider::findOrFail($id);


        if ($request->hasFile('image')) {

            if (file_exists(public_path($slider->image))) {
                unlink(public_path($slider->image));
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/sliders'), $imageName);
            $slider->image = 'uploads/sliders/'.$imageName;
        }

        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->save();

        toastr()->success('Slider updated successfully!');
        return redirect('view_slide');
    }


    //Student list part start
    public function student_list(){
        $students = Student::latest()->paginate(10);
        return view('admin.student_list', compact('students'));
    }

    //Student Info update
    public function upload_student(Request $request){
        // Validation
        $request->validate([
            'name'        => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'phone'       => 'nullable|string|max:20',
            'email'       => 'required|email|unique:students,email',
            'facebook'    => 'nullable|url',
            'twitter'     => 'nullable|url',
            'github'      => 'nullable|url',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only([
            'name', 'designation', 'phone', 'email', 'facebook', 'twitter', 'github'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/students'), $filename);
            $data['image'] = 'uploads/students/' . $filename; // save relative path
        }

        Student::create($data);
        toastr()->info('Student added successfully!');
        return redirect()->route('student_list')->with('success', 'Student added successfully!');
    }

        // Delete student
    public function delete_student($id){
        $student = Student::findOrFail($id);

        if(file_exists(public_path($student->image))){
            unlink(public_path($student->image));
        }

        $student->delete();

        return redirect()->back()->with('success', 'Student info deleted successfully!');
    }


    //Teacher information start
    public function teacher_info(){

        return view('admin.teacher_info');
    }

}
