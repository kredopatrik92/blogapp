<div class="p-8 flex flex-col w-full justify-center items-center gap-4">
    <div class="flex flex-col justify-center items-center gap-4">

        <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
            <span class="material-symbols-outlined text-red-600 text-center">error</span>
        </div>

        <h2 class="text-lg lg:text-xl font-semibold text-center">Are you sure?</h2>

        <p class="text-sm lg:text-lg text-center text-gray-600">
            This action cannot be undone. The blog will be delete.
        </p>
    </div>

    <div class="flex flex-col gap-2 w-full">
        <button wire:click="delete" class="bg-red-600 text-white text-sm lg:text-lg w-full text-center rounded-lg p-2">Delete Blog</button>
        <button wire:click="$dispatch('closeModal')" class="bg-white border border-gray-200 text-sm lg:text-lg w-full text-center rounded-lg p-2">Cancel</button>
    </div>

</div>
