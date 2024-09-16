@extends('WebSite.ClientDashboard.layouts.base')

@section('selx_1')
البيانات
@endsection

@section('selx_2')
الطلبات 
@endsection


@section('selx_3')
اعمالي

@endsection

@section('selx_4')
عام 
@endsection

@section('selx_5')
   تسجيل الخروج 
@endsection



@section('content')

@include('WebSite.workerDash2.layouts.add_work')
@include('WebSite.workerDash2.layouts.update_work')
@include('WebSite.workerDash2.layouts.delete_work')

<div id="ifo_" >


    @include('WebSite.workerDash2.layouts.info')

</div>

<div id="works_" >

    <p class="pl-2 mt-2">
        <a href="#" id="btn_addwork"  class="btn btn-primary" style="padding: 5px"> اضافة عمل</a>
    </p>
    <div id="work_table">
        @include('WebSite.workerDash2.layouts.show_my_work')

    </div>


</div>



<div id="orders_" >

   
    <div>
        @include('WebSite.workerDash2.layouts.orders')

    </div>


</div>




@endsection










@section('script')
<script>
$(document).ready(function() {
        $("#img_form").hide();
        $("#add_work").hide();
        $("#works_").hide();
        $("#form_updatew").hide();
        $("#orders_").hide();


        $("#btn_addwork").click(function (e) { 
            e.preventDefault();
            $("#work_table").hide();
            $("#add_work").slideDown();
        });






    $(".mmb").click(function(e) {
                e.preventDefault();
                $(".mmb").not(this).removeClass('active');
                $(this).addClass('active');
                var param = $(this).data("param");


                var allCont = ['#orders_', '#ifo_','#works_'];
                for (var i = 0; i < allCont.length; i++) {
                    var sho = allCont[i];
                    if (sho == param) {
                        $(sho).slideDown();
                    } else {
                        $(sho).hide();
                    }

                }

            });

    
});
function confirm_del(request, action) {
            if (confirm("هل أنت متأكد من حذف هذا القسم؟")) {


                $("#delet_form").attr('action', action)
                $('#deleteBtn').trigger('click');



            }
        }
function showWorkeDetels(request, action) {

$("#btn_addwork").hide();
$("#work_table").hide();




var imagesArray = request.Images.split(",");

$("#form_updatew #about").val(request.About_Project);

imgs = '';

imagesArray.forEach(element => {

    var op = '<div><img style="height: 100px; width= 100px" src="http://127.0.0.1:8000/' + element +
        '"></img> <input type="checkbox" name="old_images[]" value="' + element + '"></div>';
    imgs += op;




});

$("#form_updatew #img_cont").append(imgs);
$("#form_updatew form").attr('action', action);


$("#form_updatew").slideDown();
}


function profileCing(flag){
    if (flag == 'per'){
        $("#imgChing").attr('name','img_worker');
        
      
    }
    else if (flag == 'cover') {
        $("#imgChing").attr('name','cover');
      
     
    }

    $("#info_form").hide();
    $("#img_form").slideDown();

}
function closeForm(selHide, selShow) {
            $(selHide).hide();
            $(selShow).slideDown();
        }

</script>
    
@endsection