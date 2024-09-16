<!DOCTYPE html>
<html lang="en" dir="rtl">
   <head>
    @include('WebSite.workerDash2.showWorker.layouts.headr_links')
   
    <style>
      html {
  scroll-behavior: smooth;
}
body {
  font-family: "Cairo", sans-serif;
}
a {
  text-decoration: none;
}
ul {
  list-style: none;
  margin: 0;
  padding: 0;
}
    </style>
   </head>

   <body>
    
  

      @include('WebSite.frontend.layouts.header')
      
      <main class="cd__main">
        
       
         <div class="profile-page">
  <div class="content">
 


        @yield('content')



  <div class="theme-switcher-wrapper" id="theme-switcher-wrapper"><span>Themes color</span>
    <ul>
      <li><em class="is-active" data-theme="orange"></em></li>
      <li><em data-theme="green"></em></li>
      <li><em data-theme="purple"></em></li>
      <li><em data-theme="blue"></em></li>
    </ul>
  </div>
 
</div>
         </div>
         <!-- END EDMO HTML (Happy Coding!)-->
         <div>
            @yield('contetn2')
         </div>
      </main>
      
      <!-- Script JS -->
      <script src="{{URL::asset('assets/js/script4.js')}}"></script>
      <script src="{{URL::asset('assets/js/main.js')}}"></script>
   
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>  --}}
      <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      @yield('script')
   </body>
</html>