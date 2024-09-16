@extends('dashboard.layouts.master')

@section('css')
<link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/sweetalert2/sweetalert2.css" />
<link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/@form-validation/form-validation.css" />
<link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/swiper/swiper.css" />
<link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/rateyo/rateyo.css" />
<link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/flatpickr/flatpickr.css" />

<!-- Page CSS -->
<link rel="stylesheet" href="/assets/dashboard/assets/vendor/css/pages/page-profile.css" />
<link rel="stylesheet" href="/assets/dashboard/assets/vendor/css/pages/ui-carousel.css" />
@endsection

@section('title')
    تفاصيل العامل
@endsection

@section('content')
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-2">
                  <span class="text-muted fw-light">العمال / تفاصيل العامل  /</span>
                </h4>
                <!-- Header -->
                <div class="row">
                  <div class="col-12">
                    <div class="card mb-4">
                      <div class="user-profile-header-banner">
                        <img src="/Files/{{ $worker->Image_cover }}" alt="Banner image" class="rounded-top" />
                      </div>
                      <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                          <img
                            src="/Files/{{ $worker->personal_image }}"
                            alt="user image"
                            class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" />
                        </div>
                        <div class="flex-grow-1 mt-3 mt-sm-5">
                          <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                              <h4>{{ $worker->user->name }} {{ $worker->user->l_name }}</h4>
                              <ul
                                class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                <li class="list-inline-item d-flex gap-1">
                                  <i class="ti ti-color-swatch"></i> {{ $worker->department->D_Name }}
                                </li>
                                <li class="list-inline-item d-flex gap-1"><i class="ti ti-map-pin"></i> ذي السفال</li>
                                <li class="list-inline-item d-flex gap-1">
                                  <i class="ti ti-calendar"></i> {{ $worker->created_at }}
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Header -->

                <div class="row">
                  <!-- Customer Content -->
                  <div class="col-12 order-0 order-md-1">
                      <div class="nav-align-top mb-4">
                        <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                          <li class="nav-item">
                            <button
                              type="button"
                              class="nav-link active"
                              role="tab"
                              data-bs-toggle="tab"
                              data-bs-target="#navs-pills-justified-overview"
                              aria-controls="navs-pills-justified-overview"
                              aria-selected="true">
                              <i class="ti ti-user ti-xs me-1"></i> أساسي
                            </button>
                          </li>
                          <li class="nav-item">
                            <button
                              type="button"
                              class="nav-link"
                              role="tab"
                              data-bs-toggle="tab"
                              data-bs-target="#navs-pills-justified-portfolio"
                              aria-controls="navs-pills-justified-portfolio"
                              aria-selected="false">
                              <i class="tf-icons ti ti-user ti-xs me-1"></i> معرض الأعمال
                            </button>
                          </li>
                          <li class="nav-item">
                            <button
                              type="button"
                              class="nav-link"
                              role="tab"
                              data-bs-toggle="tab"
                              data-bs-target="#navs-pills-justified-address"
                              aria-controls="navs-pills-justified-address"
                              aria-selected="false">
                              <i class="tf-icons ti ti-message-dots ti-xs me-1"></i> النشاطات
                            </button>
                          </li>
                          <li class="nav-item">
                            <button
                              type="button"
                              class="nav-link"
                              role="tab"
                              data-bs-toggle="tab"
                              data-bs-target="#navs-pills-justified-notifications"
                              aria-controls="navs-pills-justified-notifications"
                              aria-selected="false">
                              <i class="tf-icons ti ti-message-dots ti-xs me-1"></i> الاشعارات
                            </button>
                          </li>
                        </ul>
                        <div class="tab-content" style="background-color: transparent;">
                          <div class="tab-pane fade show active" id="navs-pills-justified-overview" role="tabpanel">
                            <div class="row">
                              <div class="col-4">
                                  <!-- Customer-detail Card -->
                                <div class="card  mb-4">
                                  <div class="card-body">
                                    <div class="customer-avatar-section">
                                      <div class="d-flex align-items-center flex-column">
                                        <div class="customer-info text-center">
                                          <small> ID #{{ $worker->id }}</small>
                                        </div>
                                        <span class="badge bg-label-success">نشط</span>
                                      </div>
                                    </div>
                                    <div class="info-container">
                                      <small class="d-block pt-4 border-top fw-normal text-uppercase text-muted my-3">التفاصيل الأساسية</small>
                                      <ul class="list-unstyled">
                                        <li class="mb-3">
                                          <span class="fw-medium me-2">الاسم الأول:</span>
                                          <span>{{ $worker->user->name }}</span>
                                        </li>
                                        <li class="mb-3">
                                          <span class="fw-medium me-2">الاسم الأخير:</span>
                                          <span>{{ $worker->user->l_name }}</span>
                                        </li>
                                        <li class="mb-3">
                                          <span class="fw-medium me-2"> الجنس:</span>
                                          <span>{{ $worker->user->Gender }}</span>
                                        </li>
                                        <li class="mb-3">
                                          <span class="fw-medium me-2"> تاريخ الميلاد:</span>
                                          <span>{{ $worker->user->birtdate }}</span>
                                        </li>
                                        <li class="mb-3">
                                          <span class="fw-medium me-2">البريد:</span>
                                          <span>{{ $worker->user->email }}</span>
                                        </li>
                                        <li class="mb-3">
                                          <span class="fw-medium me-2">الهاتف:</span>
                                          <span>{{ $worker->user->PhoneNumber }}</span>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-8">
                                <div class="row text-nowrap">
                                    <div class="col-md-6 mb-4">
                                      <div class="card h-100">
                                        <div class="card-body d-flex gap-2">
                                            <div class="card-icon mb-3">
                                              <div class="avatar">
                                                <div class="avatar-initial rounded bg-label-primary">
                                                  <i class="ti ti-shopping-cart ti-md"></i>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="card-info ">
                                              <h6 class="card-title mb-3">عدد الأعمال التي تم تنفيذها عبر المنصة</h6>
                                              <div class="d-flex justify-content-center mb-1 gap-1">
                                                <h6 class="text-primary mb-0">2345</h6>
                                              </div>
                                              <div class="d-flex gap-2 justify-content-center ">
                                                  <h6 class="card-title">عدد معارض الأعمال :</h6>
                                                  <h6 class="text-primary mb-0">{{ $worker->portfolio_count }}</h6>
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                      <div class="card h-100">
                                        <div class="card-body d-flex gap-2">
                                            <div class="card-icon mb-3">
                                              <div class="avatar">
                                                  <div class="avatar-initial rounded bg-label-success">
                                                      <i class="ti ti-currency-dollar ti-md"></i>
                                                  </div>
                                              </div>
                                            </div>
                                            <div class="card-info ">
                                              <h6 class="card-title mb-3">المبالغ التبي تم الحصول عليها</h6>
                                              <div class="d-flex justify-content-center mb-1 gap-1">
                                                <h6 class="text-primary mb-0">$2345</h6>
                                              </div>
                                              <div class="d-flex gap-2 justify-content-center ">
                                                  <h6 class="card-title">   </h6>
                                                  <h6 class="text-primary mb-0"></h6>
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="card mb-4">
                                    <div class="card-body row g-3">
                                        <div class="text-center mb-4">
                                          <p class="text-muted">معلومات عن العمل</p>
                                        </div>
                                        <div class="col-12 col-md-12 mb-2">
                                          <i class="ti ti-user text-heading"></i><span class="fw-medium mx-2 text-heading"> المهارات:</span>
                                          <span>{{ $worker->department->D_Name }}</span>
                                        </div>
                                        <div class="col-12 col-md-12">
                                          <i class="ti ti-user text-heading"></i><span class="fw-medium mx-2 text-heading"> وصف شخصي:</span>
                                          <p class="mt-2 px-4">
                                            {{ $worker->about }}
                                          </p>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                          <a
                                            href="javascript:;"
                                            id="{{ $worker->id }}"
                                            class="btn btn-primary me-3 edit_btn"
                                            data-bs-target="#editWorker"
                                            data-bs-toggle="modal"
                                            >تعديل</a
                                          >
                                        </div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                          <div class="tab-pane fade" id="navs-pills-justified-portfolio" role="tabpanel">
                            <div class="col-12 my-3">
                              <div class="d-flex justify-content-end">
                                <a
                                  href="javascript:;"
                                  class="btn btn-primary me-3"
                                  data-bs-target="#addPortfolio"
                                  data-bs-toggle="modal"
                                  >اضافة معرض جديد</a
                                >
                              </div>
                            </div>
                            @foreach ($worker->portfoli as $portfolio)
                            <div class="col-12">
                                <div class="card mb-3" style="height: 300px;">
                                  <div class="row">
                                    <div class="col-md-7">
                                      <div class="card-body">
                                        <h5 class="card-title">{{ $worker->id }}</h5>
                                        <p class="card-text">
                                          {{ $portfolio->About_Project }}
                                        </p>
                                        <p class="card-text"><small class="text-muted">Last updated {{ $portfolio->updated_at }}</small></p>
                                      </div>
                                    </div>
                                    <div class="col-md-5 ">
                                      <div id="swiper-gallery" >
                                        <div class="swiper gallery-top " style="height: 200px;">
                                          <div class="swiper-wrapper">
                                            @foreach (json_decode($portfolio->Images) as $image)
                                                <div class="swiper-slide" style="background-image: url({{ asset('Files/' . $image) }}">
                                                </div>
                                            @endforeach
                                          </div>
                                          <!-- Add Arrows -->
                                          <div class="swiper-button-next swiper-button-white"></div>
                                          <div class="swiper-button-prev swiper-button-white"></div>
                                        </div>
                                        <div class="swiper gallery-thumbs" style="height: 100px;">
                                          <div class="swiper-wrapper">
                                            @foreach (json_decode($portfolio->Images) as $image)
                                                <div class="swiper-slide" style="background-image: url({{ asset('Files/' . $image) }}">
                                                </div>
                                            @endforeach
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            @endforeach
                            <!--/ Change Password -->
                          </div>
                          <div class="tab-pane fade" id="navs-pills-justified-address" role="tabpanel">
                                <div class="card mb-4">
                                    <div class="card-datatable table-responsive">
                                      <table class="datatables-projects table border-top">
                                        <thead>
                                          <tr>
                                              <th></th>
                                              <th></th>
                                              <th>Name</th>
                                              <th>Leader</th>
                                              <th>Team</th>
                                              <th class="w-px-200">Status</th>
                                              <th>Action</th>
                                          </tr>
                                        </thead>
                                      </table>
                                    </div>
                                  </div>
                                  <!--/ Projects table -->
                          </div>
                          <div class="tab-pane fade" id="navs-pills-justified-notifications" role="tabpanel">
                            <div class="card mb-4">
                              <!-- Notifications -->
                              <div class="card-header">
                                <h5 class="card-title mb-1">Recent Devices</h5>
                                <span>Change to notification settings, the user will get the update</span>
                              </div>
                              <div class="card-body">
                                <div class="table-responsive border rounded">
                                  <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th class="text-nowrap">Type</th>
                                        <th class="text-nowrap text-center">✉️ Email</th>
                                        <th class="text-nowrap text-center">🖥 Browser</th>
                                        <th class="text-nowrap text-center">👩🏻‍💻 App</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td class="text-nowrap">Order status</td>
                                        <td>
                                          <div class="form-check d-flex justify-content-center">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck1" checked />
                                          </div>
                                        </td>
                                        <td>
                                          <div class="form-check d-flex justify-content-center">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck2" checked />
                                          </div>
                                        </td>
                                        <td>
                                          <div class="form-check d-flex justify-content-center">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck3" checked />
                                          </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="text-nowrap">Upcoming sale</td>
                                        <td>
                                          <div class="form-check d-flex justify-content-center">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck4" checked />
                                          </div>
                                        </td>
                                        <td>
                                          <div class="form-check d-flex justify-content-center">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck5" checked />
                                          </div>
                                        </td>
                                        <td>
                                          <div class="form-check d-flex justify-content-center">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck6" checked />
                                          </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="text-nowrap">Special offers</td>
                                        <td>
                                          <div class="form-check d-flex justify-content-center">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck7" checked />
                                          </div>
                                        </td>
                                        <td>
                                          <div class="form-check d-flex justify-content-center">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck8" checked />
                                          </div>
                                        </td>
                                        <td>
                                          <div class="form-check d-flex justify-content-center">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck9" />
                                          </div>
                                        </td>
                                      </tr>
                                      <tr class="border-transparent">
                                        <td class="text-nowrap">New item arrival</td>
                                        <td>
                                          <div class="form-check d-flex justify-content-center">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck10" checked />
                                          </div>
                                        </td>
                                        <td>
                                          <div class="form-check d-flex justify-content-center">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck11" />
                                          </div>
                                        </td>
                                        <td>
                                          <div class="form-check d-flex justify-content-center">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck12" />
                                          </div>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              <div class="card-body pt-0">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <button type="reset" class="btn btn-label-secondary">Discard</button>
                              </div>
                              <!-- /Notifications -->
                            </div>
                          </div>
                      </div>
                    <!-- </div> -->




                  <!--/ Customer Content -->
                </div>

                <!-- Modal -->
                <!-- Edit worker Modal -->
                <div class="modal fade" id="editWorker" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                    <div class="modal-content p-3 p-md-5">
                      <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                          <h3 class="mb-2">تعديل معلومات العمل </h3>
                          <p class="text-muted">Updating user details will receive a privacy audit.</p>
                        </div>
                        <form id="editWorkerForm" class="row g-3">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="worker_id" id="worker_id" value="{{ $worker->id }}">
                          <div class="col-6">
                              <label for="profileImage" class="form-label">صورة الملف الشخصي</label>
                              <input class="form-control" type="file" id="profileImage" name="profileImage"/>
                          </div>
                          <div class="col-6" id="profileImagePreview">
                          </div>
                          <div class="col-6">
                              <label for="coverImage" class="form-label">صورة الغلاف</label>
                              <input class="form-control" type="file" id="coverImage" name="coverImage" />
                          </div>
                          <div class="col-6" id="coverImagePreview">
                        </div>
                          <div class="col-12">
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
                          <div class="col-6">
                            <label for="priceByHour" class="form-label">سعر الساعة</label>
                            <input type="text" class="form-control" id="pricePerHour" name="price_perHour" pattern="[0-9]+(\.[0-9]+)?" required />
                          </div>
                          <div class="col-6">
                            <label for="priceOfMeter" class="form-label">سعر المتر</label>
                            <input type="text" class="form-control" id="pricePerMeter" name="price_perMatter" pattern="[0-9]+(\.[0-9]+)?" placeholder="أدخل قيمة عشرية" required />
                          </div>
                          <div class="col-12">
                            <label class="form-label" for="formValidationBio">وصف موجز</label>
                            <textarea
                              class="form-control"
                              id="formValidationBio"
                              name="about"
                              rows="3"></textarea>
                          </div>
                          <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">حفظ التعديل</button>
                            <button
                              type="reset"
                              class="btn btn-label-secondary"
                              data-bs-dismiss="modal"
                              aria-label="Close">
                              الغاء
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Edit worker Modal -->
                <!-- Add Portfolio Modal -->
                <div class="modal fade" id="addPortfolio" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                    <div class="modal-content p-3 p-md-5">
                      <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                          <h3 class="mb-2"> اضافة معرض أعمال جديد </h3>
                          <p class="text-muted">Updating user details will receive a privacy audit.</p>
                        </div>
                        <form id="addNewPortfolio" class="row g-3">
                            @csrf
                            <input type="hidden" name="worker_id" value="{{ $worker->id }}">
                            <div class="col-sm-12">
                              <label for="exampleFormControlTextarea1" class="form-label">وصف العمل</label>
                              <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="description"></textarea>
                            </div>
                            <div class="col-sm-12">
                              <label for="formFileMultiple" class="form-label">اختر خمس صور</label>
                              <input class="form-control" type="file" id="portifolioImgMultiple" name="images[]" multiple />
                            </div>
                          <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">حفظ </button>
                            <button
                              type="reset"
                              class="btn btn-label-secondary"
                              data-bs-dismiss="modal"
                              aria-label="Close">
                              الغاء
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Add Portfolio Modal -->
                <!-- edit Credit Card Modal -->
                <div class="modal fade" id="editCCModal" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-simple modal-add-new-cc">
                    <div class="modal-content p-3 p-md-5">
                      <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                          <h3 class="mb-2">Edit Card</h3>
                          <p class="text-muted">Edit your saved card details</p>
                        </div>
                        <form id="editCCForm" class="row g-3" onsubmit="return false">
                          <div class="col-12">
                            <label class="form-label w-100" for="modalEditCard">Card Number</label>
                            <div class="input-group input-group-merge">
                              <input
                                id="modalEditCard"
                                name="modalEditCard"
                                class="form-control credit-card-mask-edit"
                                type="text"
                                placeholder="4356 3215 6548 7898"
                                value="4356 3215 6548 7898"
                                aria-describedby="modalEditCard2" />
                              <span class="input-group-text cursor-pointer p-1" id="modalEditCard2"
                                ><span class="card-type-edit"></span
                              ></span>
                            </div>
                          </div>
                          <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditName">Name</label>
                            <input
                              type="text"
                              id="modalEditName"
                              class="form-control"
                              placeholder="John Doe"
                              value="John Doe" />
                          </div>
                          <div class="col-6 col-md-3">
                            <label class="form-label" for="modalEditExpiryDate">Exp. Date</label>
                            <input
                              type="text"
                              id="modalEditExpiryDate"
                              class="form-control expiry-date-mask-edit"
                              placeholder="MM/YY"
                              value="08/28" />
                          </div>
                          <div class="col-6 col-md-3">
                            <label class="form-label" for="modalEditCvv">CVV Code</label>
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                id="modalEditCvv"
                                class="form-control cvv-code-mask-edit"
                                maxlength="3"
                                placeholder="654"
                                value="XXX" />
                              <span class="input-group-text cursor-pointer" id="modalEditCvv2"
                                ><i
                                  class="ti ti-help text-muted"
                                  data-bs-toggle="tooltip"
                                  data-bs-placement="top"
                                  title="Card Verification Value"></i
                              ></span>
                            </div>
                          </div>
                          <div class="col-12">
                            <label class="switch">
                              <input type="checkbox" class="switch-input" />
                              <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                              </span>
                              <span class="switch-label">Set as primary card</span>
                            </label>
                          </div>
                          <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Update</button>
                            <button type="reset" class="btn btn-label-danger" data-bs-dismiss="modal" aria-label="Close">
                              Remove
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ editCredit Card Modal -->

                <!-- Add New Address Modal -->
                <div class="modal fade" id="addNewAddress" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
                    <div class="modal-content p-3 p-md-5">
                      <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                          <h3 class="address-title mb-2">Add New Address</h3>
                          <p class="text-muted address-subtitle">Add new address for express delivery</p>
                        </div>
                        <form id="addNewAddressForm" class="row g-3" onsubmit="return false">
                          <div class="col-12">
                            <div class="row">
                              <div class="col-md mb-md-0 mb-3">
                                <div class="form-check custom-option custom-option-icon">
                                  <label class="form-check-label custom-option-content" for="customRadioHome">
                                    <span class="custom-option-body">
                                      <svg
                                        width="41"
                                        height="40"
                                        viewBox="0 0 41 40"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                          d="M24.25 33.75V23.75H16.75V33.75H6.75002V18.0469C6.7491 17.8733 6.78481 17.7015 6.85482 17.5426C6.92482 17.3838 7.02754 17.2415 7.15627 17.125L19.6563 5.76562C19.8841 5.5559 20.1825 5.43948 20.4922 5.43948C20.8019 5.43948 21.1003 5.5559 21.3281 5.76562L33.8438 17.125C33.9696 17.2438 34.0703 17.3866 34.1401 17.5449C34.2098 17.7032 34.2472 17.8739 34.25 18.0469V33.75H24.25Z"
                                          fill="currentColor"
                                          opacity="0.2" />
                                        <path
                                          d="M33.25 33.75C33.25 34.3023 33.6977 34.75 34.25 34.75C34.8023 34.75 35.25 34.3023 35.25 33.75H33.25ZM34.25 18.0469H35.25C35.25 18.0415 35.25 18.0361 35.2499 18.0307L34.25 18.0469ZM33.8437 17.125L34.5304 16.398C34.5256 16.3934 34.5207 16.389 34.5158 16.3845L33.8437 17.125ZM21.3281 5.76562L20.6509 6.50143L20.656 6.50611L21.3281 5.76562ZM19.6562 5.76562L20.3288 6.5057L20.3335 6.50141L19.6562 5.76562ZM7.15625 17.125L7.82712 17.8666L7.82878 17.8651L7.15625 17.125ZM6.75 18.0469H7.75001L7.74999 18.0416L6.75 18.0469ZM5.75 33.75C5.75 34.3023 6.19772 34.75 6.75 34.75C7.30228 34.75 7.75 34.3023 7.75 33.75H5.75ZM3 32.75C2.44772 32.75 2 33.1977 2 33.75C2 34.3023 2.44772 34.75 3 34.75V32.75ZM38 34.75C38.5523 34.75 39 34.3023 39 33.75C39 33.1977 38.5523 32.75 38 32.75V34.75ZM23.25 33.75C23.25 34.3023 23.6977 34.75 24.25 34.75C24.8023 34.75 25.25 34.3023 25.25 33.75H23.25ZM15.75 33.75C15.75 34.3023 16.1977 34.75 16.75 34.75C17.3023 34.75 17.75 34.3023 17.75 33.75H15.75ZM35.25 33.75V18.0469H33.25V33.75H35.25ZM35.2499 18.0307C35.2449 17.7243 35.1787 17.422 35.0551 17.1416L33.225 17.9481C33.2409 17.9844 33.2495 18.0235 33.2501 18.0631L35.2499 18.0307ZM35.0551 17.1416C34.9316 16.8612 34.7531 16.6084 34.5304 16.398L33.1571 17.852C33.1859 17.8792 33.209 17.9119 33.225 17.9481L35.0551 17.1416ZM34.5158 16.3845L22.0002 5.02514L20.656 6.50611L33.1717 17.8655L34.5158 16.3845ZM22.0053 5.02984C21.5929 4.6502 21.0528 4.43948 20.4922 4.43948V6.43948C20.551 6.43948 20.6076 6.46159 20.6509 6.50141L22.0053 5.02984ZM20.4922 4.43948C19.9316 4.43948 19.3915 4.6502 18.979 5.02984L20.3335 6.50141C20.3767 6.46159 20.4334 6.43948 20.4922 6.43948V4.43948ZM18.9837 5.02556L6.48371 16.3849L7.82878 17.8651L20.3288 6.50569L18.9837 5.02556ZM6.48538 16.3834C6.25236 16.5942 6.06642 16.8518 5.93971 17.1393L7.76988 17.9459C7.78318 17.9157 7.80268 17.8887 7.82712 17.8666L6.48538 16.3834ZM5.93971 17.1393C5.813 17.4269 5.74836 17.7379 5.75001 18.0521L7.74999 18.0416C7.74981 18.0087 7.75659 17.976 7.76988 17.9459L5.93971 17.1393ZM5.75 18.0469V33.75H7.75V18.0469H5.75ZM3 34.75H38V32.75H3V34.75ZM25.25 33.75V25H23.25V33.75H25.25ZM25.25 25C25.25 24.4033 25.013 23.831 24.591 23.409L23.1768 24.8232C23.2237 24.8701 23.25 24.9337 23.25 25H25.25ZM24.591 23.409C24.169 22.987 23.5967 22.75 23 22.75V24.75C23.0663 24.75 23.1299 24.7763 23.1768 24.8232L24.591 23.409ZM23 22.75H18V24.75H23V22.75ZM18 22.75C17.4033 22.75 16.831 22.9871 16.409 23.409L17.8232 24.8232C17.8701 24.7763 17.9337 24.75 18 24.75V22.75ZM16.409 23.409C15.9871 23.831 15.75 24.4033 15.75 25H17.75C17.75 24.9337 17.7763 24.8701 17.8232 24.8232L16.409 23.409ZM15.75 25V33.75H17.75V25H15.75Z"
                                          fill="currentColor" />
                                      </svg>

                                      <span class="custom-option-title">Home</span>
                                      <small> Delivery time (9am – 9pm) </small>
                                    </span>
                                    <input
                                      name="customRadioIcon"
                                      class="form-check-input"
                                      type="radio"
                                      value=""
                                      id="customRadioHome"
                                      checked />
                                  </label>
                                </div>
                              </div>
                              <div class="col-md mb-md-0 mb-3">
                                <div class="form-check custom-option custom-option-icon">
                                  <label class="form-check-label custom-option-content" for="customRadioOffice">
                                    <span class="custom-option-body">
                                      <svg
                                        width="41"
                                        height="40"
                                        viewBox="0 0 41 40"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                          d="M22.75 33.75V6.25C22.75 5.91848 22.6183 5.60054 22.3839 5.36612C22.1495 5.1317 21.8315 5 21.5 5H6.5C6.16848 5 5.85054 5.1317 5.61612 5.36612C5.3817 5.60054 5.25 5.91848 5.25 6.25V33.75"
                                          fill="currentColor"
                                          fill-opacity="0.2" />
                                        <path
                                          d="M2.75 32.75C2.19772 32.75 1.75 33.1977 1.75 33.75C1.75 34.3023 2.19772 34.75 2.75 34.75V32.75ZM37.75 34.75C38.3023 34.75 38.75 34.3023 38.75 33.75C38.75 33.1977 38.3023 32.75 37.75 32.75V34.75ZM21.75 33.75C21.75 34.3023 22.1977 34.75 22.75 34.75C23.3023 34.75 23.75 34.3023 23.75 33.75H21.75ZM21.5 5V4V5ZM5.25 6.25H4.25H5.25ZM4.25 33.75C4.25 34.3023 4.69772 34.75 5.25 34.75C5.80228 34.75 6.25 34.3023 6.25 33.75H4.25ZM34.25 33.75C34.25 34.3023 34.6977 34.75 35.25 34.75C35.8023 34.75 36.25 34.3023 36.25 33.75H34.25ZM22.75 14C22.1977 14 21.75 14.4477 21.75 15C21.75 15.5523 22.1977 16 22.75 16V14ZM10.25 10.25C9.69772 10.25 9.25 10.6977 9.25 11.25C9.25 11.8023 9.69772 12.25 10.25 12.25V10.25ZM15.25 12.25C15.8023 12.25 16.25 11.8023 16.25 11.25C16.25 10.6977 15.8023 10.25 15.25 10.25V12.25ZM12.75 20.25C12.1977 20.25 11.75 20.6977 11.75 21.25C11.75 21.8023 12.1977 22.25 12.75 22.25V20.25ZM17.75 22.25C18.3023 22.25 18.75 21.8023 18.75 21.25C18.75 20.6977 18.3023 20.25 17.75 20.25V22.25ZM10.25 26.5C9.69772 26.5 9.25 26.9477 9.25 27.5C9.25 28.0523 9.69772 28.5 10.25 28.5V26.5ZM15.25 28.5C15.8023 28.5 16.25 28.0523 16.25 27.5C16.25 26.9477 15.8023 26.5 15.25 26.5V28.5ZM27.75 26.5C27.1977 26.5 26.75 26.9477 26.75 27.5C26.75 28.0523 27.1977 28.5 27.75 28.5V26.5ZM30.25 28.5C30.8023 28.5 31.25 28.0523 31.25 27.5C31.25 26.9477 30.8023 26.5 30.25 26.5V28.5ZM27.75 20.25C27.1977 20.25 26.75 20.6977 26.75 21.25C26.75 21.8023 27.1977 22.25 27.75 22.25V20.25ZM30.25 22.25C30.8023 22.25 31.25 21.8023 31.25 21.25C31.25 20.6977 30.8023 20.25 30.25 20.25V22.25ZM2.75 34.75H37.75V32.75H2.75V34.75ZM23.75 33.75V6.25H21.75V33.75H23.75ZM23.75 6.25C23.75 5.65326 23.5129 5.08097 23.091 4.65901L21.6768 6.07322C21.7237 6.12011 21.75 6.18369 21.75 6.25H23.75ZM23.091 4.65901C22.669 4.23705 22.0967 4 21.5 4V6C21.5663 6 21.6299 6.02634 21.6768 6.07322L23.091 4.65901ZM21.5 4H6.5V6H21.5V4ZM6.5 4C5.90326 4 5.33097 4.23705 4.90901 4.65901L6.32322 6.07322C6.37011 6.02634 6.4337 6 6.5 6V4ZM4.90901 4.65901C4.48705 5.08097 4.25 5.65326 4.25 6.25H6.25C6.25 6.1837 6.27634 6.12011 6.32322 6.07322L4.90901 4.65901ZM4.25 6.25V33.75H6.25V6.25H4.25ZM36.25 33.75V16.25H34.25V33.75H36.25ZM36.25 16.25C36.25 15.6533 36.013 15.081 35.591 14.659L34.1768 16.0732C34.2237 16.1201 34.25 16.1837 34.25 16.25H36.25ZM35.591 14.659C35.169 14.2371 34.5967 14 34 14V16C34.0663 16 34.1299 16.0263 34.1768 16.0732L35.591 14.659ZM34 14H22.75V16H34V14ZM10.25 12.25H15.25V10.25H10.25V12.25ZM12.75 22.25H17.75V20.25H12.75V22.25ZM10.25 28.5H15.25V26.5H10.25V28.5ZM27.75 28.5H30.25V26.5H27.75V28.5ZM27.75 22.25H30.25V20.25H27.75V22.25Z"
                                          fill="currentColor" />
                                      </svg>

                                      <span class="custom-option-title"> Office </span>
                                      <small> Delivery time (9am – 5pm) </small>
                                    </span>
                                    <input
                                      name="customRadioIcon"
                                      class="form-check-input"
                                      type="radio"
                                      value=""
                                      id="customRadioOffice" />
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-md-6">
                            <label class="form-label" for="modalAddressFirstName">First Name</label>
                            <input
                              type="text"
                              id="modalAddressFirstName"
                              name="modalAddressFirstName"
                              class="form-control"
                              placeholder="John" />
                          </div>
                          <div class="col-12 col-md-6">
                            <label class="form-label" for="modalAddressLastName">Last Name</label>
                            <input
                              type="text"
                              id="modalAddressLastName"
                              name="modalAddressLastName"
                              class="form-control"
                              placeholder="Doe" />
                          </div>
                          <div class="col-12">
                            <label class="form-label" for="modalAddressCountry">Country</label>
                            <select
                              id="modalAddressCountry"
                              name="modalAddressCountry"
                              class="select2 form-select"
                              data-allow-clear="true">
                              <option value="">Select</option>
                              <option value="Australia">Australia</option>
                              <option value="Bangladesh">Bangladesh</option>
                              <option value="Belarus">Belarus</option>
                              <option value="Brazil">Brazil</option>
                              <option value="Canada">Canada</option>
                              <option value="China">China</option>
                              <option value="France">France</option>
                              <option value="Germany">Germany</option>
                              <option value="India">India</option>
                              <option value="Indonesia">Indonesia</option>
                              <option value="Israel">Israel</option>
                              <option value="Italy">Italy</option>
                              <option value="Japan">Japan</option>
                              <option value="Korea">Korea, Republic of</option>
                              <option value="Mexico">Mexico</option>
                              <option value="Philippines">Philippines</option>
                              <option value="Russia">Russian Federation</option>
                              <option value="South Africa">South Africa</option>
                              <option value="Thailand">Thailand</option>
                              <option value="Turkey">Turkey</option>
                              <option value="Ukraine">Ukraine</option>
                              <option value="United Arab Emirates">United Arab Emirates</option>
                              <option value="United Kingdom">United Kingdom</option>
                              <option value="United States">United States</option>
                            </select>
                          </div>
                          <div class="col-12">
                            <label class="form-label" for="modalAddressAddress1">Address Line 1</label>
                            <input
                              type="text"
                              id="modalAddressAddress1"
                              name="modalAddressAddress1"
                              class="form-control"
                              placeholder="12, Business Park" />
                          </div>
                          <div class="col-12">
                            <label class="form-label" for="modalAddressAddress2">Address Line 2</label>
                            <input
                              type="text"
                              id="modalAddressAddress2"
                              name="modalAddressAddress2"
                              class="form-control"
                              placeholder="Mall Road" />
                          </div>
                          <div class="col-12 col-md-6">
                            <label class="form-label" for="modalAddressLandmark">Landmark</label>
                            <input
                              type="text"
                              id="modalAddressLandmark"
                              name="modalAddressLandmark"
                              class="form-control"
                              placeholder="Nr. Hard Rock Cafe" />
                          </div>
                          <div class="col-12 col-md-6">
                            <label class="form-label" for="modalAddressCity">City</label>
                            <input
                              type="text"
                              id="modalAddressCity"
                              name="modalAddressCity"
                              class="form-control"
                              placeholder="Los Angeles" />
                          </div>
                          <div class="col-12 col-md-6">
                            <label class="form-label" for="modalAddressLandmark">State</label>
                            <input
                              type="text"
                              id="modalAddressState"
                              name="modalAddressState"
                              class="form-control"
                              placeholder="California" />
                          </div>
                          <div class="col-12 col-md-6">
                            <label class="form-label" for="modalAddressZipCode">Zip Code</label>
                            <input
                              type="text"
                              id="modalAddressZipCode"
                              name="modalAddressZipCode"
                              class="form-control"
                              placeholder="99950" />
                          </div>
                          <div class="col-12">
                            <label class="switch">
                              <input type="checkbox" class="switch-input" />
                              <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                              </span>
                              <span class="switch-label">Use as a billing address?</span>
                            </label>
                          </div>
                          <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                            <button
                              type="reset"
                              class="btn btn-label-secondary"
                              data-bs-dismiss="modal"
                              aria-label="Close">
                              Cancel
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Add New Address Modal -->

                <!-- Add New Credit Card Modal -->
                <div class="modal fade" id="addNewCCModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                  <div class="modal-content p-3 p-md-5">
                                    <div class="modal-body">
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      <div class="text-center mb-4">
                                        <h3 class="mb-2">Add New Card</h3>
                                        <p class="text-muted">Add new card to complete payment</p>
                                      </div>
                                      <form id="addNewCCForm" class="row g-3" onsubmit="return false">
                                        <div class="col-12">
                                          <label class="form-label w-100" for="modalAddCard">Card Number</label>
                                          <div class="input-group input-group-merge">
                                            <input
                                              id="modalAddCard"
                                              name="modalAddCard"
                                              class="form-control credit-card-mask"
                                              type="text"
                                              placeholder="1356 3215 6548 7898"
                                              aria-describedby="modalAddCard2" />
                                            <span class="input-group-text cursor-pointer p-1" id="modalAddCard2"
                                              ><span class="card-type"></span
                                            ></span>
                                          </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                          <label class="form-label" for="modalAddCardName">Name</label>
                                          <input type="text" id="modalAddCardName" class="form-control" placeholder="John Doe" />
                                        </div>
                                        <div class="col-6 col-md-3">
                                          <label class="form-label" for="modalAddCardExpiryDate">Exp. Date</label>
                                          <input
                                            type="text"
                                            id="modalAddCardExpiryDate"
                                            class="form-control expiry-date-mask"
                                            placeholder="MM/YY" />
                                        </div>
                                        <div class="col-6 col-md-3">
                                          <label class="form-label" for="modalAddCardCvv">CVV Code</label>
                                          <div class="input-group input-group-merge">
                                            <input
                                              type="text"
                                              id="modalAddCardCvv"
                                              class="form-control cvv-code-mask"
                                              maxlength="3"
                                              placeholder="654" />
                                            <span class="input-group-text cursor-pointer" id="modalAddCardCvv2"
                                              ><i
                                                class="text-muted ti ti-help"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Card Verification Value"></i
                                            ></span>
                                          </div>
                                        </div>
                                        <div class="col-12">
                                          <label class="switch">
                                            <input type="checkbox" class="switch-input" />
                                            <span class="switch-toggle-slider">
                                              <span class="switch-on"></span>
                                              <span class="switch-off"></span>
                                            </span>
                                            <span class="switch-label">Save card for future billing?</span>
                                          </label>
                                        </div>
                                        <div class="col-12 text-center">
                                          <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                          <button
                                            type="reset"
                                            class="btn btn-label-secondary btn-reset"
                                            data-bs-dismiss="modal"
                                            aria-label="Close">
                                            Cancel
                                          </button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                </div>
                <!--/ Add New Credit Card Modal -->
                <!-- Add New Credit Card Modal -->
                <div class="modal fade" id="upgradePlanModal" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-simple modal-upgrade-plan">
                    <div class="modal-content p-3 p-md-5">
                      <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                          <h3 class="mb-2">Upgrade Plan</h3>
                          <p>Choose the best plan for user.</p>
                        </div>
                        <form id="upgradePlanForm" class="row g-3" onsubmit="return false">
                          <div class="col-sm-8">
                            <label class="form-label" for="choosePlan">Choose Plan</label>
                            <select id="choosePlan" name="choosePlan" class="form-select" aria-label="Choose Plan">
                              <option selected>Choose Plan</option>
                              <option value="standard">Standard - $99/month</option>
                              <option value="exclusive">Exclusive - $249/month</option>
                              <option value="Enterprise">Enterprise - $499/month</option>
                            </select>
                          </div>
                          <div class="col-sm-4 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary">Upgrade</button>
                          </div>
                        </form>
                      </div>
                      <hr class="mx-md-n5 mx-n3" />
                      <div class="modal-body">
                        <p class="mb-0">User current plan is standard plan</p>
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                          <div class="d-flex justify-content-center me-2">
                            <sup class="h6 pricing-currency pt-1 mt-3 mb-0 me-1 text-primary">$</sup>
                            <h1 class="display-5 mb-0 text-primary">99</h1>
                            <sub class="h5 pricing-duration mt-auto mb-2 text-muted">/month</sub>
                          </div>
                          <button class="btn btn-label-danger cancel-subscription mt-3">Cancel Subscription</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Add New Credit Card Modal -->

                <!-- /Modal -->
              </div>
              <!-- / Content -->
              <div class="content-backdrop fade"></div>
            </div>
