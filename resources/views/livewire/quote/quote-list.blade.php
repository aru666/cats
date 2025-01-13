<div>
    <div class="mb-4 flex justify-between items-center">
        <div class="flex gap-4">
            <div>
                <input 
                    type="text" 
                    wire:model.live="search" 
                    placeholder="搜尋報價標題或提案..." 
                    class="rounded-lg border-gray-300"
                >
            </div>
            <select wire:model.live="status" class="rounded-lg border-gray-300">
                <option value="">所有狀態</option>
                <option value="draft">草稿</option>
                <option value="sent">已送出</option>
                <option value="accepted">已接受</option>
                <option value="rejected">已拒絕</option>
            </select>
        </div>
        <a href="{{ route('quotes.create') }}" class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700">
            新增報價
        </a>
    </div>

    <div class="bg-white rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">報價標題</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">提案</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">金額</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">有效期限</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">狀態</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">操作</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($quotes as $quote)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $quote->title }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $quote->proposal->title }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ number_format($quote->amount) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $quote->valid_until->format('Y-m-d') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                {{ $quote->status === 'accepted' ? 'bg-green-100 text-green-800' : 
                                   ($quote->status === 'rejected' ? 'bg-red-100 text-red-800' : 
                                   ($quote->status === 'sent' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800')) }}">
                                @switch($quote->status)
                                    @case('draft')
                                        草稿
                                        @break
                                    @case('sent')
                                        已送出
                                        @break
                                    @case('accepted')
                                        已接受
                                        @break
                                    @case('rejected')
                                        已拒絕
                                        @break
                                @endswitch
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('quotes.show', $quote) }}" class="text-primary-600 hover:text-primary-900">查看</a>
                            <a href="{{ route('quotes.edit', $quote) }}" class="ml-3 text-indigo-600 hover:text-indigo-900">編輯</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-6 py-4">
            {{ $quotes->links() }}
        </div>
    </div>
</div>