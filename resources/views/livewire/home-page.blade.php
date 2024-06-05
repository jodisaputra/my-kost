<div>
    <!-- Hero Start -->
    <section class="relative md:pt-44 pt-36 bg-gradient-to-b from-slate-50 dark:from-slate-800 to-transparent">
        <div class="container relative">
            <div class="grid grid-cols-1">
                <div class="text-center">
                    <h1 class="font-bold lg:leading-normal leading-normal text-4xl lg:text-5xl mb-6">Are you ready to
                        find your dream home</h1>
                    <p class="text-slate-400 mx-auto text-xl max-w-xl">A great plateform to buy, sell and rent your
                        properties without any agent or commisions.</p>
                </div>
                <div class="relative -mt-[25px]">
                    <img src="{{ asset('') }}assets/images/bg/05.jpg" class="rounded-xl shadow-md dark:shadow-gray-700"
                         alt="">
                </div>
            </div>
        </div><!--end Container-->
    </section>

    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid grid-cols-1 pb-8">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Listing
                    Categories</h3>

                <p class="text-slate-400 max-w-xl">A great plateform to buy, sell and rent your properties without any
                    agent or commisions.</p>
            </div><!--end grid-->

            <div class="grid lg:grid-cols-5 md:grid-cols-3 grid-cols-2 mt-8 md:gap-[30px] gap-3">
                @foreach($categories as $category)
                    <div
                        class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                        <img src="{{ url('storage', $category->image) }}" alt="">
                        <div class="p-4">
                            <a href="/rents?selected_categories={{ $category->id }}" class="text-xl font-medium hover:text-green-600">{{ $category->name }}</a>
                            <p class="text-slate-400 text-sm mt-1">46 Listings</p>
                        </div>
                    </div><!--end content-->
                @endforeach
            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative lg:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Featured
                    Properties</h3>

                <p class="text-slate-400 max-w-xl mx-auto">A great plateform to buy, sell and rent your properties
                    without any agent or commisions.</p>
            </div><!--end grid-->

            <div class="grid grid-cols-1 mt-8 relative">
                <div class="tiny-home-slide-three">
                    @foreach($rent_houses_featured as $featured)
                        <div class="tiny-slide">
                            <div
                                class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-md dark:hover:shadow-md dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500 m-3">
                                <div class="relative">
                                    <img src="{{ url('storage', $featured->images[0]) }}" alt="{{ $featured->name }}">
                                </div>

                                <div class="p-6">
                                    <div class="pb-6">
                                        <a href="/rents/{{ $featured->slug }}"
                                           class="text-lg hover:text-green-600 font-medium ease-in-out duration-500">{{ $featured->name }}</a>
                                    </div>

                                    <ul class="py-6 border-y border-slate-100 dark:border-gray-800 flex items-center list-none">
                                        @foreach($featured->features as $feature)
                                            <li class="flex items-center me-4">
                                                <i class="uil uil-compress-arrows text-2xl me-2 text-green-600"></i>
                                                <span>{{ $feature->name }}</span>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <ul class="pt-6 flex justify-between items-center list-none">
                                        <li>
                                            <span class="text-slate-400">Price</span>
                                            <p class="text-lg font-medium">{{ Number::currency($featured->price, 'IDR') }}</p>
                                        </li>

