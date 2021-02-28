<div class="flex w-full justify-between" x-data="{ voting:false,vote:0,open:false }">
    <div class="flex">
        <div @auth @mouseover="voting=true" @endauth>
            <div class="flex" @mouseover.away="voting=false" x-show="voting" style="display:none;">
                <button class="focus:outline-none" wire:click="vote(1)" @mouseover="vote=1">
                    <x-votes::empty x-show="vote==0"></x-votes::empty>
                    <x-votes::full x-show="vote>=1"></x-votes::full>
                </button>
                <button class="focus:outline-none" wire:click="vote(2)" @mouseover="vote=2">
                    <x-votes::empty x-show="vote<2"></x-votes::empty>
                    <x-votes::full x-show="vote>=2"></x-votes::full>
                </button>
                <button class="focus:outline-none" wire:click="vote(3)" @mouseover="vote=3">
                    <x-votes::empty x-show="vote<3"></x-votes::empty>
                    <x-votes::full x-show="vote>=3"></x-votes::full>
                </button>
                <button class="focus:outline-none" wire:click="vote(4)" @mouseover="vote=4">
                    <x-votes::empty x-show="vote<4"></x-votes::empty>
                    <x-votes::full x-show="vote>=4"></x-votes::full>
                </button>
                <button class="focus:outline-none" wire:click="vote(5)" @mouseover="vote=5">
                    <x-votes::empty x-show="vote<5"></x-votes::empty>
                    <x-votes::full x-show="vote==5"></x-votes::full>
                </button>
            </div>
            <div class="flex" x-show="!voting">
                {{--                Star 1--}}
                @if($average == 0)
                    <x-votes::empty></x-votes::empty>
                @endif
                @if($average == .5)
                    <x-votes::half></x-votes::half>
                @endif
                @if($average >=1)
                    <x-votes::full></x-votes::full>
                @endif

                {{--                Star 2--}}
                @if($average <=1)
                    <x-votes::empty></x-votes::empty>
                @endif
                @if($average == 1.5)
                    <x-votes::half></x-votes::half>
                @endif
                @if($average >=2)
                    <x-votes::full></x-votes::full>
                @endif

                {{--                Star 3--}}
                @if($average <=2)
                    <x-votes::empty></x-votes::empty>
                @endif
                @if($average ==2.5)
                    <x-votes::half></x-votes::half>
                @endif
                @if($average >=3)
                    <x-votes::full></x-votes::full>
                @endif

                {{--                Star 4--}}
                @if($average <=3)
                    <x-votes::empty></x-votes::empty>
                @endif
                @if($average ==3.5)
                    <x-votes::half></x-votes::half>
                @endif
                @if($average >=4)
                    <x-votes::full></x-votes::full>
                @endif

                {{--                Star 5--}}
                @if($average <=4)
                    <x-votes::empty></x-votes::empty>
                @endif
                @if($average ==4.5)
                    <x-votes::half></x-votes::half>
                @endif
                @if($average ==5)
                    <x-votes::full></x-votes::full>
                @endif
            </div>
        </div>
    </div>
    <div class="items-center justify-center">
        <div class="inline-block relative">
            <button @click="open = !open"
                    class="focus:outline-none inline-block text-gray-700 hover:text-black flex rounded px-2 py-1 bg-white"
                    :class="{'font-semibold': open, 'shadow-none': open}">
                {{$votes}} {{\Illuminate\Support\Str::plural('Vote',$votes)}}
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" :class="{'rotate-180': open}"
                     class="ml-1 transform inline-block fill-current text-gray-500 w-6 h-6">
                    <path fill-rule="evenodd"
                          d="M15.3 10.3a1 1 0 011.4 1.4l-4 4a1 1 0 01-1.4 0l-4-4a1 1 0 011.4-1.4l3.3 3.29 3.3-3.3z"/>
                </svg>
            </button>

            <div x-show="open"
                 @click.away="open=false"
                 class="right-0 bg-white absolute mt-2 shadow rounded w-60 pt-4 pl-4 pr-4 pb-2 text-indigo-600"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform -translate-y-2"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-end="opacity-0 transform -translate-y-3"
                 style="display:none;"
            >
                <x-votes::graph percent="{{$percent1}}" label="1"/>
                <x-votes::graph percent="{{$percent2}}" label="2"/>
                <x-votes::graph percent="{{$percent3}}" label="3"/>
                <x-votes::graph percent="{{$percent4}}" label="4"/>
                <x-votes::graph percent="{{$percent5}}" label="5"/>
            </div>
        </div>
    </div>
</div>
