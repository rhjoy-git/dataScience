<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ToolController extends Controller
{
    public function index()
    {
        return view('admin.tools.index', [
            'tools' => Tool::all(),
            'models' => $this->getModelNames()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('tools', 'public');
        }

        Tool::create($validated);
        return redirect()->route('admin.tools.index');
    }

    public function update(Request $request, Tool $tool)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($tool->image) {
                Storage::delete($tool->image);
            }
            $validated['image'] = $request->file('image')->store('tools', 'public');
        }

        $tool->update($validated);
        return redirect()->route('admin.tools.index');
    }

    public function destroy(Tool $tool)
    {
        if ($tool->image) {
            Storage::delete($tool->image);
        }
        $tool->delete();
        return redirect()->route('admin.tools.index');
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
