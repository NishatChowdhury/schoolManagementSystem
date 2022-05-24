{{ Form::model($vid,['action'=>['VideoController@update',$vid->id],'method'=>'patch']) }}
{{ Form::hidden('playlist_id',$vid->playlist_id) }}
<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Video Title*:</label>
    <div class="col-sm-10">
        <div class="input-group">
            {{--<input type="text" class="form-control" id=""  aria-describedby="">--}}
            {{ Form::text('title',null,['class'=>'form-control','required']) }}
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Paste youtube embed code*:</label>
    <div class="col-sm-10">
        <div class="input-group">
            {{--<input type="text" class="form-control" id=""  aria-describedby="">--}}
            {{ Form::textarea('code',null,['class'=>'form-control','required']) }}
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Sorting Order:</label>
    <div class="col-sm-10">
        <div class="input-group">
            {{--<input type="text" class="form-control" id=""  aria-describedby="">--}}
            {{ Form::text('order',null,['class'=>'form-control']) }}
        </div>
    </div>
</div>
<div style="float: right">
    <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> Update</button>
</div>
{{ Form::close() }}
