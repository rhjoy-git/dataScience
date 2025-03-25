<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseDetailController extends Controller
{
    public function index()
    {
        return view('admin.course-details.index', [
            'courseDetails' => CourseDetail::all(),
            'models' => $this->getModelNames()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'section_title' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'details' => 'nullable|array',
            'parts' => 'nullable|array',
            'footer' => 'nullable|array'
        ]);

        // Handle icon upload
        if ($request->hasFile('icon')) {
            $validated['icon'] = $request->file('icon')->store('course-details', 'public');
        }

        // Convert arrays to JSON
        $validated['details'] = json_encode($validated['details'] ?? []);
        $validated['parts'] = json_encode($validated['parts'] ?? []);
        $validated['footer'] = json_encode($validated['footer'] ?? []);

        CourseDetail::create($validated);
        return redirect()->route('admin.coursedetails.index');
    }

    public function update(Request $request, CourseDetail $courseDetail)
    {
        $validated = $request->validate([
            'section_title' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'details' => 'nullable|array',
            'parts' => 'nullable|array',
            'footer' => 'nullable|array'
        ]);

        // Handle icon update
        if ($request->hasFile('icon')) {
            if ($courseDetail->icon) {
                Storage::delete($courseDetail->icon);
            }
            $validated['icon'] = $request->file('icon')->store('course-details', 'public');
        }

        // Convert arrays to JSON
        $validated['details'] = json_encode($validated['details'] ?? []);
        $validated['parts'] = json_encode($validated['parts'] ?? []);
        $validated['footer'] = json_encode($validated['footer'] ?? []);

        $courseDetail->update($validated);
        return redirect()->route('admin.coursedetails.index');
    }

    public function destroy(CourseDetail $courseDetail)
    {
        if ($courseDetail->icon) {
            Storage::delete($courseDetail->icon);
        }
        $courseDetail->delete();
        return redirect()->route('admin.coursedetails.index');
    }

    private function getModelNames()
    {
        return [
            'NavLinks',
            'Course-Datas',
            'Course-Summary',
            'Curriculum',
            'Course-Details',
            'Tools',
            'Course-Offering',
            'Enrollment-Point',
            'Instructor',
            'Requirement',
            'Faqs',
            'Testimonials',
            'Graduates',
            'FooterDatas'
        ];
    }
}