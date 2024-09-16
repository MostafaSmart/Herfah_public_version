@extends('WebSite.forms.layout.index')
@section('mainForm')
    @parent
    <form action="{{route( 'request.store' )}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="parent">
            <input type="hidden" id="opreation" name="opreation" value="2">
            <input type="hidden"  name="User_id" value={{$user->id}}>
            <div class="card">
                <div class="content">
                    <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 9V5H4V9H20ZM20 11H4V19H20V11ZM3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM5 12H8V17H5V12ZM5 6H7V8H5V6ZM9 6H11V8H9V6Z">
                        </path>
                    </svg>
                    <p class="para">
                        <span>الإسم </span>
                    <div class="inputbox">
                        <input type="text" name="f_name" value="{{ $user->name.' '.$user->l_name}}">
                        <i></i>
                    </div>
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 9V5H4V9H20ZM20 11H4V19H20V11ZM3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM5 12H8V17H5V12ZM5 6H7V8H5V6ZM9 6H11V8H9V6Z">
                        </path>
                    </svg>
                    <p class="para">
                        <span>اللقب</span>
                    <div class="inputbox">
                        <input type="text" name="email" value="{{ $user->email }}">
                        <i></i>
                    </div>

                    </p>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 9V5H4V9H20ZM20 11H4V19H20V11ZM3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM5 12H8V17H5V12ZM5 6H7V8H5V6ZM9 6H11V8H9V6Z">
                        </path>
                    </svg>
                    <p class="para">
                        <span>الجنس</span>
                    <div class="inputbox">
                        <input type="text" name="gender" value="{{ $user->Gender }}">
                        <i></i>
                    </div>

                    </p>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 9V5H4V9H20ZM20 11H4V19H20V11ZM3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM5 12H8V17H5V12ZM5 6H7V8H5V6ZM9 6H11V8H9V6Z">
                        </path>
                    </svg>
                    <p class="para">
                        <span>رقم التلفون</span>
                    <div class="inputbox">
                        <input type="text" name="phone" value={{ $user->PhoneNumber}}>
                        <i></i>
                    </div>

                    </p>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 9V5H4V9H20ZM20 11H4V19H20V11ZM3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM5 12H8V17H5V12ZM5 6H7V8H5V6ZM9 6H11V8H9V6Z">
                        </path>
                    </svg>
                    <p class="para">
                        <span>تاريخ الميلاد</span>
                    <div class="inputbox">
                        <input type="text" name="birth" value={{ $user->birthdate}}>
                        <i></i>
                    </div>

                    </p>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 9V5H4V9H20ZM20 11H4V19H20V11ZM3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM5 12H8V17H5V12ZM5 6H7V8H5V6ZM9 6H11V8H9V6Z">
                        </path>
                    </svg>
                    <p class="para">
                        <span>التخصص</span>
                        <div class="inputbox">
                            <select name="job">
                            @foreach ( $depts as $dept )
                            <option value="{{$dept->D_Name}}">{{$dept->D_Name}}</option>
                            @endforeach
                            </select>
                            <i></i>
                        </div>

                    </p>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 9V5H4V9H20ZM20 11H4V19H20V11ZM3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM5 12H8V17H5V12ZM5 6H7V8H5V6ZM9 6H11V8H9V6Z">
                        </path>
                    </svg>
                    <p class="para">
                        <span>تفاصيل عنك</span>
                        <div class="inputbox">
                            <input type="text" name="about">
                            <i></i>
                        </div>

                    </p>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 9V5H4V9H20ZM20 11H4V19H20V11ZM3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM5 12H8V17H5V12ZM5 6H7V8H5V6ZM9 6H11V8H9V6Z">
                        </path>
                    </svg>
                    <p class="para">
                        <span>صورة للملف</span>
                    <div class="inputbox">
                        <input type="file" name="person">
                        <i></i>
                    </div>
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 9V5H4V9H20ZM20 11H4V19H20V11ZM3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM5 12H8V17H5V12ZM5 6H7V8H5V6ZM9 6H11V8H9V6Z">
                        </path>
                    </svg>
                    <p class="para">
                        <span>صورة غلاف للملف</span>
                    <div class="inputbox">
                        <input type="file" name="cover">
                        <i></i>
                    </div>
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 9V5H4V9H20ZM20 11H4V19H20V11ZM3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM5 12H8V17H5V12ZM5 6H7V8H5V6ZM9 6H11V8H9V6Z">
                        </path>
                    </svg>
                    <p class="para">
                        <span>سعر العمل</span>
                    <div class="inputbox">
                        <input type="text" name="priceM">
                        <span>سعر العمل في المتر</span>
                        <i></i>
                    </div>

                    </p>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 9V5H4V9H20ZM20 11H4V19H20V11ZM3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM5 12H8V17H5V12ZM5 6H7V8H5V6ZM9 6H11V8H9V6Z">
                        </path>
                    </svg>
                    <p class="para">
                        <span>سعر العمل</span>
                    <div class="inputbox">
                        <input type="text" name="priceH">
                        <span>سعر العمل في الساعة</span>
                        <i></i>
                    </div>

                    </p>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 9V5H4V9H20ZM20 11H4V19H20V11ZM3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM5 12H8V17H5V12ZM5 6H7V8H5V6ZM9 6H11V8H9V6Z">
                        </path>
                    </svg>
                    <p class="para">
                        <span>معارض العمل</span>
                    <div class="inputbox">
                        <input type="number" name="portnum" oninput="checkInput()" id="port" value="">
                        <span>عدد المعارض السابقة التي سيتم إضافتها</span>
                        <i></i>
                    </div>

                    </p>
                </div>
            </div>
        </div>
        <div class="center-container">
            <input type="submit" value="إضافة معرض الإعمال" class="css-button-sliding-to-bottom--black" id="btnport" disabled>
            <input type="submit" value="إتمام الطلب" class="css-button-sliding-to-bottom--yellow" id="btndata" style="margin: 10px;" >
        </div>

    </form>
    <script>
        function checkInput() {
            var input3Value = document.getElementById("port").value;
            var inputhiden = document.getElementById("opreation");
            var button1 = document.getElementById("btnport");
            var button2 = document.getElementById("btndata");
            if (input3Value !== "") {
                button2.disabled = true;
                button1.disabled = false;
                inputhiden.value=1;
                button2.classList.remove("css-button-sliding-to-bottom--yellow");
                button2.classList.add("css-button-sliding-to-bottom--black");
                button1.classList.remove("css-button-sliding-to-bottom--black");
                button1.classList.add("css-button-sliding-to-bottom--yellow");
                // button2.style.border="2px solid black";
                // button2.style.color="black";
                // button2.style.cursor="default";
            }
        }
    </script>
@endsection
