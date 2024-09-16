@extends('WebSite.workerDash2.showWorker.layouts.base')

@section('content')
<div class="sssl">

    <div class="content__avatar" style="background: #8f6ed5 url('{{ asset($worker->personal_image) }}') center center no-repeat"></div>
    <div class="balel" style="background-image: url('{{ asset($worker->Image_cover) }}');"></div>
</div>

<div class="content__actions"><a href="#">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
      <path fill="currentColor" d="M192 256A112 112 0 1 0 80 144a111.94 111.94 0 0 0 112 112zm76.8 32h-8.3a157.53 157.53 0 0 1-68.5 16c-24.6 0-47.6-6-68.5-16h-8.3A115.23 115.23 0 0 0 0 403.2V432a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48v-28.8A115.23 115.23 0 0 0 268.8 288z"></path>
      <path fill="currentColor" d="M480 256a96 96 0 1 0-96-96 96 96 0 0 0 96 96zm48 32h-3.8c-13.9 4.8-28.6 8-44.2 8s-30.3-3.2-44.2-8H432c-20.4 0-39.2 5.9-55.7 15.4 24.4 26.3 39.7 61.2 39.7 99.8v38.4c0 2.2-.5 4.3-.6 6.4H592a48 48 0 0 0 48-48 111.94 111.94 0 0 0-112-112z"></path>
    </svg><span>Connect</span></a><a href="#">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
      <path fill="currentColor" d="M208 352c-41 0-79.1-9.3-111.3-25-21.8 12.7-52.1 25-88.7 25a7.83 7.83 0 0 1-7.3-4.8 8 8 0 0 1 1.5-8.7c.3-.3 22.4-24.3 35.8-54.5-23.9-26.1-38-57.7-38-92C0 103.6 93.1 32 208 32s208 71.6 208 160-93.1 160-208 160z"></path>
      <path fill="currentColor" d="M576 320c0 34.3-14.1 66-38 92 13.4 30.3 35.5 54.2 35.8 54.5a8 8 0 0 1 1.5 8.7 7.88 7.88 0 0 1-7.3 4.8c-36.6 0-66.9-12.3-88.7-25-32.2 15.8-70.3 25-111.3 25-86.2 0-160.2-40.4-191.7-97.9A299.82 299.82 0 0 0 208 384c132.3 0 240-86.1 240-192a148.61 148.61 0 0 0-1.3-20.1C522.5 195.8 576 253.1 576 320z"></path>
    </svg><span>Message</span></a>
</div>
<div class="content__title">
    <h1>{{ $user->name.' '. $user->l_name }}</h1><h3>{{ $worker->about }}</h3>
  </div>
  {{-- <div class="content__description">
    <p>Web Producer - Web Specialissssssssssssssssssssssst</p>
    <p>Columbia University - New York</p>
  </div> --}}
  <ul class="content__list">
    <li><span>{{ count($portfolis)  }}</span>الاعمال</li>
    <li><span>43</span>التقييم</li>
    <li><span>21</span>المنجزات</li>
  </ul>
  <div class="content__button" style="visibility: hidden; "><a class="button" href="#">
      <div class="button__border"></div>
      <div class="button__bg"></div>
      <p class="button__text">Show more</p></a></div>
</div>
<div class="bg" >
  <div style="background-image: url('{{ asset($worker->Image_cover) }}');">
  </div>
</div>


@endsection

@section('contetn2')
    
<div class="articles2" id="articles2">
    <h2 class="main-title">الاعمال</h2>
    <div class="container" id="show_works_all">
        @foreach ($portfolis as $portfoli)
        @php
        $imagePaths = explode(',', $portfoli->Images);
        $imagePath = trim($imagePaths[0]);
    @endphp
            <div class="box">
                <img src="{{ URL::asset($imagePath) }}" alt="" />
                <div class="content">
                    <h3>{{$portfoli->About_Project}}</h3>
                    {{-- <p>{{ $portfoli->About_Project }}</p> --}}
                </div>
                <div class="info">
                    {{-- <span class="count-worker">{{ $dept->NumOfWorker }}عامل</span> --}}
                    <a onclick="showPortfoli('{{ $portfoli->Images }}','{{$portfoli->About_Project}}')">الإطلاع</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
        @endforeach
      
    </div>
    <div class="content__button"><a class="button_1" onclick="getMore({{ $worker->id }})">
        <div class="button__border"></div>
        <div class="button__bg"></div>
        <p class="button__text">اضهار المزيد</p></a></div>
  </div>
