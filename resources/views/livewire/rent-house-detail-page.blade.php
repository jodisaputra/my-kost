<section class="relative md:py-24 pt-24 pb-16">
    <div class="container relative">
        <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
            <div class="lg:col-span-8 md:col-span-7">
                <div class="grid grid-cols-1 relative">
                    <div class="tiny-one-item">
                        @if(empty($rent_house->images))
                            <img src="{{ asset('') }}assets/images/property/single/1.jpg"
                                 class="rounded-md shadow dark:shadow-gray-700" alt="image">
                        @else
                            @foreach($rent_house->images as $image)
                                <div class="tiny-slide">
                                    <img src="{{ url('storage', $image) }}"
                                         class="rounded-md shadow dark:shadow-gray-700" alt="image">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <h4 class="text-2xl font-medium mt-6 mb-3">{{ $rent_house->name }}</h4>
                <span class="text-slate-400 flex items-center"><i data-feather="map-pin" class="size-5 me-2"></i> {{ $rent_house->address }}</span>

                <ul class="py-6 flex items-center list-none">
                    @foreach($rent_house->features as $feature)
                        <li class="flex items-center lg:me-6 me-4">
                            <i class="uil uil-compress-arrows lg:text-3xl text-2xl me-2 text-green-600"></i>
                            <span class="lg:text-xl">{{ $feature->name }}</span>
                        </li>
                    @endforeach
                </ul>

                {!! $rent_house->description !!}
            </div>

            <div class="lg:col-span-4 md:col-span-5">
                <div class="sticky top-20">
                    <div class="rounded-md bg-slate-50 dark:bg-slate-800 shadow dark:shadow-gray-700">
                        <div class="p-6">
                            <h5 class="text-2xl font-medium">Price:</h5>

                            <div class="flex justify-between items-center mt-4">
                                <span
                                    class="text-xl font-medium">{{ Number::currency($rent_house->price, 'IDR') }}</span>

                                <span
                                    class="bg-green-600/10 text-green-600 text-sm px-2.5 py-0.75 rounded h-6">For Sale</span>
                            </div>
                        </div>

                        <div class="flex">
                            <div class="p-1 w-full">
                                @if($transaction)
                                    <a
                                        class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">Already
                                        Booked</a>
                                @else
                                    <a href="/book-now/{{ $rent_house->slug }}"
                                       class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">Book
                                        Now</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--end section-->
