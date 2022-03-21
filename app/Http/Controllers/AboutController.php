<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    protected $about;
    protected $abouts;
    public function index(){

        return view('admin.about.add');
    }

    public function create(Request $request){

        About::newAbout($request);
        return redirect('/add-about')->with('message','About Add Successfully');
    }

    public function manage(){

        $this->abouts = About::orderBy('id','desc')->get();
        return view('admin.about.manage',['abouts' => $this->abouts]);
    }

    public function edit($id){

        $this->about = About::find($id);
        return view('admin.about.edit',['about' => $this->about]);
    }

    public function update(Request $request, $id){

        About::updateAbout($request, $id);
        return redirect('/manage-about')->with('message','About Edit Successfully');
    }
}
