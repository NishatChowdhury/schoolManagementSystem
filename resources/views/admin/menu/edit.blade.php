{{ Form::model($menu,['route'=>['menu.update',$menu->id],'method'=>'patch','id'=>'edit-form']) }}
<div class="modal-body">
    <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label" style="font-weight: 500; text-align: right">Parent</label>
        <div class="col-sm-8">
            <div class="input-group">
                {{ Form::select('menu_id',$parents,null,['class'=>'form-control','placeholder'=>'Select Parent Menu if any']) }}
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label" style="font-weight: 500; text-align: right">Menu Name*</label>
        <div class="col-sm-8">
            <div class="input-group">
                {{ Form::text('name',null,['class'=>'form-control','required']) }}
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label" style="font-weight: 500; text-align: right">Page Type*</label>
        <div class="col-sm-8">
            <div class="input-group">
                {{ Form::select('type',[4=>'Parent Menu',1=>'Page',2=>'URL',3=>'System Page'],null,['class'=>'form-control','id'=>'edit-page-type','required']) }}
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label" style="font-weight: 500; text-align: right">Select Page*</label>
        <div class="col-sm-8">
            <div class="input-group">
                {{ Form::select('page_id',$pages,null,['class'=>'form-control','id'=>'edit-page']) }}
                {{ Form::text('url',null,['class'=>'form-control','id'=>'edit-url']) }}
                {{ Form::select('system_page',$systemPages,null,['class'=>'form-control','id'=>'edit-system-page']) }}
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label" style="font-weight: 500; text-align: right">URI*</label>
        <div class="col-sm-8">
            <div class="input-group">
                {{ Form::text('uri',null,['class'=>'form-control','required']) }}
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label" style="font-weight: 500; text-align: right">Order Key*</label>
        <div class="col-sm-8">
            <div class="input-group">
                {{ Form::text('order',null,['class'=>'form-control','required']) }}
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
</div>
{{ Form::close() }}

    <script>
        $(document).ready(function(){
            var pageType = $("#edit-page-type").val();
            if(pageType === '1'){
                $("#edit-page").show();
                $("#edit-url").hide();
                $("#edit-system-page").hide();
            }else if(pageType === '2'){
                $("#edit-page").hide();
                $("#edit-url").show();
                $("#edit-system-page").hide();
            }else if(pageType === '3'){
                $("#edit-page").hide();
                $("#edit-url").hide();
                $("#edit-system-page").show();
            }else{
                $("#edit-page").hide();
                $("#edit-url").hide();
                $("#edit-system-page").hide();
            }
        })

        $("#edit-page-type").change(function(){
            var pageType = $(this).val();
            if(pageType === '1'){
                $("#edit-page").show();
                $("#edit-url").hide();
                $("#edit-system-page").hide();
            }else if(pageType === '2'){
                $("#edit-page").hide();
                $("#edit-url").show();
                $("#edit-system-page").hide();
            }else if(pageType === '3'){
                $("#edit-page").hide();
                $("#edit-url").hide();
                $("#edit-system-page").show();
            }else{
                $("#edit-page").hide();
                $("#edit-url").hide();
                $("#edit-system-page").hide();
            }
        })
    </script>
