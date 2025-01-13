<div>
    <div class="mb-4 flex justify-between items-center">
        <div class="flex gap-4">
            <div>
                <input 
                    type="text" 
                    wire:model.live="search" 
                    placeholder="搜尋公司名稱或統編..." 
                    class="rounded-lg border-gray-300"
                >
            </div>
            <select wire:model.live="businessUnit" class="rounded-lg border-gray-300">
                <option value="">所有事業單位</option>
                <option value="BN">BN</option>
                <option value="MT">MT</option>
                <option value="SD">SD</option>
                <option value="WEB3">WEB3</option>
            </select>
            <select wire:model.live="industryType" class="rounded-lg border-gray-300">
                <option value="">所有產業類別</option>
                <option value="製造業">製造業</option>
                <option value="服務業">服務業</option>
                <option value="零售業">零售業</option>
                <option value="科技業">科技業</option>
            </select>
        </div>
        <a href="{{ route('companies.create') }}" class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700">
            新增公司
        </a>
    </div>

    <div class="bg-white rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">統編</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">公司名稱</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">事業單位</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">產業類別</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">聯絡電話</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">操作</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($companies as $company)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $company->tax_id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $company->name }}</div>
                            @if($company->short_name)
                                <div class="text-sm text-gray-500">{{ $company->short_name }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $company->business_unit }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $company->industry_type }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $company->phone }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('companies.show', $company) }}" class="text-primary-600 hover:text-primary-900">查看</a>
                            <a href="{{ route('companies.edit', $company) }}" class="ml-3 text-indigo-600 hover:text-indigo-900">編輯</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-6 py-4">
            {{ $companies->links() }}
        </div>
    </div>
</div>