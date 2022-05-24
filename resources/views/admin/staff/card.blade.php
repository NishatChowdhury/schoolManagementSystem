<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -7.5px;
            margin-left: -7.5px;
        }
        .col{
            width : 33% !important;
            display : inline-block;
            position: relative;
            float: left;
        }
        .card{
            box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
        }
        .card-head{
            height: 70px;
            border-bottom: 1px solid rgba(0,0,0,.125);
            padding-bottom: 7px;
        }
        .scl-cd-dec{
            /*position: absolute;*/
            /*top: 2px;*/
            /*left: 20px;*/
        }
        .scl-cd-dec h6{
            margin: 0px !important;
            font-size: 10px;
        }
        .scl-cd-dec p{
            margin: 0px !important;
            font-size: 8px;
        }
        .card-body{
            text-align: center;
        }
        .card-body img{
            padding: 0px !important;
            margin: 0px !important;
        }
        .card-body  h6{
            margin-top: 0px;
        }
        .card-body table{
            margin: 0px !important;
            padding: 0px !important;
        }
        .table{
            margin: 0px !important;
        }
        .table tbody tr td{
            margin: 0px !important;
            padding: 0px !important;
            font-size: 13px;
        }

    </style>
</head>
<body>
<section>
    <div>

        @foreach($staffs->chunk(3) as $chunk)
        <div class="row" style="margin: 20px 0;">
            @foreach($chunk as $staff)
                <div class="col">
                    <div class="card" style="width: 210px; height:325px; border: 1px solid #484848;">
                        <div class="card-head" style="background-color:{{ $card['bgcolor'] }};color:{{ $card['bgfont'] }}">

                            <div class="left" style="float: left; width: 20%;">
                                <img  src="{{asset('assets/img/logos')}}/{{ siteConfig('logo') }}" width="100%" style="border-radius: 50%; margin-top: 2px; width:40px; height: auto;">
                            </div>



                            <div class="right" style="float: right;display: inline-block; margin-top: -35px; margin-left: 8px; width: 80%" >
                                <div class="scl-cd-dec">
                                    <h6 class="scl-cd-name" style="font-size:{{ $card['name_size'] !=null ? $card['name_size'] :  0}}px"><strong> {{ siteConfig('name') }}</strong></h6>
                                    <p class="scl-cd-add" style="font-size:{{ $card['address_size'] !=null ? $card['address_size']:0 }}px">{{ siteConfig('address') }}</p>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <h6  id="idtitle" class="card-title" style="padding: 10px !important; margin:0 !important; color:{{ $card['titlecolor'] }};font-size:{{ $card['title_size']!=null ? $card['title_size'] : 0 }}px">{{ $card['title'] }}</h6>
                            <img src="{{asset('assets/img/staffs')}}/{{ $staff->image }}" width="50">
                            @isset($card['nickname'])
                            <h6 class="card-title" style="padding: 10px !important; margin:0px !important;color:{{ $card['titlecolor'] }};font-size:{{ $card['title_size']!=null ? $card['title_size'] : 0 }}px"> {{ $staff->name }} </h6>
                            @endisset
                            <table class="table" style="text-align:left;font-size:{{ $card['body_size']!=null ? $card['body_size']: 0 }}px">
                                <tbody>
                                @isset($card['fulname'])
                                <tr>
                                    <td><strong> Name </strong></td>
                                    <td>:</td>
                                    <td><strong> {{ $staff->name }} </strong></td>
                                </tr>
                                @endisset
                                @isset($card['fname'])
                                <tr>
                                    <td> Father/Husband </td>
                                    <td>:</td>
                                    <td>{{ $staff->father_husband }}</td>
                                </tr>
                                @endisset
                                @isset($card['mname'])
                                <tr>
                                    <td> Designation </td>
                                    <td>:</td>
                                    <td>{{ $staff->title }}</td>
                                </tr>
                                @endisset
                                @isset($card['contact'])
                                <tr>
                                    <td> Contact </td>
                                    <td>:</td>
                                    <td>{{ $staff->mobile }}</td>
                                </tr>
                                @endisset
                                @isset($card['designation'])
                                <tr>
                                    <td> Designation </td>
                                    <td>:</td>
                                    <td>{{ $staff->title }}</td>
                                </tr>
                                @endisset
                                @isset($card['blood'])
                                <tr>
                                    <td> Blood Group </td>
                                    <td>:</td>
                                    <td>{{ $staff->blood->name ?? '' }}</td>
                                </tr>
                                @endisset
                                </tbody>
                            </table>
                        </div>

                        <div class="card-body-footer" style="clear: both;">
                            <div class="body-left" style="float: left">
                                <p class="card-title" style="text-align: left; font-size: 14px;color:{{ $card['titlecolor'] }};"> <strong>ID : 2020{{ $staff->code }}</strong> </p>
                            </div>
                            <div class="body-right" style="float: right">
                                <p id="idsignature" class="card-title" style="text-align: left; margin-right: 5px; font-size: 14px;color:{{ $card['titlecolor'] }};"> <strong style="border-top: 1px solid red;">{{ $card['signature'] }}</strong></p>
                            </div>
                        </div>
                        <br>
                        <div class="card-footer" style="position:relative; margin-bottom:-100px; height: 20px; margin-top: 20px; background-color:{{ $card['bgcolor'] }}"></div>


                    </div>
                </div>
            @endforeach
            <p></p>
        </div>
        @endforeach

    </div>
</section>

</body>
</html>