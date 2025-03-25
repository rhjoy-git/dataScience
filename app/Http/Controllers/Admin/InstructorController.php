<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InstructorController extends Controller
{
    public function index()
    {
        return view('admin.instructors.index', ['instructors' => Instructor::all(), 'models' => $this->getModelNames()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'qualifications' => 'required',
            'experience' => 'required|json',
            'profile_image' => 'required|image',
            'linkedin' => 'required|url'
        ]);

        if ($request->hasFile('profile_image')) {
            $validated['profile_image'] = $request->file('profile_image')->store('instructors', 'public');
        }

        Instructor::create($validated);
        return redirect()->route('admin.instructors.index');
    }

    // Added methods for modal functionality
    public function update(Request $request, Instructor $instructor)
    {
        $validated = $request->validate([
            'name' => 'required',
            'qualifications' => 'required',
            'experience' => 'required|json',
            'profile_image' => 'nullable|image',
            'linkedin' => 'required|url'
        ]);

        if ($request->hasFile('profile_image')) {
            Storage::delete($instructor->profile_image);
            $validated['profile_image'] = $request->file('profile_image')->store('instructors', 'public');
        }

        $instructor->update($validated);
        return redirect()->route('admin.instructors.index');
    }

    public function destroy(Instructor $instructor)
    {
        Storage::delete($instructor->profile_image);
        $instructor->delete();
        return redirect()->route('admin.instructors.index');
    }

    private function getModelNames()
    {
        return [
            'NavLink',
            'Curriculum',
            'CourseDetail',
            'Tool',
            'CourseData',
            'CourseSummary',
            'CourseOffering',
            'EnrollmentPoint',
            'Instructor',
            'Requirement',
            'Faq',
            'Testimonial',
            'Graduate',
            'FooterData'
        ];
    }
}
