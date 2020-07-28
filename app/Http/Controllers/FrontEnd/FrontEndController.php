<?php

namespace App\Http\Controllers\FrontEnd;


use App\Http\Requests\FrontEnd\ContactUs\store;
use App\Models\ContactUs;
use App\Models\Slider;
use Illuminate\Http\Request;

use App\Events\CopticViewers;
use App\Events\IslamicViewers;
use App\Events\ModernViewers;
use App\Events\PharaonicViewers;

use App\Models\Coptic;
use App\Http\Controllers\Controller;
use App\Models\Homepage;
use App\Models\Islamic;
use App\Models\Modern;
use App\Models\Pharaonic;


class FrontEndController extends Controller
{

    public function index()
    {
        $title = 'Welcome';
        $rows = Homepage::paginate(1);
        $Coptic = Coptic::paginate(5);
        $Islamic = Islamic::paginate(5);
        $Pharaonic = Pharaonic::paginate(5);
        $Modern = Modern::paginate(5);
        $sliders = Slider::where('status' , 'Active')->get();

        return view('front-end.index', compact('rows',
            'Coptic',
            'Islamic',
            'Pharaonic',
            'Modern',
            'title',
            'sliders'));
    }


    public function pharaonic()
    {
        $title = 'pharaonic';
        $rows = Pharaonic::paginate(8);
        $MostPopularPharaoh = Pharaonic::where('viewers','>=',1)->paginate(8);
        return view('front-end.pharaonics.index', compact('rows', 'title','MostPopularPharaoh'));
    }

    public function modern()
    {
        $title = 'modern';
        $rows = Modern::paginate(8);
        $MostPopularModern = Modern::where('viewers','>=',1)->paginate(8);
        return view('front-end.moderns.index', compact('rows', 'title','MostPopularModern'));

    }


    public function islamic()
    {
        $title = 'islamic';
        $rows = Islamic::paginate(8);
        $MostPopularIslamic = Islamic::where('viewers','>=',1)->paginate(8);
        return view('front-end.islamics.index', compact('rows', 'title','MostPopularIslamic'));
    }


    public function coptic()
    {
        $title = 'coptic';
        $rows = Coptic::paginate(8);
        $MostPopularCoptic = Coptic::where('viewers','>=',1)->paginate(8);
        return view('front-end.coptics.index', compact('rows', 'title','MostPopularCoptic'));

    }


    public function pharaonicPost($id)
    {

        $rows = Pharaonic::with('comments', 'likes')->findOrFail($id);
        event(new PharaonicViewers($rows));
        $title = 'pharaonic';

        return view('front-end.pharaonics.post', compact('rows', 'title'));
    }


    public function modernPost($id)
    {


        $rows = Modern::with('comments', 'likes')->findOrFail($id);
        event(new ModernViewers($rows));

        $title = 'modern';
        return view('front-end.moderns.post', compact('rows', 'title'));
    }

    public function islamicPost($id)
    {

        $rows = Islamic::with('comments', 'likes')->findOrFail($id);
        event(new IslamicViewers($rows));
        $title = 'islamic';
        return view('front-end.islamics.post', compact('rows', 'title'));
    }

    public function CopticPost($id)
    {


        $rows = Coptic::with('comments', 'likes')->findOrFail($id);
        event(new CopticViewers($rows));
        $title = 'coptic';
        return view('front-end.coptics.post', compact('rows', 'title'));

    }

    /**
     * Search In Coptics Sections
     */

    public function CopticSearch(Request $request)
    {

        $title = 'coptic';
        $titlee = $request->search;
        $rows = Coptic::where('title', 'like', '%' . $titlee . '%')->get();

        return view('front-end.coptics.search', compact('rows', 'title'));

    }

    /**
     * Search In Islamic Sections
     */

    public function IslamicSearch(Request $request)
    {

        $title = 'islamic';
        $titlee = $request->search;
        $rows = Islamic::where('title', 'like', '%' . $titlee . '%')->get();

        return view('front-end.islamics.search', compact('rows', 'title'));

    }

    /**
     * Search In Modern Sections
     */

    public function ModernSearch(Request $request)
    {

        $title = 'modern';
        $titlee = $request->search;
        $rows = Modern::where('title', 'like', '%' . $titlee . '%')->get();

        return view('front-end.moderns.search', compact('rows', 'title'));

    }

    /**
     * Search In Pharaoh Sections
     */

    public function PharaonicSearch(Request $request)
    {

        $title = 'pharaonic';
        $titlee = $request->search;
        $rows = Pharaonic::where('title', 'like', '%' . $titlee . '%')->get();

        return view('front-end.pharaonics.search', compact('rows', 'title'));


    }


    public function ContactUsShow()
    {
        $title = 'Contact Us';
        return view('front-end.contact-us', compact('title'));
    }

    public function contactus(store $request)
    {

        $data = $request->all();
        ContactUs::create($data);
        alert()->success('Success Message', 'Thank you for your Message , We will call you later');
        return back();

    }

}
