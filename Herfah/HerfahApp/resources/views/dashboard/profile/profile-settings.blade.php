@extends('dashboard.layouts.master')

@section('css')
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/dashboard/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="assets/dashboard/assets/vendor/libs/@form-validation/form-validation.css" />
    <link rel="stylesheet" href="assets/dashboard/assets/vendor/libs/animate-css/animate.css" />
    <link rel="stylesheet" href="assets/dashboard/assets/vendor/libs/sweetalert2/sweetalert2.css" />
    <link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/flatpickr/flatpickr.css" />
@endsection

@section('title')
اعدادات الحساب
@endsection

@section('content')
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">اعدادات الحساب</span></h4>

                <div class="row">
                  <div class="col-md-12">
                    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                        <li class="nav-item">
                          <button
                            type="button"
                            class="nav-link active"
                            role="tab"
                            data-bs-toggle="tab"
                            data-bs-target="#navs-pills-justified-Account"
                            aria-controls="navs-pills-justified-Account"
                            aria-selected="true">
                            <i class="ti-xs ti ti-users"></i> المعلومات
                          </button>
                        </li>
                        <li class="nav-item">
                          <button
                            type="button"
                            class="nav-link"
                            role="tab"
                            data-bs-toggle="tab"
                            data-bs-target="#navs-pills-justified-security"
                            aria-controls="navs-pills-justified-security"
                            aria-selected="false">
                            <i class="ti-xs ti ti-lock me-1"></i> الخصوصية
                          </button>
                        </li>
                        <li class="nav-item">
                          <button
                            type="button"
                            class="nav-link"
                            role="tab"
                            data-bs-toggle="tab"
                            data-bs-target="#navs-pills-justified-Billing"
                            aria-controls="navs-pills-justified-Billing"
                            aria-selected="false">
                            <i class="ti-xs ti ti-file-description me-1"></i>  Billing & Plans
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
                            <i class="ti-xs ti ti-bell me-1"></i> Notifications
                          </button>
                        </li>
                        <li class="nav-item">
                          <button
                            type="button"
                            class="nav-link"
                            role="tab"
                            data-bs-toggle="tab"
                            data-bs-target="#navs-pills-justified-connections"
                            aria-controls="navs-pills-justified-connections"
                            aria-selected="false">
                            <i class="ti-xs ti ti-link me-1"></i> Connections
                          </button>
                        </li>
                    </ul>
                    <div class="tab-content" style="background-color: transparent;">
                        <div class="tab-pane fade show active" id="navs-pills-justified-Account" role="tabpanel">
                            <div class="card mb-4">
                                <h5 class="card-header">المعلومات الشخصية</h5>
                                <!-- Account -->
                                <div class="card-body">
                                  <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img
                                      src="/assets/dashboard/assets/img/avatars/14.png"
                                      alt="user-avatar"
                                      class="d-block w-px-100 h-px-100 rounded"
                                      id="uploadedAvatar" />
                                    <div class="button-wrapper">
                                      <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="ti ti-upload d-block d-sm-none"></i>
                                        <input
                                          type="file"
                                          id="upload"
                                          class="account-file-input"
                                          hidden
                                          accept="image/png, image/jpeg" />
                                      </label>
                                      <button type="button" class="btn btn-label-secondary account-image-reset mb-3">
                                        <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Reset</span>
                                      </button>

                                      <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                    </div>
                                  </div>
                                </div>
                                <hr class="my-0" />
                                <div class="card-body">
                                  <form id="formUpdateAccount" method="post">
                                    @csrf
                                    <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                                    <div class="row">
                                      <div class="mb-3 col-md-6">
                                        <label for="firstName" class="form-label">الاسم الأول</label>
                                        <input
                                          class="form-control"
                                          type="text"
                                          id="firstName"
                                          name="firstName"
                                          value="{{ Auth::user()->name }}"
                                          autofocus />
                                      </div>
                                      <div class="mb-3 col-md-6">
                                        <label for="lastName" class="form-label">الاسم الأخير</label>
                                        <input class="form-control" type="text" name="lastName" id="lastName" value="{{ Auth::user()->l_name }}" />
                                      </div>
                                      <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">البريد الالكتروني</label>
                                        <input
                                          class="form-control"
                                          type="text"
                                          id="email"
                                          name="email"
                                          value="{{ Auth::user()->email }}" />
                                      </div>
                                      <div class="mb-3 col-md-6">
                                        <label class="form-label" for="phoneNumber">رقم الهاتف</label>
                                        <div class="input-group input-group-merge">
                                          <span class="input-group-text">YE (+967)</span>
                                          <input
                                            type="text"
                                            id="phoneNumber"
                                            name="phoneNumber"
                                            class="form-control"
                                            value="{{ Auth::user()->PhoneNumber }}"
                                            placeholder="202 555 0111" />
                                        </div>
                                      </div>
                                      <div class="mb-3 col-md-6">
                                        <label for="flatpickr-date" class="form-label">تاريخ الميلاد</label>
                                        <input type="text" class="form-control" name="birthdate" placeholder="YYYY-MM-DD" value="{{ Auth::user()->birthdate }}" id="flatpickr-date" />
                                      </div>
                                      <div class="mb-3 col-md-6">
                                        <label class="form-label" for="country">الجنس</label>
                                        <select id="gender" name="gender" class="select2 form-select">
                                          <option value="ذكر">ذكر</option>
                                          <option value="أنثى">أنثى</option>
                                        </select>
                                      </div>
                                      <div class="mb-3 col-md-6">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" />
                                      </div>
                                      <div class="mb-3 col-md-6">
                                        <label for="state" class="form-label">State</label>
                                        <input class="form-control" type="text" id="states" name="states" placeholder="California" />
                                      </div>
                                    </div>
                                    <div class="mt-2">
                                      <button type="submit" class="btn btn-primary me-2">حفظ التغييرات</button>
                                      <button type="reset" class="btn btn-label-secondary">الغاء</button>
                                    </div>
                                  </form>
                                </div>
                                <!-- /Account -->
                              </div>
                              <div class="card">
                                <h5 class="card-header">حذف الحساب</h5>
                                <div class="card-body">
                                  <div class="mb-3 col-12 mb-0">
                                    <div class="alert alert-warning">
                                      <h5 class="alert-heading mb-1">هل أنت متأكد من رغبتك في حذف حسابك؟</h5>
                                      <p class="mb-0">بمجرد حذف حسابك، لا يمكن التراجع عن هذا الإجراء. يرجى التأكد جيدًا.</p>
                                    </div>
                                  </div>
                                  <form id="formAccountDeactivation" onsubmit="return false">
                                    <div class="form-check mb-4">
                                      <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="accountActivation"
                                        id="accountActivation" />
                                      <label class="form-check-label" for="accountActivation"
                                        >أؤكد إلغاء تنشيط حسابي.</label
                                      >
                                    </div>
                                    <button type="submit" class="btn btn-danger deactivate-account">تعطيل الحساب</button>
                                  </form>
                                </div>
                              </div>
                        </div>
                        <div class="tab-pane fade" id="navs-pills-justified-security" role="tabpanel">
                            <!-- Change Password -->
                            <div class="card mb-4">
                              <h5 class="card-header">Change Password</h5>
                              <div class="card-body">
                                <form id="formAccountPassword" method="post">
                                    @csrf
                                  <div class="row">
                                    <div class="mb-3 col-md-6 form-password-toggle">
                                      <label class="form-label" for="currentPassword">Current Password</label>
                                      <div class="input-group input-group-merge">
                                        <input
                                          class="form-control "
                                          type="password"
                                          name="currentPassword"
                                          id="currentPassword"
                                          placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="mb-3 col-md-6 form-password-toggle">
                                      <label class="form-label" for="newPassword">New Password</label>
                                      <div class="input-group input-group-merge">
                                        <input
                                          class="form-control "
                                          type="password"
                                          name="newPassword"
                                          id="newPassword"
                                          placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                      </div>
                                    </div>

                                    <div class="mb-3 col-md-6 form-password-toggle">
                                      <label class="form-label" for="confirmPassword">Confirm New Password</label>
                                      <div class="input-group input-group-merge">
                                        <input
                                          class="form-control"
                                          type="password"
                                          name="newPassword_confirmation"
                                          id="confirmPassword"
                                          placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                      </div>
                                    </div>
                                    <div class="col-12 mb-4">
                                      <h6>Password Requirements:</h6>
                                      <ul class="ps-3 mb-0">
                                        <li class="mb-1">Minimum 8 characters long - the more, the better</li>
                                        <li class="mb-1">At least one lowercase character</li>
                                        <li>At least one number, symbol, or whitespace character</li>
                                      </ul>
                                    </div>
                                    <div>
                                      <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                      <button type="reset" class="btn btn-label-secondary">Cancel</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            <!--/ Change Password -->

                            <!-- Two-steps verification -->
                            <div class="card mb-4">
                              <h5 class="card-header">Two-steps verification</h5>
                              <div class="card-body">
                                <h5 class="mb-3">Two factor authentication is not enabled yet.</h5>
                                <p class="w-75">
                                  Two-factor authentication adds an additional layer of security to your account by requiring more
                                  than just a password to log in.
                                  <a href="javascript:void(0);">Learn more.</a>
                                </p>
                                <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#enableOTP">
                                  Enable two-factor authentication
                                </button>
                              </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="navs-pills-justified-Billing" role="tabpanel">
                            <div class="card mb-4">
                                <!-- Current Plan -->
                                <h5 class="card-header">Current Plan</h5>
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-md-6 mb-1">
                                      <div class="mb-3">
                                        <h6 class="mb-1">Your Current Plan is Basic</h6>
                                        <p>A simple start for everyone</p>
                                      </div>
                                      <div class="mb-3">
                                        <h6 class="mb-1">Active until Dec 09, 2021</h6>
                                        <p>We will send you a notification upon Subscription expiration</p>
                                      </div>
                                      <div class="mb-3">
                                        <h6 class="mb-1">
                                          <span class="me-2">$199 Per Month</span>
                                          <span class="badge bg-label-primary">Popular</span>
                                        </h6>
                                        <p>Standard plan for small to medium businesses</p>
                                      </div>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                      <div class="alert alert-warning mb-3" role="alert">
                                        <h5 class="alert-heading mb-1">We need your attention!</h5>
                                        <span>Your plan requires update</span>
                                      </div>
                                      <div class="plan-statistics">
                                        <div class="d-flex justify-content-between">
                                          <h6 class="mb-2">Days</h6>
                                          <h6 class="mb-2">24 of 30 Days</h6>
                                        </div>
                                        <div class="progress">
                                          <div
                                            class="progress-bar w-75"
                                            role="progressbar"
                                            aria-valuenow="75"
                                            aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-1 mb-0">6 days remaining until your plan requires update</p>
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <button
                                        class="btn btn-primary me-2 mt-2"
                                        data-bs-toggle="modal"
                                        data-bs-target="#pricingModal">
                                        Upgrade Plan
                                      </button>
                                      <button class="btn btn-label-danger cancel-subscription mt-2">Cancel Subscription</button>
                                    </div>
                                  </div>
                                </div>
                                <!-- /Current Plan -->
                              </div>
                              <div class="card mb-4">
                                <h5 class="card-header">Payment Methods</h5>
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <form id="creditCardForm" class="row g-3" onsubmit="return false">
                                        <div class="col-12 mb-2">
                                          <div class="form-check form-check-inline">
                                            <input
                                              name="collapsible-payment"
                                              class="form-check-input"
                                              type="radio"
                                              value=""
                                              id="collapsible-payment-cc"
                                              checked="" />
                                            <label class="form-check-label" for="collapsible-payment-cc"
                                              >Credit/Debit/ATM Card</label
                                            >
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input
                                              name="collapsible-payment"
                                              class="form-check-input"
                                              type="radio"
                                              value=""
                                              id="collapsible-payment-cash" />
                                            <label class="form-check-label" for="collapsible-payment-cash">Paypal account</label>
                                          </div>
                                        </div>
                                        <div class="col-12">
                                          <label class="form-label w-100" for="paymentCard">Card Number</label>
                                          <div class="input-group input-group-merge">
                                            <input
                                              id="paymentCard"
                                              name="paymentCard"
                                              class="form-control credit-card-mask"
                                              type="text"
                                              placeholder="1356 3215 6548 7898"
                                              aria-describedby="paymentCard2" />
                                            <span class="input-group-text cursor-pointer p-1" id="paymentCard2"
                                              ><span class="card-type"></span
                                            ></span>
                                          </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                          <label class="form-label" for="paymentName">Name</label>
                                          <input type="text" id="paymentName" class="form-control" placeholder="John Doe" />
                                        </div>
                                        <div class="col-6 col-md-3">
                                          <label class="form-label" for="paymentExpiryDate">Exp. Date</label>
                                          <input
                                            type="text"
                                            id="paymentExpiryDate"
                                            class="form-control expiry-date-mask"
                                            placeholder="MM/YY" />
                                        </div>
                                        <div class="col-6 col-md-3">
                                          <label class="form-label" for="paymentCvv">CVV Code</label>
                                          <div class="input-group input-group-merge">
                                            <input
                                              type="text"
                                              id="paymentCvv"
                                              class="form-control cvv-code-mask"
                                              maxlength="3"
                                              placeholder="654" />
                                            <span class="input-group-text cursor-pointer" id="paymentCvv2"
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
                                            <span class="switch-label">Save card for future billing?</span>
                                          </label>
                                        </div>
                                        <div class="col-12 mt-4">
                                          <button type="submit" class="btn btn-primary me-sm-3 me-1">Save Changes</button>
                                          <button type="reset" class="btn btn-label-secondary">Cancel</button>
                                        </div>
                                      </form>
                                    </div>
                                    <div class="col-md-6 mt-5 mt-md-0">
                                      <h6>My Cards</h6>
                                      <div class="added-cards">
                                        <div class="cardMaster bg-lighter p-3 rounded mb-3">
                                          <div class="d-flex justify-content-between flex-sm-row flex-column">
                                            <div class="card-information me-2">
                                              <img
                                                class="mb-3 img-fluid"
                                                src="../../assets/img/icons/payments/mastercard.png"
                                                alt="Master Card" />
                                              <div class="d-flex align-items-center mb-2 flex-wrap gap-2">
                                                <p class="mb-0 me-2">Tom McBride</p>
                                                <span class="badge bg-label-primary">Primary</span>
                                              </div>
                                              <span class="card-number"
                                                >&#8727;&#8727;&#8727;&#8727; &#8727;&#8727;&#8727;&#8727; 9856</span
                                              >
                                            </div>
                                            <div class="d-flex flex-column text-start text-lg-end">
                                              <div class="d-flex order-sm-0 order-1 mt-sm-0 mt-3">
                                                <button
                                                  class="btn btn-label-primary me-2"
                                                  data-bs-toggle="modal"
                                                  data-bs-target="#editCCModal">
                                                  Edit
                                                </button>
                                                <button class="btn btn-label-secondary">Delete</button>
                                              </div>
                                              <small class="mt-sm-auto mt-2 order-sm-1 order-0">Card expires at 12/26</small>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="cardMaster bg-lighter p-3 rounded">
                                          <div class="d-flex justify-content-between flex-sm-row flex-column">
                                            <div class="card-information me-2">
                                              <img
                                                class="mb-3 img-fluid"
                                                src="../../assets/img/icons/payments/visa.png"
                                                alt="Visa Card" />
                                              <p class="mb-2">Mildred Wagner</p>
                                              <span class="card-number"
                                                >&#8727;&#8727;&#8727;&#8727; &#8727;&#8727;&#8727;&#8727; 5896</span
                                              >
                                            </div>
                                            <div class="d-flex flex-column text-start text-lg-end">
                                              <div class="d-flex order-sm-0 order-1 mt-sm-0 mt-3">
                                                <button
                                                  class="btn btn-label-primary me-2"
                                                  data-bs-toggle="modal"
                                                  data-bs-target="#editCCModal">
                                                  Edit
                                                </button>
                                                <button class="btn btn-label-secondary">Delete</button>
                                              </div>
                                              <small class="mt-sm-auto mt-2 order-sm-1 order-0">Card expires at 10/27</small>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- Modal -->
                                      <!-- Add New Credit Card Modal -->
                                      <div class="modal fade" id="editCCModal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-simple modal-add-new-cc">
                                          <div class="modal-content p-3 p-md-5">
                                            <div class="modal-body">
                                              <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"></button>
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
                                                  <button
                                                    type="reset"
                                                    class="btn btn-label-danger"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    Remove
                                                  </button>
                                                </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <!--/ Add New Credit Card Modal -->

                                      <!--/ Modal -->
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="card mb-4">
                                <!-- Billing Address -->
                                <h5 class="card-header">Billing Address</h5>
                                <div class="card-body">
                                  <form id="formAccount" onsubmit="return false">
                                    <div class="row">
                                      <div class="mb-3 col-sm-6">
                                        <label for="companyName" class="form-label">Company Name</label>
                                        <input
                                          type="text"
                                          id="companyName"
                                          name="companyName"
                                          class="form-control"
                                          placeholder="Pixinvent" />
                                      </div>
                                      <div class="mb-3 col-sm-6">
                                        <label for="billingEmail" class="form-label">Billing Email</label>
                                        <input
                                          class="form-control"
                                          type="text"
                                          id="billingEmail"
                                          name="billingEmail"
                                          placeholder="john.doe@example.com" />
                                      </div>
                                      <div class="mb-3 col-sm-6">
                                        <label for="taxId" class="form-label">Tax ID</label>
                                        <input
                                          type="text"
                                          id="taxId"
                                          name="taxId"
                                          class="form-control"
                                          placeholder="Enter Tax ID" />
                                      </div>
                                      <div class="mb-3 col-sm-6">
                                        <label for="vatNumber" class="form-label">VAT Number</label>
                                        <input
                                          class="form-control"
                                          type="text"
                                          id="vatNumber"
                                          name="vatNumber"
                                          placeholder="Enter VAT Number" />
                                      </div>
                                      <div class="mb-3 col-sm-6">
                                        <label for="mobileNumber" class="form-label">Mobile</label>
                                        <div class="input-group input-group-merge">
                                          <span class="input-group-text">US (+1)</span>
                                          <input
                                            class="form-control mobile-number"
                                            type="text"
                                            id="mobileNumber"
                                            name="mobileNumber"
                                            placeholder="202 555 0111" />
                                        </div>
                                      </div>
                                      <div class="mb-3 col-sm-6">
                                        <label for="country" class="form-label">Country</label>
                                        <select id="country" class="form-select select2" name="country">
                                          <option selected>USA</option>
                                          <option>Canada</option>
                                          <option>UK</option>
                                          <option>Germany</option>
                                          <option>France</option>
                                        </select>
                                      </div>
                                      <div class="mb-3 col-12">
                                        <label for="billingAddress" class="form-label">Billing Address</label>
                                        <input
                                          type="text"
                                          class="form-control"
                                          id="billingAddress"
                                          name="billingAddress"
                                          placeholder="Billing Address" />
                                      </div>
                                      <div class="mb-3 col-sm-6">
                                        <label for="state" class="form-label">State</label>
                                        <input class="form-control" type="text" id="state" name="state" placeholder="California" />
                                      </div>
                                      <div class="mb-3 col-sm-6">
                                        <label for="zipCode" class="form-label">Zip Code</label>
                                        <input
                                          type="text"
                                          class="form-control zip-code"
                                          id="zipCode"
                                          name="zipCode"
                                          placeholder="231465"
                                          maxlength="6" />
                                      </div>
                                    </div>
                                    <div class="mt-2">
                                      <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                      <button type="reset" class="btn btn-label-secondary">Discard</button>
                                    </div>
                                  </form>
                                </div>
                                <!-- /Billing Address -->
                              </div>
                              <div class="card">
                                <!-- Billing History -->
                                <h5 class="card-header">Billing History</h5>
                                <div class="card-datatable table-responsive">
                                  <table class="invoice-list-table table border-top">
                                    <thead>
                                      <tr>
                                        <th></th>
                                        <th>#ID</th>
                                        <th><i class="ti ti-trending-up"></i></th>
                                        <th>Client</th>
                                        <th>Total</th>
                                        <th class="text-truncate">Issued Date</th>
                                        <th>Balance</th>
                                        <th>Invoice Status</th>
                                        <th class="cell-fit">Actions</th>
                                      </tr>
                                    </thead>
                                  </table>
                                </div>
                                <!--/ Billing History -->
                              </div>
                        </div>
                        <div class="tab-pane fade" id="navs-pills-justified-notifications" role="tabpanel">
                            <div class="card">
                                <!-- Notifications -->
                                <h5 class="card-header pb-1">Recent Devices</h5>
                                <div class="card-body">
                                  <span
                                    >We need permission from your browser to show notifications.
                                    <span class="notificationRequest"><span class="fw-medium">Request Permission</span></span></span
                                  >
                                  <div class="error"></div>
                                </div>
                                <div class="table-responsive">
                                  <table class="table table-striped border-top">
                                    <thead>
                                      <tr>
                                        <th class="text-nowrap">Type</th>
                                        <th class="text-nowrap text-center">Email</th>
                                        <th class="text-nowrap text-center">Browser</th>
                                        <th class="text-nowrap text-center">App</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td class="text-nowrap">New for you</td>
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
                                        <td class="text-nowrap">Account activity</td>
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
                                        <td class="text-nowrap">A new browser used to sign in</td>
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
                                      <tr>
                                        <td class="text-nowrap">A new device is linked</td>
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
                                <div class="card-body">
                                  <h6>When should we send you notifications?</h6>
                                  <form action="javascript:void(0);">
                                    <div class="row">
                                      <div class="col-sm-6">
                                        <select id="sendNotification" class="form-select" name="sendNotification">
                                          <option selected>Only when I'm online</option>
                                          <option>Anytime</option>
                                        </select>
                                      </div>
                                      <div class="mt-3">
                                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                        <button type="reset" class="btn btn-label-secondary">Discard</button>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                                <!-- /Notifications -->
                              </div>
                        </div>
                        <div class="tab-pane fade" id="navs-pills-justified-connections" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6 col-12 mb-md-0 mb-4">
                                  <div class="card">
                                    <h5 class="card-header pb-1">Connected Accounts</h5>
                                    <div class="card-body">
                                      <p class="mb-4">Display content from your connected accounts on your site</p>
                                      <!-- Connections -->
                                      <div class="d-flex mb-3">
                                        <div class="flex-shrink-0">
                                          <img
                                            src="../../assets/img/icons/brands/google.png"
                                            alt="google"
                                            class="me-3"
                                            height="30" />
                                        </div>
                                        <div class="flex-grow-1 row">
                                          <div class="col-9">
                                            <h6 class="mb-0">Google</h6>
                                            <small class="text-muted">Calendar and contacts</small>
                                          </div>
                                          <div class="col-3 d-flex align-items-center justify-content-end mt-sm-0 mt-2">
                                            <div class="form-check form-switch">
                                              <input class="form-check-input float-end" type="checkbox" checked />
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="d-flex mb-3">
                                        <div class="flex-shrink-0">
                                          <img src="../../assets/img/icons/brands/slack.png" alt="slack" class="me-3" height="30" />
                                        </div>
                                        <div class="flex-grow-1 row">
                                          <div class="col-9">
                                            <h6 class="mb-0">Slack</h6>
                                            <small class="text-muted">Communication</small>
                                          </div>
                                          <div class="col-3 d-flex align-items-center justify-content-end mt-sm-0 mt-2">
                                            <div class="form-check form-switch">
                                              <input class="form-check-input float-end" type="checkbox" />
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="d-flex mb-3">
                                        <div class="flex-shrink-0">
                                          <img
                                            src="../../assets/img/icons/brands/github.png"
                                            alt="github"
                                            class="me-3"
                                            height="30" />
                                        </div>
                                        <div class="flex-grow-1 row">
                                          <div class="col-9">
                                            <h6 class="mb-0">Github</h6>
                                            <small class="text-muted">Manage your Git repositories</small>
                                          </div>
                                          <div class="col-3 d-flex align-items-center justify-content-end mt-sm-0 mt-2">
                                            <div class="form-check form-switch">
                                              <input class="form-check-input float-end" type="checkbox" checked />
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="d-flex mb-3">
                                        <div class="flex-shrink-0">
                                          <img
                                            src="../../assets/img/icons/brands/mailchimp.png"
                                            alt="mailchimp"
                                            class="me-3"
                                            height="30" />
                                        </div>
                                        <div class="flex-grow-1 row">
                                          <div class="col-9">
                                            <h6 class="mb-0">Mailchimp</h6>
                                            <small class="text-muted">Email marketing service</small>
                                          </div>
                                          <div class="col-3 d-flex align-items-center justify-content-end mt-sm-0 mt-2">
                                            <div class="form-check form-switch">
                                              <input class="form-check-input float-end" type="checkbox" checked />
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="d-flex">
                                        <div class="flex-shrink-0">
                                          <img src="../../assets/img/icons/brands/asana.png" alt="asana" class="me-3" height="30" />
                                        </div>
                                        <div class="flex-grow-1 row">
                                          <div class="col-9">
                                            <h6 class="mb-0">Asana</h6>
                                            <small class="text-muted">Communication</small>
                                          </div>
                                          <div class="col-3 d-flex align-items-center justify-content-end mt-sm-0 mt-2">
                                            <div class="form-check form-switch">
                                              <input class="form-check-input float-end" type="checkbox" />
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- /Connections -->
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6 col-12">
                                  <div class="card">
                                    <h5 class="card-header pb-1">Social Accounts</h5>
                                    <div class="card-body">
                                      <p>Display content from social accounts on your site</p>
                                      <!-- Social Accounts -->
                                      <div class="d-flex mb-3">
                                        <div class="flex-shrink-0">
                                          <img
                                            src="../../assets/img/icons/brands/facebook.png"
                                            alt="facebook"
                                            class="me-3"
                                            height="38" />
                                        </div>
                                        <div class="flex-grow-1 row">
                                          <div class="col-7">
                                            <h6 class="mb-0">Facebook</h6>
                                            <small class="text-muted">Not Connected</small>
                                          </div>
                                          <div class="col-5 text-end mt-sm-0 mt-2">
                                            <button class="btn btn-label-secondary btn-icon">
                                              <i class="ti ti-link ti-sm"></i>
                                            </button>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="d-flex mb-3">
                                        <div class="flex-shrink-0">
                                          <img
                                            src="../../assets/img/icons/brands/twitter.png"
                                            alt="twitter"
                                            class="me-3"
                                            height="38" />
                                        </div>
                                        <div class="flex-grow-1 row">
                                          <div class="col-7">
                                            <h6 class="mb-0">Twitter</h6>
                                            <a href="https://twitter.com/pixinvents" target="_blank">@Pixinvent</a>
                                          </div>
                                          <div class="col-5 text-end mt-sm-0 mt-2">
                                            <button class="btn btn-label-danger btn-icon"><i class="ti ti-trash ti-sm"></i></button>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="d-flex mb-3">
                                        <div class="flex-shrink-0">
                                          <img
                                            src="../../assets/img/icons/brands/instagram.png"
                                            alt="instagram"
                                            class="me-3"
                                            height="38" />
                                        </div>
                                        <div class="flex-grow-1 row">
                                          <div class="col-7">
                                            <h6 class="mb-0">instagram</h6>
                                            <a href="https://www.instagram.com/pixinvents/" target="_blank">@Pixinvent</a>
                                          </div>
                                          <div class="col-5 text-end mt-sm-0 mt-2">
                                            <button class="btn btn-label-danger btn-icon"><i class="ti ti-trash ti-sm"></i></button>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="d-flex mb-3">
                                        <div class="flex-shrink-0">
                                          <img
                                            src="../../assets/img/icons/brands/dribbble.png"
                                            alt="dribbble"
                                            class="me-3"
                                            height="38" />
                                        </div>
                                        <div class="flex-grow-1 row">
                                          <div class="col-7">
                                            <h6 class="mb-0">Dribbble</h6>
                                            <small class="text-muted">Not Connected</small>
                                          </div>
                                          <div class="col-5 text-end mt-sm-0 mt-2">
                                            <button class="btn btn-label-secondary btn-icon">
                                              <i class="ti ti-link ti-sm"></i>
                                            </button>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="d-flex">
                                        <div class="flex-shrink-0">
                                          <img
                                            src="../../assets/img/icons/brands/behance.png"
                                            alt="behance"
                                            class="me-3"
                                            height="38" />
                                        </div>
                                        <div class="flex-grow-1 row">
                                          <div class="col-7">
                                            <h6 class="mb-0">Behance</h6>
                                            <small class="text-muted">Not Connected</small>
                                          </div>
                                          <div class="col-5 text-end mt-sm-0 mt-2">
                                            <button class="btn btn-label-secondary btn-icon">
                                              <i class="ti ti-link ti-sm"></i>
                                            </button>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- /Social Accounts -->
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <!-- / Content -->
@endsection

