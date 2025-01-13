<div class="grid grid-cols-4 gap-4 mb-8">
    <div class="bg-white p-4 rounded-lg shadow-sm">
        <div class="text-sm text-gray-600 mb-2">年度目標</div>
        <div class="text-2xl font-bold text-blue-600">{{ number_format($yearlyTarget) }}</div>
        <div class="flex justify-between text-sm mt-2">
            <span class="text-{{ $achievementRate >= 80 ? 'green' : 'red' }}-600">{{ number_format($achievementRate, 2) }}%</span>
            <span class="text-gray-600">{{ number_format($currentAchievement) }}</span>
        </div>
    </div>

    <div class="bg-white p-4 rounded-lg shadow-sm">
        <div class="text-sm text-gray-600 mb-2">待追業績</div>
        <div class="text-2xl font-bold text-red-500">{{ number_format($remainingTarget) }}</div>
        <div class="flex justify-between text-sm mt-2">
            <span class="text-red-500">-{{ number_format(100 - $achievementRate, 2) }}%</span>
        </div>
    </div>

    <div class="bg-white p-4 rounded-lg shadow-sm">
        <div class="text-sm text-gray-600 mb-2">BN 累計達成</div>
        <div class="text-2xl font-bold text-green-500">{{ number_format($bnAchievement) }}</div>
        <div class="flex justify-between text-sm mt-2">
            <span class="text-green-600">{{ $yearlyTarget > 0 ? number_format($bnAchievement / $yearlyTarget * 100, 2) : 0 }}%</span>
            <span class="text-red-500">-{{ number_format($yearlyTarget - $bnAchievement) }}</span>
        </div>
    </div>

    <div class="bg-white p-4 rounded-lg shadow-sm">
        <div class="text-sm text-gray-600 mb-2">MT 累計達成</div>
        <div class="text-2xl font-bold text-green-500">{{ number_format($mtAchievement) }}</div>
        <div class="flex justify-between text-sm mt-2">
            <span class="text-green-600">{{ $yearlyTarget > 0 ? number_format($mtAchievement / $yearlyTarget * 100, 2) : 0 }}%</span>
            <span class="text-red-500">-{{ number_format($yearlyTarget - $mtAchievement) }}</span>
        </div>
    </div>
</div>