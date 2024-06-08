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
                    @php
                        $listingsCount = \App\Models\RentHouse::whereHas('category', function ($query) use ($category) {
                            $query->where('id', $category->id);
                        })->count();
                    @endphp
                    <div
                        class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                        <img src="{{ url('storage', $category->image) }}" alt="">
                        <div class="p-4">
                            <a href="/rents?selected_categories={{ $category->id }}"
                               class="text-xl font-medium hover:text-green-600">{{ $category->name }}</a>
                            <p class="text-slate-400 text-sm mt-1">{{ $listingsCount }} Listings</p>
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

                                        <li>
                                            <span class="text-slate-400">Rating</span>
                                            <ul class="text-lg font-medium text-amber-400 list-none">
                                                @if($featured->total_ratings > 0)
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <li class="inline"><i
                                                                class="mdi mdi-star{{ $i <= $featured->average_rating ? '' : '-outline' }}"></i>
                                                        </li>
                                                    @endfor
                                                    <li class="inline text-black dark:text-white">{{ round($featured->average_rating, 1) }}
                                                        ({{ $featured->total_ratings }})
                                                    </li>
                                                @else
                                                    <li class="inline">No ratings yet</li>
                                                @endif
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div><!--end property content-->
                        </div>
                    @endforeach
                </div>
            </div><!--en grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
</div>
