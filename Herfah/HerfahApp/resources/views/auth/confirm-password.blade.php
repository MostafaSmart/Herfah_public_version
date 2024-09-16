@extends('auth.layouts.base')
@section("PageTitle")
confirm Password Form
@endsection
@section("FormTitle")
تأكيد كلمة المرور
@endsection
@section("MainForm")
<div class="exp" style="color: white; margin-bottom:15px; font-size:20;">
    {{ __('نريد منك تأكيد كلمة المرور' ) }}
</div>
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
        <!-- Password -->
        <div class="input-group">
            <x-text-input id="password" class="input--style-3"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="كلمة المرور"/>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <div class="p-t-10">
                <button class="btn btn--pill btn--green" type="submit">{{ __('تأكيد') }}</button>
            </div>
        </div>
    </form>
@endsection
