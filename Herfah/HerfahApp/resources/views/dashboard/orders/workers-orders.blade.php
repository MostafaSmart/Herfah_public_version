@extends('dashboard.layouts.master')

@section('css')
<link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/sweetalert2/sweetalert2.css" />
<link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/bs-stepper/bs-stepper.css" />
<link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
<link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/plyr/plyr.css" />
<link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/flatpickr/flatpickr.css" />
@endsection

@section('title')

@endsection

@section('content')
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">طلبات العملاء</span></h4>

                <div class="app-academy">
                    <div class="row">
                  <div class="card mb-4">
                    <div class="card-header d-flex flex-wrap justify-content-between gap-3">
                      <div class="card-title mb-0 me-1">
                        <h5 class="mb-1">طلبات العملاء</h5>
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
                                    <h5 class="align-items-center my-2">كان لديك طلب عامل وقد تم قبوله</h5>
                                @elseif ($request->status === 'Cancelled')
                                    <h5 class="align-items-center my-2">كان لديك طلب عامل وقد تم رفضه لأنه لم يطابق المتطلبات</h5>
                                @else
                                <h5 class="align-items-center my-2"> لديك طلب عامل جديد قم بمراجعته الان</h5>
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
                                    <h5 class="align-items-center">تفاصيل الطلب</h5>
                                    <div class="d-flex flex-wrap justify-content-between">
                                        <div class="me-5">
                                            <div class="d-flex">
                                                <i class="ti ti-checks ti-sm ms-2"></i>
                                                <p class="text-nowrap userId"></p>
                                            </div>
                                            <div class="d-flex">
                                                <i class="ti ti-user ti-sm ms-2"></i>
                                                <p class="text-nowrap full-name"></p>
                                            </div>
                                        </div>
                                        <div class="me-5 ">
                                            <div class="d-flex">
                                                <i class="ti ti-file ti-sm ms-2"></i>
                                                <p class="text-nowrap email"></p>
                                            </div>
                                            <div class="d-flex">
                                                <i class="ti ti-file ti-sm ms-2"></i>
                                                <p class="text-nowrap phone-number"></p>
                                            </div>
                                        </div>
                                        <div class="me-5 ">
                                            <div class="d-flex">
                                                <i class="ti ti-checks ti-sm ms-2"></i>
                                                <p class="text-nowrap workerId"></p>
                                            </div>
                                            <div class="d-flex">
                                                <i class="ti ti-file ti-sm ms-2"></i>
                                                <p class="text-nowrap worker-name"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                        <div class="d-flex justify-content-end flex-wrap gap-2 mt-5 ">
                                            <button class="btn btn-primary" type="button" id="">عرض تفاصيل العميل</button>
                                            <button class="btn btn-primary" type="button" id="">عرض تفاصيل العامل</button>
                                            <button
                                                class="btn btn-primary "
                                                type="button"
                                                id=""
                                                data-bs-toggle="modal"
                                                data-bs-target="#acceptClientOrderModal">
                                                 استكمال الطلب
                                            </button>
                                            <button
                                                class="btn btn-danger reject-workerOrder"
                                                type="button"
                                                id="{{ $request->id }}">
                                                 رفض الطلب
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
                              <!-- complete request form modal -->
                              <div
                              class="modal-onboarding modal "
                              id="acceptClientOrderModal"
                              tabindex="-1"
                              aria-hidden="true">
                              <div class="modal-dialog modal-xl" role="">
                                <div class="modal-content text-center">
                                  <div class="modal-body onboarding-horizontal p-0">
                                    <div class="onboarding-content mb-0">
                                        <h4 class="onboarding-title text-body">Example Request Information</h4>
                                        <form id="addOrderForm" method="post">
                                            @csrf
                                            <input type="hidden" id="request-id" name="requestId">
                                            <input type="hidden" id="worker-id" name="workerId">
                                            <input type="hidden" id="client-id" name="clientid">
                                          <div class="row">
                                            <div class="col-4 text-start">
                                              <div class="mb-3">
                                                <label for="flatpickr-date" class="form-label ">تاريخ بدء العمل</label>
                                                <input type="text" class="form-control start-date" name="startDate" placeholder="YYYY-MM-DD" id="flatpickr-date" />
                                              </div>
                                            </div>
                                            <div class="col-4 text-start">
                                              <div class="mb-3">
                                                <label for="days" class="form-label">عدد الايام</label>
                                                <input
                                                  class="form-control days-num"
                                                  type="text"
                                                  name="daysNum"
                                                  tabindex="0"
                                                  id="days" />
                                              </div>
                                            </div>
                                            <div class="col-4 text-start">
                                              <div class="mb-3">
                                                <label for="price" class="form-label">السعر</label>
                                                <input
                                                  class="form-control"
                                                  type="text"
                                                  value=""
                                                  tabindex="0"
                                                  name="price"
                                                  id="price" />
                                              </div>
                                            </div>
                                          </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                              إغلاق
                                            </button>
                                            <button type="submit" class="btn btn-primary">حفظ الطلب</button>
                                        </div>
                                        </form>
                                      </div>
                                    <div class="onboarding-media">
                                      <img
                                        src="../../assets/img/illustrations/boy-verify-email-light.png"
                                        alt="boy-verify-email-light"
                                        width="273"
                                        class="img-fluid"
                                        data-app-light-img="illustrations/boy-verify-email-light.png"
                                        data-app-dark-img="illustrations/boy-verify-email-dark.png" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--/ complete request form modal-->
              <!-- / Content -->
