@extends('layouts.fixed')

@section('title','Institution Mgnt | Profile')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Institution Name</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Profile</a></li>
                        <li class="breadcrumb-item active">Edit Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-6">
                                <table id="example2" class="table table-bordered" style="margin: 10px;">
                                    <thead>
                                        <tr>
                                            <th>
                                                <h3 class="card-title"> Institution Details </h3>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="card-body">
                                                    <form>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Status</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id=""  aria-describedby="" placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Institution Name</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id=""  aria-describedby="" placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Institution Code</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id=""  aria-describedby="" placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">BDM</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id=""  aria-describedby="" placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Phone</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id=""  aria-describedby="" placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Fax</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id=""  aria-describedby="" placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Website</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id=""  aria-describedby="" placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Admission Registration Url</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id=""  aria-describedby="" placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-6">
                                <table id="example2" class="table table-bordered" style="margin: 10px;">
                                    <thead>
                                    <tr>
                                        <th>
                                            <h3 class="card-title"> Street Address </h3>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="card-body">
                                                <form>
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Address*</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id=""  aria-describedby="" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Area/Town</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id=""  aria-describedby="" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Post/Zip Code*</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id=""  aria-describedby="" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">State</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group">
                                                                <select id="inputState" class="form-control" style="height: 35px !important;">
                                                                    <option>Select</option>
                                                                    <option>...</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Country*</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id=""  aria-describedby="" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>


                                <table id="example2" class="table table-bordered" style="margin: 10px;">
                                    <thead>
                                    <tr>
                                        <th>
                                            <h3 class="card-title"> Postal Address </h3>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="card-body">
                                                <form>
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Address*</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id=""  aria-describedby="" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Area/Town</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id=""  aria-describedby="" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop