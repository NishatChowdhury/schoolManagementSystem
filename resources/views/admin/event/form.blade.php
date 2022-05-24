<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Title*</label>
    <div class="col-sm-10">
        <div class="input-group">
            {{ Form::text('title',null,['class'=>'form-control','required']) }}
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Venue*</label>
    <div class="col-sm-10">
        <div class="input-group">
            {{ Form::text('venue',null,['class'=>'form-control','required']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" style="font-weight: 500; text-align: right">Start Date</label>
            <div class="col-sm-8">
                <div class="input-group">
{{--                    <input name="date" class="form-control datePicker" aria-describedby="">--}}
                    {{ Form::text('date',null,['class'=>'form-control datePicker','aria-describedby','required']) }}
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend2"> <i class="far fa-calendar-alt"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Start Time</label>
            <div class="col-sm-9">
                <div class="input-group">
{{--                    <input name="time" type="text" class="form-control timepicker">--}}
                    {{ Form::text('time',null,['class'=>'form-control timepicker','required']) }}
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Short Description</label>
    <div class="col-sm-10">
        <div class="input-group">
            {{--<textarea type="text" class="form-control" rows="5" id=""> </textarea>--}}
            {{ Form::textarea('details',null,['class'=>'form-control','row'=>5,'required']) }}
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Thumbnail(360X220)*</label>
    <div class="col-sm-10">
        <div class="form-group files color">
            <input type="file" name="thumbnail" class="form-control" multiple="">
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
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker3.min.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
@stop

<!-- *** External JS File -->
@section('plugin')
    <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- bootstrap time picker -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
@stop

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.datePicker')
                .datepicker({
                    format: 'yyyy-mm-dd'
                })

            //Timepicker
            $('.timepicker').timepicker({
                timeFormat: 'h:mm'
            });
        });


    </script>
@stop
