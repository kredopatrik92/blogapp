<div class="w-full bg-white">
    <div class="w-full lg:w-7xl max-w-7xl mx-auto px-4 lg:px-0">

        <!--Temporary breadcrumb -->
        <div class ="flex gap-2 items-center pt-8">
            <div class="flex items-center gap-2">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.66671 13.3333V9.33333H9.33337V13.3333H12.6667V8H14.6667L8.00004 2L1.33337 8H3.33337V13.3333H6.66671Z" fill="#A3A3AA"/>
                </svg>
                <a href="/blog" class="inter font-[500] text-[14px] text-[#A3A3AA]">
                    Home
                </a>
            </div>

            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.72668 11.06L8.78002 8L5.72668 4.94L6.66668 4L10.6667 8L6.66668 12L5.72668 11.06Z" fill="#A3A3AA"/>
            </svg>

            <a href="#" class="inter font-[500] text-[14px] text-[#A3A3AA]">
                Blogs
            </a>

            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.72668 11.06L8.78002 8L5.72668 4.94L6.66668 4L10.6667 8L6.66668 12L5.72668 11.06Z" fill="#A3A3AA"/>
            </svg>

            <a href="#" class="inter font-[500] text-[14px] text-[#A3A3AA]">
                {{ $post->title }}
            </a>
        </div>

        <div class="flex flex-col w-full">
            <div class="mt-8 flex flex-col w-full py-2 border-b-[0.8px] border-[#D0D1DA] gap-[25px]">
                <div class="flex w-full lg:items-center justify-between flex-col-reverse lg:flex-row">
                    <h2 class="satoshi font-[700] text-[54px] text-[#171E21] break-words">{{$post->title}}</h2>

                    @if(\Illuminate\Support\Facades\Auth::user()->hasRole('Admin') || (\Illuminate\Support\Facades\Auth::user()->id == $post->user_id))
                        <div class="flex items-center gap-2 w-full lg:w-auto">
                            <button wire:click="$dispatch('openModal', { component: 'modals.blog.delete-modal', arguments: { post: {{ $post->id }} }})"
                            class="bg-red-600 text-white rounded-lg px-4 py-2 flex items-center justify-center gap-1 text-sm w-full lg:w-auto"
                            >
                                <span class="material-symbols-outlined text-lg">delete</span>
                                Delete
                            </button>
                            <a href="{{'/blog/edit/'. $post->id}} " class="bg-black text-white rounded-lg px-4 py-2 flex items-center justify-center gap-1 text-sm w-full lg:w-auto">
                                <span class="material-symbols-outlined text-lg">edit</span>
                                Edit
                            </a>
                        </div>
                    @endif
                </div>


                <div class="flex lg:items-center justify-between w-full gap-4">
                    <div class="flex flex-col gap-4">
                        <div class="flex items-center gap-[6px]">
                            <img src="{{url('/images/avatar.png')}}" alt="avatar">
                            <span class="inter font-[400] text-[14px] text-[#171E21]">
                                Published  {{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }} by
                                <span class="text-[#6366F1]">{{$post->user->name}}</span>
                            </span>
                        </div>
                    </div>

                    <livewire:components.upvote-downvote :model="$post"/>

                </div>
            </div>

            <div class="mt-8 flex flex-col gap-[30px]">
                <div class="inter font-[400] text-[18px] text-[#606165]">
                    {!! $post->description !!}
                </div>
                <img class="w-full h-full" src="{{\Illuminate\Support\Facades\Storage::url($post->image)}}">
            </div>

            <div class="mt-[30px] p-4 border-t-[0.8px] border-b-[0.8px] border-[#D0D1DA]">
                <div class="flex items-center w-full gap-[25px]">
                    <img src="{{url('/images/avatar-girl.png')}}" class="w-[130px] h-[130px] rounded-full">
                    <div class="flex flex-col gap-[8px]">
                        <h2 class="satoshi font-[700] text-[30px] text-[#171E21]">{{$post->user->name}}</h2>
                        <span class="inter font-[400] text-[18px] text-[#A3A3AA]">Position</span>
                        <span class="inter font-[400] text-[18px] text-[#171E21]">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-[6px] mt-[14px] mb-[30px]">
                <label class="satoshi font-[500] text-[20px] text-[#171E21]">Share blog:</label>
                <div class="flex items-center gap-[14px]">
                    <a href="#">
                        <img src="{{url('/images/facebook.svg')}}" alt="">
                    </a>
                    <a href="#">
                        <img src="{{url('/images/instagram.svg')}}" alt="">
                    </a>
                    <a href="#">
                        <img src="{{url('/images/twitter.svg')}}" alt="">
                    </a>
                    <a href="#">
                        <img src="{{url('/images/linkedin.svg')}}" alt="">
                    </a>
                </div>
            </div>
        </div>


    </div>
    <livewire:pages.blog.blog-more />
</div>