
<div class="flex flex-col justify-center items-center">
    <a wire:click.prevent="upVote" href="#" class="cursor-pointer">
        <i class="material-symbols-outlined text-[36px] lg:text-[48px] leading-[0.5em] flex {{ $isVotedUp ? 'text-orange-600' : 'text-gray-400'}}">
            arrow_drop_up
        </i>
    </a>
    <span class="text-[16px] lg:text-[18px] satoshi font-semibold">{{$totalCount}}</span>
    <a wire:click.prevent="downVote" href="#" class="cursor-pointer ">
        <i class="material-symbols-outlined text-[36px] lg:text-[48px] leading-[0.5em] flex {{ $isVotedDown ? 'text-orange-600' : 'text-gray-400'}}">
            arrow_drop_down
        </i>
    </a>
</div>

