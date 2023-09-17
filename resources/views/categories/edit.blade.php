<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Category') }}
            </h2>
            <Link href=" {{ route('categories.index')}}" class="px-4 py-2 bg-slate-400 hover:bg-slate-600 text-slate-100 rounded-md flex ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                  </svg>
                Back
            </Link>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-splade-form :default="$category" method="PUT" :action="route('categories.update',$category->id)" class="max-w-md mx-auto p-4 bg-white rounded-md">
                <x-splade-input name="name" label="Name" />

                <x-splade-submit class="mt-2" />
            </x-splade-form>
        </div>
    </div>
</x-app-layout>
