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
            'title' => 'string',
            'description' => 'string',
            'enrollment_open' => 'boolean',
            'enrollment_url' => 'string',
            'enrollment_text' => 'string',
            'organization_name' => 'string',
            'organization_url' => 'string',
        ]);
        dd($validated);
        $validated['enrollment_open'] = $request->has('enrollment_open');

        $courseData->update($validated);
        return redirect()->route('admin.course-data.index');
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
