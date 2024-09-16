@extends('auth.layouts.base')
@section("PageTitle")
Forgot Password Form
@endsection
@section("FormTitle")
إعادة تعين كلمة المرور
@endsection
@section("MainForm")
<div class="exp" style="color: white; margin-bottom:15px; font-size:20;">
    {{ __('هل نسيت كلمة المرور؟ ما عليك الا إدخال بريدك الإلكتروني' ) }}
</div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="input-group">
            <x-text-input id="email" class="input--style-3" type="email" name="email" :value="old('email')" required autofocus placeholder="البريد الإلكتروني"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <div class="p-t-10">
                <button class="btn btn--pill btn--green" type="submit">{{ __('إعادة تعين') }}</button>
            </div>
        </div>

    </form>
@endsection
