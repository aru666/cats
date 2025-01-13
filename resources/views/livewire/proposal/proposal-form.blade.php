<div class="max-w-3xl mx-auto">
    <form wire:submit="save" class="space-y-6 bg-white p-6 rounded-lg shadow">
        <div>
            <label for="opportunity_id" class="block text-sm font-medium text-gray-700">商機</label>
            <select wire:model="proposal.opportunity_id" id="opportunity_id" class="mt-1 block w-full rounded-md border-gray-300">
                <option value="">選擇商機</option>
                @foreach($opportunities as $opportunity)
                    <option value="{{ $opportunity->id }}">{{ $opportunity->name }}</option>
                @endforeach
            </select>
            @error('proposal.opportunity_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">提案標題</label>
            <input type="text" wire:model="proposal.title" id="title" class="mt-1 block w-full rounded-md border-gray-300">
            @error('proposal.title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="content" class="block text-sm font-medium text-gray-700">提案內容</label>
            <textarea wire:model="proposal.content" id="content" rows="6" class="mt-1 block w-full rounded-md border-gray-300"></textarea>
            @error('proposal.content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="amount" class="block text-sm font-medium text-gray-700">提案金額</label>
            <input type="number" wire:model="proposal.amount" id="amount" class="mt-1 block w-full rounded-md border-gray-300">
            @error('proposal.amount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="valid_until" class="block text-sm font-medium text-gray-700">有效期限</label>
            <input type="date" wire:model="proposal.valid_until" id="valid_until" class="mt-1 block w-full rounded-md border-gray-300">
            @error('proposal.valid_until') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="status" class="block text-sm font-medium text-gray-700">提案狀態</label>
            <select wire:model="proposal.status" id="status" class="mt-1 block w-full rounded-md border-gray-300">
                <option value="draft">草稿</option>
                <option value="sent">已送出</option>
                <option value="accepted">已接受</option>
                <option value="rejected">已拒絕</option>
            </select>
            @error('proposal.status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="notes" class="block text-sm font-medium text-gray-700">備註</label>
            <textarea wire:model="proposal.notes" id="notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300"></textarea>
            @error('proposal.notes') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end gap-4">
            <a href="{{ route('proposals.index') }}" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200">
                取消
            </a>
            <button type="submit" class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700">
                {{ $isEdit ? '更新' : '建立' }}
            </button>
        </div>
    </form>
</div>