@extends('layouts.layout')

@section('content')

    @if (session('id') == null)
        {{ redirect()->route('landingPage')->send() }}
    @endif

    <x-headers.buyer-nav query="" />

    <div class="w-full flex flex-wrap">
        <!-- Sidebar -->
        <x-sidebar.sidebar-buyer active="profile" />

        <!-- Content -->
        <main class=" max-w-6xl space-y-7 mt-24 ml-96 w-10/12">
            <x-title message="Update Profile" />

            @if (session('msg') != '')
                <x-alert type="success" message="{{ session('msg') }}" />
            @endif

            <div class="grid grid-cols-6 gap-6 max-w-6xl mx-auto ">
                <!-- Profile Image -->
                <section class="flex flex-col items-center justify-around bg-gray-900 p-4 col-span-2 rounded-lg shadow-lg"
                    x-data="{ open:false }">
                    <div class="p-1 gradient-green rounded-full w-36 h-36 grid place-items-center">
                        <img src="{{ asset('uploads/buyer/' . $buyerInfo->gambarPembeli) }}" alt="img"
                            class="rounded-full w-full h-full">
                    </div>
                    <div>
                        <p>Image Size: Maximum 1 MB</p>
                        <P>Image Format: JPEG, PNG</P>
                    </div>

                    <div class="bg-green-600 px-4 py-2 rounded-lg font-bold cursor-pointer" x-on:click="open = true">Select
                        Image</div>

                    <div class=" fixed w-full h-full top-0 left-0 flex items-center justify-center z-50" x-show="open">
                        <div class="absolute w-full h-full bg-gray-900 opacity-80 z-50"></div>

                        <div class=" bg-gray-800 w-11/12 md:max-w-md mx-auto rounded-xl shadow-lg z-50 p-2"
                            x-on:click.away="open = false">
                            <div class="flex justify-end items-center">
                                <div class="cursor-pointer" x-on:click="open = false">
                                    <x-icons.close class="w-6 h-6" />
                                </div>
                            </div>

                            <form action="{{ route('buyers.update', $buyerInfo->idPembeli) }}" method="POST"
                                enctype="multipart/form-data" class="px-6 py-4">
                                @csrf
                                @method('PATCH')
                                <input type="file" name="image" class="pb-3" accept="image/x-png,image/jpeg">
                                <input type="hidden" name="oldImage" value="{{ $buyerInfo->gambarPembeli }}">

                                <div class="flex justify-end">
                                    <button class="px-5 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg font-bold"
                                        name="button" value="image">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>

                <!-- User Information -->
                <section class="bg-gray-900 col-span-4 p-4 space-y-5 rounded-lg shadow-lg">
                    <div>
                        <p class="font-bold text-lg">Username:</p>

                        <div x-data="{ open : false }">
                            <div x-show="!open" class="grid grid-cols-10 gap-2">
                                <input type="text"
                                    class="text-lg bg-transparent outline-none border-none focus:ring-0 col-span-8"
                                    value="{{ $buyerInfo->namaPembeli }}">
                                <div class=" col-span-2 rounded bg-gray-700 px-4 py-2 font-bold cursor-pointer flex justify-center items-center"
                                    x-on:click="open = !open">Edit</div>
                            </div>

                            <form action="{{ route('buyers.update', $buyerInfo->idPembeli) }}" method="POST"
                                class="grid grid-cols-10 gap-2" x-show="open">
                                @csrf
                                @method('PATCH')
                                <input type="text" name="username"
                                    class="col-span-8 bg-gray-700 rounded-lg py-3 focus:ring-2 ring-green-600 text-lg"
                                    value="{{ $buyerInfo->namaPembeli }}">

                                <div class="col-span-2 flex justify-center items-center space-x-2">
                                    <button class="rounded bg-green-600 px-4 py-2 font-bold" name="button" value="username">
                                        <svg class="w-7 h-7 font-bold" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </button>
                                    <div class="rounded bg-gray-700 px-4 py-2 font-bold cursor-pointer"
                                        x-on:click="open = false">
                                        <x-icons.close class="w-7 h-7" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div>
                        <p class="font-bold text-lg">Phone Number:</p>

                        <div x-data="{ open : false }">
                            <div x-show="!open" class="grid grid-cols-10 gap-2">
                                <input type="text"
                                    class="text-lg bg-transparent outline-none border-none focus:ring-0 col-span-8"
                                    value="{{ $buyerInfo->noTelPembeli }}">
                                <div class=" col-span-2 rounded bg-gray-700 px-4 py-2 font-bold cursor-pointer flex justify-center items-center"
                                    x-on:click="open = !open">Edit</div>
                            </div>

                            <form action="{{ route('buyers.update', $buyerInfo->idPembeli) }}" method="POST"
                                class="grid grid-cols-10 gap-2" x-show="open">
                                @csrf
                                @method('PATCH')

                                <input type="text" name="phoneNo"
                                    class="col-span-8 bg-gray-700 rounded-lg py-3 focus:ring-2 ring-green-600 text-lg"
                                    value="{{ $buyerInfo->noTelPembeli }}">

                                <div class="col-span-2 flex justify-center items-center space-x-2">
                                    <button class="rounded bg-green-600 px-4 py-2 font-bold" name="button" value="phoneNo">
                                        <svg class="w-7 h-7 font-bold" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </button>
                                    <div class="rounded bg-gray-700 px-4 py-2 font-bold cursor-pointer"
                                        x-on:click="open = false">
                                        <x-icons.close class="w-7 h-7" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div>
                        <p class="font-bold text-lg">Email:</p>

                        <div>
                            <div>
                                <input type="text" class="text-lg bg-transparent outline-none border-none focus:ring-0"
                                    value="{{ $buyerInfo->emelPembeli }}">
                            </div>
                        </div>
                    </div>

                    <div>
                        <p class="font-bold text-lg">Password:</p>

                        <div x-data="{ open : false }">
                            <div x-show="!open" class="grid grid-cols-10 gap-2">
                                <input type="password" value="{{ $buyerInfo->kataLaluanPembeli }}"
                                    class="bg-transparent outline-none border-none focus:ring-0 col-span-8" readonly>
                                <div class=" col-span-2 rounded bg-gray-700 px-4 py-2 font-bold cursor-pointer flex justify-center items-center"
                                    x-on:click="open = !open">Edit</div>
                            </div>

                            <form action="{{ route('buyers.update', $buyerInfo->idPembeli) }}" method="POST"
                                x-show="open" class="grid grid-cols-10 gap-2">
                                @csrf
                                @method('PATCH')

                                <input type="text" name="password"
                                    class="col-span-8 bg-gray-700 rounded-lg py-3 focus:ring-2 ring-green-600 text-lg"
                                    value="{{ $buyerInfo->kataLaluanPembeli }}">

                                <div class="col-span-2 flex justify-center items-center space-x-2">
                                    <button class="rounded bg-green-600 px-4 py-2 font-bold" name="button" value="password">
                                        <svg class="w-7 h-7 font-bold" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </button>
                                    <div class="rounded bg-gray-700 px-4 py-2 font-bold cursor-pointer "
                                        x-on:click="open = false">
                                        <x-icons.close class="w-7 h-7" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
@endsection
