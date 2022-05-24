@extends('layouts.front-inner')

@section('title','Class Routine')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>Class Routine</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> Elements</a>
                        </li>
                        <li class="breadcrumb-item">
                            About us
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-100 border-bottom">
        <div class="container">
            <div class="row align-items-center">

                @foreach($classes as $cls)
                    <div class="col-12 mb-5 text-center">
                        <h6>
                            {{ $cls->first()->academicClass->academicClasses->name ?? '' }}&nbsp;
                            <span class="text-primary">
                                {{ $cls->first()->academicClass->section->name ?? '' }}
                                {{ $cls->first()->academicClass->group->name ?? '' }}
                            </span>
                        </h6>
                    </div>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th></th>
                            @foreach($cls->groupBy('day_id') as $day => $schedule)
                                @if($day == 1)
                                @foreach($schedule as $sch)
                                <td>
                                    {{ $sch->name }}
                                </td>
                                @endforeach
                                @endif
                            @endforeach
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($cls->groupBy('day_id') as $day => $schedule)
                            <tr>
                                <td class="text-bold">{{ \App\Day::query()->findOrNew($day)->short_name }}</td>
                                @foreach($schedule as $sch)
                                    <td>
                                        {{ $sch->subject->short_name ?? '' }}<br>
{{--                                        {{ $sch->start }} - {{ $sch->end }}--}}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endforeach

            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>

@stop
