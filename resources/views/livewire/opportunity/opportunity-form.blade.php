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
                @error('opportunity.company_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="contact_id" class="block text-sm font-medium text-gray-700">聯絡人</label>
                <select wire:model="opportunity.contact_id" id="contact_id" class="mt-1 block w-full rounded-md border-gray-300">
                    <option value="">選擇聯絡人</option>
                    @foreach($contacts as $contact)
                        <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                    @endforeach
                </select>
                @error('opportunity.contact_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div>
            <label for="agency" class="block text-sm font-medium text-gray-700">代理商</label>
            <input type="text" wire:model="opportunity.agency" id="agency" class="mt-1 block w-full rounded-md border-gray-300">
            @error('opportunity.agency') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">商機名稱</label>
            <input type="text" wire:model="opportunity.name" id="name" class="mt-1 block w-full rounded-md border-gray-300">
            @error('opportunity.name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="business_unit" class="block text-sm font-medium text-gray-700">事業單位</label>
                <select wire:model="opportunity.business_unit" id="business_unit" class="mt-1 block w-full rounded-md border-gray-300">
                    <option value="">選擇事業單位</option>
                    <option value="BN">BN</option>
                    <option value="MT">MT</option>
                    <option value="SD">SD</option>
                    <option value="WEB3">WEB3</option>
                </select>
                @error('opportunity.business_unit') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="visit_type" class="block text-sm font-medium text-gray-700">拜訪方式</label>
                <select wire:model="opportunity.visit_type" id="visit_type" class="mt-1 block w-full rounded-md border-gray-300">
                    <option value="">選擇拜訪方式</option>
                    <option value="親訪">親訪</option>
                    <option value="電訪">電訪</option>
                </select>
                @error('opportunity.visit_type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">產品類型</label>
            <div class="mt-2 grid grid-cols-2 gap-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" wire:model="opportunity.product_types" value="網路廣告(一般上稿)" class="rounded border-gray-300">
                    <span class="ml-2">網路廣告(一般上稿)</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" wire:model="opportunity.product_types" value="網路廣告(內容行銷)" class="rounded border-gray-300">
                    <span class="ml-2">網路廣告(內容行銷)</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" wire:model="opportunity.product_types" value="網路廣告(數位專案)" class="rounded border-gray-300">
                    <span class="ml-2">網路廣告(數位專案)</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" wire:model="opportunity.product_types" value="平面廣告" class="rounded border-gray-300">
                    <span class="ml-2">平面廣告</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" wire:model="opportunity.product_types" value="活動" class="rounded border-gray-300">
                    <span class="ml-2">活動</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" wire:model="opportunity.product_types" value="代編" class="rounded border-gray-300">
                    <span class="ml-2">代編</span>
                </label>
            </div>
            @error('opportunity.product_types') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="visit_date" class="block text-sm font-medium text-gray-700">拜訪日期</label>
            <input type="date" wire:model="opportunity.visit_date" id="visit_date" class="mt-1 block w-full rounded-md border-gray-300">
            @error('opportunity.visit_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="content" class="block text-sm font-medium text-gray-700">拜訪內容</label>
            <textarea wire:model="opportunity.content" id="content" rows="4" class="mt-1 block w-full rounded-md border-gray-300"></textarea>
            @error('opportunity.content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div>
                <label for="amount" class="block text-sm font-medium text-gray-700">成交金額</label>
                <input type="number" wire:model="opportunity.amount" id="amount" class="mt-1 block w-full rounded-md border-gray-300">
                @error('opportunity.amount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="estimated_amount" class="block text-sm font-medium text-gray-700">預估金額</label>
                <input type="number" wire:model="opportunity.estimated_amount" id="estimated_amount" class="mt-1 block w-full rounded-md border-gray-300">
                @error('opportunity.estimated_amount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="success_rate" class="block text-sm font-medium text-gray-700">預估成率</label>
                <select wire:model="opportunity.success_rate" id="success_rate" class="mt-1 block w-full rounded-md border-gray-300">
                    <option value="30">30%</option>
                    <option value="50">50%</option>
                    <option value="70">70%</option>
                    <option value="100">100%</option>
                </select>
                @error('opportunity.success_rate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div>
            <label for="cooperation_issues" class="block text-sm font-medium text-gray-700">合作議題</label>
            <textarea wire:model="opportunity.cooperation_issues" id="cooperation_issues" rows="3" class="mt-1 block w-full rounded-md border-gray-300"></textarea>
            @error('opportunity.cooperation_issues') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="flex items-center">
                <input type="checkbox" wire:model="opportunity.has_ad_exchange" class="rounded border-gray-300">
                <span class="ml-2 text-sm text-gray-700">廣告交換</span>
            </label>
        </div>

        <div>
            <label for="next_action" class="block text-sm font-medium text-gray-700">後續行動</label>
            <input type="text" wire:model="opportunity.next_action" id="next_action" class="mt-1 block w-full rounded-md border-gray-300">
            @error('opportunity.next_action') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="reminder_at" class="block text-sm font-medium text-gray-700">提醒時間</label>
            <input type="datetime-local" wire:model="opportunity.reminder_at" id="reminder_at" class="mt-1 block w-full rounded-md border-gray-300">
            @error('opportunity.reminder_at') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="stage" class="block text-sm font-medium text-gray-700">階段</label>
                <select wire:model="opportunity.stage" id="stage" class="mt-1 block w-full rounded-md border-gray-300">
                    <option value="development">開發中</option>
                    <option value="proposal">提案中</option>
                    <option value="quotation">報價中</option>
                    <option value="contract">簽約中</option>
                </select>
                @error('opportunity.stage') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">商機狀態</label>
                <select wire:model="opportunity.status" id="status" class="mt-1 block w-full rounded-md border-gray-300">
                    <option value="in_progress">進行中</option>
                    <option value="won">成功結案</option>
                    <option value="lost">失敗結案</option>
                </select>
                @error('opportunity.status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        @if($opportunity->status !== 'in_progress')
            <div>
                <label for="status_reason" class="block text-sm font-medium text-gray-700">原因說明</label>
                <textarea wire:model="opportunity.status_reason" id="status_reason" rows="3" class="mt-1 block w-full rounded-md border-gray-300"></textarea>
                @error('opportunity.status_reason') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        @endif

        <div class="flex justify-end gap-4">
            <a href="{{ route('opportunities.index') }}" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200">
                取消
            </a>
            <button type="submit" class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700">
                {{ $isEdit ? '更新' : '建立' }}
            </button>
        </div>
    </form>
</div>