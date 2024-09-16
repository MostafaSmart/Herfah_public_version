@extends('dashboard.layouts.master')

@section('css')

<link rel="stylesheet" href="assets/dashboard/assets/vendor/libs/sweetalert2/sweetalert2.css" />
<link rel="stylesheet" href="assets/dashboard/assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="assets/dashboard/assets/vendor/libs/bs-stepper/bs-stepper.css" />
<link rel="stylesheet" href="assets/dashboard/assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
<link rel="stylesheet" href="assets/dashboard/assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="assets/dashboard/assets/vendor/libs/@form-validation/form-validation.css" />
<link rel="stylesheet" href="assets/dashboard/assets/vendor/libs/flatpickr/flatpickr.css" />


@endsection

@section('title')
    اضافة عامل
@endsection

@section('content')
    <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-4">العمال/ <span class="text-muted fw-light">اضافة عامل</span></h4>
                  <div class="row">
                    <!-- FormValidation -->
                    <div class="col-12">
                      <div class="card">
                        <h5 class="card-header"></h5>
                        <div class="card-body">
                          <form id="addNewWorker" action="" method="POST" enctype="multipart/form-data" class="row g-3">
                            <!-- Account Details -->
                            @csrf
                            <div class="col-12">
                              <h6>تفاصيل الحساب </h6>
                              <hr class="mt-0" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="formValidationSelect2">المستخدم</label>
                                <select
                                  id="formValidationSelect2"
                                  name="user_id"
                                  class="form-select select2"
                                  data-allow-clear="true">
                                  @if (isset($users) && $users -> count() > 0)
                                      @foreach ($users as $user)
                                          <option value="{{ $user->id }}">{{ $user->name }} {{ $user->l_name }}</option>
                                      @endforeach
                                  @endif
                                </select>
                              </div>
                            <!-- Personal Info -->

                            <div class="col-12">
                              <h6 class="mt-2">تفاصيل العمل</h6>
                              <hr class="mt-0" />
                            </div>

                            <div class="col-md-4">
                              <label for="profilePic" class="form-label">صورة الملف الشخصي</label>
                              <input class="form-control" type="file" id="profileImage" name="profileImage" />
                            </div>
                            <div class="col-md-4">
                              <label for="coverPic" class="form-label">صورة الغلاف</label>
                              <input class="form-control" type="file" id="coverImage" name="coverImage" />
                            </div>

                            <div class="col-md-4">
                              <label class="form-label" for="selectDepartment">القسم</label>
                              <select
                                id="selectDepartment"
                                name="department_id"
                                class="form-select select2"
                                data-allow-clear="true">
                                @if (isset($departments) && $departments -> count() > 0 )
                                    @foreach ($departments as $dept)
                                        <option value="{{ $dept->id }}">{{ $dept->D_Name }}</option>
                                    @endforeach
                                @endif
                              </select>
                            </div>

                            <div class="col-md-12">
                              <label class="form-label" for="formValidationBio">وصف موجز</label>
                              <textarea
                                class="form-control"
                                id="formValidationBio"
                                name="about"
                                rows="3"></textarea>
                            </div>
                            <div class="col-sm-6">
                              <label for="priceByHour" class="form-label">سعر الساعة</label>
                              <input type="text" class="form-control" id="priceByHour" name="price_perHour" pattern="[0-9]+(\.[0-9]+)?" placeholder="أدخل قيمة عشرية" required />
                            </div>
                            <div class="col-sm-6">
                              <label for="priceOfMeter" class="form-label">سعر المتر</label>
                              <input type="text" class="form-control" id="priceOfMeter" name="price_perMatter" pattern="[0-9]+(\.[0-9]+)?" placeholder="أدخل قيمة عشرية" required />
                            </div>

                            <div class="col-12">
                                <h6 class="mt-2">معرض عمل</h6>
                                <small>يمكنك اضافة معرض اعمال واحد</small>
                                <hr class="mt-0" />
                            </div>
                                <div class="col-sm-12">
                                  <label for="exampleFormControlTextarea1" class="form-label">وصف العمل</label>
                                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="description"></textarea>
                                </div>
                                <div class="col-sm-12">
                                  <label for="formFileMultiple" class="form-label">قم بتحديد خمس صور</label>
                                  <input class="form-control" type="file" id="portifolioImgMultiple" name="images[]" multiple />
                                </div>
                            <div class="col-12">
                              <button type="submit" id="save_worker" class="btn btn-primary">Submit</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- /FormValidation -->
                  </div>
                <hr class="container-m-nx mb-5" />



        <!-- Modal -->
        <!-- Edit User Modal -->
        <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="mb-2">تعديل المعلومات الأساسية</h3>
                            <p class="text-muted">Updating user details will receive a privacy audit.</p>
                        </div>
                        <form id="editUserForm" class="row g-3" onsubmit="return false">
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserFirstName">الاسم الأول</label>
                                <input type="text" id="modalEditUserFirstName" name="modalEditUserFirstName"
                                    class="form-control" placeholder="John" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserLastName">الاسم الأخير</label>
                                <input type="text" id="modalEditUserLastName" name="modalEditUserLastName"
                                    class="form-control" placeholder="Doe" />
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="form-label">الجنس</p>
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" checked />
                                    <label class="btn btn-outline-primary" for="btnradio1">ذكر</label>
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio3" />
                                    <label class="btn btn-outline-primary" for="btnradio3">أنثى</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="flatpickr-date" class="form-label">تاريخ الميلاد</label>
                                <input type="text" class="form-control" placeholder="YYYY-MM-DD"
                                    id="flatpickr-date" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserEmail">البريد الالكتروني</label>
                                <input type="text" id="modalEditUserEmail" name="modalEditUserEmail"
                                    class="form-control" placeholder="example@domain.com" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserPhone">Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-text">YE (+967)</span>
                                    <input type="text" id="modalEditUserPhone" name="modalEditUserPhone"
                                        class="form-control phone-number-mask" placeholder="202 555 0111" />
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">حفظ التعديل</button>
                                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    الغاء
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Edit User Modal -->
        <div class="content-backdrop fade"></div>
    </div>
@endsection

@section('script')
<script>
    $(function() {
    $("#addNewWorker").submit(function(e) {
    e.preventDefault();
    var formData = new FormData($('#addNewWorker')[0]);
    $.ajax({
        url: '{{ route('worker.store') }}',
        type: 'POST',
        enctype: 'multipart/form-data',
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
            }},
            error: function (reject) {
                console.error(reject);
            }
        });
    });
});

</script>
    <!-- Vendors JS -->
    <script src="assets/dashboard/assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
    <script src="assets/dashboard/assets/vendor/libs/select2/select2.js"></script>
    <script src="assets/dashboard/assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
    <script src="assets/dashboard/assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="assets/dashboard/assets/vendor/libs/select2/select2.js"></script>
    <script src="assets/dashboard/assets/vendor/libs/@form-validation/popular.js"></script>
    <script src="assets/dashboard/assets/vendor/libs/@form-validation/bootstrap5.js"></script>
    <script src="assets/dashboard/assets/vendor/libs/@form-validation/auto-focus.js"></script>

    <!-- Page JS -->

    <script src="assets/dashboard/assets/js/form-validation.js"></script>
@endsection