@section('script')

<script>
    // update  account ajax request
$("#formUpdateAccount").submit(function(e) {
    e.preventDefault();
    let id = $("#userId").val();
    var formUpdateData = new FormData($('#formUpdateAccount')[0]);
    $.ajax({
        type: 'post',
        enctype: 'multipart/form-data',
        url: '{{ route('user.updateAccount') }}',
        data: formUpdateData,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'json',
        success: function (data) {
            console.log(id);
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
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function (key, val) {
                    $("#" + key + "_error").text(val[0]);
                });
            }
    });
});
    // update  password ajax request
$("#formAccountPassword").submit(function(e) {
    e.preventDefault();
    var formUpdatePassword = new FormData($('#formAccountPassword')[0]);
    $.ajax({
        type: 'post',
        enctype: 'multipart/form-data',
        url: '{{ route('admin.updatepassword') }}',
        data: formUpdatePassword,
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
                $("#formAccountPassword")[0].reset();

            }
            else if(data.status == false)
            {
                Swal.fire({
                    title: 'Sorry!',
                    text: data.message,
                    icon: 'error',
                    customClass: {
                    confirmButton: 'btn btn-primary waves-effect waves-light'
                    },
                    buttonsStyling: false
                });
            }
        },
    });
});
</script>
    <!-- Vendors JS -->
    <script src="/assets/dashboard/assets/vendor/libs/select2/select2.js"></script>
    <script src="/assets/dashboard/assets/vendor/libs/@form-validation/popular.js"></script>
    <script src="/assets/dashboard/assets/vendor/libs/@form-validation/bootstrap5.js"></script>
    <script src="/assets/dashboard/assets/vendor/libs/@form-validation/auto-focus.js"></script>
    <script src="/assets/dashboard/assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="/assets/dashboard/assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="/assets/dashboard/assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
    <script src="/assets/dashboard/assets/vendor/libs/flatpickr/flatpickr.js"></script>


    <!-- Page JS -->
    <script src="/assets/dashboard/assets/js/pages-account-settings-account.js"></script>
    <script src="/assets/dashboard/assets/js/forms-pickers.js"></script>

@endsection
