<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <input type="text" name="name" value="{{ old('name', optional($product ?? null)->name ) }}" class="form-control" placeholder="Name">
        </div>
        @if ($errors->has('name'))
            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Detail:</strong>
            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ old('detail', optional($product ?? null)->detail )  }}</textarea>
        </div>
        @if ($errors->has('detail'))
            <span class="text-danger text-left">{{ $errors->first('detail') }}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Image:</strong>
            <input type="file" name="image" id="image" class="form-control" placeholder="image"><br />
            {{-- @if(isset($product))
                <img src="/images/{{ $product->image }}" width="100px" height="100px">
            @endif --}}
            {{-- @if(isset($product))
                <img src="{{ asset($product->image) }}" style="height: 50px;width:50px;">
            @endif --}}
        </div>
        @if ($errors->has('image'))
            <span class="text-danger text-left">{{ $errors->first('image') }}</span>
        @endif
        <div class="form-group">
            @if(isset($product))
                {{-- <img src="/images/{{ $product->image }}" width="100px" height="100px"> --}}
                <img id="showImage" src="/images/{{ $product->image }}" alt="Image" class="rounded-circle p-1 bg-primary" width="100" height="100">
            @else
                <img id="showImage" src="{{ url('upload/no_image.jpg') }}" alt="Image" class="rounded-circle p-1 bg-primary" width="100" height="100">
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
