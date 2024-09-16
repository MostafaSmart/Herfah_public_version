@extends('dashboard.layouts.master')

@section('css')
<link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/sweetalert2/sweetalert2.css" />
<link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/bs-stepper/bs-stepper.css" />
<link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
<link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/plyr/plyr.css" />
@endsection

@section('title')

@endsection

@section('content')
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">طلبات العمال</span></h4>

                <div class="app-academy">
                    <div class="row">
                  <div class="card mb-4">
                    <div class="card-header d-flex flex-wrap justify-content-between gap-3">
                      <div class="card-title mb-0 me-1">
                        <h5 class="mb-1">طلبات العمل</h5>
                        <p class="text-muted mb-0"></p>
                      </div>
                      <div class="d-flex justify-content-md-end align-items-center gap-3 flex-wrap">
                        <label class="switch">
                          <input type="checkbox" class="switch-input" />
                          <span class="switch-toggle-slider">
                            <span class="switch-on"></span>
                            <span class="switch-off"></span>
                          </span>
                          <span class="switch-label text-nowrap mb-0"></span>
                        </label>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row gy-4 mb-4">
                        @foreach ($requests as $request)
                        <div class="col-12">
                            <div class="card p-2 shadow-none border">
                              <div class="card-body p-3 pt-2 d-flex justify-content-between ">
                                <div class=" mb-">
                                @if ($request->status === 'Successful')
                                    <i id="messageIcon{{ $request->id }}" class="ti ti-mail-opened fs-4"></i>
                                @elseif ($request->status === 'Cancelled')
                                    <i id="messageIcon{{ $request->id }}" class="ti ti-mail-opened fs-4"></i>
                                @else
                                    <i id="messageIcon{{ $request->id }}" class="ti ti-mail fs-4"></i>
                                @endif
                                  <span class="badge bg-label-primary">رقم الطلب: #{{ $request->id }}</span>
                                @if ($request->status === 'Successful')
                                    <h5 class="align-items-center my-2">كان لديك طلب تقديم عمل جديد وقد تم قبوله</h5>
                                @elseif ($request->status === 'Cancelled')
                                    <h5 class="align-items-center my-2">كان لديك طلب تقديم عمل جديد وقد تم رفضه لأنه لم يطابق المتطلبات</h5>
                                @else
                                <h5 class="align-items-center my-2"> لديك طلب تقديم عمل جديد قم بمراجعته الان</h5>
                                @endif
                                  <p class="d-flex align-items-center"><i class="ti ti-clock me-2"></i>تم ارسال الطلب في : {{ $request->created_at }}</p>
                                </div>
                                <div class="button-show  d-flex align-items-center">
                                    @if ($request->status === 'Successful')
                                    <button
                                        class="btn btn-primary showDetails_btn"
                                        type="button"
                                        id="{{ $request->id }}"
                                        disabled
                                    >
                                        تم قبول الطلب
                                    </button>
                                @elseif ($request->status === 'Cancelled')
                                    <button
                                        class="btn btn-danger "
                                        type="button"
                                        id="{{ $request->id }}"
                                        disabled
                                    >
                                        تم رفض الطلب
                                    </button>
                                @else
                                    <button
                                        class="btn btn-primary showDetails_btn"
                                        type="button"
                                        id="{{ $request->id }}"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseExample{{ $request->id }}"
                                        aria-expanded="false"
                                        aria-controls="collapseExample"
                                    >
                                        عرض تفاصيل الطلب
                                    </button>
                                @endif
                                </div>
                              </div>
                              <div class="collapse" id="collapseExample{{ $request->id }}">
                                <div class="p-3 border-top">
                                    <h5 class="align-items-center">التفاصيل الشخصية ومعلومات الحساب</h5>
                                    <div class="d-flex flex-wrap justify-content-between">
                                        <div class="me-5 mb-2  ">
                                          <p class="text-nowrap userId">
                                            <i class="ti ti-checks ti-sm me-2 mt-n2"></i>
                                          </p>
                                          <p class="text-nowrap full-name"><i class="ti ti-user ti-sm me-2 mt-n2"></i></p>
                                          <p class="text-nowrap gender"><i class="ti ti-flag ti-sm me-2 mt-n2"></i></p>
                                        </div>
                                        <div class="me-5 mb-2 ">
                                        <p class="text-nowrap email"><i class="ti ti-file ti-sm me-2 mt-n2"></i></p>
                                          <p class="text-nowrap phone-number"><i class="ti ti-pencil ti-sm me-2 mt-n2"></i> </p>
                                          <p class="text-nowrap birth-date">
                                            <i class="ti ti-clock ti-sm me-2 mt-n2"></i>
                                        </p>
                                        </div>
                                        <div class="me-5 mb-2">
                                            <p class="text-nowrap job-title"><i class="ti ti-file ti-sm me-2 mt-n2"></i> </p>
                                        <p class="text-nowrap price-per-matter"><i class="ti ti-file ti-sm me-2 mt-n2"></i></p>
                                        <p class="text-nowrap price-per-hour"><i class="ti ti-file ti-sm me-2 mt-n2"></i></p>
                                        </div>
                                </div>
                                <hr class="my-4" />
                                        <div class="me-5">
                                          <p class="text-nowrap"><i class="ti ti-pencil ti-sm me-2 mt-n2"></i>وصف شخصي</p>
                                          <p class="info-worker">
                                          </p>
                                        </div>

                                <hr class="my-4" />
                                        <div class="d-flex flex-wrap justify-content-around ">
                                            <div>
                                                <p class=""><i class="ti ti-file ti-sm me-2 mt-n2"></i>الصورة الشخصية</p>
                                                <img
                                                    class="worker-image"
                                                    src=""
                                                    alt="tutor image 1"
                                                    width="300"
                                                />
                                            </div>
                                            <div>
                                                <p class=""><i class="ti ti-file ti-sm me-2 mt-n2"></i>صورة الغلاف</p>
                                                <img
                                                    class="cover-image"
                                                    src=""
                                                    alt="tutor image 2"
                                                    width="300"
                                                />
                                            </div>
                                        </div>
                                        <h5 class="align-items-center">تفاصيل معرض الاعمال</h5>
                                        <div class="me-5">
                                            <p class="text-nowrap"><i class="ti ti-pencil ti-sm me-2 mt-n2"></i>وصف العمل</p>
                                            <p class="project-about">
                                            </p>
                                          </div>
                                        <hr class="my-4" />
                                        <div class="d-flex flex-wrap justify-content-around project-images ">
                                        </div>
                                        <div class="d-flex justify-content-end flex-wrap gap-2 mt-5 ">
                                            <button
                                                class="btn btn-danger reject-workerOrder"
                                                type="button"
                                                id="{{ $request->id }}">
                                                 رفض الطلب
                                            </button>
                                            <button
                                                class="btn btn-primary add-workerOrder"
                                                type="button"
                                                id="{{ $request->id }}">
                                                 قبول الطلب
                                            </button>
                                        </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
        </div>
              <!-- / Content -->
