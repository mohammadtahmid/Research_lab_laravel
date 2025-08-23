<?php

namespace App\Http\Controllers;
use App\Models\Logo;

use App\Models\Slider;
use App\Models\Article;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\TeacherDetails;
use App\Models\Teacher_personal;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Facades\File;
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
public function teacher_info()
{
    $teachers = Teacher_personal::all();
    $teacher_details = TeacherDetails::all();
    return view('admin.teacher_info', compact('teachers','teacher_details'));
}

    //upload teacher info
    public function teacher_personal(Request $request){
    // Validation
    $request->validate([
        'name'        => 'required|string|max:255',
        'designation' => 'required|string|max:255',
        'university'  => 'required|string|max:255',
        'email' => 'required|email|unique:teacher_personals,email',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $folderName = str_replace(' ', '_', strtolower($request->name));
        $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('uploads/' . $folderName), $fileName);
        $imagePath = 'uploads/' . $folderName . '/' . $fileName;
    }

    // Insert Data
    Teacher_personal::create([
        'image'       => $imagePath,
        'name'        => $request->name,
        'designation' => $request->designation,
        'university'  => $request->university,
        'location'    => $request->location,
        'call'        => $request->call,
        'email'       => $request->email,
        'biography'   => $request->biography,
        'facebook'    => $request->facebook,
        'linkedin'    => $request->linkedin,
        'github'      => $request->github,
    ]);

    return redirect()->route('teacher_info')->with('success', 'Teacher Information Saved Successfully!');
    }

    //Teacher personal Delete
    public function delete_teacher_personal($id)
    {
        $teacher = Teacher_personal::findOrFail($id);

        if($teacher->image && file_exists(public_path($teacher->image))){
            unlink(public_path($teacher->image));
        }

        $teacher->delete();

        return redirect()->back()->with('success', 'Teacher deleted successfully.');
    }

    // Edit page
        public function teacher_personal_edit($id)
        {
            $teacher = Teacher_personal::findOrFail($id);
            return view('admin.teacher_personal_edit', compact('teacher'));
        }

    // Update teacher info
    public function update_teacher_personal(Request $request, $id)
    {
        $teacher = Teacher_personal::findOrFail($id);

        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'email' => 'required|email|unique:teacher_personals,email,'.$teacher->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            if($teacher->image && file_exists(public_path($teacher->image))){
                unlink(public_path($teacher->image));
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $oldFolder = pathinfo($teacher->image, PATHINFO_DIRNAME);
            $image->move(public_path($oldFolder), $imageName);
            $data['image'] = $oldFolder . '/' . $imageName;
        } else {
            $data['image'] = $teacher->image; // keep old image
        }

        $teacher->update($data);

        return redirect()->route('teacher_info')->with('success', 'Teacher updated successfully.');
    }

    //Teacher Details Upload
    public function teacher_detail_store(Request $request){
        // Validation
        $request->validate([
            'edu_year' => 'required|string|max:10',
            'edu_degree' => 'required|string|max:255',
            'edu_university' => 'required|string|max:255',
            'edu_location' => 'nullable|string|max:255',
            'pro_start' => 'nullable|string|max:10',
            'pro_end' => 'nullable|string|max:10',
            'pro_designation' => 'nullable|string|max:255',
            'pro_organization' => 'nullable|string|max:255',
            'pro_location' => 'nullable|string|max:255',
            'award_year' => 'nullable|string|max:10',
            'award_org' => 'nullable|string|max:255',
            'award_location' => 'nullable|string|max:255',
            'award_responsibility' => 'nullable|string|max:255',
        ]);

        // Save data
        TeacherDetails::create($request->all());

        return redirect()->route('teacher_info')->with('success', 'Teacher information uploaded successfully.');
    }

    //delete teacher details
    public function delete_teacher_detail($id)
    {
        $detail = TeacherDetails::findOrFail($id);
        $detail->delete();

        return redirect()->back()->with('success', 'Teacher detail deleted successfully.');
    }


public function teacher_detail_edit($id)
{
    $detail = TeacherDetails::findOrFail($id);
    return view('admin.teacher_detail_edit', compact('detail'));
}

    // Update teacher detail
public function teacher_detail_update(Request $request, $id)
    {
        $detail = TeacherDetails::findOrFail($id);

        $request->validate([
            'edu_year' => 'nullable|string|max:10',
            'edu_degree' => 'nullable|string|max:255',
            'edu_university' => 'nullable|string|max:255',
            'edu_location' => 'nullable|string|max:255',
            'pro_start' => 'nullable|string|max:10',
            'pro_end' => 'nullable|string|max:10',
            'pro_designation' => 'nullable|string|max:255',
            'pro_organization' => 'nullable|string|max:255',
            'pro_location' => 'nullable|string|max:255',
            'award_year' => 'nullable|string|max:10',
            'award_org' => 'nullable|string|max:255',
            'award_location' => 'nullable|string|max:255',
            'award_responsibility' => 'nullable|string|max:255',
        ]);

        $data = $request->all();
        $detail->update($data);

        return redirect()->route('teacher_info')->with('success', 'Teacher detail updated successfully.');
    }


    //article start here
    public function view_article(){
        $articles = Article::all();
        return view('admin.view_article', compact('articles'));
    }

    //upload article here
    public function research_paper(Request $request){
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'authors' => 'required|string|max:255',
            'abstract' => 'nullable|string',
            'keywords' => 'nullable|string',
            'paper_year' => 'required|integer|min:1900|max:2099',
            'paper_date' => 'required|date',
            'journal' => 'nullable|string|max:255',
            'doi' => 'nullable|string|max:255',
            'paper_file' => 'required|mimes:pdf|max:10240', // 10MB limit
        ]);

        // Handle file upload
        if ($request->hasFile('paper_file')) {
            $file = $request->file('paper_file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/research_papers/'), $fileName);
            $data['paper_file'] = 'uploads/research_papers/' . $fileName;
        }

        Article::create($data);

        return redirect()->back()->with('success', 'Research Paper uploaded successfully!');

    }

}
