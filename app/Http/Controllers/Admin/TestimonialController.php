<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        return view('admin.testimonials.index', [
            'testimonials' => Testimonial::all(),
            'models' => $this->getModelNames()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'text' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $validated['image'] = $request->file('image')->store('testimonials', 'public');

        Testimonial::create($validated);
        return redirect()->route('admin.testimonials.index');
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'text' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($testimonial->image);
            $validated['image'] = $request->file('image')->store('testimonials', 'public');
        }

        $testimonial->update($validated);
        return redirect()->route('admin.testimonials.index');
    }

    public function destroy(Testimonial $testimonial)
    {
        Storage::delete($testimonial->image);
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index');
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