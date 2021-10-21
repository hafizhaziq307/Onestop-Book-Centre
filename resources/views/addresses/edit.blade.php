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
            <x-title message="Update Address" />

            <section class="max-w-6xl mx-auto rounded-lg bg-gray-900 p-4">
                <form action="{{ route('addresses.update', $address->idAlamat) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="space-y-10">
                        <div class="w-full">
                            <p class="font-bold text-lg">Full Name</p>
                            <input type="text" placeholder="Nama penuh" name="fullName"
                                value="{{ $address->namaPenerima }}"
                                class="bg-gray-700 rounded-lg w-full py-3 px-2 focus:ring-2 ring-green-600">
                        </div>

                        <div class="w-full">
                            <p class="font-bold text-lg">Phone Number</p>
                            <input type="text" placeholder="Phone Number" name="phoneNumber" value="{{ $address->noTel }}"
                                class="bg-gray-700 rounded-lg w-full py-3 px-2 focus:ring-2 ring-green-600">
                        </div>

                        <div class="w-full">
                            <p class="font-bold text-lg">Address Details</p>
                            <input type="text" placeholder="Nombor unit, nombor rumah, bangunan, nama jalan" name="street"
                                value="{{ $address->butiranAlamat }}"
                                class="bg-gray-700 rounded-lg w-full py-3 px-2 focus:ring-2 ring-green-600">
                        </div>

                        <div class="flex">
                            <div class=" mr-2 mt-2 w-full">
                                <p class="font-bold text-lg">Postcode</p>
                                <select onchange="getPostcode(this)"
                                    class="bg-gray-700 rounded-lg w-full py-3 px-2 focus:ring-2 ring-green-600">
                                    @foreach ($postcodes as $postcode)
                                        @if ($address->poskod == $postcode->poskod)
                                            <option
                                                value="{{ $postcode->poskod . '#' . $postcode->daerah . '#' . $postcode->negeri }}"
                                                selected class="bg-gray-800">{{ $postcode->poskod }}</option>
                                        @else
                                            <option
                                                value="{{ $postcode->poskod . '#' . $postcode->daerah . '#' . $postcode->negeri }}"
                                                class="bg-gray-800">{{ $postcode->poskod }}</option>
                                        @endif
                                    @endforeach

                                </select>
                            </div>

                            <div class="m-2 w-full ">
                                <p class="font-bold text-lg">City</p>
                                <input type="text" placeholder="City" id="city-input" value="{{ $address->daerah }}"
                                    class="bg-gray-700 rounded-lg w-full py-3 px-2 focus:ring-2 ring-green-600" readonly>
                            </div>

                            <div class="m-2 w-full ">
                                <p class="font-bold text-lg">State</p>
                                <input type="text" placeholder="State" id="state-input" value="{{ $address->negeri }}"
                                    class="bg-gray-700 rounded-lg w-full py-3 px-2 focus:ring-2 ring-green-600" readonly>
                            </div>
                        </div>

                        <input type="hidden" id="postcode-input" name="postcode" value="{{ $address->poskod }}">

                        <div class="flex justify-end">
                            <button type="submit" class="green px-8 py-2 font-bold rounded-full text-lg">Save</button>
                        </div>
                    </div>
                </form>
            </section>
        </main>
    </div>

    <script>
        function getPostcode(x) {
            let selectedVal = x.options[x.selectedIndex];

            let arr = selectedVal.value.split(/[#]+/);

            let postcodeInput = document.getElementById("postcode-input");
            let cityInput = document.getElementById("city-input");
            let stateInput = document.getElementById("state-input");

            postcodeInput.value = arr[0];
            cityInput.value = arr[1];
            stateInput.value = arr[2];
        }
    </script>


@endsection
