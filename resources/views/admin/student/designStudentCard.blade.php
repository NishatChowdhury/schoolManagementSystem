@extends('layouts.fixed')

@section('title','Student | Design Student ID')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Design Student ID</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Student</a></li>
                        <li class="breadcrumb-item active">Design Student ID</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="padding: 10px 10px;background-color:#ececec;">
                        <div class="row">
                            <div class="col-md-12">
                                <div style="float: right !important; margin-right: 20px; margin-bottom: 10px;">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> Add</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card" style="width: 2.5in; height: 3.9in; margin-left: 50px;  ">
                                            <div class="card-header" style="padding: 0.5rem 0.25rem;">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="left">
                                                            <img src="{{asset('assets/img/logos')}}/{{ siteConfig('logo') }}" width="100%" style="border-radius: 50%;">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="right">
                                                            <div class="scl-cd-dec" style="padding-top: 6px;">
                                                                <h6 class="scl-cd-name"><strong> {{ siteConfig('name') }}</strong></h6>
                                                                <p class="scl-cd-add">{{ siteConfig('address') }}</p>
                                                                {{--<strong class=""> <p>{{ siteConfig('name') }}  <br> </strong>--}}
                                                                {{--</p>--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body text-center">
                                                <h6  id="idtitle" class="card-title text-bold">  ID CARD </h6>
                                                <img src="{{asset('assets/img/logos')}}/{{ siteConfig('logo') }}" width="60">
                                                <h6 class="card-title text-bold nName"> Student Name </h6>
                                                <div class="row">
                                                    <div class="right" style="float:left; margin-top: 10px;">
                                                        <div class="stu-cd-dec" style="text-align: left">
                                                            <table class="table" style="font-size: 12px;">
                                                                <tbody>
                                                                <tr class="tname">
                                                                    <td><strong> Name </strong></td>
                                                                    <td>:</td>
                                                                    <td><strong> Student Name </strong></td>
                                                                </tr>
                                                                <tr class="tfname">
                                                                    <td> Father </td>
                                                                    <td>:</td>
                                                                    <td>Lorem ipsum.</td>
                                                                </tr>
                                                                <tr class="tmname">
                                                                    <td> Mother </td>
                                                                    <td>:</td>
                                                                    <td>Lorem ipsum.</td>
                                                                </tr>
                                                                <tr class="tcname">
                                                                    <td> Class </td>
                                                                    <td>:</td>
                                                                    <td> Seven </td>
                                                                </tr>
                                                                <tr class="tsname">
                                                                    <td> Section </td>
                                                                    <td>:</td>
                                                                    <td>Lorem ipsum.</td>
                                                                </tr>
                                                                <tr class="trname">
                                                                    <td> Roll </td>
                                                                    <td>:</td>
                                                                    <td>Lorem ipsum.</td>
                                                                </tr>
                                                                <tr class="tgname">
                                                                    <td> Group </td>
                                                                    <td>:</td>
                                                                    <td>Lorem ipsum.</td>
                                                                </tr>
                                                                <tr class="tbname">
                                                                    <td> Blood Group </td>
                                                                    <td>:</td>
                                                                    <td>Lorem ipsum.</td>
                                                                </tr>
                                                                <tr class="tpname">
                                                                    <td> Contact </td>
                                                                    <td>:</td>
                                                                    <td>Lorem ipsum.</td>
                                                                </tr>
                                                                <tr class="tdname">
                                                                    <td> Depertmant </td>
                                                                    <td>:</td>
                                                                    <td>Lorem ipsum.</td>
                                                                </tr>
                                                                <tr class="tdobname">
                                                                    <td> Date Of Birth </td>
                                                                    <td>:</td>
                                                                    <td>Lorem ipsum.</td>
                                                                </tr>
                                                                <tr class="taname">
                                                                    <td> Admission Date </td>
                                                                    <td>:</td>
                                                                    <td>Lorem ipsum.</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 10px;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="card-title" style="text-align: left; font-size: 14px"> <strong>ID : S306319</strong> </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p id="idsignature" class="card-title text-bold" style="text-align: right; font-size: 14px"> <strong style="border-top: 1px solid red;">Principal</strong></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer" style="height: 40px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="padding-top: 50px;">
                                        <div class="card" style="width: 2.5in; height: 3.9in; margin-left: 50px;">
                                            <div class="card-body text-center">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card-back-dec text-bold" style="text-align: left; margin-top: 10px;font-size: 12px">
                                                            <ul style="margin: 0px !important; padding: 10px 15px !important;">
                                                                <li>This card is valid till <span class="valid-date">31-Dec-2020</span></li>
                                                                <li>This card is not transferable</li>
                                                                <li>This finder of this card may please drop it to the nearest post office.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <img src="{{asset('assets/img/logos')}}/{{ siteConfig('logo') }}" width="60">
                                                <div class="row">
                                                    <div class="" style="margin-top: 20px;">
                                                        <p><strong>{{ siteConfig('name') }}  <br> </strong>
                                                            {{ siteConfig('address') }}</p>
                                                    </div>
                                                    <div class="crd-add-dec text-bold" style="margin:5px 10px; text-align: left">
                                                        <table class="table" style="font-size: 10px;">
                                                            <tbody>
                                                            <tr>
                                                                <td> Phone </td>
                                                                <td>:</td>
                                                                <td id="bphone">+880 01714 000 000</td>
                                                            </tr>
                                                            <tr>
                                                                <td> Email </td>
                                                                <td>:</td>
                                                                <td id="bemail">Example99@gmail.com.</td>
                                                            </tr>
                                                            <tr>
                                                                <td> Website </td>
                                                                <td>:</td>
                                                                <td  id="bwebsite">www.example99.org</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                {{ Form::open(['action'=>'IdCardController@pdf','method'=>'post']) }}

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"> Option</h5>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input nname" type="checkbox" id="nickname" name="nickname">
                                                    <label class="form-check-label" for="nickname">
                                                        Nick Name
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input full-name" checked type="checkbox" id="fullname" name="fullname">
                                                    <label class="form-check-label" for="fullname">
                                                        Name
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input fname" type="checkbox" id="fname" name="fname">
                                                    <label class="form-check-label" for="fname">
                                                        Father
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input mname" type="checkbox" id="mname" name="mname">
                                                    <label class="form-check-label" for="mname">
                                                        Mother
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input cname" checked type="checkbox" id="class" name="class">
                                                    <label class="form-check-label" for="class">
                                                        Class
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input sname" checked type="checkbox" id="section" name="section">
                                                    <label class="form-check-label" for="section">
                                                        Section
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input gname" checked type="checkbox" id="group" name="group">
                                                    <label class="form-check-label" for="group">
                                                        Group
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input bname" checked type="checkbox" id="blood" name="blood">
                                                    <label class="form-check-label" for="blood">
                                                        Blood
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input pname" type="checkbox" id="contact" name="contact">
                                                    <label class="form-check-label" for="contact">
                                                        Contact/Phone
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input rname" checked type="checkbox" id="roll" name="roll">
                                                    <label class="form-check-label" for="roll">
                                                        Roll
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input dname" type="checkbox" id="department" name="department">
                                                    <label class="form-check-label" for="department">
                                                        Department
                                                    </label>
                                                </div>
                                            </div>
                                            {{--<div class="form-group col-md-4">--}}
                                            {{--<div class="form-check">--}}
                                            {{--<input class="form-check-input" type="checkbox" id="gridCheck">--}}
                                            {{--<label class="form-check-label" for="gridCheck">--}}
                                            {{--Designation--}}
                                            {{--</label>--}}
                                            {{--</div>--}}
                                            {{--</div>--}}
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input dobname" type="checkbox" id="dob" name="dob">
                                                    <label class="form-check-label" for="dob">
                                                        Date Of Birth
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input aname" type="checkbox" id="admissiondate" name="admissiondate">
                                                    <label class="form-check-label" for="admissiondate">
                                                        Admission Date
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <input id="idTitle" name="title" type="text" class="form-control"  placeholder="Title..">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input id="idSignature" name="signature" type="text" class="form-control"  placeholder="signature">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input id="vtd" name="validity" class="form-control datePicker" placeholder="ex: yyyy-mm-dd">
                                                        {{--{!!  Form::text('start', null, array_merge(['class' => 'form-control datePicker','id'=>'start'])) !!}--}}
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"> Front Side</h5>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">BG Color</label>
                                                    <div class="input-group">
                                                        <input type="text" name="bgcolor" id="bghf" class="form-control my-colorpicker1 colorpicker-element">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                         <i class="fas fa-palette"></i>
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">BG Font Color</label>
                                                    <div class="input-group">
                                                        <input type="text" name="bgfont" id="hffc" class="form-control my-colorpicker1 colorpicker-element">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                          <i class="fas fa-palette"></i>
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Title Color</label>
                                                    <div class="input-group">
                                                        {{--<input type="text" class="form-control">--}}
                                                        <input type="text" name="titlecolor" id="cbhfc" class="form-control my-colorpicker1 colorpicker-element">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                          <i class="fas fa-palette"></i>
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input name="name_size" type="text" class="form-control name-size" placeholder="Institute Name Font Size ...">
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input name="address_size" type="text" class="form-control add-size" placeholder="Institute Address Font Size ...">
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input name="title_size" type="text" class="form-control title-size" placeholder="Title Size..">
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input name="body_size" type="text" class="form-control body-size" placeholder="Body Size..">
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"> Back Side</h5>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Phone</label>
                                                    <div class="input-group">
                                                        <input name="bPhone" id="bPhone" type="number" class="form-control">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                          <input type="checkbox">
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email</label>
                                                    <div class="input-group">
                                                        <input name="bemail" id="bEmail" type="email" class="form-control">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                          <input type="checkbox">
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Website</label>
                                                    <div class="input-group">
                                                        <input name="bWebsite" id="bWebsite" type="text" class="form-control">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                          <input type="checkbox">
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"> View Cards</h5>
                                        <div class="row">
                                            {{--                                            <div class="col">--}}
                                            {{--                                                <div class="form-group">--}}
                                            {{--                                                    <div class="input-group">--}}
                                            {{--                                                        {{ Form::select('user',[1=>'Student',2=>'Teacher'],null,['class'=>'form-control','placeholder'=>'Select User','required']) }}--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </div>--}}
                                            {{--                                                <!-- /input-group -->--}}
                                            {{--                                            </div>--}}
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        {{ Form::select('class',$repository->classes(),null,['class'=>'form-control','placeholder'=>'Select Class','required']) }}
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        {{ Form::select('section',$repository->sections(),null,['class'=>'form-control','placeholder'=>'Select Section']) }}
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        {{ Form::select('group',$repository->groups(),null,['class'=>'form-control','placeholder'=>'Select Section']) }}
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-info">PDF</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('style')
    <style>
        .checkbox {
            padding: 10px;
            margin: 10px 0;
        }
        input.largerCheckbox {
            width: 20px;
            height: 20px;
            background-color: transparent;
        }
        .checkbox label{
            position: absolute;
            margin-left: 5px;
            margin-top: -2px;
        }
        .radio-inline input{
            width: 15px;
            height: 15px;
            background-color: transparent;
        }
        label span{
            margin-left: 15px;
            position: absolute;
            top: -2px;
        }
        .table td, .table th {
            padding: 1px;
            vertical-align: top;
            border-top: 0;
        }
        .card-body{
            padding: 5px 10px;
        }
        .scl-cd-dec h6{
            margin-bottom: 0px !important;
            font-size: 10px;
        }
        .scl-cd-dec p{
            font-size: 8px;
        }

    </style>
@stop

@section('script')
    <script>
        $(function(){
            $(".nName").css({"display":"none"});  // for nick name
            $(".tname").css({"display":"block"});  // for name
            $(".tfname").css({"display":"none"}); // for farther name
            $(".tmname").css({"display":"none"}); // for mother name
            $(".tcname").css({"display":"block"}); // for class name
            $(".tsname").css({"display":"block"}); // for section name
            $(".trname").css({"display":"block"}); // for roll name
            $(".tgname").css({"display":"block"}); // for group name
            $(".tbname").css({"display":"block"});   // for blood
            $(".tpname").css({"display":"none"}); // for phone
            $(".tdname").css({"display":"none"});  // for department
            $(".tdobname").css({"display":"none"});  // for dob
            $(".taname").css({"display":"none"}); // for admission
        });
        //nick name
        $(document).on('click','.nname',function(){
            var nName = $(this);
            if (nName.is (':checked'))
            {
                $(".nName").css({"display":"block"})
            }else{
                $(".nName").css({"display":"none"})
            }
        });
        //full name
        $(document).on('click','.full-name',function(){
            var tname = $(this);
            if (tname.is (':checked'))
            {
                $(".tname").css({"display":"table-row"})
            }else{
                $(".tname").css({"display":"none"})
            }
        });
        //father name
        $(document).on('click','.fname',function(){
            var tfname = $(this);
            if (tfname.is (':checked'))
            {
                $(".tfname").css({"display":"table-row"})
            }else{
                $(".tfname").css({"display":"none"})
            }
        });
        //mother name
        $(document).on('click','.mname',function(){
            var tmname = $(this);
            if (tmname.is (':checked'))
            {
                $(".tmname").css({"display":"table-row"})
            }else{
                $(".tmname").css({"display":"none"})
            }
        });
        //class name
        $(document).on('click','.cname',function(){
            var tcname = $(this);
            if (tcname.is (':checked'))
            {
                $(".tcname").css({"display":"table-row"})
            }else{
                $(".tcname").css({"display":"none"})
            }
        });
        //section name
        $(document).on('click','.sname',function(){
            var tsname = $(this);
            if (tsname.is (':checked'))
            {
                $(".tsname").css({"display":"table-row"})
            }else{
                $(".tsname").css({"display":"none"})
            }
        });
        //roll name
        $(document).on('click','.rname',function(){
            var trname = $(this);
            if (trname.is (':checked'))
            {
                $(".trname").css({"display":"table-row"})
            }else{
                $(".trname").css({"display":"none"})
            }
        });
        //group name
        $(document).on('click','.gname',function(){
            var tgname = $(this);
            if (tgname.is (':checked'))
            {
                $(".tgname").css({"display":"inline"})
            }else{
                $(".tgname").css({"display":"none"})
            }
        });
        //blood name
        $(document).on('click','.bname',function(){
            var tbname = $(this);
            if (tbname.is (':checked'))
            {
                $(".tbname").css({"display":"table-row"})
            }else{
                $(".tbname").css({"display":"none"})
            }
        });
        //phone name
        $(document).on('click','.pname',function(){
            var tpname = $(this);
            if (tpname.is (':checked'))
            {
                $(".tpname").css({"display":"table-row"})
            }else{
                $(".tpname").css({"display":"none"})
            }
        });
        //dept name
        $(document).on('click','.dname',function(){
            var tdname = $(this);
            if (tdname.is (':checked'))
            {
                $(".tdname").css({"display":"table-row"})
            }else{
                $(".tdname").css({"display":"none"})
            }
        });
        //dop name
        $(document).on('click','.dobname',function(){
            var tdobname = $(this);
            if (tdobname.is (':checked'))
            {
                $(".tdobname").css({"display":"table-row"})
            }else{
                $(".tdobname").css({"display":"none"})
            }
        });
        //admission name
        $(document).on('click','.aname',function(){
            var taname = $(this);
            if (taname.is (':checked'))
            {
                $(".taname").css({"display":"table-row"})
            }else{
                $(".taname").css({"display":"none"})
            }
        });



        $("body").click(function () {
            var bghf = $("#bghf").val();
            var hffc = $("#hffc").val();
            var cbhfc = $("#cbhfc").val();
            var vtd = $("#vtd").val();


            $(".card-header,.card-footer").css({"background-color":bghf});
            $(".scl-cd-dec").css({"color":hffc});
            $(".card-title").css({"color":cbhfc});
            $(".valid-date").text(vtd);

            //institute font size
            var fins = $('.name-size').val();
            $(".scl-cd-name").css({"font-size":fins+"px"}) ;
            //institute address size
            var fas = $('.add-size').val();
            $(".scl-cd-add").css({"font-size":fas+"px"}) ;
            //title size
            var ts = $('.title-size').val();
            $(".card-title").css({"font-size":ts+"px"}) ;
            //body font size
            var bs = $('.body-size').val();
            $(".table").css({"font-size":bs+"px"}) ;
        });

        //institute font size
        $(document).on('keyup','.name-size',function () {
            var fas = $(this).val();
            $(".scl-cd-name").css({"font-size":fas+"px"}) ;
        });
        //institute address size
        $(document).on('keyup','.add-size',function () {
            var fas = $(this).val();
            $(".scl-cd-add").css({"font-size":fas+"px"}) ;
        });
        //title size
        $(document).on('keyup','.title-size',function () {
            var fas = $(this).val();
            $(".card-title").css({"font-size":fas+"px"}) ;
        });
        //card body size
        $(document).on('keyup','.body-size',function () {
            var fas = $(this).val();
            $(".table").css({"font-size":fas+"px"}) ;
        });


        //       $(document).on("click",".ffcolor",function () {
        //           var color = $(this).val();
        //
        //           $(".scl-cd-dec").css({"color":color});
        //       });
        //
        //       $(document).on("click",".hfcolor",function () {
        //           var color = $(this).val();
        //
        //           $(".").css({"background-color":color});
        //       });

        //colorPicker
        $(document).ready(function () {
            //colorPicker
            $('.my-colorpicker1').colorpicker();

            // datePicker
            $('.datePicker').datepicker({
                format: 'yyyy-mm-dd'
            });

            // Print entered text value

            $("#idTitle").on("input", function(){
                // Print entered value in a div box
                $("#idtitle").text($(this).val());
            });

            $("#bPhone").on("input", function(){
                // Print entered value in a div box
                $("#bphone").text($(this).val());
            });

            $("#bEmail").on("input", function(){
                // Print entered value in a div box
                $("#bemail").text($(this).val());
            });

            $("#bWebsite").on("input", function(){
                // Print entered value in a div box
                $("#bwebsite").text($(this).val());
            });

            $("#idSignature").on("input", function(){
                // Print entered value in a div box
                $("#idsignature").text($(this).val());
            });


        });

    </script>
@stop


<!-- *** External CSS File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker3.min.css') }}">
@stop

{{--js file--}}
@section('plugin')
    <script src= "{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/js/bootstrap-colorpicker.min.js"></script>{{--
    <script src= "{{ asset('plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>--}}
@stop

