<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Link;
use Illuminate\Support\Str;
use App\Http\Requests\BrandStoreRequest; 
use App\Http\Requests\BrandUpdateRequest;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    
    public function index()
    {
        $list_brand = Brand::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.brand.index', compact('list_brand'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_brand = Brand::where('status', '!=', 0)->get();
        $html_parent_id='';
        $html_sort_order='';
        foreach($list_brand as $item)
        {
            $html_parent_id.='<option value="'.$item->id.'">'.$item->name.'</option>';
            $html_sort_order.='<option value="'.$item->sort_order.'">Sau: '.$item->name.'</option>';
        }
        return view('backend.brand.create', compact('html_parent_id', 'html_sort_order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandStoreRequest $request)
    {
        $brand = new Brand;//Tạo mới
        $brand->name = $request->name;
        $brand->slug=Str::slug($brand->name = $request->name, '-');
        $brand->metakey = $request->metakey;
        $brand->metadesc = $request->metadesc;
        $brand->parent_id = $request->parent_id;
        $brand->sort_order = $request->sort_order;
        $brand->status = $request->status;
        $brand->created_at = date('Y-m-d H:i:s');
        $brand->created_by = 1;
        //Upload file
        if($request->has('img')){
            $path_dir = "image/brand/";
            $file=$request->file('img');
            $extension=$file->getClientOriginalExtension();
            $filename=$brand->slug.'.'.$extension;
            $file->move($path_dir, $filename);
            $brand->img=$filename;
        }
        //End upload file
        if($brand->save()){
            $link = new Link();
            $link->slug = $brand->slug;
            $link->table_id = $brand->id;
            $link->type = 'brand';
            $link->save();
            return redirect()->route('brand.index')->with('message', ['type'=>'success', 'msg'
            => 'Thêm mẫu tin thành công!']);
        }
        else
        {
            return redirect()->route('brand.index')->with('message', ['type'=>'danger', 'msg'
            => 'Thêm không thành công!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::find($id);
        if($brand == null){
            return redirect()->route('brand.index')->with('message', ['type'=>'denger', 'msg'
            => 'Mẫu tin không tông tại!']);
        }
        else
        {
            return view('backend.brand.show', compact('brand'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::find($id);
        $list_brand = Brand::where('status', '!=', 0)->get();
        $html_parent_id='';
        $html_sort_order='';
        foreach($list_brand as $item)
        {
            $html_parent_id.='<option value="'.$item->id.'">'.$item->name.'</option>';
            $html_sort_order.='<option value="'.$item->sort_order.'">Sau: '.$item->name.'</option>';
        }
        return view('backend.brand.edit', compact('brand','html_parent_id', 'html_sort_order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandUpdateRequest $request, string $id)
    {
        $brand = Brand::find($id);//Lấy mẫu tin
        $brand->name = $request->name;
        $brand->slug=Str::slug($brand->name = $request->name, '-');
        $brand->metakey = $request->metakey;
        $brand->metadesc = $request->metadesc;
        $brand->parent_id = $request->parent_id;
        $brand->sort_order = $request->sort_order;
        $brand->status = $request->status;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = 1;
         //Upload file
         if($request->has('img')){
            $path_dir = "image/brand/";
            if(File::exists($path_dir.$brand->img)){
                File::delete($path_dir.$brand->img);
            }
            $file=$request->file('img');
            $extension=$file->getClientOriginalExtension();
            $filename=$brand->slug.'.'.$extension;
            $file->move($path_dir, $filename);
            $brand->img=$filename;
        }
        //End upload file
        if($brand->save()){
            $link = Link::where([['type','=','brand'],['table_id','=',$id]])->first();
            $link->slug = $brand->slug;
            $link->save();
            return redirect()->route('brand.index')->with('message', ['type'=>'success', 'msg'
            => 'Thêm mẫu tin thành công!']);
        }
        return redirect()->route('brand.index')->with('message', ['type'=>'danger', 'msg'
        => 'Thêm không thành công!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        //Lấy thông tin hình cần xoá
        $path_dir = "image/brand/";
        $path_img_delete=$path_dir.$brand->img;
        //
        if($brand == null){
            return redirect()->route('brand.trash')->with('message', ['type'=>'denger', 'msg'
            => 'Mẫu tin không tông tại!']);
        }
        if($brand->delete()){
            
            if(File::exists($path_img_delete)){
                File::delete($path_img_delete);
            }
            $link = Link::where([['type','=','brand'],['table_id','=',$id]])->first();
            $link->delete();
            return redirect()->route('brand.trash')->with('message', ['type'=>'success', 'msg'
            => 'Thêm mẫu tin thành công!']);
        }
        return redirect()->route('brand.trash')->with('message', ['type'=>'danger', 'msg'
        => 'Thêm không thành công!']);
    }
    ///Status///
    public function status(string $id)
    {
        $brand = Brand::find($id);
        if($brand == null){
            return redirect()->route('brand.index')->with('message', ['type'=>'denger', 'msg'
            => 'Mẫu tin không tông tại!']);
        }
        $brand->status = ($brand->status == 1) ? 2 : 1;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = 1;
        $brand->save();
        return redirect()->route('brand.index')->with('message', ['type'=>'success', 'msg'
        => 'Thay đổi trạng thái thành công!']);
    }
    ///DELETE///
    public function delete(string $id)
    {
        $brand = Brand::find($id);
        if($brand == null){
            return redirect()->route('brand.index')->with('message', ['type'=>'denger', 'msg'
            => 'Mẫu tin không tông tại!']);
        }
        $brand->status = 0;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = 1;
        $brand->save();
        return redirect()->route('brand.index')->with('message', ['type'=>'success', 'msg'
        => 'Đã xoá thành công!']);
    }
    ///TRASH///
    public function trash()
    {
        $list_brand = Brand::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.brand.trash', compact('list_brand'));
    }
    ///RESTORE///
    public function restore(string $id)
    {
        $brand = Brand::find($id);
        if($brand == null){
            return redirect()->route('brand.trash')->with('message', ['type'=>'denger', 'msg'
            => 'Mẫu tin không tông tại!']);
        }
        $brand->status = 2;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = 1;
        $brand->save();
        return redirect()->route('brand.trash')->with('message', ['type'=>'success', 'msg'
        => 'Thay đổi trạng thái thành công!']);
    }

}
