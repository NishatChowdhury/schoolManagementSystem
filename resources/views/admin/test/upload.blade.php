<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
{{ Form::open(['action'=>'ExamController@file','method'=>'post','files'=>true]) }}
{{--<select name="exam_id" id="" required>--}}
{{--<option value="">Select Exam</option>--}}
{{--<option value="1" selected>1st Term Exam</option>--}}
{{--<option value="2">Half Yearly Exam</option>--}}
{{--<option value="3">2nd Monthly</option>--}}
{{--<option value="4">Annual Exam</option>--}}
{{--</select>--}}
{{--<select name="class_id" id="" required>--}}
{{--<option value="">Select Class</option>--}}
{{--<option value="1">Nursery</option>--}}
{{--<option value="2">K.G</option>--}}
{{--<option value="3">One</option>--}}
{{--<option value="4">Two</option>--}}
{{--<option value="5">Three</option>--}}
{{--<option value="6">Four</option>--}}
{{--<option value="7">Five</option>--}}
{{--<option value="8">Six</option>--}}
{{--<option value="9" selected>Seven</option>--}}
{{--<option value="10">Eight</option>--}}
{{--<option value="11">Nine</option>--}}
{{--<option value="12">Ten</option>--}}
{{--</select>--}}
@php
    $subjects = \App\Subject::all()->pluck('name','id');
@endphp
<select name="subject_id" id="" required>
    <option value="">Select Subject</option>
    @foreach($subjects as $id => $subject)
        <option value="{{ $id }}">{{ $subject }}</option>
    @endforeach
    {{--<option value="">Select Subject</option>--}}
    {{--<option value="1">Bangla 1st</option>--}}
    {{--<option value="2">Bangla 2nd</option>--}}
    {{--<option value="3">English 1st</option>--}}
    {{--<option value="4">English 2nd</option>--}}
    {{--<option value="5">BGS</option>--}}
    {{--<option value="6">G.Sc</option>--}}
    {{--<option value="7">ICT</option>--}}
    {{--<option value="8">Math</option>--}}
    {{--<option value="9">Religion</option>--}}
    {{--<option value="10">Bengali</option>--}}
    {{--<option value="11">English</option>--}}
    {{--<option value="12">Agr. Sc</option>--}}
    {{--<option value="13">Phy. Edu</option>--}}
    {{--<option value="14">Karmo O Jibon</option>--}}
    {{--<option value="15">Arts & Craft</option>--}}
    {{--<option value="16">Physics</option>--}}
    {{--<option value="17">Chemistry</option>--}}
    {{--<option value="18">H. Math</option>--}}
    {{--<option value="19">B. Ent</option>--}}
    {{--<option value="20">Accounting</option>--}}
    {{--<option value="21">F. Banking</option>--}}
    {{--<option value="22">Geography</option>--}}
    {{--<option value="23">Economics</option>--}}
    {{--<option value="24">History</option>--}}
    {{--<option value="25">Biology</option>--}}
    {{--<option value="26">Drawing</option>--}}
    {{--<option value="27">Com. Studies</option>--}}
    {{--<option value="28">Environment</option>--}}
    {{--<option value="29">General Knowledge</option>--}}
</select>
<input type="file" name="file">
<input type="submit">
{{ Form::close() }}
</body>
</html>
