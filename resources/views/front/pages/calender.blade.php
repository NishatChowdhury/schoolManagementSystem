@extends('layouts.front-inner')

@section('title','Inner Page')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>Academic Calender</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">Institute</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> Academics</a>
                        </li>
                        <li class="breadcrumb-item">
                            {{ ucfirst($content->name) }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-100 border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Sl</th>
                            <th>Title</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Days</th>
                        </tr>
                    </thead>
                    @php $i=1; $total = 0;@endphp
                    <tbody>
                        @foreach($data as $calander)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    {{ ucfirst($calander->name) }}
                                </td>
                                <td class="text-center">
                                    {{ \Carbon\Carbon::parse($calander->start)->format('d F Y') }}
                                </td>
                                <td class="text-center">
                                    {{ \Carbon\Carbon::parse($calander->end)->format('d F Y') }}
                                </td>
                                <td class="text-center">
                                    @php

                                        $start = \Carbon\Carbon::parse($calander->start);
                                        $end = \Carbon\Carbon::parse($calander->end);
                                        $days = $start->diff($end);
                                        //echo $days->days;
                                        $total +=$days->days;
                                    @endphp
                                    {{ $days->days  }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Total Days</th>
                            <th class="text-center">{{ $total }}</th>
                        </tr>
                    </tfoot>

                </table>


            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>

@stop