@endsection

@section('script')

<script>
    // Show request details ajax
    $(document).on('click', '.showDetails_btn', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
            url: '/showWorkDetailsRequest' + '/' + id,
            method: 'get',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $(".userId").text('رقم المستخدم: #' + response['UserId']);
                $(".full-name").text('الاسم الكامل: ' + response['FirstName']);
                $(".email").text('البريد الالكتروني : ' + response['email']);
                $(".gender").text('الجنس : ' + response['Gender']);
                $(".phone-number").text('رقم الهاتف : ' + response['PhoneNumber']);
                $(".birth-date").text('تاريخ الميلاد : ' + response['BirthDate']);
                $(".job-title").text('المهنة : ' + response['JobTitle']);
                $(".info-worker").text(response['Info']);
                $(".price-per-hour").text('السعر  مقابل الخدمة بالساعة: ' + response['PricePerHour']);
                $(".price-per-matter").text('السعر  مقابل الخدمة بالمتر: ' + response['PricePerMatter']);
                var imageUrl = response['Image'];
                $(".worker-image").attr('src','Files/'+imageUrl);
                var coverImageUrl = response['CoverImage'];
                $(".cover-image").attr('src', '/Files/'+coverImageUrl);
                var projects = response['projects'];
                if (projects && Object.keys(projects).length > 0) {
                    var projectName0 = projects['projectName0'];
                    if (projectName0) {
                        $(".project-about").text( projectName0['about']);

                        var projectImages = projectName0['Images'];
                        if (projectImages && projectImages.length > 0) {
                            var imagesHtml = '';
                            for (var i = 0; i < projectImages.length; i++) {
                                imagesHtml += '<img src="/Files/'+ projectImages[i] + '" width="300" alt="Project Image">';
                            }
                            $(".project-images").html(imagesHtml);
                        }
                    }
                }
            }
        });
    });

    // Add worker from request ajax request
    $(document).on('click', '.add-workerOrder', function(e) {
        e.preventDefault();
        let requestId = $(this).attr('id');
        $.ajax({
            url: '/storeFromRequest' + '/' + requestId,
            method: 'get',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.status == true) {
                    Swal.fire({
                        title: 'Good job!',
                        text: response.message,
                        icon: 'success',
                        customClass: {
                        confirmButton: 'btn btn-primary waves-effect waves-light'
                        },
                        buttonsStyling: false
                    });
                $('#collapseExample' + requestId).collapse('hide');
                $('#' + requestId).prop('disabled', true).text('تم قبول الطلب');
                $('#messageIcon'+ requestId).removeClass('ti-mail').addClass('ti-mail-opened');
                }},
        });
    });
    // Reject worker from request ajax request
    $(document).on('click', '.reject-workerOrder', function(e) {
        e.preventDefault();
        let requestId = $(this).attr('id');
        $.ajax({
            url: '/rejectFromOrderTo' + '/' + requestId,
            method: 'get',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.status == true) {
                    Swal.fire({
                        title: 'Good job!',
                        text: response.message,
                        icon: 'success',
                        customClass: {
                        confirmButton: 'btn btn-primary waves-effect waves-light'
                        },
                        buttonsStyling: false
                    });
                $('#collapseExample' + requestId).collapse('hide');
                $('#' + requestId).prop('disabled', true).text('تم رفض الطلب');
                $('#messageIcon'+ requestId).removeClass('ti-mail').addClass('ti-mail-opened');
                }},
        });
    });
    </script>
<script src="/assets/dashboard/assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
<script src="/assets/dashboard/assets/vendor/libs/select2/select2.js"></script>
<script src="/assets/dashboard/assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
<script src="/assets/dashboard/assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
<script src="/assets/dashboard/assets/vendor/libs/select2/select2.js"></script>
<script src="/assets/dashboard/assets/vendor/libs/i18n/i18n.js"></script>
<script src="/assets/dashboard/assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="/assets/dashboard/assets/vendor/js/menu.js"></script>
<script src="/assets/dashboard/assets/vendor/libs/plyr/plyr.js"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<!-- Page JS -->
<script src="/assets/dashboard/assets/js/app-academy-course.js"></script>


@endsection
