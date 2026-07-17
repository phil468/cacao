<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest as ContactFormRequest;
use App\Models\ContactRequest;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function store(ContactFormRequest $request): RedirectResponse
    {
        ContactRequest::create($request->validated());

        return back()->with('success', 'Gracias. Recibimos tu mensaje.');
    }
}
