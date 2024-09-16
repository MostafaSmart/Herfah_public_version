@extends('dashboard.layouts.master')

@section('css')
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/dashboard/assets/vendor/libs/sweetalert2/sweetalert2.css" />
    <link rel="stylesheet" href="assets/dashboard/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="assets/dashboard/assets/vendor/libs/@form-validation/form-validation.css" />
    <link rel="stylesheet" href="assets/dashboard/assets/vendor/libs/quill/typography.css" />
    <link rel="stylesheet" href="assets/dashboard/assets/vendor/libs/quill/katex.css" />
    <link rel="stylesheet" href="assets/dashboard/assets/vendor/libs/quill/editor.css" />

    <!-- Page CSS -->

    <link rel="stylesheet" href="assets/dashboard/assets/vendor/css/pages/app-ecommerce.css" />
@endsection

@section('title')
    الأقسام
@endsection

@section('content')
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-2">الأقسام / <span class="text-muted fw-light">الكل</span></h4>
                <div class="app-ecommerce-category">
                  <!-- Category List Table -->
                  <div class="card">
                    <div class="card-datatable table-responsive">
                      <table class="datatables-category-list table border-top">
                        <thead>
                          <tr>
                            <th></th>
                            <th></th>
                            <th>الخدمة</th>
                            <th class="text-nowrap text-sm-end">عدد العمال &nbsp;</th>
                            <th class="text-lg-center">Actions</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                  <!-- Offcanvas to add new customer -->
                  <div
                    class="offcanvas offcanvas-end"
                    tabindex="-1"
                    id="offcanvasEcommerceCategoryList"
                    aria-labelledby="offcanvasEcommerceCategoryListLabel">
                    <!-- Offcanvas Header -->
                    <div class="offcanvas-header py-4">
                      <h5 id="offcanvasEcommerceCategoryListLabel" class="offcanvas-title">اضافة خدمة</h5>
                      <button
                        type="button"
                        class="btn-close bg-label-secondary text-reset"
                        data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                    </div>
                    <!-- Offcanvas Body -->
                    <div class="offcanvas-body border-top">
                      <form class="pt-0" id="addDeptForm" action="" method="POST" enctype="multipart/form-data">
                        <!-- Title -->
                        @csrf
                        <div class="mb-3">
                          <label class="form-label" for="ecommerce-category-title">اسم الخدمة</label>
                          <input
                            type="text"
                            class="form-control"
                            id="ecommerce-category-title"
                            placeholder="Enter category title"
                            name="dept_name"
                            aria-label="category title" />
                        </div>
                        <!-- Description -->
                        <div class="mb-3">
                          <label for="exampleFormControlTextarea1" class="form-label">وصف موجز</label>
                          <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                        </div>
                        <!-- Image -->
                        <div class="mb-3">
                          <label class="form-label" for="ecommerce-category-image">صورة الغلاف</label>
                          <input name="imgcover" class="form-control" type="file" id="ecommerce-category-image" />
                        </div>

                        <!-- Submit and reset -->
                        <div class="mb-3">
                          <button type="submit" id="save_dept" class="btn btn-primary me-sm-3 me-1">اضافة</button>
                          <button type="reset" class="btn bg-label-danger" data-bs-dismiss="offcanvas">تجاهل</button>
                        </div>
                      </form>
                    </div>
                  </div>
                    <!-- Edit Category Modal -->
                    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content p-3 p-md-5">
                            <button
                              type="button"
                              class="btn-close btn-pinned"
                              data-bs-dismiss="modal"
                              aria-label="Close"></button>
                            <div class="modal-body">
                              <div class="text-center mb-4">
                                <h3 class="mb-2">Edit Category</h3>
                                <p class="text-muted">Edit Category as per your requirements.</p>
                              </div>
                              <form id="editDeptForm" class="row" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="dept_id" id="dept_id">
                                <input type="hidden" name="dept_cover" id="dept_cover">
                                <!-- Title -->
                                <div class="mb-3">
                                  <label class="form-label" for="ecommerce-category-title">اسم الخدمة</label>
                                  <input
                                    type="text"
                                    class="form-control"
                                    id="edit_name"
                                    placeholder="Enter category title"
                                    name="deptName"
                                    aria-label="category title" />
                                </div>
                                <!-- Description -->
                                <div class="mb-3">
                                  <label for="exampleFormControlTextarea1" class="form-label">وصف موجز</label>
                                  <textarea class="form-control" id="edit_description" name="deptDesc" rows="2"></textarea>
                                </div>
                                <!-- Image -->
                                <div class="mb-3">
                                  <label class="form-label" for="ecommerce-category-image">صورة الغلاف</label>
                                  <input class="form-control" type="file" id="edit_image" name="deptImage" />
                                </div>
                                <div class="mb-3" id="img_cover">
                                    <img src="Files/' + $image + '" alt="Avatar" class="rounded-circle">
                                </div>

                                <!-- Submit and reset -->
                                <div class="mb-3">
                                  <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">تعديل</button>
                                  <button type="reset" class="btn bg-label-danger">تجاهل</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--/ Edit Category Modal -->
                    <!-- /Modal -->

                </div>
              </div>
              <!-- / Content -->

