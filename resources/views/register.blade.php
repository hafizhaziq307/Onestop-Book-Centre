@extends('layouts.loginRegister')

@section('content')

    <x-headers.guest-nav query="" />

    <form action="{{ route('buyers.store') }}" method="POST" class="pt-32" onsubmit="return checkPassword()">
        @csrf
        <main class="space-y-10 max-w-md bg-gray-900 py-12 mx-auto rounded-xl px-8">
            <img class="w-60 h-16 self-center mx-auto" src="{{ asset('uploads/newlogo.png') }}" alt="logo">

            <div class="bg-red-500 rounded-lg px-2 py-4 relative col-span-2" id="alert-container" hidden>
                <span class="flex items-center space-x-1">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <label class="text-lg font-semibold">Error</label>
                </span>
                <p>Kata laluan tidak sama.</p>
                <button type="button" class="absolute top-2 right-2" onclick="closeAlert()">
                    <svg class="w-6 h-6 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <input type="text" name="username" required placeholder="Username"
                class=" bg-gray-800 rounded-lg w-full py-3 px-2 focus:ring-2 ring-green-600">

            <input type="email" name="email" required placeholder="Email"
                class="bg-gray-800 rounded-lg w-full py-3 px-2 focus:ring-2 ring-green-600">

            <input type="password" name="password" required id="pswd" placeholder="password"
                class="bg-gray-800 rounded-lg w-full py-3 px-2 focus:ring-2 ring-green-600">

            <input type="password" required id="confirm-pswd" placeholder="Confirm password"
                class=" bg-gray-800 rounded-lg w-full py-3 px-2 focus:ring-2 ring-green-600">

            <div class="grid grid-cols-2 gap-2">
                <input type="radio" name="userType" id="seller" value="seller" class="user-radio hidden" required>
                <label for="seller"
                    class="block text-lg px-4 py-2 rounded-lg font-semibold text-center ring-2 ring-blue-600 select-none cursor-pointer">Seller</label>

                <input type="radio" name="userType" id="buyer" value="buyer" class="user-radio hidden" required>
                <label for="buyer"
                    class="block text-lg px-4 py-2 rounded-lg font-semibold text-center ring-2 ring-blue-600 select-none cursor-pointer">Buyer</label>
            </div>
            <button class="w-full green py-3 uppercase text-lg rounded-lg font-bold">Register</button>
        </main>
    </form>

    <script>
        function checkPassword() {
            var pswd = document.getElementById("pswd");
            var confirm_pswd = document.getElementById("confirm-pswd");

            if (pswd.value != confirm_pswd.value) {
                document.getElementById("alert-container").hidden = false;
                return false;
            } else {
                return true;
            }
        }

        function closeAlert() {
            document.getElementById("alert-container").hidden = true;
        }
    </script>
@endsection
