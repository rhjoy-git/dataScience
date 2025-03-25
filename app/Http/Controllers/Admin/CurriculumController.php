<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CurriculumController extends Controller
{
    public function index()
    {
        return view('admin.curriculums.index', [
            'curriculums' => Curriculum::all(),
            'models' => $this->getModelNames()
        ]);
    }

    public function create()
    {
        return view('admin.curriculum.create', ['models' => $this->getModelNames()]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'section_title' => 'required|string|max:255',
            'week' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'instructor' => 'required|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'lessons' => 'required|array',
            'lessons.*.day' => 'required|string',
            'lessons.*.topic' => 'required|string',
        ]);

        // Handle file upload
        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('public/curriculum');
            $validated['profile_image'] = str_replace('public/', '', $path);
        }

        // Convert lessons to JSON
        $validated['lessons'] = json_encode($validated['lessons']);

        Curriculum::create($validated);

        return redirect()->route('admin.curriculum.index');
    }


    public function update(Request $request, Curriculum $curriculum)
    {
        $validated = $request->validate([
            'section_title' => 'required|string|max:255',
            'week' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'instructor' => 'required|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'lessons' => 'required|array',
            'lessons.*.day' => 'required|string',
            'lessons.*.topic' => 'required|string'
        ]);

        // Handle file upload
        if ($request->hasFile('profile_image')) {
            Storage::delete($curriculum->profile_image);
            $validated['profile_image'] = $request->file('profile_image')->store('Curriculum', 'public');
        }

        // Convert lessons to JSON
        $validated['lessons'] = json_encode($validated['lessons']);

        $curriculum->update($validated);
        return redirect()->route('admin.curriculum.index');
    }

    public function show(Curriculum $curriculum)
    {
        return view('admin.curriculum.show', compact('curriculum'));
    }

    public function edit(Curriculum $curriculum)
    {
        return view('admin.curriculum.edit', compact('curriculum'));
    }



    public function destroy(Curriculum $curriculum)
    {
        $curriculum->delete();
        return redirect()->route('admin.Curriculum.index');
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
