<div class="row">
    <div class="col-md-6">
      <div class="mb-3">
        <label for="name">Tên thuộc tính</label>
        <input type="text" name="naádfsdfesss" value="{{old('name')}}" id="name" class="form-control" 
        placeholder="Nhập tên danh mục">
        @if ($errors->has('name'))
            <div class="text-danger">
              {{$errors->first('name')}}
            </div>
        @endif
      </div>
      <div class="mb-3">
        <label for="metakey">Mô tả</label>
        <textarea name="metsdfsakeysss" id="metakey" class="form-control" 
        placeholder="Từ khoá tìm kiếm">{{old('metakey')}}</textarea>
        @if ($errors->has('metakey'))
            <div class="text-danger">
              {{$errors->first('metakey')}}
            </div>
        @endif
      </div>
    </div>
    <div class="col-md-6">
      <div class="mb-3">
        <label for="namesss">Giá trị</label>
        <input type="text" name="namesss" value="{{old('name')}}" id="name" class="form-control" 
        placeholder="Nhập tên danh mục">
        @if ($errors->has('namesss'))
            <div class="text-danger">
              {{$errors->first('namesss')}}
            </div>
        @endif
      </div>
      <div class="mb-3">
        <label for="metakeysss">Thứ tự</label>
        <textarea name="metakeysss" id="metakey" class="form-control" 
        placeholder="Từ khoá tìm kiếm">{{old('metakey')}}</textarea>
        @if ($errors->has('metakey'))
            <div class="text-danger">
              {{$errors->first('metakey')}}
            </div>
        @endif
      </div>
    </div>
  </div>