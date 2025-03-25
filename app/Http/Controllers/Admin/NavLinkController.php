<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NavLink;
use Illuminate\Http\Request;

class NavLinkController extends Controller
{
    public function index()
    {
        return view('admin.navlinks.index', [
            'navlinks' => NavLink::all(),
            'models' => $this->getModelNames()
        ]);
    }

    public function create()
    {
        return view('admin.navlinks.create', ['models' => $this->getModelNames()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'route' => 'required|string|max:255',
            'text' => 'required|string|max:255'
        ]);
        
        NavLink::create($validated);
        return redirect()->route('admin.navlinks.index');
    }

    public function update(Request $request, NavLink $navlink)
    {
        
        $validated = $request->validate([
            'route' => 'required|string|max:255',
            'text' => 'required|string|max:255'
        ]);

        $navlink->update($validated);
        return redirect()->route('admin.navlinks.index');
    }

    public function destroy(NavLink $navlink)
    {
        $navlink->delete();
        return redirect()->route('admin.navlinks.index');
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
