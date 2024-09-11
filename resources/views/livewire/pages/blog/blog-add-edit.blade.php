<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __( $post ? 'Edit Blog' : 'New Blog Entry') }}
    </h2>
</x-slot>
<div class="py-4 lg:py-12">
    <div class="max-w-7xl mx-auto sm:px-6 px-2 lg:px-8">
        <div class="flex flex-col gap-4 lg:gap-8">
            <div class="w-full flex justify-between">
                <div class="flex gap-4">
                    <a href="javascript:history.go(-1)" class="material-symbols-outlined cursor-pointer">arrow_back</a>
                    <h2 class="text-xl font-semibold">{{isset($post) ? 'Edit Blog' : 'New Blog' }}</h2>
                </div>

                {{--<a href="javascript:history.go(-1)" class="bg-red-600 text-white font-semibold rounded-lg px-4 py-2 w-[100px] text-center">Cancel</a>--}}
                <button wire:click="save" class="bg-black text-white rounded-lg px-4 py-2 flex items-center justify-center gap-1 text-sm">
                    <span class="material-symbols-outlined">save</span>
                    Save
                </button>

            </div>
            <div class="flex flex-col bg-white py-4 lg:py-14 px-4 lg:px-8 rounded-lg shadow-lg gap-4">
                <div class="flex flex-col">
                    <div class="flex flex-col">
                        <label class="text-sm lg:text-lg" for="blog-title">Title</label>
                        <input class="text-sm lg:text-lg border border-gray-300 rounded-lg focus:outline-none" wire:model="form.title" id="blog-title" type="text"/>
                    </div>
                    @error('form.title') <span class="text-red-400">{{$message}}</span> @enderror
                </div>

                <div class="flex flex-col">
                    <div class="flex flex-col">
                        <label class="text-sm lg:text-lg" for="blog-image">Image</label>
                        @if($form->image)
                            <img class="w-72 h-64 mb-4 object-fit" src="{{$form->image->temporaryUrl()}}">
                        @else
                            @if(isset($image))
                                <img class="w-72 h-64 mb-4 object-fit" src="{{$image}}">
                            @endif
                        @endif

                        <input class="border border-gray-300 rounded-lg focus:outline-none p-2 text-sm lg:text-lg"  wire:model="form.image" id="blog-image" type="file"/>
                    </div>
                    @error('form.image') <span class="text-red-400">{{$message}}</span> @enderror
                </div>

                <div class="flex flex-col">
                    <div class="flex flex-col">
                        <label class="text-sm lg:text-lg" for="blog-description">Description</label>
                        <div class="text-editor">
                            <livewire:quill-text-editor wire:model="form.description" theme="snow"/>
                        </div>

                    </div>
                    @error('form.description') <span class="text-red-400">{{$message}}</span> @enderror
                </div>
            </div>
        </div>


    </div>
</div>