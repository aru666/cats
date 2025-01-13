<div>
    <div class="mb-4 flex justify-between items-center">
        <div class="flex gap-4">
            <div>
                <input 
                    type="text" 
                    wire:model.live="search" 
                    placeholder="搜尋公司或聯絡人..." 
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
            <select wire:model.live="visitType" class="rounded-lg border-gray-300">
                <option value="">所有拜訪方式</option>
                <option value="親訪">親訪</option>
                <option value="電訪">電訪</option>
            </select>
            <select wire:model.live="hasProposal" class="rounded-lg border-gray-300">
                <option value="">所有狀態</option>
                <option value="1">有提案</option>
                <option value="0">無提案</option>
            </select>
        </div>
        <a href="{{ route('visits.create') }}" class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700">
            新增拜訪紀錄
        </a>
    </div>

    <div class="bg-white rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">拜訪日期</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">公司/聯絡人</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">事業單位</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">拜訪方式</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">提案狀態</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">操作</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($visits as $visit)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $visit->visit_date->format('Y-m-d') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $visit->company->name }}</div>
                            <div class="text-sm text-gray-500">{{ $visit->contact->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $visit->business_unit }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $visit->visit_type }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $visit->has_proposal ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $visit->has_proposal ? '有提案' : '無提案' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('visits.show', $visit) }}" class="text-primary-600 hover:text-primary-900">查看</a>
                            <a href="{{ route('visits.edit', $visit) }}" class="ml-3 text-indigo-600 hover:text-indigo-900">編輯</a>
                            @if($visit->has_proposal)
                                <button 
                                    wire:click="convertToOpportunity({{ $visit->id }})"
                                    class="ml-3 text-green-600 hover:text-green-900"
                                >
                                    轉為商機
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-6 py-4">
            {{ $visits->links() }}
        </div>
    </div>
</div>