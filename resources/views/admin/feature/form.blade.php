<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Name*</label>
    <div class="col-sm-10">
        <div class="input-group">
            {{ Form::text('name',null,['class'=>'form-control','required']) }}
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Page*</label>
    <div class="col-sm-10">
        <div class="input-group">
{{--            {{ Form::select('page_id',$pages,null,['class'=>'form-control','required']) }}--}}
            <select name="page_id" id="page_id" class="form-control" required>
                @foreach($pages as $page)
                <optgroup label="{{ $page->name }}">
                    @foreach($page->children as $child)
                    <option value="{{ $child->id }}" {{ $feature->page_id == $child->id ? 'selected' : '' }}>{{ $child->name }}</option>
                    @endforeach
                </optgroup>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Thumbnail(70X70)*</label>
    <div class="col-sm-5">
        <div class="form-group files color">
            <input type="file" name="image" class="form-control" multiple="">
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group">
            <img src="{{ asset('assets/img/features/') }}/{{ $feature->image }}" class="img-thumbnail mx-auto d-block" alt="" width="150">
        </div>
    </div>
</div>
<div style="float: right">
    <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> Save</button>
</div>

<!-- /Notices page inner Content End*** -->

<!-- *** External CSS File -->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/imageupload.css') }}">
@stop
