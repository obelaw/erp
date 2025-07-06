<div class="space-y-6 p-4">
    @if(isset($error))
        <div class="p-4 bg-red-50 border border-red-200 rounded-lg">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-700">Error loading statistics: {{ $error }}</p>
                </div>
            </div>
        </div>
    @else
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="bg-gray-50 rounded-lg p-4 text-center">
                <div class="text-2xl font-bold text-gray-900">{{ $totalItems }}</div>
                <div class="text-sm text-gray-600">Total Items</div>
            </div>
            
            <div class="bg-green-50 rounded-lg p-4 text-center">
                <div class="text-2xl font-bold text-green-600">{{ $inStockItems }}</div>
                <div class="text-sm text-green-700">In Stock</div>
            </div>
            
            <div class="bg-yellow-50 rounded-lg p-4 text-center">
                <div class="text-2xl font-bold text-yellow-600">{{ $pendingItems }}</div>
                <div class="text-sm text-yellow-700">Pending</div>
            </div>
            
            <div class="bg-red-50 rounded-lg p-4 text-center">
                <div class="text-2xl font-bold text-red-600">{{ $outItems }}</div>
                <div class="text-sm text-red-700">Out of Stock</div>
            </div>
        </div>
        
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-blue-50 rounded-lg p-4 text-center">
                <div class="text-2xl font-bold text-blue-600">{{ $storableItems }}</div>
                <div class="text-sm text-blue-700">Storable Items</div>
            </div>
            
            <div class="bg-orange-50 rounded-lg p-4 text-center">
                <div class="text-2xl font-bold text-orange-600">{{ $consumableItems }}</div>
                <div class="text-sm text-orange-700">Consumable Items</div>
            </div>
        </div>
        
        <div class="mt-6 p-4 bg-gray-100 rounded-lg">
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Quick Stats</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                <div>
                    <span class="font-medium">Stock Utilization:</span>
                    @if($totalItems > 0)
                        {{ number_format(($inStockItems / $totalItems) * 100, 1) }}%
                    @else
                        0%
                    @endif
                </div>
                <div>
                    <span class="font-medium">Pending Processing:</span>
                    @if($totalItems > 0)
                        {{ number_format(($pendingItems / $totalItems) * 100, 1) }}%
                    @else
                        0%
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>
