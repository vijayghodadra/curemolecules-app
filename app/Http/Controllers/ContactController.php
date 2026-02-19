<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        // 1. Validate the new form fields
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required', // Mobile Number* in form
            'categories' => 'nullable|array', // Product Categories checkboxes
            // 'message' is NOT in the new form, so we MAKE it from categories
        ]);

        // 2. Combine Initials for 'name'
        $fullName = $validated['first_name'] . ' ' . $validated['last_name'];

        // 3. Construct 'message' from selected categories
        $messageContent = "Inquiry for Categories: ";
        if (!empty($request->categories)) {
            $messageContent .= implode(', ', $request->categories);
        }
        else {
            $messageContent .= "General Inquiry";
        }

        // 4. Create the Inquiry
        Inquiry::create([
            'name' => $fullName,
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'subject' => 'Product Information Request', // Default subject
            'message' => $messageContent,
        ]);

        return back()->with('success', 'Thank you for your inquiry. We will contact you shortly.');
    }
}
