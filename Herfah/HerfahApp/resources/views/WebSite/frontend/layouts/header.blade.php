<div class="pr-header" id="header">
    <div class="container">
        <a href="#" class="logo">Herfah</a>
        <ul class="main-nav">
            <li><a href="/index">الصفحة الرئيسة</a></li>
            <li><a href="/index#articles">التخصصات</a></li>
            <li><a href="/index#gallery">المعرض</a></li>
            <li><a href="/index#testimonials">أراء العملاء</a></li>
            <li><a href="/index#services">خدماتنا</a></li>
            <li><a href="/index#stats">عن المنصة</a></li>
            <li id="other">
                <a href="#">اخرى</a>
                <!-- Start Megamenu -->
                <div class="mega-menu">
                    <div class="image">
                        <img src="assets/imgs/megamenu.png" alt="" />
                    </div>
                    <ul class="links">
                        @section('moreRoute')
                            @if (Route::has('login'))
                                @auth
                                    <li>
                                        <a href="{{ route('request.show', auth()->user()->id) }}"><i
                                                class="far fa-comments fa-fw"></i>التقديم للعمل</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="#" onclick="alert('يجب عليك تسجيل الدخول اولاً')"><i
                                                class="far fa-comments fa-fw"></i>التقديم للعمل</a>
                                    </li>
                                @endauth
                            @endif
                        @show
                    </ul>
                    <ul class="links">
                        @section('moreRoute2')
                        @show
                    </ul>
                </div>
                <!-- End Megamenu -->
            </li>
        </ul>
        <i class="far fa-user fa-2x user"></i>
        <ul class="info">
            <li>
                @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth

                            @if (Auth::User()->Autho == 0)
                                <a href="{{ url('/adminDashboard') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Dashboard
                                </a>

                            @elseif (Auth::User()->Autho == 1 || Auth::User()->Autho == 2)



                                <a href="{{ route('user.show', Auth::user()) }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Profile
                                </a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="login">
                                تسجيل الدخول
                            </a>
                </li>
                <li>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="">
                            إنشاء حساب
                        </a>
                    @endif
                @endauth
                @endif
            </li>
        </ul>
    </div>
</div>
