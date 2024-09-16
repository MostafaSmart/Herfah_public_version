@extends('WebSite.workerDashboard.layouts.base')

@section('content')
    <div class="discount1" id="discount1"
        style="background-image: url('{{ asset('assets/dashboard/assets/img/avatars/10.png') }}')">

        <div class="overlay"></div>
        <div class="iim2" style="z-index: 1">
            <img src="{{ URL::asset($client->personal_image) }}" style="z-index: 1; border-radius: 50%; margin-top: 10px"
                width="100" height="100" alt="صورة الملف الشخصي">

            <div class="cc">
                <h2 style="z-index: 1">{{ $user->name . ' ' . $user->l_name }}</h2>
                <h2></h2>


            </div>

        </div>

    </div>

    <div class="optionsc">

        <button class="main-title" id="show_orders" style="margin: 7px 20px 1px 50px">طلباتي</button>


    </div>
    <div class="loader" id="progBar">
        <div class="loader-inner"></div>
    </div>
    @include('WebSite.ClientDashboard.update_info')
    @include('WebSite.ClientDashboard.c_orders')

    <div class="card_show" id="card_show">
        <div class="card2" id="detels">
            <table>
                <tr>
                    <td>الاسم:</td>
                    <td id="number">مصطفى</td>
                </tr>

                <tr>
                    <td>تاريخ البداء</td>
                    <td id="date"></td>
                </tr>

                <tr>
                    <td>الحالة</td>
                    <td id="state"></td>
                </tr>

                <tr>
                    <td>التكلفة</td>
                    <td id="amount"></td>
                </tr>

                <tr>
                    <td>عدد الايام</td>
                    <td id="days"></td>
                </tr>

                <tr>
                    <td>الموظف</td>
                    <td id="worker"></td>
                </tr>
                <tr>
                    <td>تقديم شكوئ</td>
                    <td> <button class="but4">تقديم شكوئ</button></td>
                </tr>
            </table>

        </div>
        <div style="display: flex ;justify-content: center">
            <button class="main-title" id="back1">رجوع</button>
        </div>
    </div>
@endsection


@section('scrpits')
    <script>
        var allorders = "";

        $(document).ready(function() {
            allorders = $("#cc2").html();
            $("#progBar").hide();
            $("#card_show").hide();

            $("#div_orders").hide();
            $("#show_orders").click(function(e) {
                e.preventDefault();

                var text = $("#show_orders").text();
                if (text == "طلباتي") {
                    $("#div_orders").slideDown();
                    $("#show_orders").text("بياناتي");

                    $("#form_update_info").hide();
                } else {
                    $("#div_orders").hide();
                    $("#show_orders").text("طلباتي");

                    $("#form_update_info").slideDown();
                    $("#card_show").hide();


                }




            });


            $("#back1").click(function(e) {
                e.preventDefault();
                $("#card_show").hide();
                $("#div_orders").slideDown();
            });

        });


        function selectCing(value, reqest) {
            $("#progBar").show();

            if (value == 0) {
                $("#cc2").html(allorders);
                $("#progBar").hide();

            } else {
                var need = [];
                reqest.forEach(element => {
                    if (element.status == value) {
                        need.push(element);
                    }
                });

                var orders = "";

                for (var element of need) {
                    var o = '<div class="box"> <div class="n1"><h3>رقم الطلب</h3>';
                    o += '<span>"' + element.id + '"</span></div><hr>';
                    o += '<div class="n1"><h3>ت. البداء</h3><span>"' + element.startDate + '"</span></div> <hr>';
                    o += ' <div class="n1"> <h3>الحالة</h3><span>"' + element.status + '"</span></div><hr>';
                    o += ' <p>"' + element.testimonial + '"</p><hr><button onclick="" class="but4">تفاصيل</button></div>';

                    orders += o;
                }

                $("#cc2").html(orders);
                $("#progBar").hide();

            }
        }


        function showOrderDetels(request) {

            $("#detels #number").text(request.id);
            $("#detels #date").text(request.startDate);
            $("#detels #state").text(request.status);
            $("#detels #amount").text(request.Amount);
            $("#detels #days").text(request.Num_Days);
            $("#detels #worker").text(request.worker_id);

            $("#div_orders").hide();
            $("#card_show").slideDown();








        }
        // {"id":'+element.id+',"startDate":"'+element.startDate+'","status":"'+element.status+'","testimonial":"'+element.testimonial+'","Amount":"'+element.Amount+'","Num_Days":'+element.Amount+',"client_id":'+element.client_id+',"worker_id":'+element.worker_id+',"created_at":"'+element.created_at+'","updated_at":"'+element.updated_at+'"})" class="but4">تفاصيل</button></div>';

        // showOrderDetels({"id":1,"startDate":"2024-04-17","status":"2","testimonial":"\u062a\u0639\u0644\u064a\u0642 \u0639\u0646 \u0627\u0644\u0639\u0645\u0644","Amount":"44444.00","Num_Days":4,"client_id":1,"worker_id":1,"created_at":"2024-04-24T23:39:16.000000Z","updated_at":null})
        // ' + JSON.stringify(element).replace(/"(\w+)"\s*:\s*/g, '$1:') + '
        // ' + JSON.stringify(element).replace(/"(\w+)"\s*:/g, '$1:') + '


        // showOrderDetels({"id":2,"startdate":"2024-04-06","status":"1","testimonial":"ببببببب","amount":"33333.00","num_days":33333.00,"client_id":1,"worker_id":1,"created_at":"2024-04-09t02:35:45.000000z","updated_at":"null"})"
    </script>
@endsection