{{--                                        <li>--}}
{{--                                            <span class="text-slate-400">Rating</span>--}}
{{--                                            <ul class="text-lg font-medium text-amber-400 list-none">--}}
{{--                                                <li class="inline"><i class="mdi mdi-star"></i></li>--}}
{{--                                                <li class="inline"><i class="mdi mdi-star"></i></li>--}}
{{--                                                <li class="inline"><i class="mdi mdi-star"></i></li>--}}
{{--                                                <li class="inline"><i class="mdi mdi-star"></i></li>--}}
{{--                                                <li class="inline"><i class="mdi mdi-star"></i></li>--}}
{{--                                                <li class="inline text-black dark:text-white">5.0(30)</li>--}}
{{--                                            </ul>--}}
{{--                                        </li>--}}
                                    </ul>
                                </div>
                            </div><!--end property content-->
                        </div>
                    @endforeach
                </div>
            </div><!--en grid-->
        </div><!--end container-->

        <div class="container relative lg:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">What Our Client Say
                    ?</h3>

                <p class="text-slate-400 max-w-xl mx-auto">A great plateform to buy, sell and rent your properties
                    without any agent or commisions.</p>
            </div><!--end grid-->

            <div class="flex justify-center relative mt-16">
                <div class="relative lg:w-1/3 md:w-1/2 w-full">
                    <div class="absolute -top-20 md:-start-24 -start-0">
                        <i class="mdi mdi-format-quote-open text-9xl opacity-5"></i>
                    </div>

                    <div class="absolute bottom-28 md:-end-24 -end-0">
                        <i class="mdi mdi-format-quote-close text-9xl opacity-5"></i>
                    </div>

                    <div class="tiny-single-item">
                        <div class="tiny-slide">
                            <div class="text-center">
                                <p class="text-xl text-slate-400 italic"> " Hously made the processes so easy. Hously
                                    instantly increased the amount of interest and ultimately saved us over $10,000.
                                    " </p>

                                <div class="text-center mt-5">
                                    <ul class="text-xl font-medium text-amber-400 list-none mb-2">
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                    </ul>

                                    <img src="assets/images/client/01.jpg"
                                         class="size-14 rounded-full shadow-md dark:shadow-gray-700 mx-auto" alt="">
                                    <h6 class="mt-2 fw-semibold">Christa Smith</h6>
                                    <span class="text-slate-400 text-sm">Manager</span>
                                </div>
                            </div>
                        </div>

                        <div class="tiny-slide">
                            <div class="text-center">
                                <p class="text-xl text-slate-400 italic"> " I highly recommend Hously as the new way to
                                    sell your home "by owner". My home sold in 24 hours for the asking price. Best $400
                                    you could spend to sell your home. " </p>

                                <div class="text-center mt-5">
                                    <ul class="text-xl font-medium text-amber-400 list-none mb-2">
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                    </ul>

                                    <img src="assets/images/client/02.jpg"
                                         class="size-14 rounded-full shadow-md dark:shadow-gray-700 mx-auto" alt="">
                                    <h6 class="mt-2 fw-semibold">Christa Smith</h6>
                                    <span class="text-slate-400 text-sm">Manager</span>
                                </div>
                            </div>
                        </div>

                        <div class="tiny-slide">
                            <div class="text-center">
                                <p class="text-xl text-slate-400 italic"> " My favorite part about selling my home
                                    myself was that we got to meet and get to know the people personally. This made it
                                    so much more enjoyable! " </p>

                                <div class="text-center mt-5">
                                    <ul class="text-xl font-medium text-amber-400 list-none mb-2">
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                    </ul>

                                    <img src="assets/images/client/03.jpg"
                                         class="size-14 rounded-full shadow-md dark:shadow-gray-700 mx-auto" alt="">
                                    <h6 class="mt-2 fw-semibold">Christa Smith</h6>
                                    <span class="text-slate-400 text-sm">Manager</span>
                                </div>
                            </div>
                        </div>

                        <div class="tiny-slide">
                            <div class="text-center">
                                <p class="text-xl text-slate-400 italic"> " Great experience all around! Easy to use and
                                    efficient. " </p>

                                <div class="text-center mt-5">
                                    <ul class="text-xl font-medium text-amber-400 list-none mb-2">
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                    </ul>

                                    <img src="assets/images/client/04.jpg"
                                         class="size-14 rounded-full shadow-md dark:shadow-gray-700 mx-auto" alt="">
                                    <h6 class="mt-2 fw-semibold">Christa Smith</h6>
                                    <span class="text-slate-400 text-sm">Manager</span>
                                </div>
                            </div>
                        </div>

                        <div class="tiny-slide">
                            <div class="text-center">
                                <p class="text-xl text-slate-400 italic"> " Hously made selling my home easy and stress
                                    free. They went above and beyond what is expected. " </p>

                                <div class="text-center mt-5">
                                    <ul class="text-xl font-medium text-amber-400 list-none mb-2">
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                    </ul>

                                    <img src="assets/images/client/05.jpg"
                                         class="size-14 rounded-full shadow-md dark:shadow-gray-700 mx-auto" alt="">
                                    <h6 class="mt-2 fw-semibold">Christa Smith</h6>
                                    <span class="text-slate-400 text-sm">Manager</span>
                                </div>
                            </div>
                        </div>

                        <div class="tiny-slide">
                            <div class="text-center">
                                <p class="text-xl text-slate-400 italic"> " Hously is fair priced, quick to respond, and
                                    easy to use. I highly recommend their services! " </p>

                                <div class="text-center mt-5">
                                    <ul class="text-xl font-medium text-amber-400 list-none mb-2">
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                    </ul>

                                    <img src="assets/images/client/06.jpg"
                                         class="size-14 rounded-full shadow-md dark:shadow-gray-700 mx-auto" alt="">
                                    <h6 class="mt-2 fw-semibold">Christa Smith</h6>
                                    <span class="text-slate-400 text-sm">Manager</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
</div>