@endsection

@section('script')

<script>
    // Show request details ajax
    $(document).on('click', '.showDetails_btn', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
            url: '/showWorkerDetailsRequest' + '/' + id,
            method: 'get',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $(".userId").text('رقم العميل: #' + response['Client']);
                $(".full-name").text('اسم العميل: ' + response['Client_Name']);
                $(".email").text('البريد الالكتروني : ' + response['Client_Email']);
                $(".phone-number").text('رقم الهاتف : ' + response['Client_Phone']);
                $(".workerId").text('رقم العامل: #' + response['WrokerId']);
                $(".worker-name").text('اسم العامل: ' + response['Worker_name']);
                $("#worker-id").val(response['WrokerId']);
                $("#client-id").val(response['Client']);
                $("#request-id").val(id);
            }
        });
    });

    // add new Order ajax request
$(function() {
    $("#addOrderForm").submit(function(e) {
    e.preventDefault();
    var formData = new FormData($('#addOrderForm')[0]);
    $.ajax({
        type: 'post',
        enctype: 'multipart/form-data',
        url: '/addClientOrder',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {
            if (data.status == true) {
                Swal.fire({
                    title: 'Good job!',
                    text: data.message,
                    icon: 'success',
                    customClass: {
                    confirmButton: 'btn btn-primary waves-effect waves-light'
                    },
                    buttonsStyling: false
                });
                $("#addOrderForm")[0].reset();
                $('#acceptClientOrderModal').modal('hide');

            }
            else
            {
                Swal.fire({
                    title: 'error!',
                    text: data.message,
                    icon: 'error',
                    customClass: {
                    confirmButton: 'btn btn-primary waves-effect waves-light'
                    },
                    buttonsStyling: false
                });
            }},
        });
    });
});
    // Add worker from request ajax request
    $(document).on('click', '.add-workerOrder', function(e) {
        e.preventDefault();
        let requestId = $(this).attr('id');
        $.ajax({
            url: '/storeFromOrderTo' + '/' + requestId,
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
<script src="/assets/dashboard/assets/vendor/libs/flatpickr/flatpickr.js"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<!-- Page JS -->
<script src="/assets/dashboard/assets/js/app-academy-course.js"></script>
<script src="/assets/dashboard/assets/js/forms-pickers.js"></script>


@endsection
