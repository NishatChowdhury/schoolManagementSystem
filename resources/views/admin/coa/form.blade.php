<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Parent Account*:</label>
            {{ Form::select('coa_parents_id',$repository->parents(),null,['class'=>'form-control select2','required','placeholder'=>'Select an account head']) }}
        </div>
        <div class="form-group">
            <label for="">Code</label>
            {{ Form::text('code',$autoCode??null,['class'=>'form-control','required']) }}
        </div>
        <div class="form-group">
            <label for="">Account Name</label>
            {{ Form::text('name',null,['class'=>'form-control','required']) }}
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" name="is_enabled" value="1" class="flat-red" {{ $coa->is_enabled == 1 ? 'checked' : '' }}>
                Is Active
            </label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Description:</label>
            {{ Form::textarea('description',null,['class'=>'form-control']) }}
        </div>
    </div>
    <div class="col-md-12">
        <hr>
    </div>
    <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-success" > Create</button>
        <a href="{{ URL::previous() }}" class="btn btn-danger">Cancel</a>
    </div>
</div>


@section('script')
    <script>
        $(function () {
            $('.select2').select2();
        });
    </script>
@stop
