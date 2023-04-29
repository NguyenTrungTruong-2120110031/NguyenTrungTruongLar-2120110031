<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Str;
use App\Http\Requests\SliderStoreRequest; 
use App\Http\Requests\SliderUpdateRequest;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    
    public function index()
    {
        $list_slider = Slider::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.slider.index', compact('list_slider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_slider = Slider::where('status', '!=', 0)->get();
        $html_parent_id='';
        $html_sort_order='';
        foreach($list_slider as $item)
        {
            $html_parent_id.='<option value="'.$item->id.'">'.$item->name.'</option>';
            $html_sort_order.='<option value="'.$item->sort_order.'">Sau: '.$item->name.'</option>';
        }
        return view('backend.slider.create', compact('html_parent_id', 'html_sort_order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderStoreRequest $request)
    {
        $slider = new Slider;//Tạo mới
        $slider->name = $request->name;
        $slider->slug=Str::slug($slider->name = $request->name, '-');
        $slider->metakey = $request->metakey;
        $slider->metadesc = $request->metadesc;
        $slider->parent_id = $request->parent_id;
        $slider->sort_order = $request->sort_order;
        $slider->status = $request->status;
        $slider->created_at = date('Y-m-d H:i:s');
        $slider->created_by = 1;
        //Upload file
        if($request->has('img')){
            $path_dir = "image/slider/";
            $file=$request->file('img');
            $extension=$file->getClientOriginalExtension();
            $filename=$slider->slug.'.'.$extension;
            $file->move($path_dir, $filename);
            $slider->img=$filename;
        }
        //End upload file
        if($slider->save()){
            $link = new Link();
            $link->slug = $slider->slug;
            $link->table_id = $slider->id;
            $link->type = 'slider';
            $link->save();
            return redirect()->route('slider.index')->with('message', ['type'=>'success', 'msg'
            => 'Thêm mẫu tin thành công!']);
        }
        else
        {
            return redirect()->route('slider.index')->with('message', ['type'=>'danger', 'msg'
            => 'Thêm không thành công!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $slider = Slider::find($id);
        if($slider == null){
            return redirect()->route('slider.index')->with('message', ['type'=>'denger', 'msg'
            => 'Mẫu tin không tông tại!']);
        }
        else
        {
            return view('backend.slider.show', compact('slider'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = Slider::find($id);
        $list_slider = Slider::where('status', '!=', 0)->get();
        $html_parent_id='';
        $html_sort_order='';
        foreach($list_slider as $item)
        {
            $html_parent_id.='<option value="'.$item->id.'">'.$item->name.'</option>';
            $html_sort_order.='<option value="'.$item->sort_order.'">Sau: '.$item->name.'</option>';
        }
        return view('backend.slider.edit', compact('slider','html_parent_id', 'html_sort_order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderUpdateRequest $request, string $id)
    {
        $slider = Slider::find($id);//Lấy mẫu tin
        $slider->name = $request->name;
        $slider->slug=Str::slug($slider->name = $request->name, '-');
        $slider->metakey = $request->metakey;
        $slider->metadesc = $request->metadesc;
        $slider->parent_id = $request->parent_id;
        $slider->sort_order = $request->sort_order;
        $slider->status = $request->status;
        $slider->updated_at = date('Y-m-d H:i:s');
        $slider->updated_by = 1;
         //Upload file
         if($request->has('img')){
            $path_dir = "image/slider/";
            if(File::exists($path_dir.$slider->img)){
                File::delete($path_dir.$slider->img);
            }
            $file=$request->file('img');
            $extension=$file->getClientOriginalExtension();
            $filename=$slider->slug.'.'.$extension;
            $file->move($path_dir, $filename);
            $slider->img=$filename;
        }
        //End upload file
        if($slider->save()){
            $link = Link::where([['type','=','slider'],['table_id','=',$id]])->first();
            $link->slug = $slider->slug;
            $link->save();
            return redirect()->route('slider.index')->with('message', ['type'=>'success', 'msg'
            => 'Thêm mẫu tin thành công!']);
        }
        return redirect()->route('slider.index')->with('message', ['type'=>'danger', 'msg'
        => 'Thêm không thành công!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);
        //Lấy thông tin hình cần xoá
        $path_dir = "image/slider/";
        $path_img_delete=$path_dir.$slider->img;
        //
        if($slider == null){
            return redirect()->route('slider.trash')->with('message', ['type'=>'denger', 'msg'
            => 'Mẫu tin không tông tại!']);
        }
        if($slider->delete()){
            
            if(File::exists($path_img_delete)){
                File::delete($path_img_delete);
            }
            $link = Link::where([['type','=','slider'],['table_id','=',$id]])->first();
            $link->delete();
            return redirect()->route('slider.trash')->with('message', ['type'=>'success', 'msg'
            => 'Thêm mẫu tin thành công!']);
        }
        return redirect()->route('slider.trash')->with('message', ['type'=>'danger', 'msg'
        => 'Thêm không thành công!']);
    }
    ///Status///
    public function status(string $id)
    {
        $slider = Slider::find($id);
        if($slider == null){
            return redirect()->route('slider.index')->with('message', ['type'=>'denger', 'msg'
            => 'Mẫu tin không tông tại!']);
        }
        $slider->status = ($slider->status == 1) ? 2 : 1;
        $slider->updated_at = date('Y-m-d H:i:s');
        $slider->updated_by = 1;
        $slider->save();
        return redirect()->route('slider.index')->with('message', ['type'=>'success', 'msg'
        => 'Thay đổi trạng thái thành công!']);
    }
    ///DELETE///
    public function delete(string $id)
    {
        $slider = Slider::find($id);
        if($slider == null){
            return redirect()->route('slider.index')->with('message', ['type'=>'denger', 'msg'
            => 'Mẫu tin không tông tại!']);
        }
        $slider->status = 0;
        $slider->updated_at = date('Y-m-d H:i:s');
        $slider->updated_by = 1;
        $slider->save();
        return redirect()->route('slider.index')->with('message', ['type'=>'success', 'msg'
        => 'Đã xoá thành công!']);
    }
    ///TRASH///
    public function trash()
    {
        $list_slider = Slider::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.slider.trash', compact('list_slider'));
    }
    ///RESTORE///
    public function restore(string $id)
    {
        $slider = Slider::find($id);
        if($slider == null){
            return redirect()->route('slider.trash')->with('message', ['type'=>'denger', 'msg'
            => 'Mẫu tin không tông tại!']);
        }
        $slider->status = 2;
        $slider->updated_at = date('Y-m-d H:i:s');
        $slider->updated_by = 1;
        $slider->save();
        return redirect()->route('slider.trash')->with('message', ['type'=>'success', 'msg'
        => 'Thay đổi trạng thái thành công!']);
    }

}
