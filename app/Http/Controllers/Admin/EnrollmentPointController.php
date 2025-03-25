<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EnrollmentPoint;
use Illuminate\Http\Request;

class EnrollmentPointController extends Controller
{
    public function index()
    {
        return view('admin.enrollment-points.index', [
            'points' => EnrollmentPoint::all(),
            'models' => $this->getModelNames()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'point' => 'required|string|max:255'
        ]);

        EnrollmentPoint::create($validated);
        return redirect()->route('admin.enrollment-point.index');
    }

    public function update(Request $request, EnrollmentPoint $enrollmentPoint)
    {
        $validated = $request->validate([
            'point' => 'required|string|max:255'
        ]);

        $enrollmentPoint->update($validated);
        return redirect()->route('admin.enrollment-point.index');
    }

    public function destroy(EnrollmentPoint $enrollmentPoint)
    {
        $enrollmentPoint->delete();
        return redirect()->route('admin.enrollment-point.index');
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