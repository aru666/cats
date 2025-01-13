<div>
    <div class="mb-4 flex justify-between items-center">
        <div class="flex gap-4">
            <div>
                <input 
                    type="text" 
                    wire:model.live="search" 
                    placeholder="搜尋姓名、信箱或電話..." 
                    class="rounded-lg border-gray-300"
                >
            </div>
            <select wire:model.live="department" class="rounded-lg border-gray-300">
                <option value="">所有部門</option>
                <option value="行銷部">行銷部</option>
                <option value="業務部">業務部</option>
                <option value="企劃部">企劃部</option>
                <option value="採購部">採購部</option>
            </select>
            <select wire:model.live="jobLevel" class="rounded-lg border-gray-300">
                <option value="">所有職等</option>
                <option value="經理">經理</option>
                <option value="主任">主任</option>
                <option value="專員">專員</option>
            </select>
            <select wire:model.live="employmentStatus" class="rounded-lg border-gray-300">
                <option value="active">在職中</option>
                <option value="inactive">停用/離職</option>
            </select>
        </div>
        <a href="{{ route('contacts.create') }}" class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700">
            新增聯絡人
        </a>
    </div>

    <div class="bg-white rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">姓名</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">公司</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">部門/職稱</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">聯絡方式</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">狀態</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">操作</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($contacts as $contact)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $contact->name }}</div>
                            @if($contact->nickname)
                                <div class="text-sm text-gray-500">{{ $contact->nickname }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $contact->company->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $contact->department }}</div>
                            <div class="text-sm text-gray-500">{{ $contact->title }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $contact->mobile }}</div>
                            <div class="text-sm text-gray-500">{{ $contact->email }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $contact->employment_status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $contact->employment_status === 'active' ? '在職中' : '停用/離職' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('contacts.show', $contact) }}" class="text-primary-600 hover:text-primary-900">查看</a>
                            <a href="{{ route('contacts.edit', $contact) }}" class="ml-3 text-indigo-600 hover:text-indigo-900">編輯</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-6 py-4">
            {{ $contacts->links() }}
        </div>
    </div>
</div>