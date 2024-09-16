@extends('dashboard.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ url('assets/dashboard/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/dashboard/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/dashboard/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/dashboard/assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/dashboard/assets/vendor/libs/@form-validation/form-validation.css') }}" />
@endsection

@section('title')
قائمة المستخدمين
@endsection

@section('content')
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row g-4 mb-4">
                  <div class="col-sm-6 col-xl-3">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                          <div class="content-left">
                            <span>Session</span>
                            <div class="d-flex align-items-center my-2">
                              <h3 class="mb-0 me-2">21,459</h3>
                              <p class="text-success mb-0">(+29%)</p>
                            </div>
                            <p class="mb-0">Total Users</p>
                          </div>
                          <div class="avatar">
                            <span class="avatar-initial rounded bg-label-primary">
                              <i class="ti ti-user ti-sm"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xl-3">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                          <div class="content-left">
                            <span>Paid Users</span>
                            <div class="d-flex align-items-center my-2">
                              <h3 class="mb-0 me-2">4,567</h3>
                              <p class="text-success mb-0">(+18%)</p>
                            </div>
                            <p class="mb-0">Last week analytics</p>
                          </div>
                          <div class="avatar">
                            <span class="avatar-initial rounded bg-label-danger">
                              <i class="ti ti-user-plus ti-sm"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xl-3">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                          <div class="content-left">
                            <span>Active Users</span>
                            <div class="d-flex align-items-center my-2">
                              <h3 class="mb-0 me-2">19,860</h3>
                              <p class="text-danger mb-0">(-14%)</p>
                            </div>
                            <p class="mb-0">Last week analytics</p>
                          </div>
                          <div class="avatar">
                            <span class="avatar-initial rounded bg-label-success">
                              <i class="ti ti-user-check ti-sm"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xl-3">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                          <div class="content-left">
                            <span>Pending Users</span>
                            <div class="d-flex align-items-center my-2">
                              <h3 class="mb-0 me-2">237</h3>
                              <p class="text-success mb-0">(+42%)</p>
                            </div>
                            <p class="mb-0">Last week analytics</p>
                          </div>
                          <div class="avatar">
                            <span class="avatar-initial rounded bg-label-warning">
                              <i class="ti ti-user-exclamation ti-sm"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Users List Table -->
                <div class="card">
                  <div class="card-header border-bottom">
                    <h5 class="card-title mb-3">Search Filter</h5>
                    <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                      <div class="col-md-4 user_role"></div>
                      <div class="col-md-4 user_plan"></div>
                      <div class="col-md-4 user_status"></div>
                    </div>
                  </div>
                  <div class="card-datatable table-responsive">
                    <table class="datatables-users table">
                      <thead class="border-top">
                        <tr>
                            <th></th>
                            <th>المستخدم</th>
                            <th>رقم الهاتف</th>
                            <th>نوع المستخدم</th>
                            <th>تاريخ الميلاد</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                  <!-- Offcanvas to add new user -->
                  <div
                    class="offcanvas offcanvas-end"
                    tabindex="-1"
                    id="offcanvasAddUser"
                    aria-labelledby="offcanvasAddUserLabel">
                    <div class="offcanvas-header">
                      <h5 id="offcanvasAddUserLabel" class="offcanvas-title">اضافة مستخدم جديد</h5>
                      <button
                        type="button"
                        class="btn-close text-reset"
                        data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                      <form class="add-new-user pt-0" id="addNewUserForm" onsubmit="return false">
                        <div class="mb-3">
                          <label class="form-label" for="add-user-firstname">الاسم الأول</label>
                          <input
                            type="text"
                            class="form-control"
                            id="add-user-firstname"
                            placeholder="John Doe"
                            name="userFirstname"
                            aria-label="John" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="add-user-lastname">الاسم الأخير</label>
                          <input
                            type="text"
                            class="form-control"
                            id="add-user-lastname"
                            placeholder="John Doe"
                            name="userLastname"
                            aria-label="Doe" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="add-user-username">اسم المستخدم</label>
                          <input
                            type="text"
                            class="form-control"
                            id="add-user-username"
                            placeholder="John Doe"
                            name="username"
                            aria-label="John Doe" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="add-user-email">البريد الالكتروني</label>
                          <input
                            type="text"
                            id="add-user-email"
                            class="form-control"
                            placeholder="john.doe@example.com"
                            aria-label="john.doe@example.com"
                            name="userEmail" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="add-user-contact">رقم الهاتف</label>
                          <input
                            type="text"
                            id="add-user-contact"
                            class="form-control phone-mask"
                            placeholder="+967 778-445-114"
                            aria-label="john.doe@example.com"
                            name="userContact" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="user-role">User Role</label>
                          <select id="user-role" class="form-select">
                            <option value="subscriber">مستخدم عادي</option>
                            <option value="editor">عميل</option>
                            <option value="maintainer">صاحب مهنة</option>
                            <option value="author">ادمن</option>
                          </select>
                        </div>
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- / Content -->
@endsection

@section('script')
<script>
    var routeOfFetchUsers = '{{ route('fetchAllUser') }}';
    var dataSrcFetchUsers = 'users';
    var routeOfStore = '{{ route('user.store') }}';
    var routeOfDelete = '/user/destroy';



</script>
    <!-- Vendors JS -->
    <script src="{{ url('assets/dashboard/assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ url('assets/dashboard/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ url('assets/dashboard/assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ url('assets/dashboard/assets/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ url('assets/dashboard/assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ url('assets/dashboard/assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>
    <script src="{{ url('assets/dashboard/assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ url('assets/dashboard/assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>

    <!-- Page JS -->
    <script src="assets/dashboard/assets/js/users-list.js"></script>
@endsection