@endsection

@section('script')

<script>
    $(function() {
    $("#addNewPortfolio").submit(function(e) {
    e.preventDefault();
    var formData = new FormData($('#addNewPortfolio')[0]);
    $.ajax({
        type: 'post',
        enctype: 'multipart/form-data',
        url: '{{ route('portfolio.add') }}',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {
            if (data.status == true) {
                Swal.fire({
                    title: 'Good job!',
                    text: "تمت الاضافة بنجاح",
                    icon: 'success',
                    customClass: {
                    confirmButton: 'btn btn-primary waves-effect waves-light'
                    },
                    buttonsStyling: false
                });
                $("#addNewPortfolio")[0].reset();
                $('#addPortfolio').modal('hide');
            }},
            error: function (reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function (key, val) {
                    $("#" + key + "_error").text(val[0]);
                });
            }
        });
    });
});

// edit worker ajax request
$(document).on('click', '.edit_btn', function(e) {
    e.preventDefault();
    let id = $(this).attr('id');
    $.ajax({
        url: '/worker/' + id + '/edit',
        method: 'get',
        data: {
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
 // ملء حقول المودال بالبيانات من الاستجابة
            var prodileImgSrc = '/Files/' + response.personal_image;
            $("#profileImagePreview").html(
                '<img src="' + prodileImgSrc + '" alt="img" width="50px" class="rounded-circle">');
            var coverImgSrc = '/Files/' + response.Image_cover;
            $("#coverImagePreview").html(
                '<img src="' + coverImgSrc + '" alt="img" width="50px" class="rounded-circle">');
            $('#formValidationBio').val(response.about);
            $('#selectDepartment').val(response.department_id).trigger('change');
            $('#pricePerHour').val(response.price_perHour);
            $('#pricePerMeter').val(response.price_perMatter);

        }
    });
});
// update  worker ajax request
$("#editWorkerForm").submit(function(e) {
    e.preventDefault();
    let id = $("#worker_id").val();
    var formUpdateData = new FormData($('#editWorkerForm')[0]);
    $.ajax({
        type: 'post',
        enctype: 'multipart/form-data',
        url: '/updateWorkerInfo',
        data: formUpdateData,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'json',
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
                $("#editWorkerForm")[0].reset();
                $('#editWorker').modal('hide');

            }},
            error: function (reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function (key, val) {
                    $("#" + key + "_error").text(val[0]);
                });
            }
    });
});
</script>
    <!-- Vendors JS -->
    <script src="/assets/dashboard/assets/vendor/libs/moment/moment.js"></script>
    <script src="/assets/dashboard/assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
    <script src="/assets/dashboard/assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="/assets/dashboard/assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="/assets/dashboard/assets/vendor/libs/select2/select2.js"></script>
    <script src="/assets/dashboard/assets/vendor/libs/@form-validation/bootstrap5.js"></script>
    <script src="/assets/dashboard/assets/vendor/libs/@form-validation/auto-focus.js"></script>
    <script src="/assets/dashboard/assets/vendor/libs/swiper/swiper.js"></script>
    <script src="/assets/dashboard/assets/vendor/libs/rateyo/rateyo.js"></script>
    <script src="/assets/dashboard/assets/vendor/libs/flatpickr/flatpickr.js"></script>

    <!-- Page JS -->
    <script src="/assets/dashboard/assets/js/modal-edit-user.js"></script>
    <script src="/assets/dashboard/assets/js/worker-details.js"></script>
    <script src="/assets/dashboard/assets/js/ui-carousel.js"></script>
    <script src="/assets/dashboard/assets/js/extended-ui-star-ratings.js"></script>
    <script src="/assets/dashboard/assets/js/forms-pickers.js"></script>
@endsection
