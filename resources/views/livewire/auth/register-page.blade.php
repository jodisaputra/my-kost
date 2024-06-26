<div>
    <section class="md:h-screen py-36 flex items-center relative overflow-hidden zoom-image">
        <div
            class="absolute inset-0 image-wrap z-1 bg-[url('../../assets/images/bg/01.jpg')] bg-no-repeat bg-center bg-cover"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black z-2" id="particles-snow"></div>
        <div class="container relative z-3">
            <div class="flex justify-center">
                <div
                    class="max-w-[400px] w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-700 rounded-md">
                    <a href="/"><img src="assets/images/logo-icon-64.png" class="mx-auto" alt=""></a>
                    <h5 class="my-6 text-xl font-semibold">Signup</h5>
                    <form class="text-start" wire:submit.prevent="save">
                        <div class="grid grid-cols-1">
                            <div class="mb-4">
                                <label class="font-semibold" for="RegisterName">Your Name:</label>
                                <input wire:model="name" id="RegisterName" type="text" class="form-input mt-3 @error('name') border-red-500 @enderror" placeholder="Harry">
                                @error('name')
                                <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="font-semibold" for="LoginEmail">Email Address:</label>
                                <input wire:model="email" id="LoginEmail" type="email" class="form-input mt-3 @error('email') border-red-500 @enderror"
                                       placeholder="name@example.com">
                                @error('email')
                                <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="font-semibold" for="LoginPassword">Password:</label>
                                <input wire:model="password" id="LoginPassword" type="password" class="form-input mt-3 @error('password') border-red-500 @enderror"
                                       placeholder="Password:">
                                @error('password')
                                <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <button type="submit" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">Register</button>
                            </div>

                            <div class="text-center">
                                <span class="text-slate-400 me-2">Already have an account ? </span> <a
                                    href="/login" class="text-black dark:text-white font-bold">Sign in</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!--end section -->

    <div class="fixed bottom-3 end-3 z-10">
        <a href="" class="back-button btn btn-icon bg-green-600 hover:bg-green-700 text-white rounded-full"><i
                data-feather="arrow-left" class="size-4"></i></a>
    </div>
</div>
