@extends('WebSite.ClientDashboard.layouts.base')

@section('tital_S')
    <h2 id="tital_s">صفحتي</h2>
@endsection
@section('content')
    <div id="ifo_" >


        @include('WebSite.ClientDashboard.layouts.ifo_form')

    </div>
    <div id="orders_">
        @include('WebSite.ClientDashboard.layouts.c_orders')


    </div>

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
            <button class="main-title" onclick="closeForm('#card_show','#orders_')" id="back1">رجوع</button>
        </div>
    </div>
@endsection



@section('selx_1')
البيانات
@endsection

@section('selx_2')
طلباتي
@endsection


@section('selx_3')
الطلبات المعلقة
@endsection

@section('selx_4')
عام 
@endsection

@section('selx_5')
   تسجيل الخروج 
@endsection



@section('script')
    <script>
        $(document).ready(function() {
            $("#img_form").hide();

            $("#orders_").hide();
            $("#card_show").hide();

            $('.menu').on('click', function() {
                $('.bar').toggleClass('animate');
                $('.expand-menu').toggleClass('animate');
                $('.expand-menu .nav-link').toggleClass('animate');
                setTimeout(function() {
                    $('.expand-menu .nav-link').toggleClass('animate-show');
                }, 500)
            });


            $(".mmb").click(function(e) {
                e.preventDefault();
                $(".mmb").not(this).removeClass('active');
                $(this).addClass('active');
                var param = $(this).data("param");


                var allCont = ['#orders_', '#ifo_'];
                for (var i = 0; i < allCont.length; i++) {
                    var sho = allCont[i];
                    if (sho == param) {
                        $(sho).slideDown();
                    } else {
                        $(sho).hide();
                    }

                }

            });



            $("#img_ching").click(function(e) {
                e.preventDefault();
                $("#info_form").hide();
                $("#img_form").slideDown();

            });



        });

        function showOrderDetels(request) {

            $("#detels #number").text(request.id);
            $("#detels #date").text(request.startDate);
            $("#detels #state").text(request.status);
            $("#detels #amount").text(request.Amount);
            $("#detels #days").text(request.Num_Days);
            $("#detels #worker").text(request.worker_id);

            $("#orders_").hide();
            $("#card_show").slideDown();
        }

        function closeForm(selHide, selShow) {
            $(selHide).hide();
            $(selShow).slideDown();
        }
    </script>
@endsection
