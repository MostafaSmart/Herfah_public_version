<!DOCTYPE html>
<html lang="en">
<head>
@include('auth.layouts.header_linkes')
</head>
<body>
    <div class="page-wrapper bg-gra-01 p-t-80 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading">
                    <h2 class="title">Herfah</h2>
                </div>
                <div class="card-body">
                    <h2 class="title">@yield('FormTitle',"معلومات التسجيل")</h2>
                    @section('MainForm')
                    @show
                </div>
            </div>
        </div>
    </div>
    @include('auth.layouts.footer_files')
</body>
</html>
<!-- end document-->