@endsection

@section('script')
<script>

 // delete employee ajax request
 $(document).on('click', '.delete_btn', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let csrf = '{{ csrf_token() }}';
        Swal.fire({
          title: 'هل أنت متأكد؟',
          text: "لن تكون قادرا على استرجاعه!",
          icon: 'warning',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'إلغاء',
          denyButtonText: 'لا',
          confirmButtonText: 'نعم, حذف!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '/dept/destroy',
              method: 'delete',
              data: {
                id: id,
                _token: csrf
              },
              success: function(response) {
                console.log(response);
                Swal.fire({
                    title: 'تم الحذف',
                    text: 'تم حذف القسم بنجاح.',
                    icon: 'success',
                    customClass: {
                    confirmButton: 'btn btn-primary waves-effect waves-light'
                    },
                    buttonsStyling: false
                });
              }
            });
          }
        })
      });
</script>
    <script>
        var routeOfFetchDept = '{{ route('fetchAll') }}';
        var dataSrcFetchDept = 'depts';
        var routeOfStore = '{{ route('dept.store') }}';
        var routeOfDelete = '/dept/destroy';

        // fetchAllDepartments();
        //     function fetchAllDepartments() {
        //         $.ajax ({
        //             url: '{{ route('fetchAll') }}',
        //             method: 'get',
        //             success: function(respon){
        //                 console.log(respon);
        //             }
        //         });
        //     }

//         $(document).ready(function() {
//     $.ajax({
//         url: '{{ route('fetchAll') }}',
//         type: "GET",
//         success: function(response) {
//             var depts = response.depts;

//             if (depts.length > 0) {
//                 depts.forEach(function(dept) {
//                     var row = '<tr>' +
//                         '<td></td>' +
//                         '<td></td>' +
//                         '<td>' +
//                         '<div class="d-flex align-items-center">' +
//                         '<div class="avatar-wrapper me-2 rounded-2 bg-label-secondary">' +
//                         '<div class="avatar">' +
//                         '<img src="{{ asset('Files/') }}/' + dept.imgcover + '" alt="Product" class="rounded-2">' +
//                         '</div>' +
//                         '</div>' +
//                         '<div class="d-flex flex-column justify-content-center">' +
//                         '<span class="text-body text-wrap fw-medium">' + dept.dept_name + '</span>' +
//                         '<span class="text-muted text-truncate mb-0 d-none d-sm-block"><small>' + dept.dept_description + '</small></span>' +
//                         '</div>' +
//                         '</div>' +
//                         '</td>' +
//                         '<td class="text-nowrap text-sm-end">' + dept.NumOfWorker + '</td>' +
//                         '<td class="text-lg-center">' +
//                         '<div class="d-flex align-items-sm-center justify-content-sm-center">' +
//                         '<button class="btn btn-sm btn-icon edit-btn" data-bs-target="#editCategoryModal" data-bs-toggle="modal" data-bs-dismiss="modal" data-department-id="' + dept.id + '" data-department-name="' + dept.dept_name + '" data-department-desc="' + dept.dept_description + '" data-department-image="' + dept.imgcover + '"><i class="ti ti-edit"></i></button>' +
//                         '<button type="button" class="btn btn-sm btn-icon me-2" id="delete-category"><i class="ti ti-trash"></i></button>' +
//                         '</div>' +
//                         '</td>' +
//                         '</tr>';

//                     $('.datatables-category-list tbody').append(row);
//                 });
//             } else {
//                 $('.datatables-category-list tbody').append('<tr><td colspan="5">No record present in the database!</td></tr>');
//             }
//         },
//         error: function(xhr, textStatus, errorThrown) {
//             console.log(xhr.responseText);
//         }
//     });
// });
    </script>
    <!-- Vendors JS -->
    <script src="assets/dashboard/assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
    <script src="assets/dashboard/assets/vendor/libs/select2/select2.js"></script>
    <script src="assets/dashboard/assets/vendor/libs/@form-validation/popular.js"></script>
    <script src="assets/dashboard/assets/vendor/libs/@form-validation/bootstrap5.js"></script>
    <script src="assets/dashboard/assets/vendor/libs/@form-validation/auto-focus.js"></script>
    <script src="assets/dashboard/assets/vendor/libs/quill/katex.js"></script>
    <script src="assets/dashboard/assets/vendor/libs/quill/quill.js"></script>

    <!-- Page JS -->
    <script src="assets/dashboard/assets/js/category-list.js"></script>
    <script>
        var depts_list = "{{ url('/categories/get') }}";
    </script>
@endsection
