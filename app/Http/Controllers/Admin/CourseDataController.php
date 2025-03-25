<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseDataController extends Controller
{
    public function index()
    {
        return view('admin.course-data.index', [
            'courseData' => CourseData::all(),
            'models' => $this->getModelNames()
        ]);
    }

    public function update(Request $request, CourseData $courseData)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',  
            'description' => 'nullable|string',   
            'enrollment_url' => 'nullable|string|url',  
            'enrollment_text' => 'nullable|string',
            'organization_name' => 'nullable|string|max:255',
            'organization_url' => 'nullable|string|url', 
        ]);

        $courseData->update($validated);

        return redirect()->route('admin.course-datas.index')->with('success', 'Course data updated successfully.');
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
