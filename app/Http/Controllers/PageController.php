<?php

namespace App\Http\Controllers;

use App\Models\{
    NavLink,
    Curriculum,
    CourseDetail,
    Tool,
    CourseData,
    CourseSummary,
    CourseOffering,
    EnrollmentPoint,
    Instructor,
    Requirement,
    Faq,
    Testimonial,
    Graduate,
    FooterData
};

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function home()
    {
        return view('welcome', [
            'navLinks' => NavLink::all(),
            'curriculums' => Curriculum::all(),
            'courseDetails' => CourseDetail::all(),
            'tools' => Tool::all(),
            'courseData' => CourseData::first(),
            'courseSummary' => CourseSummary::first(),
            'courseOfferings' => CourseOffering::all(),
            'enrollmentPoints' => EnrollmentPoint::all(),
            'instructor' => Instructor::first(),
            'requirements' => Requirement::all(),
            'faqs' => Faq::all(),
            'testimonials' => Testimonial::all(),
            'graduates' => Graduate::all(),
            'footerData' => FooterData::first()
        ]);
    }
}
