<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterData;
use Illuminate\Http\Request;

class FooterDataController extends Controller
{
    public function index()
    {
        // Typically only one footer data entry exists
        $footerData = FooterData::firstOrNew();
        
        return view('admin.footer-data.index', [
            'footerData' => $footerData,
            'models' => $this->getModelNames()
        ]);
    }

    public function edit(FooterData $footerData)
    {
        return view('admin.footer-data.edit', [
            'footerData' => $footerData,
            'models' => $this->getModelNames()
        ]);
    }

    public function update(Request $request, FooterData $footerData)
    {
        $validated = $request->validate([
            'courses' => 'required|array',
            'courses.*.name' => 'required|string|max:255',
            'courses.*.url' => 'required|string|max:255',
            'resources' => 'required|array',
            'resources.*.name' => 'required|string|max:255',
            'resources.*.url' => 'required|string|max:255',
            'legal' => 'required|array',
            'legal.*.name' => 'required|string|max:255',
            'legal.*.url' => 'required|string|max:255',
            'contact.address' => 'required|string|max:255',
            'contact.phone' => 'required|array',
            'contact.phone.*' => 'required|string|max:20',
            'contact.email' => 'required|email|max:255'
        ]);

        $footerData->update([
            'courses' => $validated['courses'],
            'resources' => $validated['resources'],
            'legal' => $validated['legal'],
            'contact' => $validated['contact']
        ]);

        return redirect()->route('admin.footer-data.index')->with('success', 'Footer data updated!');
    }

    private function getModelNames()
    {
        return [
            'NavLink', 'Curriculum', 'CourseDetail', 'Tool', 'CourseData',
            'CourseSummary', 'CourseOffering', 'EnrollmentPoint', 'Instructor',
            'Requirement', 'Faq', 'Testimonial', 'Graduate', 'FooterData'
        ];
    }
}