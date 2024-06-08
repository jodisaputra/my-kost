<section class="relative lg:py-24 py-16">
    <div class="container relative">
        <h1 class="text-3xl mb-4">My Transactions</h1>
        <div class="grid lg:grid-cols-2 grid-cols-1 gap-[30px]">
            @foreach($my_transactions as $transaction)
                <div
                    class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500 w-full mx-auto">
                    <div class="md:flex">
                        <div class="relative md:shrink-0">
                            <img class="h-full w-full object-cover md:w-48"
                                 src="{{ url('storage', $transaction->rent_house->images[0]) }}"
                                 alt="{{ $transaction->name }}">
                        </div>
                        <div class="p-6 w-full">
                            <div class="md:pb-4 pb-6">
                                <a href="/rents/{{ $transaction->rent_house->slug }}"
                                   class="text-lg hover:text-green-600 font-medium ease-in-out duration-500">{{ $transaction->rent_house->name }}</a>
                            </div>

                            <ul class="md:py-4 py-6 border-y border-slate-100 dark:border-gray-800 flex items-center list-none">
                                @foreach($transaction->rent_house->features as $feature)
                                    <li class="flex items-center me-4">
                                        <i class="uil uil-compress-arrows text-2xl me-2 text-green-600"></i>
                                        <span>{{ $feature->name }}</span>
                                    </li>
                                @endforeach
                            </ul>

                            <ul class="md:pt-4 pt-6 flex justify-between items-center list-none">
                                <li>
                                    <span class="text-slate-400">Price</span>
                                    <p class="text-lg font-medium">{{ Number::currency($transaction->rent_house->price, 'IDR') }}</p>
                                </li>

                                <li>
                                    <span class="text-slate-400">Payment Status</span>
                                    <p class="text-lg font-medium">{{ strtoupper($transaction->status) }}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!--en grid-->

        <div class="grid md:grid-cols-12 grid-cols-1 mt-8">
            {{ $my_transactions->links() }}
        </div><!--end grid-->
    </div><!--end container-->
</section><!--end section-->
<!-- End -->
