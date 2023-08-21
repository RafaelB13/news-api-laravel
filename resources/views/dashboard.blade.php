<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-4 min-h-[600px]">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>


                @if (auth()->user()->role === 'admin')
                    <div class="flex justify-center">
                        <div class="mt-4">
                            <a href="{{ route('categories.index') }}">
                                <div
                                    class="card cursor-pointer flex flex-col justify-between py-4 mx-4 rounded-lg border border-gray-300 bg-gray-100 shadow-lg shadow-slate-400 text-black w-[350px] h-[200px]">
                                    <span class="font-semibold text-8xl mx-4">{{ $categories }}</span>
                                    <span class="text-right mx-4 text-4xl">Categories</span>
                                </div>
                            </a>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('articles.index') }}">
                                <div
                                    class="card cursor-pointer flex flex-col justify-between py-4 mx-4 rounded-lg border border-gray-300 bg-gray-100 shadow-lg shadow-slate-400 text-black w-[350px] h-[200px]">
                                    <span class="font-semibold text-8xl mx-4">{{ $articles }}</span>
                                    <span class="text-right mx-4 text-4xl">Articles</span>
                                </div>
                            </a>
                        </div>

                        <div class="mt-4">
                            <div
                                class="card cursor-pointer flex flex-col justify-between py-4 mx-4 rounded-lg border border-gray-300 bg-gray-100 shadow-lg shadow-slate-400 text-black w-[350px] h-[200px]">
                                <span class="font-semibold text-8xl mx-4">{{ $comments }}</span>
                                <span class="text-right mx-4 text-4xl">Comments</span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
