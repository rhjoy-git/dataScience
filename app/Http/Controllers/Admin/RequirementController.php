<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Requirement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RequirementController extends Controller
{
    public function index()
    {
        return view('admin.requirements.index', [
            'requirements' => Requirement::all(),
            'models' => $this->getModelNames()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $validated['image'] = $request->file('image')->store('requirements', 'public');

        Requirement::create($validated);
        return redirect()->route('admin.requirements.index');
    }

    public function update(Request $request, Requirement $requirement)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($requirement->image);
            $validated['image'] = $request->file('image')->store('requirements', 'public');
        }

        $requirement->update($validated);
        return redirect()->route('admin.requirements.index');
    }

    public function destroy(Requirement $requirement)
    {
        Storage::delete($requirement->image);
        $requirement->delete();
        return redirect()->route('admin.requirements.index');
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