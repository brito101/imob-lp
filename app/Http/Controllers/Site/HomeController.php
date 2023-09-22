<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ContactRequest;
use App\Models\Contact;
use App\Models\Image;
use App\Models\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $page = Page::first();
        $images = Image::all();
        return view('site.home', compact('page', 'images'));
    }

    public function contact(ContactRequest $request)
    {
        $contact = Contact::create($request->all());

        if ($contact->save()) {
            return redirect()->back()->with('success', 'Em breve um dos nossos especialistas entrará em contato com você!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Erro ao cadastrar!');
        }
    }
}
