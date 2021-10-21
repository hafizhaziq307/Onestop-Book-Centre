@extends('layouts.loginRegister')

@section('content')

    @if (session('id') != null)
        {{ redirect()->route('landingPage')->send() }}
    @endif

    <x-headers.guest-nav query="" />

    <form action="{{ route('accounts.login') }}" method="POST" class="pt-32">
        @csrf
        <main class="space-y-10 max-w-md bg-gray-900 py-12 mx-auto rounded-xl px-8">
            <img class="w-60 h-16 self-center mx-auto" src="{{ asset('uploads/newlogo.png') }}" alt="logo">

            @if (session('msg') != '')
                <x-alert type="error" message="{{ session('msg') }}" />
            @endif

            <input type="email" name="email" placeholder="Email"
                class="bg-gray-800 rounded-lg w-full py-3 px-2 focus:ring-2 ring-green-600">

            <input type="password" name="password" placeholder="Password"
                class="bg-gray-800 rounded-lg w-full py-3 px-2 focus:ring-2 ring-green-600">

            <div class="grid grid-cols-2 gap-2">
                <input type="radio" name="userType" id="seller" value="seller" class="user-radio hidden" required>
                <label for="seller"
                    class="block text-lg px-4 py-2 rounded-lg font-semibold text-center ring-2 ring-blue-600 select-none cursor-pointer">Seller</label>

                <input type="radio" name="userType" id="buyer" value="buyer" class="user-radio hidden" required>
                <label for="buyer"
                    class="block text-lg px-4 py-2 rounded-lg font-semibold text-center ring-2 ring-blue-600 select-none cursor-pointer">Buyer</label>
            </div>

            <button class="w-full green py-3 uppercase text-lg rounded-lg font-bold">Login</button>
        </main>
    </form>
@endsection
