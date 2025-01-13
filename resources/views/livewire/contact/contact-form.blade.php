<div class="max-w-3xl mx-auto">
    <form wire:submit="save" class="space-y-6 bg-white p-6 rounded-lg shadow">
        <div>
            <label for="company_id" class="block text-sm font-medium text-gray-700">公司</label>
            <select wire:model="contact.company_id" id="company_id" class="mt-1 block w-full rounded-md border-gray-300">
                <option value="">選擇公司</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
            @error('contact.company_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">姓名</label>
            <input type="text" wire:model="contact.name" id="name" class="mt-1 block w-full rounded-md border-gray-300">
            @error('contact.name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="nickname" class="block text-sm font-medium text-gray-700">暱稱</label>
            <input type="text" wire:model="contact.nickname" id="nickname" class="mt-1 block w-full rounded-md border-gray-300">
            @error('contact.nickname') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="department" class="block text-sm font-medium text-gray-700">隸屬部門</label>
            <input type="text" wire:model="contact.department" id="department" class="mt-1 block w-full rounded-md border-gray-300">
            @error('contact.department') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">職稱</label>
            <input type="text" wire:model="contact.title" id="title" class="mt-1 block w-full rounded-md border-gray-300">
            @error('contact.title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="job_type" class="block text-sm font-medium text-gray-700">職務類別</label>
            <input type="text" wire:model="contact.job_type" id="job_type" class="mt-1 block w-full rounded-md border-gray-300">
            @error('contact.job_type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="job_level" class="block text-sm font-medium text-gray-700">職等</label>
            <select wire:model="contact.job_level" id="job_level" class="mt-1 block w-full rounded-md border-gray-300">
                <option value="">選擇職等</option>
                <option value="經理">經理</option>
                <option value="主任">主任</option>
                <option value="專員">專員</option>
            </select>
            @error('contact.job_level') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" wire:model="contact.email" id="email" class="mt-1 block w-full rounded-md border-gray-300">
            @error('contact.email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="mobile" class="block text-sm font-medium text-gray-700">聯絡電話</label>
            <input type="text" wire:model="contact.mobile" id="mobile" class="mt-1 block w-full rounded-md border-gray-300">
            @error('contact.mobile') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">公司電話</label>
            <input type="text" wire:model="contact.phone" id="phone" class="mt-1 block w-full rounded-md border-gray-300">
            @error('contact.phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="notes" class="block text-sm font-medium text-gray-700">備註</label>
            <textarea wire:model="contact.notes" id="notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300"></textarea>
            @error('contact.notes') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="employment_status" class="block text-sm font-medium text-gray-700">就職狀態</label>
            <select wire:model="contact.employment_status" id="employment_status" class="mt-1 block w-full rounded-md border-gray-300">
                <option value="active">在職中</option>
                <option value="inactive">停用/離職</option>
            </select>
            @error('contact.employment_status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end gap-4">
            <a href="{{ route('contacts.index') }}" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200">
                取消
            </a>
            <button type="submit" class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700">
                {{ $isEdit ? '更新' : '建立' }}
            </button>
        </div>
    </form>
</div>