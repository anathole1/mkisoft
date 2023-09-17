<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Our History') }}
            </h2>
            <Link href=" {{ route('abouts.create') }}" class="px-4 py-2 bg-indigo-400 hover:bg-indigo-600 text-white rounded-md flex ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>

                New History
            </Link>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-splade-table :for="$abouts" striped>

            @cell('action', $about)
                <Link href="{{ route('abouts.edit', $about->id) }}" class="font-semibold text-green-600 hover:text-green-400 mx-4">
                    Edit
                </Link> &nbsp;
                <Link class="text-red-600 hover:text-red-400 font-semibold" confirm="Delete History.." confirm-text="Are you sure?" confirm-button="Yes"
                    cancel-button="Cancel" href="{{ route('abouts.destroy',$about->id) }}" method="DELETE"> Delete </Link>
            @endcell
        </x-splade-table>

        </div>

    </div>
</x-app-layout>
