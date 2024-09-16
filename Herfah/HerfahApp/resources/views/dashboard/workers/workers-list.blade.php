@extends('dashboard.layouts.master')

@section('css')
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/@form-validation/form-validation.css" />
@endsection

@section('title')
    قائمة العمال
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

                <a href="/workerDetails/1">worker</a>
                <button onclick="viweWorkerdept('1')">ciew</button>
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
                          <th>العامل</th>
                          <th>معارض أعمال</th>
                          <th> القسم</th>
                          <th>الحالة</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                    </table>
                  </div>

                </div>
              </div>
              <!-- / Content -->
              @php
              $workerDetailsUrl = json_encode(route('worker-details', ['id' => ':id']));
          @endphp
@endsection

@section('script')

<script>
    function viweWorkerdept(id){

    }
    var routeOfFetchWorkers = '{{ route('fetchAllWorkers') }}';
    var dataSrcFetchWorkers = 'workers';
</script>
    <!-- Vendors JS -->
    <script src="/assets/dashboard/assets/vendor/libs/moment/moment.js"></script>
    <script src="/assets/dashboard/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="/assets/dashboard/assets/vendor/libs/select2/select2.js"></script>
    <script src="/assets/dashboard/assets/vendor/libs/@form-validation/popular.js"></script>
    <script src="/assets/dashboard/assets/vendor/libs/@form-validation/bootstrap5.js"></script>
    <script src="/assets/dashboard/assets/vendor/libs/@form-validation/auto-focus.js"></script>
    <script src="/assets/dashboard/assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="/assets/dashboard/assets/vendor/libs/cleavejs/cleave-phone.js"></script>

    <!-- Page JS -->
    <script src="/assets/dashboard/assets/js/workers-list.js"></script>
@endsection
