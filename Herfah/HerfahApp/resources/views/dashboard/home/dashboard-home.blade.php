@extends('dashboard.layouts.master')

@section('css')

@endsection

@section('title')
    الرئيسية
@endsection

@section('content')
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row">
                  <!-- View sales -->
                  <div class="col-xl-4 mb-4 col-lg-5 col-12">
                    <div class="card">
                      <div class="d-flex align-items-end row">
                        <div class="col-7">
                          <div class="card-body text-nowrap">
                            <h5 class="card-title mb-0">🎉</h5>
                            <p class="mb-2">Best Worker of the month</p>
                            <h4 class="text-primary mb-1"></h4>
                          </div>
                        </div>
                        <div class="col-5 text-center text-sm-left">
                          <div class="card-body pb-0 px-0 px-md-4">
                            <img
                              src="/assets/dashboard/assets/img/illustrations/card-advance-sale.png"
                              height="140"
                              alt="view sales" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- View sales -->

                  <!-- Statistics -->
                  <div class="col-xl-8 mb-4 col-lg-7 col-12">
                    <div class="card h-100">
                      <div class="card-header">
                        <div class="d-flex justify-content-between mb-3">
                          <h5 class="card-title mb-0">الاحصائيات</h5>
                          <small class="text-muted"> 1 day ago</small>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="row gy-3">
                          <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                              <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                <i class="ti ti-chart-pie-2 ti-sm"></i>
                              </div>
                              <div class="card-info">
                                <h5 class="mb-0">{{ $statistics['ordersCount'] }}</h5>
                                <small>الطلبات</small>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                              <div class="badge rounded-pill bg-label-info me-3 p-2">
                                <i class="ti ti-users ti-sm"></i>
                              </div>
                              <div class="card-info">
                                <h5 class="mb-0">{{ $statistics['customersCount'] }}</h5>
                                <small>العملاء</small>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                              <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                <i class="ti ti-shopping-cart ti-sm"></i>
                              </div>
                              <div class="card-info">
                                <h5 class="mb-0">{{ $statistics['workersCount'] }}</h5>
                                <small>العمال</small>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                              <div class="badge rounded-pill bg-label-success me-3 p-2">
                                <i class="ti ti-currency-dollar ti-sm"></i>
                              </div>
                              <div class="card-info">
                                <h5 class="mb-0">{{ $statistics['usersCount'] }}</h5>
                                <small>المستخدمين</small>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--/ Statistics -->
                                    <!-- Popular Product -->
                                    <div class="col-md-6 col-xl-4 mb-4">
                                        <div class="card h-100">
                                          <div class="card-header d-flex justify-content-between">
                                            <div class="card-title m-0 me-2">
                                              <h5 class="m-0 me-2">العمال الأكثر طلبا</h5>
                                              <small class="text-muted"></small>
                                            </div>
                                            <div class="dropdown">
                                              <button
                                                class="btn p-0"
                                                type="button"
                                                id="popularProduct"
                                                data-bs-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                                              </button>
                                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="popularProduct">
                                                <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="card-body">
                                            <ul class="p-0 m-0">
                                                @foreach ($workersData as $workerData)
                                                <li class="d-flex mb-4 pb-1">
                                                    <div class="me-3">
                                                      <img src="Files/{{ $workerData->personal_image }}" alt="User" class="rounded" width="46" />
                                                    </div>
                                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                      <div class="me-2">
                                                        <h6 class="mb-0">{{ $workerData->user->name }} {{ $workerData->user->l_name }}</h6>
                                                      </div>
                                                      <div class="user-progress d-flex align-items-center gap-1">
                                                        <p class="mb-0 fw-medium">{{ $totalOrders[$workerData->id] }}</p>
                                                      </div>
                                                    </div>
                                                  </li>
                                                @endforeach
                                            </ul>
                                          </div>
                                        </div>
                                      </div>
                                      <!--/ Popular Product -->

                  <!-- Revenue Report -->
                  <div class="col-12 col-xl-8 mb-4">
                    <div class="card">
                      <div class="card-body p-0">
                        <div class="row row-bordered g-0">
                          <div class="col-md-8 position-relative p-4">
                            <div class="card-header d-inline-block p-0 text-wrap position-absolute">
                              <h5 class="m-0 card-title">Revenue Report</h5>
                            </div>
                            <div id="totalRevenueChart" class="mt-n1"></div>
                          </div>
                          <div class="col-md-4 p-4">
                            <div class="text-center mt-4">
                              <div class="dropdown">
                                <button
                                  class="btn btn-sm btn-outline-primary dropdown-toggle"
                                  type="button"
                                  id="budgetId"
                                  data-bs-toggle="dropdown"
                                  aria-haspopup="true"
                                  aria-expanded="false">
                                  <script>
                                    document.write(new Date().getFullYear());
                                  </script>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="budgetId">
                                  <a class="dropdown-item prev-year1" href="javascript:void(0);">
                                    <script>
                                      document.write(new Date().getFullYear() - 1);
                                    </script>
                                  </a>
                                  <a class="dropdown-item prev-year2" href="javascript:void(0);">
                                    <script>
                                      document.write(new Date().getFullYear() - 2);
                                    </script>
                                  </a>
                                  <a class="dropdown-item prev-year3" href="javascript:void(0);">
                                    <script>
                                      document.write(new Date().getFullYear() - 3);
                                    </script>
                                  </a>
                                </div>
                              </div>
                            </div>
                            <h3 class="text-center pt-4 mb-0">$25,825</h3>
                            <p class="mb-4 text-center"><span class="fw-medium">Budget: </span>56,800</p>
                            <div class="px-3">
                              <div id="budgetChart"></div>
                            </div>
                            <div class="text-center mt-4">
                              <button type="button" class="btn btn-primary">Increase Budget</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--/ Revenue Report -->

                </div>
              </div>
              <!-- / Content -->

@endsection

@section('script')

@endsection
