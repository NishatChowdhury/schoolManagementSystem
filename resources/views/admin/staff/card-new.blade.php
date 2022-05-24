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
        .table td{
            padding: 0;
            border-top: none;
        }
        .card-body{
            padding: 0 10px 10px 10px;
        }
        .card-footer{
            padding: 0;
        }
    </style>

</head>
<body>
@foreach($staffs->chunk(3) as $chunk)
    <div class="row" style="margin: 25px;">
        @foreach($chunk as $staff)
            <div class="col-4" {{--style="max-width:260px; max-height:375px"--}}>
                <div class="card text-center" style="width: 18rem;height:25rem">
                    <div class="card-header" style="padding:10px 0 0 10px;background-color:{{ $card['bgcolor'] }};color:{{ $card['bgfont'] }}">
                        <div class="row">
                            <div class="col-md-2">
                                <img  src="{{asset('assets/img/logos')}}/{{ siteConfig('logo') }}" width="50">
                            </div>
                            <div class="col-md-10">
                                <h6 class="scl-cd-name" style="font-size:{{ $card['name_size'] !=null ? $card['name_size'] :  0}}px"><strong> {{ siteConfig('name') }}</strong></h6>
                                <p class="scl-cd-add" style="font-size:{{ $card['address_size'] !=null ? $card['address_size']:0 }}px">{{ siteConfig('address') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6  id="idtitle" class="card-title" style="color:{{ $card['titlecolor'] }};font-size:{{ $card['title_size']!=null ? $card['title_size'] : 0 }}px"><strong>{{ $card['title'] }}</strong></h6>
                        <img src="{{asset('assets/img/staffs')}}/{{ $staff->image }}" width="75" style="margin-bottom:10px">
                        @isset($card['nickname'])
                            <h6 class="card-title" style="color:{{ $card['titlecolor'] }};font-size:{{ $card['title_size']!=null ? $card['title_size'] : 0 }}px"> {{ $staff->name }} </h6>
                        @endisset

                        <table class="table" style="text-align:left;font-size:{{ $card['body_size']!=null ? $card['body_size']: 0 }}px">
                            <tbody>
                            @isset($card['fulname'])
                                <tr>
                                    <td><strong> Name </strong></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><strong> {{ $staff->name }} </strong></td>
                                </tr>
                            @endisset
                            @isset($card['fname'])
                                <tr>
                                    <td> Father/Husband </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $staff->father_husband }}</td>
                                </tr>
                            @endisset
                            @isset($card['mname'])
                                <tr>
                                    <td> Mother </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $staff->mother }}</td>
                                </tr>
                            @endisset
                            @isset($card['contact'])
                                <tr>
                                    <td> Contact </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $staff->mobile }}</td>
                                </tr>
                            @endisset
                            @isset($card['designation'])
                                <tr>
                                    <td> Designation </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $staff->title }}</td>
                                </tr>
                            @endisset
                            @isset($card['blood'])
                                <tr>
                                    <td> Blood Group </td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $staff->blood->name ?? '' }}</td>
                                </tr>
                            @endisset
                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer" style="float:right;background-color:white;border:none">
                        <div class="col-5" style="float: right;">
                            <img src="{{ asset('assets/img/signature/signature.png') }}" width="75" alt="">
                        </div>
                    </div>
                    <div class="card-footer text-muted" style="background-color:{{ $card['bgcolor'] }};font-size:{{ $card['body_size']!=null ? $card['body_size']: 0 }}px">
                        <div class="row">
                            <div class="col">
                                <p class="card-title" style="color:{{ $card['bgfont']}};"> <strong>ID : 2020{{ $staff->code }}</strong> </p>
                            </div>
                            <div class="col">
                                <p id="idsignature" class="card-title" style="color:{{ $card['titlecolor'] }};"> <strong style="color:{{ $card['bgfont']}}">{{ $card['signature'] }}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <p>&nbsp;</p>
    </div>
@endforeach


<div class="row" style="margin: 25px;">
        <div class="col-4" style="max-width:260px; max-height:375px">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <div class="back-top" style="font-size:15px">
                        <ul>
                            {{--<li>This card is valid till 13.01.2020</li>--}}
                            <li>This card is not transferable</li>
                            <li>This finder of this card may please drop it to the nearest post office.</li>
                        </ul>
                    </div>
                    <div class="back-middle text-center">
                        <img  src="{{asset('assets/img/logos')}}/{{ siteConfig('logo') }}" width="50">
                        <h6 class="scl-cd-name" style=""><strong> {{ siteConfig('name') }}</strong></h6>
                        <p class="scl-cd-add" style="font-size:15px">{{ siteConfig('address') }}</p>
                    </div>
                    <div class="back-bottom" style="font-size:15px">
                        <table class="table">
                            <tr>
                                <td>Phone</td>
                                <td style="padding: 0 5px">:</td>
                                <td>{{ siteConfig('phone') }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td style="padding: 0 5px">:</td>
                                <td>{{ siteConfig('email') }}</td>
                            </tr>
                            <tr>
                                <td>Website</td>
                                <td style="padding: 0 5px">:</td>
                                <td>{{ url('/') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <p>&nbsp;</p>
</div>

</body>
</html>
