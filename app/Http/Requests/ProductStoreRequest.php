<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'detail' => 'required',
            'metakey' => 'required',
            'metadesc' => 'required',
            'cate_id' => 'required',
            'brand_id' => 'required',
            'price_buy' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Bạn chưa nhập tên',
            'detail.required' => 'Chưa nhập chi tiết sản phẩm',
            'metakey.required' => 'Chưa nhập từ khoá tìm kiếm',
            'metadesc.required' => 'Chưa nhập mô tả',
            'cate_id.required' => 'Chưa chọn danh mục',
            'brand_id.required' => 'Chưa chọn thương hiệu',
            'price_buy.required' => 'Chưa nhập giá bán'
        ];
    }
}
    

