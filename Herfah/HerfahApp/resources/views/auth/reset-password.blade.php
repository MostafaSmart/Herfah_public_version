@extends('auth.layouts.base')
@section("PageTitle")
Rest Password Form
@endsection
@section("FormTitle")
إعادة تعين كلمة المرور
@endsection
@section("MainForm")
    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <!-- Email Address -->
        <div class="input-group">
            <x-text-input id="email" class="input--style-3" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!--Password -->
        <div class="input-group">
        <x-text-input id="password" class="input--style-3" type="password" name="password" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <!-- Confirm Password -->
        <div class="input-group">
            <x-text-input id="password_confirmation" class="input--style-3"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <div class="p-t-10">
                <button class="btn btn--pill btn--green" type="submit">{{ __('إعادة تعين') }}</button>
            </div>
        </div>
    </form>
@endsection

