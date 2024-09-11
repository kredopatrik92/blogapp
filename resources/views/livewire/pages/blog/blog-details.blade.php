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
                            <a href="{{route('blog.edit', ['post' => $post->id])}}" class="bg-black text-white rounded-lg px-4 py-2 flex items-center justify-center gap-1 text-sm w-full lg:w-auto">
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
                        <div class="flex gap-4 items-center h-full">
                            <div class="flex items-center gap-1">
                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.59444 1.80556C8.59444 0.722222 7.52411 0 6.68778 0C6.10567 0 6.06017 0.442 5.97061 1.31444C5.93089 1.69722 5.88322 2.16233 5.77778 2.70833C5.499 4.15422 4.53556 6.00167 3.614 6.55417V10.8333C3.61111 12.4583 4.15278 13 6.5 13H9.22495C10.7965 13 11.1771 11.9651 11.3187 11.5816L11.3281 11.5556C11.4104 11.3346 11.5866 11.1605 11.7888 10.9633C12.0127 10.7423 12.2684 10.4917 12.4583 10.1111C12.6829 9.66117 12.6533 9.26106 12.6266 8.905C12.61 8.68906 12.5948 8.48972 12.6389 8.30556C12.6851 8.11056 12.7443 7.9625 12.8014 7.82094C12.9047 7.56383 13 7.3255 13 6.86111C13 5.77778 12.4598 5.057 11.3281 5.057H8.30556C8.30556 5.057 8.59444 2.88889 8.59444 1.80556ZM1.08333 5.77778C0.796016 5.77778 0.520465 5.89191 0.317301 6.09508C0.114136 6.29824 0 6.57379 0 6.86111V11.9167C6.05477e-09 12.204 0.114136 12.4795 0.317301 12.6827C0.520465 12.8859 0.796016 13 1.08333 13C1.37065 13 1.6462 12.8859 1.84937 12.6827C2.05253 12.4795 2.16667 12.204 2.16667 11.9167V6.86111C2.16667 6.57379 2.05253 6.29824 1.84937 6.09508C1.6462 5.89191 1.37065 5.77778 1.08333 5.77778Z" fill="#7E7F84"/>
                                </svg>
                                <span class="inter font-[400] text-[12px] text-[#A3A3AA]">100</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 6.50188C0.0217143 6.5552 0.0488571 6.62984 0.0814286 6.72581C0.114 6.82178 0.195429 6.99773 0.325714 7.25365C0.456 7.50957 0.597143 7.78148 0.749143 8.06939C0.901143 8.3573 1.11286 8.67187 1.38429 9.01309C1.65571 9.35432 1.938 9.68488 2.23114 10.0048C2.52429 10.3247 2.888 10.6392 3.32229 10.9485C3.75657 11.2577 4.20171 11.5243 4.65771 11.7482C5.11372 11.9722 5.64571 12.1534 6.25372 12.2921C6.86171 12.4307 7.49143 12.5 8.14286 12.5C8.79429 12.5 9.424 12.4307 10.032 12.2921C10.64 12.1534 11.1774 11.9722 11.6443 11.7482C12.1111 11.5243 12.5509 11.2577 12.9634 10.9485C13.376 10.6392 13.7397 10.3247 14.0546 10.0048C14.3694 9.68488 14.6517 9.35432 14.9014 9.01309C15.1511 8.67187 15.3629 8.3573 15.5366 8.06939C15.7103 7.78148 15.8514 7.5149 15.96 7.26964C16.0686 7.02438 16.15 6.83778 16.2043 6.70982L16.2857 6.50188C16.2749 6.44857 16.2477 6.37925 16.2043 6.29395C16.1609 6.20864 16.0794 6.02736 15.96 5.75012C15.8406 5.47287 15.6994 5.20629 15.5366 4.95037C15.3737 4.69445 15.162 4.37988 14.9014 4.00666C14.6409 3.63345 14.3586 3.29755 14.0546 2.99898C13.7506 2.70041 13.3869 2.39117 12.9634 2.07127C12.54 1.75137 12.0949 1.47946 11.628 1.25553C11.1611 1.0316 10.6291 0.855653 10.032 0.727693C9.43486 0.599733 8.80514 0.52509 8.14286 0.503764C7.48057 0.482437 6.85086 0.551748 6.25372 0.711698C5.65657 0.871648 5.11914 1.05826 4.64143 1.27152C4.16371 1.48479 3.724 1.75137 3.32229 2.07127C2.92057 2.39117 2.55686 2.70574 2.23114 3.01498C1.90543 3.32421 1.62314 3.65478 1.38429 4.00666C1.14543 4.35855 0.933714 4.67312 0.749143 4.95037C0.564571 5.22761 0.423429 5.4942 0.325714 5.75012C0.228 6.00604 0.146571 6.19265 0.0814286 6.30994L0 6.50188ZM4.07143 6.50188C4.07143 5.40356 4.46771 4.46519 5.26029 3.68676C6.05286 2.90834 7.01371 2.5138 8.14286 2.50314C9.272 2.49247 10.2329 2.88702 11.0254 3.68676C11.818 4.48651 12.2143 5.42489 12.2143 6.50188C12.2143 7.57888 11.818 8.52258 11.0254 9.33299C10.2329 10.1434 9.272 10.5326 8.14286 10.5006C7.01371 10.4686 6.05286 10.0794 5.26029 9.33299C4.46771 8.58656 4.07143 7.64286 4.07143 6.50188ZM6.10714 6.50188C6.10714 7.05637 6.308 7.53089 6.70971 7.92543C7.11143 8.31998 7.58914 8.51192 8.14286 8.50126C8.69657 8.49059 9.17429 8.29865 9.576 7.92543C9.97771 7.55222 10.1786 7.0777 10.1786 6.50188C10.1786 5.92606 9.97771 5.45688 9.576 5.09432C9.17429 4.73177 8.69657 4.5345 8.14286 4.50251C8.132 4.50251 8.11571 4.50784 8.094 4.5185C8.07229 4.52917 8.056 4.52917 8.04514 4.5185C8.11029 4.71044 8.14286 4.87573 8.14286 5.01435C8.14286 5.43022 7.99629 5.78211 7.70314 6.07002C7.41 6.35793 7.04629 6.50188 6.612 6.50188C6.48171 6.50188 6.31886 6.46989 6.12343 6.40591C6.12343 6.41657 6.118 6.43257 6.10714 6.4539C6.09629 6.47522 6.09629 6.49122 6.10714 6.50188Z" fill="#7E7F84"/>
                                </svg>
                                <span class="inter font-[400] text-[12px] text-[#A3A3AA]">100</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-[25px]">
                        <livewire:components.upvote-downvote :model="$post"/>
                    </div>

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