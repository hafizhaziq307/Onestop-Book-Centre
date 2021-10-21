@switch($currentStatus)
    @case('ship')
        <div class="relative h-40">
            <div class="flex justify-center w-full absolute top-11">
                <div class="bg-gray-200 w-11/12 rounded-full h-3">
                    <div class="text-transparent bg-green-500 rounded-full h-3" style="width: 0%">.
                    </div>
                </div>
            </div>

            <div class=" absolute top-6 flex space-x-56 justify-center w-full">
                <div class="grid place-items-center  space-y-3 w-32 ">
                    <div class="w-12 h-12 rounded-full bg-green-600 grid place-items-center">
                        <x-icons.check class="w-9 h-9 text-gray-200" />
                    </div>
                    <div class="grid place-items-center space-y-1">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                            <path fill-rule="evenodd"
                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                clip-rule="evenodd"></path>
                        </svg>

                        <div class=" font-semibold">Order Placed</div>
                    </div>
                </div>

                <div class="grid place-items-center  space-y-3 w-32 ">
                    <div class="w-12 h-12 rounded-full bg-gray-200 grid place-items-center text-transparent">
                        .
                    </div>
                    <div class="grid place-items-center space-y-1">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z">
                            </path>
                            <path
                                d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z">
                            </path>
                        </svg>

                        <div class=" font-semibold">Shipped Out</div>
                    </div>
                </div>

                <div class="grid place-items-center  space-y-3 w-32 ">
                    <div class="w-12 h-12 rounded-full bg-gray-200 grid place-items-center text-transparent">
                        .
                    </div>
                    <div class="grid place-items-center space-y-1">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>

                        <div class=" font-semibold">Received</div>
                    </div>
                </div>

                <div class="grid place-items-center  space-y-3 w-32 ">
                    <div class="w-12 h-12 rounded-full bg-gray-200 grid place-items-center text-transparent">
                        .
                    </div>
                    <div class="grid place-items-center space-y-1">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <div class=" font-semibold">Rated</div>
                    </div>
                </div>
            </div>
        </div>
    @break
    @case('receive')
        <div class="relative h-40">
            <div class="flex justify-center w-full absolute top-11">
                <div class="bg-gray-200 w-11/12 rounded-full h-3">
                    <div class="text-transparent bg-green-500 rounded-full h-3" style="width: 32%">.
                    </div>
                </div>
            </div>

            <div class=" absolute top-6 flex space-x-56 justify-center w-full">
                <div class="grid place-items-center  space-y-3 w-32 ">
                    <div class="w-12 h-12 rounded-full bg-green-600 grid place-items-center">
                        <x-icons.check class="w-9 h-9 text-gray-200" />
                    </div>
                    <div class="grid place-items-center space-y-1">
                        <svg class="w-10 h-10 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                            <path fill-rule="evenodd"
                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                clip-rule="evenodd"></path>
                        </svg>

                        <div class=" font-semibold">Order Placed</div>
                    </div>
                </div>

                <div class="grid place-items-center  space-y-3 w-32 ">
                    <div class="w-12 h-12 rounded-full bg-green-600 grid place-items-center">
                        <x-icons.check class="w-9 h-9 text-gray-200" />
                    </div>
                    <div class="grid place-items-center space-y-1">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z">
                            </path>
                            <path
                                d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z">
                            </path>
                        </svg>

                        <div class=" font-semibold">Shipped Out</div>
                    </div>
                </div>

                <div class="grid place-items-center  space-y-3 w-32 ">
                    <div class="w-12 h-12 rounded-full bg-gray-200 grid place-items-center text-transparent">
                        .
                    </div>
                    <div class="grid place-items-center space-y-1">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>

                        <div class=" font-semibold">Received</div>
                    </div>
                </div>

                <div class="grid place-items-center  space-y-3 w-32 ">
                    <div class="w-12 h-12 rounded-full bg-gray-200 grid place-items-center text-transparent">
                        .
                    </div>
                    <div class="grid place-items-center space-y-1">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <div class=" font-semibold">Rated</div>
                    </div>
                </div>
            </div>
        </div>
    @break
    @case('completed')
        <div class="relative h-40">
            <div class="flex justify-center w-full absolute top-11">
                <div class="bg-gray-200 w-11/12 rounded-full h-3">
                    <div class="text-transparent bg-green-500 rounded-full h-3" style="width: 65%">.
                    </div>
                </div>
            </div>

            <div class=" absolute top-6 flex space-x-56 justify-center w-full">
                <div class="grid place-items-center  space-y-3 w-32 ">
                    <div class="w-12 h-12 rounded-full bg-green-600 grid place-items-center">
                        <x-icons.check class="w-9 h-9 text-gray-200" />
                    </div>
                    <div class="grid place-items-center space-y-1">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                            <path fill-rule="evenodd"
                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                clip-rule="evenodd"></path>
                        </svg>

                        <div class=" font-semibold">Order Placed</div>
                    </div>
                </div>

                <div class="grid place-items-center  space-y-3 w-32 ">
                    <div class="w-12 h-12 rounded-full bg-green-600 grid place-items-center">
                        <x-icons.check class="w-9 h-9 text-gray-200" />
                    </div>
                    <div class="grid place-items-center space-y-1">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z">
                            </path>
                            <path
                                d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z">
                            </path>
                        </svg>

                        <div class=" font-semibold">Shipped Out</div>
                    </div>
                </div>

                <div class="grid place-items-center  space-y-3 w-32 ">
                    <div class="w-12 h-12 rounded-full bg-green-600 grid place-items-center">
                        <x-icons.check class="w-9 h-9 text-gray-200" />
                    </div>
                    <div class="grid place-items-center space-y-1">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>

                        <div class=" font-semibold">Received</div>
                    </div>
                </div>

                <div class="grid place-items-center  space-y-3 w-32 ">
                    <div class="w-12 h-12 rounded-full bg-gray-200 grid place-items-center text-transparent">
                        .
                    </div>
                    <div class="grid place-items-center space-y-1">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <div class=" font-semibold">Rated</div>
                    </div>
                </div>
            </div>
        </div>
    @break
    @case('rated')
        <div class="relative h-40">
            <div class="flex justify-center w-full absolute top-11">
                <div class="bg-gray-200 w-11/12 rounded-full h-3">
                    <div class="text-transparent bg-green-500 rounded-full h-3" style="width: 100%">.
                    </div>
                </div>
            </div>

            <div class=" absolute top-6 flex space-x-56 justify-center w-full">
                <div class="grid place-items-center  space-y-3 w-32 ">
                    <div class="w-12 h-12 rounded-full bg-green-600 grid place-items-center">
                        <x-icons.check class="w-9 h-9 text-gray-200" />
                    </div>
                    <div class="grid place-items-center space-y-1">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                            <path fill-rule="evenodd"
                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                clip-rule="evenodd"></path>
                        </svg>

                        <div class=" font-semibold">Order Placed</div>
                    </div>
                </div>

                <div class="grid place-items-center  space-y-3 w-32 ">
                    <div class="w-12 h-12 rounded-full bg-green-600 grid place-items-center">
                        <x-icons.check class="w-9 h-9 text-gray-200" />
                    </div>
                    <div class="grid place-items-center space-y-1">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z">
                            </path>
                            <path
                                d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z">
                            </path>
                        </svg>

                        <div class=" font-semibold">Shipped Out</div>
                    </div>
                </div>

                <div class="grid place-items-center  space-y-3 w-32 ">
                    <div class="w-12 h-12 rounded-full bg-green-600 grid place-items-center">
                        <x-icons.check class="w-9 h-9 text-gray-200" />
                    </div>
                    <div class="grid place-items-center space-y-1">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>

                        <div class=" font-semibold">Received</div>
                    </div>
                </div>

                <div class="grid place-items-center  space-y-3 w-32 ">
                    <div class="w-12 h-12 rounded-full bg-green-600 grid place-items-center">
                        <x-icons.check class="w-9 h-9 text-gray-200" />
                    </div>
                    <div class="grid place-items-center space-y-1">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <div class=" font-semibold">Rated</div>
                    </div>
                </div>
            </div>
        </div>
    @break
    @default

@endswitch
