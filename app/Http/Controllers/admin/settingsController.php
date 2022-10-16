<?php

namespace App\Http\Controllers\admin;

use App\Models\settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class settingsController extends Controller
{
    public function index()
    {
        $setting['setting'] = settings::find(1);
        return view('admin.setting.index',$setting);
    }

    public function savedata(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'website_name'     => 'nullable|max: 255',
            'logo'             => 'nullable',
            'favicon'          => 'nullable',
            'description'      => 'nullable',
            'meta_title'       => 'nullable|max: 255',
            'meta_keyword'     => 'nullable',
            'meta_description' => 'nullable',

        ]);

        if($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator);
        }

        $setting = settings::where('id','1')->first();

        if($setting)
        {
            $setting->website_name = $request->website_name;


            if ($request->hasfile('logo')) {                
                $destination = 'uploads/settings/'.$setting->logo;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('logo');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings/',$fileName);
                $setting->logo = $fileName;
             }


            if ($request->hasfile('favicon')) {                
                $destination = 'uploads/settings/'.$setting->favicon;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('favicon');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings/',$fileName);
                $setting->favicon = $fileName;
             }


            $setting->description      = $request->description;
            $setting->meta_title       = $request->meta_title;
            $setting->meta_keyword     = $request->meta_keyword;
            $setting->meta_description = $request->meta_description;
            $setting->save();
            return redirect('admin/settings')->with('message','Settings Updated Succesfully');
        }
        else
        {
            $setting = new settings;
            $setting->website_name     = $request->website_name;
            if ($request->hasfile('logo')) {
                $file = $request->file('logo');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings/',$fileName);
                $setting->logo = $fileName;
             }
            if ($request->hasfile('favicon')) {
                $file = $request->file('favicon');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings/',$fileName);
                $setting->favicon = $fileName;
             }
            $setting->description      = $request->description;
            $setting->meta_title       = $request->meta_title;
            $setting->meta_keyword     = $request->meta_keyword;
            $setting->meta_description = $request->meta_description;
            $setting->save();
            return redirect('admin/settings')->with('message','Settings Created Succesfully');
        }
    }
}
