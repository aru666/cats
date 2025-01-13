<div class="grid grid-cols-5 gap-4 mb-8">
    <div class="bg-white p-4 rounded-lg shadow-sm">
        <div class="text-sm text-gray-600 mb-1">親訪/電子訪</div>
        <div class="text-3xl font-bold mb-1">{{ $monthlyVisits }}</div>
        <div class="text-sm text-gray-500">本月拜訪數</div>
    </div>

    <div class="bg-white p-4 rounded-lg shadow-sm">
        <div class="text-sm text-gray-600 mb-1">追蹤中</div>
        <div class="text-3xl font-bold mb-1">{{ $activeOpportunities }}</div>
        <div class="text-sm text-gray-500">商機</div>
    </div>

    <div class="bg-white p-4 rounded-lg shadow-sm">
        <div class="text-sm text-gray-600 mb-1">追蹤中</div>
        <div class="text-3xl font-bold mb-1">{{ $activeProposals }}</div>
        <div class="text-sm text-gray-500">提案報價</div>
    </div>

    <div class="bg-white p-4 rounded-lg shadow-sm">
        <div class="text-sm text-gray-600 mb-1">追蹤中</div>
        <div class="text-3xl font-bold mb-1">{{ $activeQuotes }}</div>
        <div class="text-sm text-gray-500">報價回覆</div>
    </div>

    <div class="bg-white p-4 rounded-lg shadow-sm">
        <div class="text-sm text-gray-600 mb-1">追蹤中</div>
        <div class="text-3xl font-bold mb-1">{{ $activeContracts }}</div>
        <div class="text-sm text-gray-500">委托合約</div>
    </div>
</div>