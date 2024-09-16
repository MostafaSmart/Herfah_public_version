@extends('dashboard.layouts.master')

@section('css')
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/dashboard/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="assets/dashboard/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="assets/dashboard/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="assets/dashboard/assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="assets/dashboard/assets/vendor/libs/rateyo/rateyo.css" />

    <!-- Page CSS -->

    <link rel="stylesheet" href="assets/dashboard/assets/vendor/css/pages/app-ecommerce.css" />
@endsection

@section('title')
    التقييمات
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light"></span>Manage reviews</h4>

    <div class="row mb-4 g-4">
      <div class="col-md-6">
        <div class="card h-100">
          <div class="card-body row widget-separator g-0">
            <div class="col-sm-5 border-shift border-end">
              <h2 class="text-primary d-flex align-items-center gap-1 mb-2">
                4.89<i class="ti ti-star-filled"></i>
              </h2>
              <p class="h6 mb-1">Total 187 reviews</p>
              <p class="pe-2 mb-2">All reviews are from genuine customers</p>
              <span class="badge bg-label-primary p-2 mb-sm-0">+5 This week</span>
              <hr class="d-sm-none" />
            </div>

            <div
              class="col-sm-7 gap-2 text-nowrap d-flex flex-column justify-content-between ps-sm-4 pt-2 py-sm-2">
              <div class="d-flex align-items-center gap-3">
                <small>5 Star</small>
                <div class="progress w-100" style="height: 10px">
                  <div
                    class="progress-bar bg-primary"
                    role="progressbar"
                    style="width: 61.5%"
                    aria-valuenow="61.50"
                    aria-valuemin="0"
                    aria-valuemax="100"></div>
                </div>
                <small class="w-px-20 text-end">124</small>
              </div>
              <div class="d-flex align-items-center gap-3">
                <small>4 Star</small>
                <div class="progress w-100" style="height: 10px">
                  <div
                    class="progress-bar bg-primary"
                    role="progressbar"
                    style="width: 24%"
                    aria-valuenow="24"
                    aria-valuemin="0"
                    aria-valuemax="100"></div>
                </div>
                <small class="w-px-20 text-end">40</small>
              </div>
              <div class="d-flex align-items-center gap-3">
                <small>3 Star</small>
                <div class="progress w-100" style="height: 10px">
                  <div
                    class="progress-bar bg-primary"
                    role="progressbar"
                    style="width: 12%"
                    aria-valuenow="12"
                    aria-valuemin="0"
                    aria-valuemax="100"></div>
                </div>
                <small class="w-px-20 text-end">12</small>
              </div>
              <div class="d-flex align-items-center gap-3">
                <small>2 Star</small>
                <div class="progress w-100" style="height: 10px">
                  <div
                    class="progress-bar bg-primary"
                    role="progressbar"
                    style="width: 7%"
                    aria-valuenow="7"
                    aria-valuemin="0"
                    aria-valuemax="100"></div>
                </div>
                <small class="w-px-20 text-end">7</small>
              </div>
              <div class="d-flex align-items-center gap-3">
                <small>1 Star</small>
                <div class="progress w-100" style="height: 10px">
                  <div
                    class="progress-bar bg-primary"
                    role="progressbar"
                    style="width: 2%"
                    aria-valuenow="2"
                    aria-valuemin="0"
                    aria-valuemax="100"></div>
                </div>
                <small class="w-px-20 text-end">2</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card h-100">
          <div class="card-body row">
            <div class="col-sm-5">
              <div class="mb-5">
                <h4 class="mb-2 text-nowrap">Reviews statistics</h4>
                <p class="mb-0">
                  <span class="me-2">12 New reviews</span> <span class="badge bg-label-success">+8.4%</span>
                </p>
              </div>

              <div>
                <h5 class="mb-2 fw-normal"><span class="text-success me-1">87%</span>Positive reviews</h5>
                <small class="text-muted">Weekly Report</small>
              </div>
            </div>
            <div class="col-sm-7 d-flex justify-content-sm-end align-items-end">
              <div id="reviewsChart"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- review List Table -->
    <div class="card">
      <div class="card-datatable table-responsive">
        <table class="datatables-review table border-top">
          <thead>
            <tr>
              <th></th>
              <th></th>
              <th>العامل</th>
              <th class="text-nowrap">العميل</th>
              <th>التعليق</th>
              <th>التاريخ</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($order as $order)
            <tr>
                <td></td>
                <td></td>
                <td>{{ $order->worker_id }}</td>
                <td>{{ $order->client_id }}</td>
                <td>{{ $order->testimonial }}</td>
                <td>{{ $order->updated_at }}</td>
                <td></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- / Content -->
@endsection

@section('script')
    <!-- Vendors JS -->
    <script src="assets/dashboard/assets/vendor/libs/moment/moment.js"></script>
    <script src="assets/dashboard/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="assets/dashboard/assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="assets/dashboard/assets/vendor/libs/rateyo/rateyo.js"></script>

    <!-- Page JS -->
    <script src="assets/dashboard/assets/js/app-ecommerce-reviews.js"></script>
    <script src="assets/dashboard/assets/js/extended-ui-star-ratings.js"></script>
@endsection
