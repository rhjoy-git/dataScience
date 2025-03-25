<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Regular user dashboard
    public function index()
    {
        return view('welcome');
    }

    public function adminDashboard()
    {
        $models = [
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

        return view('admin.dashboard', compact('models'));
    }
}
