<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Type*</label>
    <div class="col-sm-10">
        <div class="input-group">
            {{ Form::select('notice_type_id',$repository->types(),null,['id'=>'inputState','class'=>'form-control','style'=>'height: 35px !important;','required']) }}
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Category*</label>
    <div class="col-sm-10">
        <div class="input-group">
            {{ Form::select('notice_category_id',$repository->categories(),null,['id'=>'inputState','class'=>'form-control','style'=>'height: 35px !important;','required']) }}
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Title*</label>
    <div class="col-sm-10">
        <div class="input-group">
            {{--<input type="text" class="form-control" id=""  aria-describedby="">--}}
            {{ Form::text('title',null,['class'=>'form-control','required']) }}
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Short Description</label>
    <div class="col-sm-10">
        <div class="input-group">
            {{--<textarea type="text" class="form-control" rows="5" id=""> </textarea>--}}
            {{ Form::textarea('description',null,['class'=>'form-control','row'=>5,'required']) }}
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Start Date</label>
    <div class="col-sm-10">
        <div class="input-group">
{{--            <input name="start" class="form-control datePicker" aria-describedby="" required>--}}
            {{ Form::text('start',null,['class'=>'form-control datePicker']) }}
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend2"> <i class="far fa-calendar-alt"></i></span>
            </div>
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">End Date</label>
    <div class="col-sm-10">
        <div class="input-group">
            {{--        <input name="end" class="form-control datePicker" aria-describedby="">--}}
            {{ Form::text('end',null,['class'=>'form-control datePicker']) }}
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend2"> <i class="far fa-calendar-alt"></i></span>
            </div>
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Notice file*</label>
    <div class="col-sm-10">
        <div class="form-group files color">
            <input type="file" name="file" class="form-control" multiple="">
        </div>
    </div>
</div>
<div style="float: right">
    <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> Save</button>
</div>

@section('script')
    <script>
        $(document).on('click', '.edit_session', function () {
            $("#edit").modal("show");
            var session_id = $(this).attr('value');

            $.ajax({
                method:"post",
                url:"{{ url('institution/edit-session')}}",
                data:{session_id:session_id,"_token":"{{ csrf_token() }}"},
                dataType:"json",
                success:function(response){
                    console.log(response);
                    $("#session_id").val(response.id);
                    $("#year").val(response.year);
                    $("#start").val(response.start);
                    $("#end").val(response.end);
                    $("#description").val(response.description);
                },
                error:function(err){
                    console.log(err);
                }
            });
        });
    </script>
@stop
