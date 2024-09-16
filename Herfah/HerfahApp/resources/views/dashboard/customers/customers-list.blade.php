@extends('dashboard.layouts.master')

@section('css')
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/dashboard/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="assets/dashboard/assets/vendor/libs/@form-validation/form-validation.css" />
@endsection

@section('title')
    قائمة العملاء
@endsection

@section('content')
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-2">العملاء / <span class="text-muted fw-light">جميع العملاء</span></h4>

                <!-- customers List Table -->
                <div class="card">
                  <div class="card-datatable table-responsive">
                    <table class="datatables-customers table border-top">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Customer</th>
                          <th class="text-nowrap">Customer Id</th>
                          <th class="text-nowrap">Total Spent</th>
                        </tr>
                      </thead>
                    </table>
                  </div>

                </div>
              </div>
              <!-- / Content -->
@endsection

@section('script')
<script>
var routeOfFetchClient = '{{ route('fetchAllClient') }}';
var dataSrcFetchClient = 'client';
var routeOfDelete = '/client/destroy';
</script>
    <!-- Vendors JS -->
    <script src="assets/dashboard/assets/vendor/libs/select2/select2.js"></script>

    <!-- Page JS -->
    <script src="assets/dashboard/assets/js/customers-list.js"></script>


@endsection
