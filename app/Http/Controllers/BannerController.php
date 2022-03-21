<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    protected $banner;
    public function index(){

        return view('admin.banner.add');
    }

    public function create(Request $request){

        Banner::newBanner($request);
        return redirect('/add-banner')->with('message','Banner Add Successfully');
    }

    public function manage(){

        $this->banner = Banner::all();
        return view('admin.banner.manage',['banner' => $this->banner]);
    }

    public function edit($id){

        $this->banner = Banner::find($id);
        return view('admin.banner.edit',['banner' => $this->banner]);
    }

    public function update(Request $request, $id){

        Banner::updateBanner($request, $id);
        return redirect('/manage-banner')->with('message','Banner Edit Successfully');
    }
}
