@extends('layouts.layout')

@section('content')

    @if (session('id') == null)
        {{ redirect()->route('landingPage')->send() }}
    @endif

    <x-headers.buyer-nav query="" />

    @if (session('msg') != '')
        <x-alert type="success" message="{{ session('msg') }}" />
    @endif

    <div class="w-full flex flex-wrap">
        <!-- Sidebar -->
        <x-sidebar.sidebar-buyer active="address" />

        <!-- Content -->
        <main class=" max-w-6xl space-y-7 mt-24 ml-96 w-10/12">
            <x-title message="My Addresses" />

            @if (session('msg') != '')
                <x-alert type="success" message="{{ session('msg') }}" />
            @endif

            <section class="grid grid-cols-3 gap-5">
                @foreach ($addresses as $address)
                    <div class=" bg-gray-900 p-4 space-y-8 h-52 relative rounded-lg shadow-lg" x-data="{ open : false }">
                        <div>
                            <p class="font-bold text-lg">{{ $address->namaPenerima }}</p>
                            <p>{{ $address->noTel }}</p>
                            <p>{{ $address->butiranAlamat }}</p>
                            <p>{{ $address->daerah }}</p>
                            <p>{{ $address->poskod }} {{ $address->negeri }}</p>
                            <p></p>
                        </div>

                        <form action="{{ route('addresses.destroy', $address->idAlamat) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="absolute bottom-3 right-28 flex items-center cursor-pointer"
                                x-on:click="open = true">
                                <x-icons.trash class="w-6 h-6" />
                                <p class="font-semibold">Delete</p>
                            </div>
                            <!-- Confirmation Modal -->
                            <x-modals.delete-confirm-form />
                        </form>

                        <form action="{{ route('addresses.edit', $address->idAlamat) }}" method="GET">
                            @csrf
                            <button class=" absolute bottom-3 right-5 flex items-center">
                                <x-icons.edit class="w-6 h-6" />
                                <p class="font-semibold">Edit</p>
                            </button>
                        </form>
                    </div>
                @endforeach

                <div>
                    <a href="{{ route('addresses.create') }}"
                        class="bg-gray-400 text-gray-700  flex flex-col justify-center items-center h-52 rounded-lg text-center space-y-3">
                        <x-icons.plus-circle class="w-20 h-20" />
                        <p class="font-semibold text-lg">Add New Address</p>
                    </a>
                </div>
            </section>
        </main>
    </div>
@endsection
