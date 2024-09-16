@extends('WebSite.forms.layout.index')
@section('mainForm')
@parent
<form action="{{ route('request.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" value="4" name="opreation">
    {{-- Value 1 for  test after that we get the real id --}}
    <input type="hidden" value="{{$workerID->id}}" name="WorkeID">
    <input type="hidden" value="{{Auth()->User()->id}}" name="UserId">
<div class="parent">
<div class="card">
    <div class="content">
    <svg
        fill="currentColor"
        viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg"
    >
        <path
        d="M20 9V5H4V9H20ZM20 11H4V19H20V11ZM3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM5 12H8V17H5V12ZM5 6H7V8H5V6ZM9 6H11V8H9V6Z"
        ></path>
    </svg>
    <p class="para">
        <span> إسم العميل </span>
            <div class="inputbox">
                <input  type="text" name="client_name" value="{{Auth()->User()->name}}">
                <i></i>
            </div>
    </p>
    </div>
</div>
<div class="card">
    <div class="content">
    <svg
        fill="currentColor"
        viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg"
    >
        <path
        d="M20 9V5H4V9H20ZM20 11H4V19H20V11ZM3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM5 12H8V17H5V12ZM5 6H7V8H5V6ZM9 6H11V8H9V6Z"
        ></path>
    </svg>
    <p class="para">
        <span> البريد الإلكتروني</span>
            <div class="inputbox">
                <input  type="text" name="client_email" value="{{Auth()->User()->email}}">
                <i></i>
            </div>

    </p>
    </div>
</div>
<div class="card">
    <div class="content">
    <svg
        fill="currentColor"
        viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg"
    >
        <path
        d="M20 9V5H4V9H20ZM20 11H4V19H20V11ZM3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM5 12H8V17H5V12ZM5 6H7V8H5V6ZM9 6H11V8H9V6Z"
        ></path>
    </svg>
    <p class="para">
        <span>رقم التلفون</span>
            <div class="inputbox">
                <input  type="text" name="client_phone" value="{{Auth()->User()->PhoneNumber}}">
                <i></i>
            </div>
    </p>
    </div>
</div>
<div class="card">
    <div class="content">
    <svg
        fill="currentColor"
        viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg"
    >
        <path
        d="M20 9V5H4V9H20ZM20 11H4V19H20V11ZM3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM5 12H8V17H5V12ZM5 6H7V8H5V6ZM9 6H11V8H9V6Z"
        ></path>
    </svg>
    <p class="para">
        <span> إسم العامل</span>
            <div class="inputbox">
                <input  type="text" name="worker_name" value="{{$workerName->name}}">
                <i></i>
            </div>
    </p>
    </div>
</div>
</div>
<div class="center-container">
    <input type="submit" value="تأكيد الحجز" class="css-button-sliding-to-bottom--yellow">
</div>
</form>
@endsection
