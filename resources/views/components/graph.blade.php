<div class="flex items-center mb-2">
    <div class="mr-2">
        {{$label}}
    </div>
    <div class="mr-2">
        <x-votes::small></x-votes::small>
    </div>
    <div class="h-6 flex flex-1 items-center bg-gray-100 relative rounded shadow">
        <div class="absolute bg-green-300 rounded h-6" style="width:{{$percent}};">
            <div class="absolute left-2 font-bold text-black">{{$percent}}</div>
        </div>
    </div>
</div>
