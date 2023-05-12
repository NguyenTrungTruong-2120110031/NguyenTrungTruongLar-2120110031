<div class="row">
    <div class="col-md-12">
      <div class="mb-3">
        <label for="img">Hình ảnh</label>
        <input type="file" name="img[]" multiple value="{{old('img')}}" id="img" class="form-control">
        @if ($errors->has('img'))
            <div class="text-danger">
              {{$errors->first('img')}}
            </div>
        @endif
      </div>
    </div>
    
  </div>