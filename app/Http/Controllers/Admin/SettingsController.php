<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests\SettingsRequest;
use App\Http\Controllers\Controller;

use App\Option;
use Illuminate\Http\Request;

class SettingsController extends Controller {

    /**
     * Show Settings Page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.settings');
	}

    /**
     * Store admin settings
     *
     * @param SettingsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SettingsRequest $request){

        foreach($request->except('_token','about','about_title','legal','legal_title') as $option => $value){
            set_option($option, $value);
        }
        if($request->has('about') && $request->has('about_title')){
            set_option('about', ['title'=>$request->input('about_title'),'content'=>$request->input('about')]);
        }
        if($request->has('legal') && $request->has('legal_title')){
            set_option('legal', ['title'=>$request->input('legal_title'),'content'=>$request->input('legal')]);
        }

        return redirect()->back()->with('success','Saved');

    }


}
