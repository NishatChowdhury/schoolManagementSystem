{!!  Form::model($category,['action'=>['BookCategoryController@update',$category->id],'method'=>'patch','id'=>'edit-form']) !!}
<div class="modal-body">
    <div class="form-group">
        {{ Form::label('book_category', 'Book Category',['class'=>'control-label' ]) }}
        {{ Form::text('book_category', null, ['placeholder' => 'Enter Category Name','class'=>'form-control']) }}
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
</div>
{!! Form::close() !!}
