<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\ContactUs;
use App\Models\Coptic;
use App\Models\CopticComment;
use App\Models\Islamic;
use App\Models\IslamicComment;
use App\Models\Modern;
use App\Models\ModernComment;
use App\Models\Pharaonic;
use App\Models\PharaonicComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class home extends Controller
{
    public function index()
    {

        $phoroanic = Pharaonic::count();
        $islamic = Islamic::count();
        $modern = Modern::count();
        $coptic = Coptic::count();
        $PharaonicComments = PharaonicComment::count();
        $islamicComments = IslamicComment::count();
        $modernComments = ModernComment::count();
        $copticComments = CopticComment::count();


        $title = "Dashboard " . auth()->user()->group;

        return view('back-end.home', compact(
            'phoroanic',
            'islamic',
            'modern',
            'coptic',
            'PharaonicComments',
            'islamicComments',
            'modernComments',
            'copticComments',
            'title'));
    }


    public function ContactUs()
    {
        $title = 'Contact Us';
        $rows = ContactUs::get();
        return view('back-end.contact-us.contact-us', compact('title', 'rows'));
    }


    public function MessageContactUs($id)
    {
        $title = 'Message';
        $messages = ContactUs::where('id', $id)->first();
        return view('back-end.contact-us.message', compact('title', 'messages'));
    }

    public function MessageDelete($id){

        $message = ContactUs::findOrfail($id);
        $message->delete();
        return redirect()->back();
    }
}
