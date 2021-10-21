@extends('layouts.layout')

@section('content')

    @if (session('id') == null)
        {{ redirect()->route('landingPage')->send() }}
    @endif

    <x-headers.buyer-nav query="" />

    <div class="w-full flex flex-wrap">
        <!-- Sidebar -->
        <x-sidebar.sidebar-buyer />

        <!-- Content -->
        <main class=" max-w-6xl space-y-7 mt-24 ml-96 w-10/12">
            <x-title message="New Address" />

            <section class="max-w-6xl mx-auto rounded-lg bg-gray-900 p-4">
                <form action="{{ route('addresses.store') }}" method="POST">
                    @csrf
                    <div class="space-y-10">
                        <div class="w-full">
                            <p class="font-bold text-lg">Full Name</p>
                            <input name="fullName" type="text" placeholder="Full Name"
                                class="bg-gray-800 rounded-lg w-full py-3 px-2 focus:ring-2 ring-green-600">
                        </div>

                        <div class="w-full">
                            <p class="font-bold text-lg">Phone Number</p>
                            <input name="phoneNumber" type="text" placeholder="Phone Number"
                                class="bg-gray-800 rounded-lg w-full py-3 px-2 focus:ring-2 ring-green-600">
                        </div>

                        <div class="w-full">
                            <p class="font-bold text-lg">Address Details</p>
                            <input name="street" type="text" placeholder="Unit number, house number, building, street name"
                                class="bg-gray-800 rounded-lg w-full py-3 px-2 focus:ring-2 ring-green-600">
                        </div>

                        <div class="flex ">
                            <div class="mr-2 mt-2 w-1/2">
                                <p class="font-semibold text-lg">Postcode</p>

                                <select onchange="getPostcode(this)"
                                    class="bg-gray-800 rounded-lg w-full py-3 px-2 focus:ring-2 ring-green-600">
                                    <option value="" selected disabled hidden>Select Postcode</option>
                                    @foreach ($postcodes as $postcode)
                                        <option
                                            value="{{ $postcode->poskod . '#' . $postcode->daerah . '#' . $postcode->negeri }}"
                                            class="bg-gray-800">{{ $postcode->poskod }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="m-2 w-full">
                                <p class="font-bold text-lg">City</p>
                                <input type="text" placeholder="City" id="city"
                                    class=" bg-gray-800 opacity-60 rounded-lg w-full py-3 px-2" readonly>
                            </div>

                            <div class="m-2 w-full">
                                <p class="font-bold text-lg">State</p>
                                <input type="text" placeholder="State" id="state"
                                    class=" bg-gray-800 opacity-60 rounded-lg w-full py-3 px-2" readonly>
                            </div>
                        </div>

                        <div class="flex justify-end pt-24">
                            <input type="hidden" id="postcode" name="postcode">
                            <button class=" green px-8 py-2 font-bold rounded-full text-lg">Save</button>
                        </div>
                    </div>
                </form>
            </section>
        </main>
    </div>

    <script>
        function getPostcode(x) {
            var selectedVal = x.options[x.selectedIndex];

            var arr = selectedVal.value.split(/[#]+/);

            var postcode = document.getElementById("postcode");
            var city = document.getElementById("city");
            var state = document.getElementById("state");

            postcode.value = arr[0];
            city.value = arr[1];
            state.value = arr[2];
        }
    </script>

@endsection
