    @extends('WebSite.frontend.layouts.base')
    @section('seconlist')
        @for ($i = 0; $i < count($depts); $i++)
            @if ($i % 2 == 0)
                {
                @section('moreRoute')
                    @parent
                    <li><a href="{{ route('team.show', $depts[$i]->id) }}"><i
                                class="far fa-check-circle fa-fw"></i>{{ $depts[$i]->D_Name }}</a></li>
                @endsection
                }
            @else
                @section('moreRoute2')
                    @parent
                    <li><a href="{{ route('team.show', $depts[$i]->id) }}"><i
                                class="far fa-check-circle fa-fw"></i>{{ $depts[$i]->D_Name }}</a></li>
                @endsection
            @endif
        @endfor
    @endsection
    @section('main-content')
        <!-- Start Articles -->
        @if (session('success'))
            @include('WebSite.frontend.layouts.dialog');
            @section('state')
                Success
            @endsection
            @section('dialogcon')
                {{ session('success') }}
            @endsection
            <script>
                const dialog = document.querySelector("dialog")
                dialog.show()
            </script>
        @endif
        <div class="articles" id="articles">
            <h2 class="main-title">التخصصات</h2>
            <div class="container">
                @foreach ($depts as $dept)
                    <div class="box">
                        <img src="Files/{{ $dept->imgcover }}" alt="" />
                        <div class="content">
                            <h3>{{ $dept->D_Name }}</h3>
                            <p>{{ $dept->D_About }}</p>
                        </div>
                        <div class="info">
                            <span class="count-worker">{{ $dept->NumOfWorker }}عامل</span>
                            <a href="{{ route('team.show', $dept->id) }}">الإطلاع</a>
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="spikes"></div>
        <!-- End Articles -->
        <!-- Start Gallery -->
        <div class="gallery" id="gallery">
            <h2 class="main-title">المعرض</h2>
            <div class="container">
                <div class="box">
                    <div class="image">
                        <img src="assets/imgs/port1.jpg" alt="" />
                    </div>
                </div>
                <div class="box">
                    <div class="image">
                        <img src="assets/imgs/port2.jpg" alt="" />
                    </div>
                </div>
                <div class="box">
                    <div class="image">
                        <img src="assets/imgs/gallery-03.jpg" alt="" />
                    </div>
                </div>
                <div class="box">
                    <div class="image">
                        <img src="assets/imgs/port3.jpg" alt="" />
                    </div>
                </div>
                <div class="box">
                    <div class="image">
                        <img src="assets/imgs/port4.jpg" alt="" />
                    </div>
                </div>
                <div class="box">
                    <div class="image">
                        <img src="assets/imgs/port5.jpg" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <!-- End Gallery -->
        <!-- Start Testimonials -->
        <div class="testimonials" id="testimonials">
            <h2 class="main-title">أراء العملاء</h2>
            <div class="container">
                <div class="box">
                    <img src="assets/imgs/avatar-01.png" alt="" />
                    <h3>Mohamed Farag</h3>
                    <div class="rate">
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores et reiciendis voluptatum, amet est
                        natus
                        quaerat ducimus
                    </p>
                </div>
                <div class="box">
                    <img src="assets/imgs/avatar-02.png" alt="" />
                    <h3>Mohamed Ibrahim</h3>
                    <div class="rate">
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores et reiciendis voluptatum, amet est
                        natus
                        quaerat ducimus
                    </p>
                </div>
                <div class="box">
                    <img src="assets/imgs/avatar-03.png" alt="" />
                    <h3>Mostafa Ameen</h3>
                    <div class="rate">
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores et reiciendis voluptatum, amet est
                        natus
                        quaerat ducimus
                    </p>
                </div>
                <div class="box">
                    <img src="assets/imgs/avatar-04.png" alt="" />
                    <h3>Amr Ahmed</h3>
                    <div class="rate">
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores et reiciendis voluptatum, amet est
                        natus
                        quaerat ducimus
                    </p>
                </div>
                <div class="box">
                    <img src="assets/imgs/avatar-05.png" alt="" />
                    <h3>Mohammed Sadiq</h3>
                    <div class="rate">
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores et reiciendis voluptatum, amet est
                        natus
                        quaerat ducimus
                    </p>
                </div>
                <div class="box">
                    <img src="assets/imgs/avatar-06.png" alt="" />
                    <h3>Malek Almosanif</h3>
                    <div class="rate">
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores et reiciendis voluptatum, amet est
                        natus
                        quaerat ducimus
                    </p>
                </div>
            </div>
        </div>
        <!-- End Testimonials -->
        <!-- Start Services -->
        <div class="services" id="services">
            <h2 class="main-title">خدماتنا</h2>
            <div class="container">
                <div class="box">
                    <i class="fas fa-user-shield fa-4x"></i>
                    <h3>الأمان</h3>
                    <div class="info">
                    </div>
                </div>
                <div class="box">
                    <i class="fas fa-tools fa-4x"></i>
                    <h3>حل إي مشكلة</h3>
                    <div class="info">
                    </div>
                </div>
                <div class="box">
                    <i class="fas fa-map-marked-alt fa-4x"></i>
                    <h3>نصل لأي مكان</h3>
                    <div class="info">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Services -->
        <!-- Start Work Steps -->
        <div class="work-steps" id="work-steps">
            <h2 class="main-title">خطوات سير العمل</h2>
            <div class="container">
                <img src="assets/imgs/workStep.png" alt="" class="image" />
                <div class="info">
                    <div class="box">
                        <img src="assets/imgs/work-steps-1.png" alt="" />
                        <div class="text">
                            <h3>البحث عن العامل</h3>
                            <p>
                                هنا نوفر لك طريقة سهله وميسره للبحث عن التخصص الذي تريده والعامل الذي تريده ومن ثم تقدم
                                الطلب عليه وإنتظار الرد من قبل الإدارة ولا يستغرق هذا الوقت الكثير
                            </p>
                        </div>
                    </div>
                    <div class="box">
                        <img src="assets/imgs/work-steps-3.png" alt="" />
                        <div class="text">
                            <h3>مراجعة الطلب</h3>
                            <p>
                                يصل الطلب للإداة فوراً تقومالإدارة برماجعة الطلب والإتفاق المبدئي على سير العمل بين العامل
                                والزبون ومن ثم تقوم بتإكيد الطلب ونحرص هنا على السرعة
                            </p>
                        </div>
                    </div>
                    <div class="box">
                        <img src="assets/imgs/work-steps-2.png" alt="" />
                        <div class="text">
                            <h3>بداء العمل</h3>
                            <p>
                                بعد الإتفاق على كل تفاصيل العمل ومن ثم يبداء العامل بمراقبة العمل تحت إشراف المنصة ويتم
                                الحرص كل الحرص على إنجاز العمل بالفترة المتفق عليها وعلى كل الشروط المتفق
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Work Steps -->
        <!-- Start Stats -->
        <div class="stats" id="stats">
            <h2>إحصائيات عن المنصة</h2>
            <div class="container">
                <div class="box">
                    <i class="far fa-user fa-2x fa-fw"></i>
                    <span class="number" data-goal="150">{{ $count1 }}</span>
                    <span class="text">عملاء</span>
                </div>
                <div class="box">
                    <i class="far fa-building fa-2x fa-fw"></i>
                    <span class="number" data-goal="135">{{ $count2 }}</span>
                    <span class="text">مشاريع</span>
                </div>
                <div class="box">
                    <i class="fas fa-globe-asia fa-2x fa-fw"></i>
                    <span class="number" data-goal="50">1</span>
                    <span class="text">محافظات</span>
                </div>
                <div class="box">
                    <i class="far fa-user fa-2x fa-fw"></i>
                    <span class="number" data-goal="500">{{ $count3 }}</span>
                    <span class="text">عمال</span>
                </div>
            </div>
        </div>
        <!-- End Stats -->
    @endsection
