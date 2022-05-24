<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WPIMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        *{
            font-family: Arial;
        }
        tr{
            padding-bottom: 18px;
        }
        th{
            font-size: 18px;
        }

    </style>

</head>
<body>
@foreach($students->chunk(3) as $key => $chunk)
    <div class="row mb-4" style="{{ ($key+1) % 5 == 0 ? 'page-break-after: always' : '' }}">
        @foreach($chunk as $student)
            <div class="col-4">
                <div class="card" style="border: 2px solid black;">
                    <div class="card-header text-center">
                        <h5 class="card-title" style="font-weight: bold;">{{ strtoupper(siteConfig('name')) }}</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center" style="color: #05052e;font-weight: bold; border-radius: 5px; border: 2px solid black">{{ strtoupper($seatData->exam->name) }}</h5>
                        {{--<h5 class="card-title" style="font-weight: bold;"></h5>--}}
                        <table>

                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td> : </td>
                                    <th > {{ ucfirst($student->name) }} </th>
                                </tr>

                                <tr>
                                    <td>Roll</td>
                                    <td> : </td>
                                    <th> {{ $student->rank }} </th>
                                </tr>

                                <tr>
                                    <td>Class</td>
                                    <td> : </td>
                                    <th> {{ $student->classes->name }}
                                        {{ $student->section ? $student->section->name : ''}}
                                        {{ $student->group ? $student->group->name : ''}}
                                    </th>
                                </tr>

                                <tr>
                                    <td>Room No</td>
                                    <td> : </td>
                                    <th> {{ $seatData->room }}
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        @endforeach
        {{--        <p>&nbsp;</p>--}}
    </div>
@endforeach

</body>
</html>
