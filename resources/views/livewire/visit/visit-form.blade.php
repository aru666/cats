<div class="max-w-3xl mx-auto">
    <form wire:submit="save" class="space-y-6 bg-white p-6 rounded-lg shadow">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="company_id" class="block text-sm font-medium text-gray-700">公司</label>
                <select wire:model="selectedCompanyId" id="company_id" class="mt-1 block w-full rounded-md border-gray-300">
                    <option value="">選擇公司</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
                @error('visit.company_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="contact_id" class="block text-sm font-medium text-gray-700">聯絡人</label>
                <select wire:model="visit.contact_id" id="contact_id" class="mt-1 block w-full rounded-md border-gray-300">
                    <option value="">選擇聯絡人</option>
                    @foreach($contacts as $contact)
                        <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                    @endforeach
                </select>
                @error('visit.contact_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="business_unit" class="block text-sm font-medium text-gray-700">事業單位</label>
                <select wire:model="visit.business_unit" id="business_unit" class="mt-1 block w-full rounded-md border-gray-300">
                    <option value="">選擇事業單位</option>
                    <option value="BN">BN</option>
                    <option value="MT">MT</option>
                    <option value="SD">SD</option>
                    <option value="WEB3">WEB3</option>
                </select>
                @error('visit.business_unit') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="visit_type" class="block text-sm font-medium text-gray-700">拜訪方式</label>
                <select wire:model="visit.visit_type" id="visit_type" class="mt-1 block w-full rounded-md border-gray-300">
                    <option value="">選擇拜訪方式</option>
                    <option value="親訪">親訪</option>
                    <option value="電訪">電訪</option>
                </select>
                @error('visit.visit_type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">產品類型</label>
            <div class="mt-2 grid grid-cols-2 gap-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" wire:model="visit.product_types" value="網路廣告(一般上稿)" class="rounded border-gray-300">
                    <span class="ml-2">網路廣告(一般上稿)</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" wire:model="visit.product_types" value="網路廣告(內容行銷)" class="rounded border-gray-300">
                    <span class="ml-2">網路廣告(內容行銷)</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" wire:model="visit.product_types" value="網路廣告(數位專案)" class="rounded border-gray-300">
                    <span class="ml-2">網路廣告(數位專案)</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" wire:model="visit.product_types" value="平面廣告" class="rounded border-gray-300">
                    <span class="ml-2">平面廣告</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" wire:model="visit.product_types" value="活動" class="rounded border-gray-300">
                    <span class="ml-2">活動</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" wire:model="visit.product_types" value="代編" class="rounded border-gray-300">
                    <span class="ml-2">代編</span>
                </label>
            </div>
            @error('visit.product_types') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="visit_date" class="block text-sm font-medium text-gray-700">拜訪日期</label>
            <input type="date" wire:model="visit.visit_date" id="visit_date" class="mt-1 block w-full rounded-md border-gray-300">
            @error('visit.visit_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="content" class="block text-sm font-medium text-gray-700">拜訪內容</label>
            <textarea wire:model="visit.content" id="content" rows="4" class="mt-1 block w-full rounded-md border-gray-300"></textarea>
            @error('visit.content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="next_action" class="block text-sm font-medium text-gray-700">後續行動</label>
            <input type="text" wire:model="visit.next_action" id="next_action" class="mt-1 block w-full rounded-md border-gray-300">
            @error('visit.next_action') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="reminder_at" class="block text-sm font-medium text-gray-700">提醒時間</label>
            <input type="datetime-local" wire:model="visit.reminder_at" id="reminder_at" class="mt-1 block w-full rounded-md border-gray-300">
            @error('visit.reminder_at') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">提案狀態</label>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="checkbox" wire:model="visit.has_proposal" class="rounded border-gray-300">
                        <span class="ml-2">有提案</span>
                    </label>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">客戶類型</label>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" wire:model="visit.is_direct_client" value="1" class="border-gray-300">
                        <span class="ml-2">直客</span>
                    </label>
                    <label class="inline-flex items-center ml-4">
                        <input type="radio" wire:model="visit.is_direct_client" value="0" class="border-gray-300">
                        <span class="ml-2">代理商</span>
                    </label>
                </div>
            </div>
        </div>

        @if(!$visit->is_direct_client)
            <div>
                <label for="agency" class="block text-sm font-medium text-gray-700">代理商</label>
                <input type="text" wire:model="visit.agency" id="agency" class="mt-1 block w-full rounded-md border-gray-300">
                @error('visit.agency') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        @endif

        @if($visit->has_proposal)
            <div>
                <label for="opportunity_name" class="block text-sm font-medium text-gray-700">商機名稱</label>
                <input type="text" wire:model="visit.opportunity_name" id="opportunity_name" class="mt-1 block w-full rounded-md border-gray-300">
                @error('visit.opportunity_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        @endif

        <div class="flex justify-end gap-4">
            <a href="{{ route('visits.index') }}" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200">
                取消
            </a>
            <button type="submit" class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700">
                {{ $isEdit ? '更新' : '建立' }}
            </button>
        </div>
    </form>
</div>