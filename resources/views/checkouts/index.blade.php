@extends('layouts.layout')

@section('content')

    @php
    use App\Models\Checkout;
    use App\Models\SellerCourier;
    @endphp

    @if (session('id') == null)
        {{ redirect()->route('landingPage')->send() }}
    @endif

    <x-headers.buyer-nav query="" />

    <div class="w-full flex flex-wrap">
        <!-- Sidebar -->
        <x-sidebar.sidebar-buyer />

        <!-- Content -->
        <main class=" max-w-6xl space-y-7 mt-24 ml-96 w-10/12">
            <!-- address & delivery option container -->
            <section class="max-w-6xl rounded-lg bg-gray-900 p-4 flex justify-between" x-data="{ open : false }">
                <div class=" space-y-4">
                    <div class="flex items-center space-x-2">
                        <x-icons.address class="w-6 h-6" />
                        <p class="text-2xl font-bold">Delivery Address</p>
                    </div>
                    <div class="px-8 text-lg">
                        <p class="font-bold">{{ $deliveryAddress->namaPenerima }}</p>
                        <p class="font-bold">+6<span>{{ $deliveryAddress->noTel }}</span></p>
                        <p>{{ $deliveryAddress->butiranAlamat }}</p>
                        <p>{{ $deliveryAddress->daerah }}, {{ $deliveryAddress->poskod }}
                            {{ $deliveryAddress->negeri }}
                        </p>
                    </div>
                </div>
                <button class="self-end px-4 py-2 rounded-lg bg-yellow-600 font-bold"
                    x-on:click="open = true">Change</button>
                <!-- Address Options Modals -->
                <div class=" fixed w-full h-full top-0 left-0 flex items-center justify-center z-50 shadow-lg"
                    x-show="open">
                    <div class="absolute w-full h-full bg-gray-900 opacity-80 z-50"></div>

                    <div class=" bg-gray-800 w-11/12 md:max-w-3xl mx-auto rounded-xl shadow-lg z-50"
                        x-on:click.away="open = false">
                        <form action="{{ route('checkouts.update', $deliveryAddress->idAlamat) }}" method="POST"
                            class="py-4 px-6 space-y-2">
                            @csrf
                            @method('PATCH')
                            <!--Title-->
                            <div class="flex justify-between items-center pb-6">
                                <p class="text-2xl font-bold">My Addresses</p>
                                <div class="cursor-pointer" x-on:click="open = false">
                                    <x-icons.close class="w-6 h-6" />
                                </div>
                            </div>
                            <!--Body-->
                            <div class=" divide-y-4 divide-gray-600 divide-solid">
                                @foreach ($addresses as $address)
                                    <div class="flex items-center space-x-3 p-5">
                                        @if ($address->idAlamat == $deliveryAddress->idAlamat)
                                            <input type="radio" name="addressId" value="{{ $address->idAlamat }}"
                                                class="p-3" checked>
                                        @else
                                            <input type="radio" name="addressId" value="{{ $address->idAlamat }}"
                                                class="p-3">
                                        @endif
                                        <div>
                                            <p class="text-lg font-bold">{{ $address->namaPenerima }}
                                                ({{ $address->noTel }})</p>
                                            <p>{{ $address->butiranAlamat }}</p>
                                            <p>{{ $address->daerah }}, {{ $address->poskod }}
                                                {{ $address->negeri }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!--Footer-->
                            <div class="flex justify-center pt-10">
                                <input type="hidden" name="updateType" value="address">
                                <button
                                    class="px-10 py-2 rounded-lg bg-green-600 font-bold text-lg cursor-pointer">Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

            <!-- content order container -->
            @foreach ($containers as $container)
                <section class="max-w-6xl rounded-lg bg-gray-900 p-4 space-y-2 divide-y-4 divide-gray-600 divide-solid">
                    <!-- Seller Name -->
                    <div class="flex items-center space-x-2">
                        <x-icons.shop class="w-6 h-6" />
                        <p class="font-bold text-xl">{{ $container->namaPenjual }}</p>
                    </div>
                    <!-- Item Description -->
                    <div>
                        @php
                            $checkouts = Checkout::getCheckouts(session('id'), $container->idPenjual);
                        @endphp

                        @foreach ($checkouts as $checkout)
                            <div class="flex justify-between py-3 px-6 items-center">
                                <div class="flex space-x-6">
                                    <div class="w-20">
                                        <img class="rounded-lg"
                                            src="{{ asset('uploads/book/' . $checkout->gambarBuku) }}" alt="img">
                                    </div>
                                    <div class="space-y-2">
                                        <p class="text-xl">{{ $checkout->tajukBuku }}</p>
                                        <p class="text-base">RM {{ number_format($checkout->hargaBuku, 2) }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-20">
                                    <p class="text-lg">x{{ $checkout->kuantitiBuku }}</p>
                                    <p>RM {{ number_format($checkout->jumlahHargaBuku, 2) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Delivery Options -->
                    <div class="grid grid-cols-8 gap-y-2 text-right text-lg py-2 px-6" x-data="{ open : false }">
                        <div class="col-span-6">Sub Total</div>
                        <p class="col-span-2">RM&nbsp;{{ number_format($container->subHarga, 2) }}</p>

                        <div class="col-span-4">{{ $container->namaKurier }}</div>
                        <div class="col-span-2 cursor-pointer hover:underline hover:text-gray-300 font-bold"
                            x-on:click="open = true">CHANGE</div>
                        <p class="col-span-2">RM&nbsp;{{ number_format($container->hargaKurier, 2) }}</p>

                        <div class="text-3xl col-span-6">Total</div>
                        <p class="text-3xl col-span-2">
                            RM&nbsp;{{ number_format($container->subHarga + $container->hargaKurier, 2) }}</p>

                        <!-- Shipping Options Modal -->
                        <div class=" fixed w-full h-full top-0 left-0 flex items-center justify-center z-50 shadow-lg"
                            x-show="open">
                            <div class="absolute w-full h-full bg-gray-900 opacity-80 z-50"></div>

                            <div class="bg-gray-800 w-11/12 md:max-w-md mx-auto rounded-xl shadow-lg z-50"
                                x-on:click.away="open = false">
                                <form action="{{ route('checkouts.update', [$container->idPenjual]) }}" method="POST"
                                    class="py-4 px-6 space-y-2">
                                    @csrf
                                    @method('PATCH')
                                    <!--Title-->
                                    <div class="flex justify-between items-center pb-3">
                                        <p class="text-2xl font-bold">Shipping Options</p>
                                        <div class="cursor-pointer" x-on:click="open = false">
                                            <x-icons.close class="w-6 h-6" />
                                        </div>
                                    </div>
                                    @php
                                        $couriers = SellerCourier::getSellerCouriers($container->idPenjual);
                                    @endphp
                                    <!--Body-->
                                    <div class="space-y-2">
                                        @foreach ($couriers as $courier)
                                            <div class="flex items-center space-x-2">
                                                @if ($courier->idKurier == $container->idKurier)
                                                    <input type="radio" name="courierId" value="{{ $courier->idKurier }}"
                                                        class="p-2" checked>
                                                @else
                                                    <input type="radio" name="courierId" value="{{ $courier->idKurier }}"
                                                        class="p-2">
                                                @endif
                                                <p class="text-lg">{{ $courier->namaKurier }} (RM
                                                    {{ number_format($courier->hargaKurier, 2) }})</p>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!--Footer-->
                                    <div class="flex justify-center pt-10">
                                        <input type="hidden" name="updateType" value="shipping">
                                        <button
                                            class="px-10 py-2 rounded-lg bg-green-600 font-bold text-lg cursor-pointer">Change</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            @endforeach

            <!-- Checkout Total -->
            <form action="{{ route('orders.store') }}" method="POST"
                class="max-w-6xl rounded-lg bg-gray-900 p-4 flex justify-between items-center" enctype="multipart/form-data"
                x-data="{ fileIsEmpty : true }">
                @csrf
                <input type="file" name="transaction"
                    x-on:change="fileIsEmpty = ($event.target.files.length == 0) ? true : false" accept="application/pdf">

                <div class="flex space-x-4 items-center">
                    <p class="text-3xl">Pay: RM {{ number_format($totalPrice, 2) }}</p>
                    <button :disabled="fileIsEmpty"
                        :class="(fileIsEmpty) ? 'bg-green-600 rounded-full px-6 py-2 outline:none font-bold text-lg opacity-50' : 'bg-green-600 rounded-full px-6 py-2 outline:none font-bold text-lg'">Place
                        Order</button>
                </div>
            </form>
        </main>
    </div>
@endsection
