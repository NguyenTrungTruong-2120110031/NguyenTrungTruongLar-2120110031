<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Http\Requests\ProductStoreRequest; 
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    
    public function index()
    {
        $list_product = Product::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.product.index', compact('list_product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_product = Product::where('status', '!=', 0)->get();
        $html_parent_id='';
        $html_sort_order='';
        foreach($list_product as $item)
        {
            $html_parent_id.='<option value="'.$item->id.'">'.$item->name.'</option>';
            $html_sort_order.='<option value="'.$item->sort_order.'">Sau: '.$item->name.'</option>';
        }
        return view('backend.product.create', compact('html_parent_id', 'html_sort_order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        $product = new Product;//Tạo mới
        $product->name = $request->name;
        $product->slug=Str::slug($product->name = $request->name, '-');
        $product->metakey = $request->metakey;
        $product->metadesc = $request->metadesc;
        $product->parent_id = $request->parent_id;
        $product->sort_order = $request->sort_order;
        $product->status = $request->status;
        $product->created_at = date('Y-m-d H:i:s');
        $product->created_by = 1;
        //Upload file
        if($request->has('img')){
            $path_dir = "image/product/";
            $file=$request->file('img');
            $extension=$file->getClientOriginalExtension();
            $filename=$product->slug.'.'.$extension;
            $file->move($path_dir, $filename);
            $product->img=$filename;
        }
        //End upload file
        $category->save();
            return redirect()->route('product.index')->with('message', ['type'=>'success', 'msg'
            => 'Thêm mẫu tin thành công!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if($product == null){
            return redirect()->route('product.index')->with('message', ['type'=>'denger', 'msg'
            => 'Mẫu tin không tông tại!']);
        }
        else
        {
            return view('backend.product.show', compact('product'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $list_product = Product::where('status', '!=', 0)->get();
        $html_parent_id='';
        $html_sort_order='';
        foreach($list_product as $item)
        {
            $html_parent_id.='<option value="'.$item->id.'">'.$item->name.'</option>';
            $html_sort_order.='<option value="'.$item->sort_order.'">Sau: '.$item->name.'</option>';
        }
        return view('backend.product.edit', compact('product','html_parent_id', 'html_sort_order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id)
    {
        $product = Product::find($id);//Lấy mẫu tin
        $product->name = $request->name;
        $product->slug=Str::slug($product->name = $request->name, '-');
        $product->metakey = $request->metakey;
        $product->metadesc = $request->metadesc;
        $product->parent_id = $request->parent_id;
        $product->sort_order = $request->sort_order;
        $product->status = $request->status;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = 1;
         //Upload file
         if($request->has('img')){
            $path_dir = "image/product/";
            if(File::exists($path_dir.$product->img)){
                File::delete($path_dir.$product->img);
            }
            $file=$request->file('img');
            $extension=$file->getClientOriginalExtension();
            $filename=$product->slug.'.'.$extension;
            $file->move($path_dir, $filename);
            $product->img=$filename;
        }
        //End upload file
        $product->save();
        return redirect()->route('product.index')->with('message', ['type'=>'danger', 'msg'
        => 'Thêm không thành công!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        //Lấy thông tin hình cần xoá
        $path_dir = "image/product/";
        $path_img_delete=$path_dir.$product->img;
        //
        if($product == null){
            return redirect()->route('product.trash')->with('message', ['type'=>'denger', 'msg'
            => 'Mẫu tin không tông tại!']);
        }
        if($product->delete()){
            
            if(File::exists($path_img_delete)){
                File::delete($path_img_delete);
            }
            $link = Link::where([['type','=','product'],['table_id','=',$id]])->first();
            $link->delete();
            return redirect()->route('product.trash')->with('message', ['type'=>'success', 'msg'
            => 'Thêm mẫu tin thành công!']);
        }
        return redirect()->route('product.trash')->with('message', ['type'=>'danger', 'msg'
        => 'Thêm không thành công!']);
    }
    ///Status///
    public function status(string $id)
    {
        $product = Product::find($id);
        if($product == null){
            return redirect()->route('product.index')->with('message', ['type'=>'denger', 'msg'
            => 'Mẫu tin không tông tại!']);
        }
        $product->status = ($product->status == 1) ? 2 : 1;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = 1;
        $product->save();
        return redirect()->route('product.index')->with('message', ['type'=>'success', 'msg'
        => 'Thay đổi trạng thái thành công!']);
    }
    ///DELETE///
    public function delete(string $id)
    {
        $product = Product::find($id);
        if($product == null){
            return redirect()->route('product.index')->with('message', ['type'=>'denger', 'msg'
            => 'Mẫu tin không tông tại!']);
        }
        $product->status = 0;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = 1;
        $product->save();
        return redirect()->route('product.index')->with('message', ['type'=>'success', 'msg'
        => 'Đã xoá thành công!']);
    }
    ///TRASH///
    public function trash()
    {
        $list_product = Product::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.product.trash', compact('list_product'));
    }
    ///RESTORE///
    public function restore(string $id)
    {
        $product = Product::find($id);
        if($product == null){
            return redirect()->route('product.trash')->with('message', ['type'=>'denger', 'msg'
            => 'Mẫu tin không tông tại!']);
        }
        $product->status = 2;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = 1;
        $product->save();
        return redirect()->route('product.trash')->with('message', ['type'=>'success', 'msg'
        => 'Thay đổi trạng thái thành công!']);
    }

}
