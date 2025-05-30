<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseOffering;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseOfferingController extends Controller
{
    public function index()
    {
        return view('admin.course-offerings.index', [
            'offerings' => CourseOffering::all(),
            'models' => $this->getModelNames()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'section_title' => 'required|string|max:255',
            'icon' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $validated['icon'] = $request->file('icon')->store('course-offering', 'public');

        CourseOffering::create($validated);
        return redirect()->route('admin.course-offering.index');
    }

    public function update(Request $request, CourseOffering $courseOffering)
    {
        $validated = $request->validate([
            'section_title' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        if ($request->hasFile('icon')) {
            Storage::delete($courseOffering->icon);
            $validated['icon'] = $request->file('icon')->store('course-offering', 'public');
        }

        $courseOffering->update($validated);
        return redirect()->route('admin.course-offering.index');
    }

    public function destroy(CourseOffering $courseOffering)
    {
        Storage::delete($courseOffering->icon);
        $courseOffering->delete();
        return redirect()->route('admin.course-offering.index');
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