<?php

namespace App\Http\Controllers\admin;

use App\Models\categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\admin\CategorieReqest;

class categorieController extends Controller
{

    public function index()
    {
        $categorie['categories'] = categories::all();
        return view('admin.categorie.index',$categorie);
    }

    // create categorie
    public function create()
    {

        return view('admin.categorie.create');
    }

    // store categorie
    public function store(CategorieReqest $request)
    {
        $data                   = $request->validated();
        $categorie              = new categories;
        $categorie->name        = $data['name'];
        $categorie->slug        = $data['slug'];
        $categorie->description = $data['description'];
        if ($request->hasfile('image')) {
           $file = $request->file('image');
           $fileName = time() . '.' . $file->getClientOriginalExtension();
           $file->move('uploads/categorie/',$fileName);
           $categorie->image = $fileName;
        }
        $categorie->meta_title       = $data['meta_title'];
        $categorie->meta_description = $data['meta_description'];
        $categorie->meta_keyword     = $data['meta_keyword'];
        
        $categorie->navbar_status    = $request->navbar_status == true ? '1' : '0';
        $categorie->status           = $request->status        == true ? '1' : '0';
        $categorie->created_by       = Auth::user()->id;
        $categorie->save();

        return redirect('admin/categorie')->with('message','Catogorie Created Succesfully');
    }

    // edit categorie
    public function edit($categorie_id)
    {
        $categorie['categories'] = categories::find($categorie_id);
        return view('admin.categorie.edit',$categorie);
    }

    // update categorie
    public function update(CategorieReqest $request, $categorie_id)
    {
        $data                   = $request->validated();
        $categorie              = categories::find($categorie_id);
        $categorie->name        = $data['name'];
        $categorie->slug        = Str::slug($data['slug']);
        $categorie->description = $data['description'];
        if ($request->hasfile('image')) {

           $destination = 'uploads/categorie/'.$categorie->image;
           if (File::exists($destination)) {
               File::delete($destination);
           }

           $file = $request->file('image');
           $fileName = time() . '.' . $file->getClientOriginalExtension();
           $file->move('uploads/categorie/',$fileName);
           $categorie->image = $fileName;
        }
        $categorie->meta_title       = $data['meta_title'];
        $categorie->meta_description = $data['meta_description'];
        $categorie->meta_keyword     = $data['meta_keyword'];
        
        $categorie->navbar_status    = $request->navbar_status == true ? '1' : '0';
        $categorie->status           = $request->status        == true ? '1' : '0';
        $categorie->created_by       = Auth::user()->id;
        $categorie->update();

        return redirect('admin/categorie')->with('message','Catogorie Updated Succesfully');
    }

    // destroy method for
    public function destroy(Request $request)
    {
        $categorie = categories::find($request->categorie_delete_id);

        if($categorie){
            
            // for delete image
            $destination = 'uploads/categorie/'.$categorie->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $categorie->posts()->delete();
            $categorie->delete();
            return redirect('admin/categorie')->with('message','Catogorie Deleted With Posts Succesfully');
        }
        else
        {
            return redirect('admin/categorie')->with('message','Catogorie ID Not Found');
        }
    }
} 