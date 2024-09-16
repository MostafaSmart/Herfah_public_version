        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
              <a href="dashboard.html" class="app-brand-link">
                <span class="app-brand-logo demo">
                  <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                      fill="#7367F0" />
                    <path
                      opacity="0.06"
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                      fill="#161616" />
                    <path
                      opacity="0.06"
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                      fill="#161616" />
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                      fill="#7367F0" />
                  </svg>
                </span>
                <span class="app-brand-text demo menu-text fw-bold">حرفة</span>
              </a>

              <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
              </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
              <!-- Dashboards -->
              <li class="menu-item @if(Request::is('adminDashboard')) active @endif">
                <a href="{{ route("admin.dashboard") }}" class="menu-link">
                  <i class="menu-icon tf-icons ti ti-smart-home"></i>
                  <div>الرئيسية</div>
                </a>
              </li>
              <li class="menu-item {{ Request::is('dept') ? 'active' : '' }}">
                <a href="{{ url('/dept') }}" class="menu-link">
                  <i class="menu-icon tf-icons ti ti-smart-home"></i>
                  <div>الخدمات والفئات</div>
                </a>
              </li>
              {{-- workers --}}
              <li class="menu-item {{ Request::is('workers') || Request::is('add_worker') || Request::route()->getName() == 'worker-details'? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons ti ti-users"></i>
                  <div>إدارة الحرفيين</div>
                </a>
                <ul class="menu-sub">
                  <li class="menu-item @if(Request::is('workersListDash')) active @endif">
                    <a href="{{ url('/workersListDash') }}" class="menu-link">
                      <div>قائمة الحرفيين</div>
                    </a>
                  </li>
                  <li class="menu-item @if(Request::is('add_worker')) active @endif">
                    <a href="{{ url('/add_worker') }}" class="menu-link">
                      <div>اضافة حرفي </div>
                    </a>
                  </li>
                  <li class="menu-item @if(Request::is('worker-detail')) active @endif">
                    <a href="{{ url('/workerDetailsTest') }}" class="menu-link">
                      <div>تفاصيل حرفي </div>
                    </a>
                  </li>
                </ul>
              </li>
              {{-- customers --}}
              <li class="menu-item @if(Request::is('client')) active @endif">
                <a href="{{ url('/client') }}" class="menu-link">
                  <i class="menu-icon tf-icons ti ti-users"></i>
                  <div>قائمة العملاء</div>
                </a>
              </li>
              {{-- orders --}}
              <li class="menu-item {{Request::route()->getName() == 'show.work.request' || Request::route()->getName() == 'show.messages.request' || Request::is('order') || Request::is('orderDetails')? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons ti ti-files"></i>
                  <div>الطلبات والحجوزات</div>
                </a>
                <ul class="menu-sub">
                  <li class="menu-item {{ Request::is('order') ? 'active' : '' }}">
                    <a href="{{ url('/order') }}" class="menu-link">
                      <div> قائمة طلب الخدمات</div>
                    </a>
                  </li>
                  <li class="menu-item {{ Request::is('showWorkRequest') ? 'active' : '' }}">
                    <a href="{{ route('show.work.request') }}" class="menu-link">
                      <div>مراجعة طلبات العمال</div>
                    </a>
                  </li>
                  <li class="menu-item {{ Request::is('showWorkersRequest') ? 'active' : '' }}">
                    <a href="{{ route('show.workers.requests') }}" class="menu-link">
                      <div>مراجعة طلبات العملاء</div>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- Users  -->
              <li class="menu-item {{ Request::is('user') || Request::is('customer_detail')? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons ti ti-users"></i>
                  <div>إدارة المستخدمين</div>
                </a>
                <ul class="menu-sub">
                  <li class="menu-item @if(Request::is('user')) active @endif">
                    <a href="{{ url('/user') }}" class="menu-link">
                      <div>قائمة المستخدمين</div>
                    </a>
                  </li>
                </ul>
              <!-- Apps & Pages -->
              <li class="menu-header small text-uppercase">
                <span class="menu-header-text">التقارير والإحصائيات</span>
              </li>
              <li class="menu-item @if(Request::is('reviewsList')) active @endif">
                <a href="{{ url('/reviewsList') }}" class="menu-link">
                  <i class="menu-icon tf-icons ti ti-files"></i>
                  <div>التقييمات</div>
                </a>
              </li>

            </ul>
          </aside>
          <!-- / Menu -->