</div>
<div class="spikes"></div>


<div class="gallery2" id="gallery">
           
<section class="sec-1" id="show_portfoli_detels">
    <div class="contener-1">
        <img src="images/6.png" id="main_img" alt="" class="main-img">
        <div class="main-div">
            <div class="balck-div">
                <h3 class="proname">وصف</h3>
                <p id="desc_por">اجهزة اضائة معلقة مفردة اجهزة اضائة معلقة مفردةاجهزة اضائة معلقة مفردة اجهزة اضائة معلقة مفردة </p>
                <button class="Add-button" onclick="showCoustmar()"> للحجز</button>

            </div>
            <div class="img-div" id="img_div">
               

            </div>

        </div>



    </div>

    <button class="c-button" onclick="closeForm('#gallery','#articles2')"> اقفال</button>


</section>
            
  
          
        </div>
        <!-- End Gallery -->


  



@endsection

@section('script')

<script>

$(document).ready(function () {

    $("#gallery").hide();

    $('section.awSlider .carousel').carousel({
  pause: "hover",
  interval: 2000
});

var startImage = $('section.awSlider .item.active > img').attr('src');
$('section.awSlider').append('<img src="' + startImage + '">');

$('section.awSlider .carousel').on('slid.bs.carousel', function () {
 var bscn = $(this).find('.item.active > img').attr('src');
  $('section.awSlider > img').attr('src',bscn);
});

});


function getMore (id) {


    $.ajax({
      url: '/getportfoli' + '/' + id, // استبدل بعنوان URL الصحيح لجلب الإدارات من DeptController
      type: 'GET',
      dataType: 'json',
      success: function(response) {
        // تحميل البيانات في عنصر الاختيار
        var options = '';
        $.each(response, function(key, value) {
            var images = value.Images.split(',');
        var imagePath = $.trim(images[0]);

        var box = '<div class="box">';
        box += '<img src="http://127.0.0.1:8000/' + imagePath + '" alt="" />';
        box += '<div class="content">';
        box += '<h3>' + value.About_Project + '</h3>';
        // إضافة المزيد من العناصر المطلوبة هنا
        box += '</div>';
        box += '<div class="info">';
        box += '<a onclick="showPortfoli(\'' + value.Images + '\', \'' + value.About_Project + '\')">الإطلاع</a>';
        box += '<i class="fas fa-long-arrow-alt-right"></i>';
        box += '</div>';
        box += '</div>';

        options += box;
        });
        $('#show_works_all').html(options);
        

    
      },
      error: function(xhr, status, error) {
        // إدراج رمز الخطأ هنا في حالة حدوث خطأ في جلب البيانات
      }
    });


  }


  function showPortfoli(imgse,about){
    var images = imgse.split(',');
    $("#main_img").attr("src", "http://127.0.0.1:8000/"+images[0]);
    // <img src="images/10.png" alt="" onclick="showImage('images/10.png')">
    var imgs = '';
    for (var i=0 ; i<images.length ;i++){
        imgs += '<img src="http://127.0.0.1:8000/'+images[i]+'" alt="" onclick="showImage(\''+images[i]+'\')">';
    }
    $("#img_div").html(imgs);
    $("#desc_por").text(about);
    

    $("#gallery").slideDown();
    $("#articles2").hide();
   

  }


function showImage(img){
    $("#main_img").attr("src", "http://127.0.0.1:8000/"+img);
}
function closeForm(selHide, selShow) {
            $(selHide).hide();
            $(selShow).slideDown();
        }

</script>


@endsection