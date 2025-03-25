<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseSummary;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourseSummaryController extends Controller
{
    public function index()
    {
        return view('admin.course-summaries.index', [
            'summaries' => CourseSummary::all(),
            'models' => $this->getModelNames()
        ]);
    }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'section_title' => 'required|string|max:255',
    //         'stats' => 'required|array',
    //         'stats.*.value' => 'required|string|max:255',
    //         'stats.*.label' => 'required|string|max:255',
    //         'schedule' => 'required|array',
    //         'schedule.*.icon' => 'required|string|max:255',
    //         'schedule.*.title' => 'required|string|max:255',
    //         'schedule.*.detail' => 'required|string|max:255',
    //     ]);

    //     $validated['stats'] = json_encode($validated['stats']);
    //     $validated['schedule'] = json_encode($validated['schedule']);
    //     dd($validated);
    //     CourseSummary::create($validated);
    //     return redirect()->route('admin.course-summary.index');
    // }

    public function update(Request $request, CourseSummary $coursesummary)
    {
        $validator = Validator::make($request->all(), [
            'section_title' => 'required|string|max:255',
            'stats' => 'nullable|array',
            'stats.*.value' => 'nullable|string|max:255',
            'stats.*.label' => 'nullable|string|max:255',
            'schedule' => 'nullable|array',
            'schedule.*.icon' => 'nullable|string|max:255',
            'schedule.*.title' => 'nullable|string|max:255',
            'schedule.*.detail' => 'nullable|string|max:255',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();
        // Convert arrays to JSON while preserving indexes
        $validated['stats'] = !empty($validated['stats']) ? 
            json_encode(array_values($validated['stats']), JSON_UNESCAPED_UNICODE) : null;
        
        $validated['schedule'] = !empty($validated['schedule']) ? 
            json_encode(array_values($validated['schedule']), JSON_UNESCAPED_UNICODE) : null;
    
        $coursesummary->update($validated);
        
        return redirect()->route('admin.course-summary.index')
                         ->with('success', 'Course Summary updated successfully!');
    }


    // public function destroy(CourseSummary $coursesummary)
    // {
    //     $coursesummary->delete();
    //     return redirect()->route('admin.course-summary.index');
    // }

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
