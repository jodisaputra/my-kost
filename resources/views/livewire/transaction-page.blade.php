<section class="relative lg:py-24 py-16">
    <div class="container relative">
        <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">
            <div class="lg:col-span-7 md:col-span-6">
                <img src="{{ asset('assets/images/svg/contact.svg') }}" alt="">
            </div>

            <div class="lg:col-span-5 md:col-span-6">
                <div class="lg:me-5">
                    <div class="bg-white dark:bg-slate-900 rounded-md shadow dark:shadow-gray-700 p-6">
                        <h3 class="mb-6 text-2xl leading-normal font-medium">Book Now !</h3>

                        <form wire:submit.prevent="payment" enctype="multipart/form-data">
                            <div class="grid grid-cols-1">
                                <div class="mb-5">
                                    <label for="subject" class="font-medium">Rent House Name</label>
                                    <input type="hidden" wire:model="rent_house_id" value="{{ $rent_house->id }}">
                                    <input name="subject" id="subject" class="form-input mt-2"
                                           value="{{ $rent_house->name }}" readonly>
                                </div>
                            </div>
                            <div class="grid grid-cols-1">
                                <div class="mb-5">
                                    <label for="full_name" class="font-medium">Full Name</label>
                                    <input name="full_name" wire:model="full_name" id="full_name"
                                           class="form-input mt-2">
                                    @error('full_name')
                                    <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-1">
                                <div class="mb-5">
                                    <label for="phone_number" class="font-medium">Phone Number</label>
                                    <input name="phone_number" wire:model="phone_number" id="phone_number"
                                           class="form-input mt-2">
                                    @error('phone_number')
                                    <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1">
                                <div class="mb-5">
                                    <label for="phone_number" class="font-medium">Proof of Payment</label>
                                    <input type="file" name="proof_of_payment" wire:model="proof_of_payment" id="proof_of_payment"
                                           class="form-input mt-2">
                                    @error('proof_of_payment')
                                    <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1">
                                <span
                                    class="mb-5">Grand Total : {{ Number::currency($rent_house->price, 'IDR') }}</span>
                            </div>
                            <button type="submit" id="pay-button" name="send"
                                    class="btn bg-green-600 hover:bg-green-700 text-white rounded-md">Book Now
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end container-->
</section>
