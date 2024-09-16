@extends('auth.layouts.base')
@section("PageTitle")
Register Form
@endsection
@section("FormTitle")
معلومات التسجيل
@endsection
@section("MainForm")
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="input-group">
        <!-- Name -->
        <div>
            <x-text-input id="name" class="input--style-3" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="الأسم الأول"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" style="color:red;"/>
        </div>
    </div>
    <div class="input-group">
        <!-- Name -->
        <div>
            <x-text-input id="l-name" class="input--style-3" type="text" name="l_name" :value="old('l_name')"  autofocus autocomplete="name" placeholder="اللقب"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" style="color:red;"/>
        </div>
    </div>
    <div class="input-group">
        <x-text-input id="email" class="input--style-3" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="البريد الإلكتروني"/>
        <x-input-error :messages="$errors->get('email')" class="mt-2" style="color:red;"/>
    </div>
    <div class="input-group">
        <x-text-input id="password" class="input--style-3"
            type="password"
            name="password"
            required autocomplete="new-password"
            placeholder="كلمة السر" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" style="color:red;"/>
    </div>
    <div class="input-group">
        <x-text-input id="password_confirmation" class="input--style-3"
        type="password"
        name="password_confirmation" required autocomplete="new-password" placeholder="تأكيد كلمة السر"/>
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="color:red;"/>
    </div>
    <div class="input-group">
        <input class="" type="date" placeholder="2000/10/27تاريخ الميلاد" name="birthdate">
        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
    </div>
    <div class="input-group">
        <div class="rs-select2 js-select-simple select--no-search">
            <select name="gender">
                <option disabled="disabled" selected="selected">الجنس</option>
                <option>ذكر</option>
                <option>إنثى</option>
            </select>
            <div class="select-dropdown"></div>
        </div>
    </div>
    <div class="input-group">
        <input class="input--style-3" type="text" placeholder="رقم التلفون" name="Phone_N">
    </div>
    <div style="display: flex;   justify-content: space-between;">
    <div class="p-t-10">
        <button class="btn btn--pill btn--green" type="submit">{{ __('إرسال') }}</button>
    </div>

    <a style="color:#ffb600;" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
        {{ __('لديك حساب بالفعل؟') }}
    </a>
</div>
</form>
@endsection
<!-- This templates was made by Colorlib (https://colorlib.com) -->


