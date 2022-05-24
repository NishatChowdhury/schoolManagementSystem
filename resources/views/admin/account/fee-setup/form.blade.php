
    <div class="card">
        <div class="col-md-12 col-sm-12" style="margin-top: 20px; ">
            <div class="card-header">
                <h5 class="card-title">Select Month</h5>
            </div>
        </div>
        <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="month[]" value="1" {{ $fee_setup->month  == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="gridCheck">
                                    January
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="month[]" value="2"
                                        {{  $fee_setup->first() !=null && $fee_setup->first()->month  == 2 ? 'checked' : '' }}>
                                <label class="form-check-label" for="gridCheck">
                                    February
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="month[]" value="3"
                                        {{  $fee_setup->first() !=null && $fee_setup->first()->month  == 3 ? 'checked' : '' }}>
                                <label class="form-check-label" for="gridCheck">
                                    March
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="month[]" value="4"
                                        {{  $fee_setup->first() !=null && $fee_setup->first()->month  == 4 ? 'checked' : '' }}>
                                <label class="form-check-label" for="gridCheck">
                                    April
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="month[]" value="5"
                                        {{  $fee_setup->first() !=null && $fee_setup->first()->month  == 5 ? 'checked' : '' }}>
                                <label class="form-check-label" for="gridCheck">
                                    May
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="month[]" value="6"
                                        {{  $fee_setup->first() !=null && $fee_setup->first()->month  == 6 ? 'checked' : '' }}>
                                <label class="form-check-label" for="gridCheck">
                                    June
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
               <div class="row">
                   <div class="col-md-2">
                       <div class="form-group">
                           <div class="form-check">
                               <input class="form-check-input" type="checkbox" name="month[]" value="7"
                                       {{  $fee_setup->first() !=null && $fee_setup->first()->month  == 7 ? 'checked' : '' }}>
                               <label class="form-check-label" for="gridCheck">
                                   July
                               </label>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-2">
                       <div class="form-group">
                           <div class="form-check">
                               <input class="form-check-input" type="checkbox" name="month[]" value="8"
                                       {{  $fee_setup->first() !=null && $fee_setup->first()->month  == 8 ? 'checked' : '' }}>
                               <label class="form-check-label" for="gridCheck">
                                   August
                               </label>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-2">
                       <div class="form-group">
                           <div class="form-check">
                               <input class="form-check-input" type="checkbox" name="month[]" value="9"
                                       {{  $fee_setup->first() !=null && $fee_setup->first()->month  == 9 ? 'checked' : '' }}>
                               <label class="form-check-label" for="gridCheck">
                                   September
                               </label>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-2">
                       <div class="form-group">
                           <div class="form-check">
                               <input class="form-check-input" type="checkbox" name="month[]" value="10"
                                       {{  $fee_setup->first() !=null && $fee_setup->first()->month  == 10 ? 'checked' : '' }}>
                               <label class="form-check-label" for="gridCheck">
                                   October
                               </label>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-2">
                       <div class="form-group">
                           <div class="form-check">
                               <input class="form-check-input" type="checkbox" name="month[]" value="11"
                                       {{  $fee_setup->first() !=null && $fee_setup->first()->month  == 11 ? 'checked' : '' }}>
                               <label class="form-check-label" for="gridCheck">
                                   November
                               </label>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-2">
                       <div class="form-group">
                           <div class="form-check">
                               <input class="form-check-input" type="checkbox" name="month[]" value="12"
                                       {{  $fee_setup->first() !=null && $fee_setup->first()->month  == 12 ? 'checked' : '' }}>
                               <label class="form-check-label" for="gridCheck">
                                   December
                               </label>
                           </div>
                       </div>
                   </div>
               </div>

        </div>
    </div>
    <div class="card">
        <div class="col-md-12 col-sm-12" style="margin-top: 20px; ">
            <div class="card-header">
                <h5 class="card-title">Setup Amount Fee Category</h5>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <table class="table table-bordered table-striped table-sm">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <td>SL</td>
                            <td>Category Name</td>
                            <td>Description</td>
                            <td>Amount</td>
                        </tr>
                    </thead>
                    @php $i=1; @endphp
                    <tbody>
                    @foreach($feeCategories as $category)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>
                                {{ucwords($category->name)}}
                                {!! Form::hidden('category_id[]',$category->id) !!}

                            </td>
                            <td>{{ucfirst($category->description)}}</td>
                            @if ($fee_setup->count() == 1)
                                @php $isExit1 = \App\FeePivot::query()->where('fee_setup_id',$fee_setup->id)->where('fee_category_id',$category->id)->first() ; @endphp
                                @php
                                    $isExit = \App\FeePivot::query()->where('fee_setup_id',$fee_setup->id)->where('fee_category_id',$category->id)->first() ;
                                @endphp
                                <td>{!! Form::number('amount[]',$isExit !=null ? $isExit->amount : 0  ,['class'=>'form-control','placeholder'=>'ex: 100']) !!}</td>
                            @else
                                <td>{!! Form::number('amount[]', 0 ,['class'=>'form-control','placeholder'=>'ex: 100']) !!}</td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>




