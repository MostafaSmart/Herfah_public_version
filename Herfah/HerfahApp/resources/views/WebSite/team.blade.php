    @extends('WebSite.frontend.layouts.base')
    @section('title')
        Team
    @endsection
    @section('main-content')
        <!-- Start Team -->
        <div class="team" id="team">
            <h2 class="main-title">Team Members</h2>
            <div class="container">
                @for($i=0;$i<count($workers);$i++)
                <div class="box">
                    <div class="data">
                        <img src="{{asset($workers[$i]->personal_image)}}" alt="" />
                        <div class="social">
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                    <div class="info">
                        <h3>{{$users[$i]['name']}}</h3>
                        <p><a href="{{ route('Requests.showreq',$users[$i]['id']) }}">حجز</a></p>
                    </div>
                </div>
                @endfor
            </div>
        </div>
        <div class="spikes"></div>
        <!-- End Team -->
    @endsection
