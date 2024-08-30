<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */

    public $showNav = false;
    public $showDropDown = false;

    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }

    public function toggleNav()
    {
        $this->showNav = $this->showNav ? false :  true;
    }

    public function toggleDropdown()
    {
        $this->showDropDown = $this->showDropDown ? false :  true;
    }
}; ?>
<nav class="bg-[#171E21] p-4 w-full overflow-hidden flex">
    <div class="w-full lg:w-7xl max-w-7xl m-0 lg:mx-auto flex justify-between items-center z-0">
        <a href="/blog">
            <img class="hidden lg:flex" src="{{url('/images/logo.png')}}">
        </a>

        <div class="flex justify-between w-full lg:hidden">
            <img class="" src="{{url('/images/logo-mobile.png')}}">
            <button wire:click="toggleNav" class="material-symbols-outlined text-white">menu</button>
        </div>

        <ul class="flex text-white gap-[20px] hidden lg:flex">
            <li class="text-sm"><a href="">News</a></li>
            <li class="text-sm {{ request()->routeIs('blog') ? 'text-[#6366F1]' : '' }}"><a href="/blog">Blogs</a></li>
            <li class="text-sm"><a href="">Tutorials</a></li>
            <li class="text-sm"><a href="">Videos</a></li>
            <li class="text-sm"><a href="">Podcast</a></li>
        </ul>
        <div class="absolute z-10 flex flex-col lg:hidden right-0 top-0 bg-[#171E21] h-full transition duration-150 ease-in-out {{$showNav ? 'translate-x-0' : 'translate-x-full'}}">
            <div class="flex justify-end w-full p-4">
                <button wire:click="toggleNav" class="material-symbols-outlined text-white">
                    close
                </button>
            </div>
            <ul class="flex flex-col text-white gap-[20px] items-center px-14">
                <li class="text-sm"><a href="">News</a></li>
                <li class="text-sm"><a href="/blog">Blogs</a></li>
                <li class="text-sm"><a href="">Tutorials</a></li>
                <li class="text-sm"><a href="">Videos</a></li>
                <li class="text-sm"><a href="">Podcast</a></li>
            </ul>
        </div>
    </div>

    <div class="hidden lg:flex sm:items-center sm:ms-6 flex-col">
        <button wire:click="toggleDropdown" class="flex items-center gap-2 text-white cursor-pointer justify-end w-full">
            {{ Auth::user()->name }}
            <span class="material-symbols-outlined transform rotate-90">chevron_right</span>
        </button>
        <ul class="absolute mt-2 min-w-[150px] h-auto rounded-lg bg-white p-2 shadow-lg top-8 right-2 z-10 {{ $showDropDown ? '' : 'hidden' }}">
            <li class="flex w-full items-center justify-center">
                <button wire:click="logout"> Logout </button>
            </li>
        </ul>

    </div>
</nav>
