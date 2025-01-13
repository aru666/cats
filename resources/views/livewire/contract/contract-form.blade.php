<div class="max-w-3xl mx-auto">
    <form wire:submit="save" class="space-y-6 bg-white p-6 rounded-lg shadow">
        <div>
            <label for="quote_id" class="block text-sm font-medium text-gray-700">報價</label>
            <select wire:model="contract.quote_id" id="quote_id" class="mt-1 block w-full rounded-md border-gray-300">
                <option value="">選擇報價</option>
                @foreach($quotes as $quote)
                    <option value="{{ $quote->id }}">{{ $quote->title }}</option>
                @endforeach
            </select>
            @error('contract.quote_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">合約標題</label>
            <input type="text" wire:model="contract.title" id="title" class="mt-1 block w-full rounded-md border-gray-300">
            @error('contract.title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="content" class="block text-sm font-medium text-gray-700">合約內容</label>
            <textarea wire:model="contract.content" id="content" rows="6" class="mt-1 block w-full rounded-md border-gray-300"></textarea>
            @error('contract.content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="amount" class="block text-sm font-medium text-gray-700">合約金額</label>
            <input type="number" wire:model="contract.amount" id="amount" class="mt-1 block w-full rounded-md border-gray-300">
            @error('contract.amount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="start_date" class="block text-sm font-medium text-gray-700">開始日期</label>
                <input type="date" wire:model="contract.start_date" id="start_date" class="mt-1 block w-full rounded-md border-gray-300">
                @error('contract.start_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="end_date" class="block text-sm font-medium text-gray-700">結束日期</label>
                <input type="date" wire:model="contract.end_date" id="end_date" class="mt-1 block w-full rounded-md border-gray-300">
                @error('contract.end_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div>
            <label for="payment_terms" class="block text-sm font-medium text-gray-700">付款條件</label>
            <input type="text" wire:model="contract.payment_terms" id="payment_terms" class="mt-1 block w-full rounded-md border-gray-300">
            @error('contract.payment_terms') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="delivery_terms" class="block text-sm font-medium text-gray-700">交付條件</label>
            <input type="text" wire:model="contract.delivery_terms" id="delivery_terms" class="mt-1 block w-full rounded-md border-gray-300">
            @error('contract.delivery_terms') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="special_terms" class="block text-sm font-medium text-gray-700">特殊條款</label>
            <textarea wire:model="contract.special_terms" id="special_terms" rows="3" class="mt-1 block w-full rounded-md border-gray-300"></textarea>
            @error('contract.special_terms') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="status" class="block text-sm font-medium text-gray-700">合約狀態</label>
            <select wire:model="contract.status" id="status" class="mt-1 block w-full rounded-md border-gray-300">
                <option value="draft">草稿</option>
                <option value="sent">已送出</option>
                <option value="signed">已簽約</option>
                <option value="cancelled">已取消</option>
            </select>
            @error('contract.status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="notes" class="block text-sm font-medium text-gray-700">備註</label>
            <textarea wire:model="contract.notes" id="notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300"></textarea>
            @error('contract.notes') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end gap-4">
            <a href="{{ route('contracts.index') }}" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200">
                取消
            </a>
            <button type="submit" class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700">
                {{ $isEdit ? '更新' : '建立' }}
            </button>
        </div>
    </form>
</div>