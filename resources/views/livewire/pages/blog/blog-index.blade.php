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
        </div>

        <div class="flex flex-col max-w-5xl">
            <div class="w-full border-b-[0.8px] border-[#D0D1DA] p-[10px] lg:gap-[10px] my-4 flex justify-between lg:items-center lg:flex-row flex-col-reverse gap-8">
                <h1 class="text-[32px] lg:text-[54px] text-[#171E21] satoshi font-[700]">Latest</h1>
                <a href="{{route('blog.add')}}" class="bg-black text-white font-semibold rounded-lg px-4 py-2 h-full text-center">Add New Blog</a>
            </div>

            <div class="flex flex-col w-full">
                @foreach($posts as $post)
                    <a href="{{route('blog.details',['post' => $post->id])}}">
                        <div class="flex flex-col lg:flex-row gap-4 py-8 border-b border-gray-[#D0D1DA]">
                            <div class="w-full lg:w-[464px] h-[261px] overflow-hidden">
                                <img class=" w-full h-full object-cover object-center" src="{{ \Illuminate\Support\Facades\Storage::url($post->image) }}" alt="image">
                            </div>

                            <div class="flex flex-col gap-4 lg:max-h-[261px] justify-between w-full">
                                <div class="flex flex-col w-full max-h-[180px]">
                                    <h2 class="satoshi font-[700] text-[28px] text-[#171A21]">
                                        {{ $post->title }}
                                    </h2>
                                    <p class="sintony font-[400] text-[14px] text-[#606165] truncate">
                                        {!! $post->description !!}
                                    </p>
                                </div>


                                <div class="flex flex-col gap-4">
                                    <div class="flex gap-2 items-center">
                                        <img src="{{url('/images/avatar.png')}}" alt="avatar">
                                        <span class="inter font-[400] text-[#A3A3AA] text-[12px]">{{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }} by <span class="text-[#6366F1]"> {{ $post->user->name }}</span></span>
                                    </div>
                                    <div>
                                        <livewire:components.upvote-downvote :model="$post" :key="$post['id'] . time()"/>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="flex w-full justify-center items-center py-4">
                <button wire:click="loadMore" class="p-[10px] bg-[#6366F1] text-center text-white font-[700] text-[16px] w-full lg:w-[152px] h-[50px]">VIEW MORE</button>
            </div>

            <div class="flex items-center w-full gap-[6px] border-t-[0.8px] border-b-[0.8px] border-[#D0D1DA] my-12 py-4">
                <label class="satoshi font-[500] text-[20px] text-[#171E21]">Share blog:</label>
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

    <livewire:pages.blog.blog-more />
</div>

