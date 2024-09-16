<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    @include('WebSite.ClientDashboard.layouts.h_links')
    <title>@yield('tital_d','صفحتي')</title>

</head>
<body>
    @include('WebSite.frontend.layouts.header')

    <div class="container-fluid main" style=" width: 100%; ;height:100vh;padding-left:0px;">
        
        <div class="d-block d-md-none menu">

            <div class="bar"></div>
        
        </div>
        
        <div class="expand-menu nav flex-column">
        
                <a data-param="#ifo_"    class="mmb nav-link active mt-auto"><i class="far fa-user-circle"></i> @yield('selx_1')</a>
                <a data-param="#orders_"  class="mmb nav-link"><i class="far fa-bell"></i> @yield('selx_2')</a>
                <a data-param="#works_"    class="mmb nav-link"><i class="far fa-file-alt"></i> @yield('selx_3')</a>
                <a data-param="#orders_"  class="mmb nav-link mb-auto"><i class="fas fa-cogs"></i> @yield('selx_4')</a> 
                                
                 
        
        </div>
        
        <div class="row align-items-center" style="height:100%">
    
        <div class="col-md-3 d-none d-md-block" style="height:100%" >
        
            <div class="container-fluid nav sidebar flex-column">
            
                <a href="#" data-param="#ifo_"      onclick="showContent('ifo_form','#m1')"class="mmb nav-link active mt-auto"><i class="far fa-user-circle"></i> @yield('selx_1')</a>
                <a href="#" data-param="#orders_"  onclick="showContent('ifo_form','#m2')" class="mmb nav-link"><i class="far fa-bell"></i>  @yield('selx_2')</a>
                <a href="#" data-param="#works_"     onclick="showContent('ifo_form','#m3')" class="mmb nav-link"><i class="far fa-file-alt"></i>@yield('selx_3')</a>
                
                <a href="#" data-param="#orders_"  onclick="showContent('ifo_form','#m4')" class="mmb nav-link "><i class="fas fa-cogs"></i> @yield('selx_4')</a>
                <a  href="{{ route('user.create') }}"  class= "nav-link mb-auto"> <i class="fas fa-sign-out-alt"></i> @yield('selx_5')</a> 
        
           </div>
        
        </div>

        
        
        <div class="col-md-9">
            
            <div class="container content clear-fix">
        
            <h2 class="mt-5 mb-5">@yield('tital_S')</h2>
            
            <div class="row" style="height:100%">
                @yield('content')
         
                
            </div>
        
        </div>
            
        </div>
    
    </div>
    
</div>
    



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
@yield('script')
   
    
</body>
</html>