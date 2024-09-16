@extends('dashboard.layouts.master')

@section('css')
<link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/sweetalert2/sweetalert2.css" />
<link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/bs-stepper/bs-stepper.css" />
<link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
<link rel="stylesheet" href="/assets/dashboard/assets/vendor/libs/plyr/plyr.css" />
<link rel="stylesheet" href="/assets/dashboard/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.css" />
<link rel="stylesheet" href="/assets/dashboard/assets/vendor/css/pages/app-chat.css" />
@endsection

@section('title')

@endsection

@section('content')
            <!-- Content -->

            <div class="container-fluid  flex-grow-1 container-p-y">
                <div class="app-chat card ">
                  <div class="row">
                    <!-- Chat & Contacts -->
                    <div
                      class="col-12"
                      id="app-chat-contacts">
                      <div class="sidebar-header">
                        <div class="d-flex align-items-center me-3 me-lg-0">
                          <div
                            class="flex-shrink-0 avatar avatar-online me-3"
                            data-bs-toggle="sidebar"
                            data-overlay="app-overlay-ex"
                            data-target="#app-chat-sidebar-left">
                            <img
                              class="user-avatar rounded-circle cursor-pointer"
                              src="../../assets/img/avatars/1.png"
                              alt="Avatar" />
                          </div>
                          <div class="flex-grow-1 input-group input-group-merge rounded-pill">
                            <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-search"></i></span>
                            <input
                              type="text"
                              class="form-control chat-search-input"
                              placeholder="Search..."
                              aria-label="Search..."
                              aria-describedby="basic-addon-search31" />
                          </div>
                        </div>
                        <i
                          class="ti ti-x cursor-pointer d-lg-none d-block position-absolute mt-2 me-1 top-0 end-0"
                          data-overlay
                          data-bs-toggle="sidebar"
                          data-target="#app-chat-contacts"></i>
                      </div>
                      <hr class="container m-0" />
                      <div class="sidebar-body">
                        <div class="chat-contact-list-item-title">
                          <h5 class="text-primary mb-0 px-4 pt-3 pb-2">Chats</h5>
                        </div>
                        <!-- Chats -->
                        <ul class="list-unstyled chat-contact-list" id="chat-list">
                          <li class="chat-contact-list-item chat-list-item-0 d-none">
                            <h6 class="text-muted mb-0">No Chats Found</h6>
                          </li>
                          <li class="chat-contact-list-item">
                            <a class="d-flex align-items-center">
                              <div class="flex-shrink-0 avatar avatar-online">
                                <img src="../../assets/img/avatars/13.png" alt="Avatar" class="rounded-circle" />
                              </div>
                              <div class="chat-contact-info flex-grow-1 ms-2">
                                <h6 class="chat-contact-name text-truncate m-0">Waldemar Mannering</h6>
                                <p class="chat-contact-status text-muted text-truncate mb-0">
                                  Refer friends. Get rewards.
                                </p>
                              </div>
                              <small class="text-muted mb-auto">5 Minutes</small>
                            </a>
                          </li>
                          <li class="chat-contact-list-item active">
                            <a class="d-flex align-items-center">
                              <div class="flex-shrink-0 avatar avatar-offline">
                                <img src="../../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle" />
                              </div>
                              <div class="chat-contact-info flex-grow-1 ms-2">
                                <h6 class="chat-contact-name text-truncate m-0">Felecia Rower</h6>
                                <p class="chat-contact-status text-muted text-truncate mb-0">
                                  I will purchase it for sure. 👍
                                </p>
                              </div>
                              <small class="text-muted mb-auto">30 Minutes</small>
                            </a>
                          </li>
                          <li class="chat-contact-list-item">
                            <a class="d-flex align-items-center">
                              <div class="flex-shrink-0 avatar avatar-busy">
                                <span class="avatar-initial rounded-circle bg-label-success">CM</span>
                              </div>
                              <div class="chat-contact-info flex-grow-1 ms-2">
                                <h6 class="chat-contact-name text-truncate m-0">Calvin Moore</h6>
                                <p class="chat-contact-status text-muted text-truncate mb-0">
                                  If it takes long you can mail inbox user
                                </p>
                              </div>
                              <small class="text-muted mb-auto">1 Day</small>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- /Chat contacts -->
                      </div>
                    </div>
                    <!-- /Sidebar Left-->



                  </div>
                </div>
              </div>
              <!-- / Content -->
@endsection

@section('script')

<script src="/assets/dashboard/assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
<script src="/assets/dashboard/assets/vendor/libs/select2/select2.js"></script>
<script src="/assets/dashboard/assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
<script src="/assets/dashboard/assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
<script src="/assets/dashboard/assets/vendor/libs/select2/select2.js"></script>
<script src="/assets/dashboard/assets/vendor/libs/i18n/i18n.js"></script>
<script src="/assets/dashboard/assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="/assets/dashboard/assets/vendor/js/menu.js"></script>
<script src="/assets/dashboard/assets/vendor/libs/plyr/plyr.js"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="/assets/dashboard/assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.js"></script>

<!-- Page JS -->
<script src="/assets/dashboard/assets/js/app-chat.js"></script>


@endsection
