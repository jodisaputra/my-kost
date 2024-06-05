<section class="relative lg:py-24 py-16">
    <div class="container relative">
        <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
            <div class="lg:col-span-4 md:col-span-6">
                <div class="shadow dark:shadow-gray-700 p-6 rounded-xl bg-white dark:bg-slate-900 sticky top-20">
                    <form>
                        <div class="grid grid-cols-1 gap-3">
                            <div>
                                <label for="searchname" class="font-medium">Search Properties</label>
                                <div class="relative mt-2">
                                    <i class="uil uil-search text-lg absolute top-[8px] start-3"></i>
                                    <input name="search" id="searchname" wire:model.live.debounce.300ms="search" type="text"
                                           class="form-input border border-slate-100 dark:border-slate-800 ps-10"
                                           placeholder="Search">
                                </div>
                            </div>

                            <div>
                                <label class="font-medium">Categories</label>
                                <select
                                    wire:model.live="selected_categories"
                                    class="form-select form-input border border-slate-100 dark:border-slate-800 block w-full mt-1">
                                    <option value="all">All</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!--end col-->

            <div class="lg:col-span-8 md:col-span-6">
                <div class="grid lg:grid-cols-2 grid-cols-1 gap-[30px]">
                    @foreach($rent_houses as $rent)
                        <div
                            class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                            <div class="relative">
                                <img src="{{ url('storage', $rent->images[0]) }}" alt="{{ $rent->name }}">
                            </div>

                            <div class="p-6">
                                <div class="pb-6">
                                    <a href="/rents/{{ $rent->slug }}"
                                       class="text-lg hover:text-green-600 font-medium ease-in-out duration-500">{{ $rent->name }}</a>
                                </div>

                                <ul class="py-6 border-y border-slate-100 dark:border-gray-800 flex items-center list-none">
                                    @foreach($rent->features as $feature)
                                        <li class="flex items-center me-4">
                                            <i class="uil uil-compress-arrows text-2xl me-2 text-green-600"></i>
                                            <span>{{ $feature->name }}</span>
                                        </li>
                                    @endforeach
                                </ul>

                                <ul class="pt-6 flex justify-between items-center list-none">
                                    <li>
                                        <span class="text-slate-400">Price</span>
                                        <p class="text-lg font-medium">{{ Number::currency($rent->price, 'IDR') }}</p>
                                    </li>

                                    <li>
                                        <span class="text-slate-400">Rating</span>
                                        <ul class="text-lg font-medium text-amber-400 list-none">
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                            <li class="inline text-black dark:text-white">5.0(30)</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div><!--end property content-->
                    @endforeach
                </div><!--en grid-->

                <div class="grid md:grid-cols-12 grid-cols-1 mt-8">
                    <div class="md:col-span-12 text-center">
                        {{ $rent_houses->links() }}
                    </div>
                </div><!--end grid-->
            </div>
        </div>
    </div><!--end container-->
</section><!--end section-->
<!-- End -->
