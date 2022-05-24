@extends('layouts.front-inner')

@section('title','Online Admission Form')

@section('content')

{{--    @php $student = \Illuminate\Support\Facades\Session::get('data') @endphp--}}

    <div class="py-5 bg-dark no-print">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>Admission Form</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> Result</a>
                        </li>
                        <li class="breadcrumb-item">
                            {{ ucfirst('Admission Form') }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <section class="padding-y-20 border-bottom slip" >
            <div class="top-bar">
                <div class="row">
                    <div class="col-md-6 text-left">ফ-১১</div>
                    <div class="col-md-6 text-right">নগদ/হসতান্তর</div>
                </div>
            </div>
            <div class="bank-title text-center">
                <h3><img src="{{ asset('assets/img/sonali-bank.png') }}" alt="" height="50"> সোনালী ব্যাংক লিমিটেড</h3>
                <p><u>ডিমান্ড ড্রাফট/মেইল ট্রান্সফার/টেলিগ্রাফিক ট্রান্সফার/এনি ব্রাঞ্চ ব্যাংকিং (এবিবি) এর আবেদন ফরম</u></p>
            </div>
            <div class="slip-body">
                <p>নিম্নলিখিত বর্ণনা অনুয়ায়ি ডিডি <input type="checkbox" disabled> এমটি <input type="checkbox" disabled> টিটি <input type="checkbox" disabled> এবিবি <input type="checkbox" disabled> এর অর্থ প্রেরণের জন্য অনুরোধ করিতেছি। এই জন্য আমি/আমরা নগদ <input type="checkbox" disabled> চেকের <input type="checkbox" disabled> মাধ্যমে (কথায়) সাত হাজার দুইশত টাকা জমা প্রদান করিলাম। এমটি/টিটি/এবিবি আমার/আমাদের খরচে ও ঝুঁকিতে প্রেরণের অনুরোধ জানাইতেছি। আমি/আমরা এই মর্মে ঘোষণা করিতেছি যে, যান্ত্রিক গোলযোগের কারণে এমটি/টিটি/এবিবি বার্তা গন্তব্যে (প্রদানকারী শাখায়) পৌঁছানোর ক্ষেত্রে বিলম্ব বা বার্তাতে ভুল, ত্রুটি অথবা বার্তায় ভুল ব্যাখ্যা ইত্যাদি কারণে এমটি/টিটি/এবিবি'র টাকা পরিশোধে বিলম্বের জন্য জন্য প্রেরণকারী ব্যাঙ্ককে দায়ী করা হইবে না। </p>
                <p>আবেদনকারীর নাম: {{ $student['name'] }} ({{ $student['studentId'] }})</p>
                <p>ঠিকানা: {{ $student['address'] }} </p>
                <div class="row">
                    <div class="col-md-6">মোবাইল/টেলিফোন নম্বর: {{ $student['mobile'] }}</div>
                    <div class="col-md-6">হিসাব নম্বর (যদি থাকে):</div>
                </div>
                <p>প্রাপকের মোবাইল নম্বর (যদি থাকে): 01711306359 </p>
            </div>
            <table class="table table-bordered">
                <tr class="text-center">
                    <td>নগদ টাকা বা চেকের বিবিরণ</td>
                    <td>প্রাপকের নাম এবং হিসাব নং</td>
                    <td>প্রাপক থাখার নাম ও জেলার নাম </td>
                    <td colspan="7">টাকার বিবরণ</td>
                </tr>
                <tr class="text-center">
                    <td>(০১)</td>
                    <td>(০২)</td>
                    <td>(০৩)</td>
                    <td colspan="7">(০৪)</td>
                </tr>
                <tr style="border:none">
                    <td style="border:none"></td>
                    <td style="border-top:none;border-bottom:none"></td>
                    <td style="border:none"></td>
                    <td>ক </td>
                    <td>প্রেরিত টাকার পরিমাণ </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="border:none">
                    <td style="border:none"></td>
                    <td style="border-top:none;border-bottom:none"></td>
                    <td style="border:none"></td>
                    <td>খ </td>
                    <td>কমিশন </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="border:none">
                    <td style="border:none"></td>
                    <td style="border-top:none;border-bottom:none"></td>
                    <td style="border:none"></td>
                    <td>গ </td>
                    <td>ভ্যাট (কমিশনের %)১৫ </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="border:none">
                    <td style="border:none"></td>
                    <td style="border-top:none;border-bottom:none"></td>
                    <td style="border:none"></td>
                    <td>ঘ </td>
                    <td>ডাকমাশুল/টেলিফোন/মোবাইল </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="border:none">
                    <td style="border:none"></td>
                    <td style="border-top:none;border-bottom:none"></td>
                    <td style="border:none"></td>
                    <td></td>
                    <td>সর্বমোট </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <p>
                @if($student['group_id'] == 1)
                    সর্বমোট টাকার পরিমাণ (কথায়): দুই হাজার সাতশত টাকা মাত্র।
                @elseif($student['group_id'] == 2)
                    সর্বমোট টাকার পরিমাণ (কথায়): দুই হাজার সাতশত টাকা মাত্র।
                @else
                    সর্বমোট টাকার পরিমাণ (কথায়): দুই হাজার সাতশত টাকা মাত্র।
                @endif
            </p>
            <div>
                <div class="row">
                    <div class="col-md-3">ক্যাশ স্ক্রল নং </div>
                    <div class="col-md-3">অফিসার (ক্যাশ)</div>
                    <div class="col-md-3">অফিসার স্ক্রল নং</div>
                    <div class="col-md-3">ট্রান্সফার স্ক্রল নং</div>
                </div>
            </div>
            <p>ইস্যুকৃত এমটি/টিটি/এবিবি/ডিডি নংঃ __________________ বুঝিয়া পাইলাম। </p>
            <p class="text-right">আবেদনকারীর স্বাক্ষর </p>
        </section>

        <section class="padding-y-20 border-bottom" id="cost-memo">
            <div class="text-right">
                নগদ/হস্তান্তর
            </div>
            <h3 class="text-center"><img src="{{ asset('assets/img/sonali-bank.png') }}" alt="" height="50"> সোনালী ব্যাংক লিমিটেড</h3>
            <h2 class="text-center">কস্ট মেমো </h2>
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <td>ক </td>
                            <td>প্রেরিত টাকার পরিমাণ </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>খ </td>
                            <td>কমিশন </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>গ </td>
                            <td>ভ্যাট (কমিশনের %)১৫ </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>ঘ </td>
                            <td>ডাকমাশুল/টেলিফোন/মোবাইল </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>সর্বমোট </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                    <p>
                        @if($student['group_id'] == 1)
                            সর্বমোট টাকার পরিমাণ (কথায়): দুই হাজার সাতশত টাকা মাত্র।
                        @elseif($student['group_id'] == 2)
                            সর্বমোট টাকার পরিমাণ (কথায়): দুই হাজার সাতশত টাকা মাত্র।
                        @else
                            সর্বমোট টাকার পরিমাণ (কথায়): দুই হাজার সাতশত টাকা মাত্র।
                        @endif
                    </p>
                    <p>আবেদনকারীর নামঃ {{ $student['name'] }} ({{ $student['studentId'] }})</p>
                    <p style="color:darkorange">Generated by Webpoint Limited</p>
                </div>
                <div class="col-md-6">
                    <p>প্রাপকের নামঃ ফটিকছড়ি ডিগ্রি কলেজ </p>
                    <p>হিসাব নংঃ ৩৩০১২৫ </p>
                    <p>প্রাপকের শাখার নামঃ বরইছড়ি শাখা </p>
                    <p>জেলার নামঃ চট্টগ্রাম </p>
                    <p>প্রাপকের মোবাইল নম্বরঃ ০১৭১১৩০৬৩৫৯ </p>
                    <div class="row">
                        <div class="col-md-6">অফিসার </div>
                        <div class="col-md-6">অফিসার (ক্যাশ) </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@stop

@section('style')
    <style>
        .inv-header {
            margin-bottom: 20px;
        }

        .institute-info{
            /*margin-bottom: 30px;*/
        }
        .inv-header h4{
            text-align: center;
        }
        .inv-header p{
            line-height: 0.3;
            font-size: 14px;
            text-align: center;
            color: #0d10b9;
        }

        .institute-info span{
            color: orangered;
        }

        .class-info{
            margin-bottom: 5px;
        }
        .class-info span{
            color: #000000;
        }

        .inv-table{
            width: 100%;
            max-width: 100%;
            font-size: .8rem;
        }
        .institute-info p{
            line-height: 0.3;
            font-size: 14px;
        }
        .class-info p{
            line-height: 0.3;
            font-size: 14px;
        }
        .signature{
            margin-top: 30px;
        }
        .signature p{
            line-height: 0.9;
            font-size: 13px;
            border-top: 1px solid;
            text-align: center;
            padding-top: 1px;
        }

        /* Slip Style Start from here*/
        .slip p{
            line-height: 1.5;
        }
        .table td{
            padding: 0;
        }
        #cost-memo p{
            line-height: 0.3;
        }

        @page{
            margin: 5mm 5mm 5mm 5mm;
        }
    </style>
@stop

@section('script')
    <script>
        $(document).ready(function(){
            $("#part-one").children().clone().appendTo("#part-two");
            $("#part-one").children().clone().appendTo("#part-three");
        })
    </script>
@stop
