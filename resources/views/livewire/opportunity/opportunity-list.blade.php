<div>
    <div class="mb-4 flex justify-between items-center">
        <div class="flex gap-4">
            <div>
                <input 
                    type="text" 
                    wire:model.live="search" 
                    placeholder="搜尋商機名稱或公司..." 
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
            <select wire:model.live="stage" class="rounded-lg border-gray-300">
                <option value="">所有階段</option>
                <option value="development">開發中</option>
                <option value="proposal">提案中</option>
                <option value="quotation">報價中</option>
                <option value="contract">簽約中</option>
            </select>
            <select wire:model.live="status" class="rounded-lg border-gray-300">
                <option value="in_progress">進行中</option>
                <option value="won">成功結案</option>
                <option value="lost">失敗結案</option>
            </select>
        </div>
        <a href="{{ route('opportunities.create') }}" class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700">
            新增商機
        </a>
    </div>

    <div class="bg-white rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">商機名稱</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">公司/聯絡人</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">事業單位</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">金額</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">成功率</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">階段</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">操作</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($opportunities as $opportunity)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $opportunity->name }}</div>
                            @if($opportunity->agency)
                                <div class="text-sm text-gray-500">{{ $opportunity->agency }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $opportunity->company->name }}</div>
                            <div class="text-sm text-gray-500">{{ $opportunity->contact->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $opportunity->business_unit }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ number_format($opportunity->amount) }}</div>
                            <div class="text-sm text-gray-500">預估: {{ number_format($opportunity->estimated_amount) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $opportunity->success_rate >= 70 ? 'bg-green-100 text-green-800' : 
                                   ($opportunity->success_rate >= 30 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                {{ $opportunity->success_rate }}%
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                {{ $opportunity->status === 'won' ? 'bg-green-100 text-green-800' : 
                                   ($opportunity->status === 'lost' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800') }}">
                                @switch($opportunity->stage)
                                    @case('development')
                                        開發中
                                        @break
                                    @case('proposal')
                                        提案中
                                        @break
                                    @case('quotation')
                                        報價中
                                        @break
                                    @case('contract')
                                        簽約中
                                        @break
                                @endswitch
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('opportunities.show', $opportunity) }}" class="text-primary-600 hover:text-primary-900">查看</a>
                            <a href="{{ route('opportunities.edit', $opportunity) }}" class="ml-3 text-indigo-600 hover:text-indigo-900">編輯</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-6 py-4">
            {{ $opportunities->links() }}
        </div>
    </div>
</div>