<div>
    @if ($formVisible)
        <form wire:submit.prevent="rateTransaction">
            <div class="flex items-center space-x-2">
                <label for="rating">Rating:</label>
                <select id="rating" wire:model="rating" class="px-2 py-1 border border-gray-300 rounded">
                    <option value="">Select rating</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            @error('rating') <span class="text-red-500">{{ $message }}</span> @enderror

            <input type="hidden" wire:model="rentHouseId">

            <button type="submit" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md">Submit</button>
        </form>
    @else
        <p>Thank you for your rating!</p>
    @endif
</div>
