<div class="max-w-3xl mx-auto">
    <form wire:submit="save" class="space-y-6 bg-white p-6 rounded-lg shadow">
        <div>
            <label for="tax_id" class="block text-sm font-medium text-gray-700">統一編號</label>
            <input type="text" wire:model="company.tax_id" id="tax_id" class="mt-1 block w-full rounded-md border-gray-300" maxlength="8">
            @error('company.tax_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">公司名稱</label>
            <input type="text" wire:model="company.name" id="name" class="mt-1 block w-full rounded-md border-gray-300">
            @error('company.name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="short_name" class="block text-sm font-medium text-gray-700">公司簡稱</label>
            <input type="text" wire:model="company.short_name" id="short_name" class="mt-1 block w-full rounded-md border-gray-300">
            @error('company.short_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">公司電話</label>
            <input type="text" wire:model="company.phone" id="phone" class="mt-1 block w-full rounded-md border-gray-300">
            @error('company.phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="address" class="block text-sm font-medium text-gray-700">公司地址</label>
            <input type="text" wire:model="company.address" id="address" class="mt-1 block w-full rounded-md border-gray-300">
            @error('company.address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="website" class="block text-sm font-medium text-gray-700">網址</label>
            <input type="url" wire:model="company.website" id="website" class="mt-1 block w-full rounded-md border-gray-300">
            @error('company.website') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="business_unit" class="block text-sm font-medium text-gray-700">事業單位</label>
            <select wire:model="company.business_unit" id="business_unit" class="mt-1 block w-full rounded-md border-gray-300">
                <option value="">選擇事業單位</option>
                <option value="BN">BN</option>
                <option value="MT">MT</option>
                <option value="SD">SD</option>
                <option value="WEB3">WEB3</option>
            </select>
            @error('company.business_unit') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="industry_type" class="block text-sm font-medium text-gray-700">產業類別</label>
            <select wire:model="company.industry_type" id="industry_type" class="mt-1 block w-full rounded-md border-gray-300">
                <option value="">選擇產業類別</option>
                <option value="製造業">製造業</option>
                <option value="服務業">服務業</option>
                <option value="零售業">零售業</option>
                <option value="科技業">科技業</option>
            </select>
            @error('company.industry_type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="focus_issues" class="block text-sm font-medium text-gray-700">關注議題</label>
            <textarea wire:model="company.focus_issues" id="focus_issues" rows="3" class="mt-1 block w-full rounded-md border-gray-300"></textarea>
            @error('company.focus_issues') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="marketing_schedule" class="block text-sm font-medium text-gray-700">行銷排程</label>
            <input type="text" wire:model="company.marketing_schedule" id="marketing_schedule" class="mt-1 block w-full rounded-md border-gray-300">
            @error('company.marketing_schedule') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="fiscal_year" class="block text-sm font-medium text-gray-700">會計年度</label>
            <input type="text" wire:model="company.fiscal_year" id="fiscal_year" class="mt-1 block w-full rounded-md border-gray-300">
            @error('company.fiscal_year') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end gap-4">
            <a href="{{ route('companies.index') }}" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200">
                取消
            </a>
            <button type="submit" class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700">
                {{ $isEdit ? '更新' : '建立' }}
            </button>
        </div>
    </form>
</div>