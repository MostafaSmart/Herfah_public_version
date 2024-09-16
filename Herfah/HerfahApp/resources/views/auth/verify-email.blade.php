@extends('auth.layouts.base')
@section("PageTitle")
verify-email Form
@endsection
@section("FormTitle")
تأكيد بريدك الإلكتروني
@endsection
@section("MainForm")
    <div class="exp" style="color: white; margin-bottom:15px; font-size:20;">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>
    @if (session('status') == 'verification-link-sent')
    <div class="exp" style="color: white; margin-bottom:15px; font-size:20;">
        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
    @endif
    <div class="mt-4 flex items-center justify-between" style="margin-top: 4px; display:flex; align-item:center; justify-content:space-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
        <div class="flex items-center justify-end mt-4">
            <div class="p-t-10">
                <button class="btn btn--pill btn--green" type="submit">{{ __('Resend Verification Email') }}</button>
            </div>
        </div>
    </form>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <div class="flex items-center justify-end mt-4">
            <div class="p-t-10">
                <button class="btn btn--pill btn--green" type="submit">{{ __('Log Out') }}</button>
            </div>
        </div>
    </form>
    </div>
@endsection

