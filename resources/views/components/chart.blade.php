@props(['type'])

<div class="p-6 bg-white border border-gray-200 rounded-lg shadow">
    <div id="{{ $type }}" class="w-full h-64"></div>
    
    @if(in_array($type, ['datawl', 'datajh', 'datawd', 'dataju']))
        <div class="mt-4 flex items-center">
            <div id="{{ $type }}-gender" class="w-1/3"></div>
            <div class="w-2/3">
                <div class="flex items-center mb-2">
                    <div class="w-3 h-3 rounded-full bg-[#5CC1F3] mr-2"></div>
                    <span class="text-sm">Laki-laki</span>
                </div>
                <div class="flex items-center">
                    <div class="w-3 h-3 rounded-full bg-[#FF6384] mr-2"></div>
                    <span class="text-sm">Perempuan</span>
                </div>
            </div>
        </div>
    @endif
</div>
