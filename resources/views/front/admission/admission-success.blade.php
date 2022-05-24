@extends('layouts.front-inner')

@section('title','Online Admission Form')

@php $student = $errors->all() @endphp

@section('content')

    <div class="container">
        <div class="mb-5 text-center">
            <h3 class="text-success">{{ $student['name'] }} your admission request has been submitted successfully.</h3>
            <h4>Print these following documents</h4>

            <a href="{{ action('FrontController@studentForm',['ssc_roll'=>$student['ssc_roll']]) }}" class="btn btn-success">Admission Form</a>
            <a href="{{ action('FrontController@invoice',['ssc_roll'=>$student['ssc_roll']]) }}" class="btn btn-success">Invoice</a>
{{--            <a href="{{ action('FrontController@bankSlip',['ssc_roll'=>$student['ssc_roll']]) }}" class="btn btn-success">Bank Slip</a>--}}
        </div>
    </div>

@stop
