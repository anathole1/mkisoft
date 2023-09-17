<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Emails') }}
            </h2>

        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-splade-table :for="$contacts" >

            @cell('action', $contact)

                <Link class="text-red-600 hover:text-red-400 font-semibold" confirm="Delete email.." confirm-text="Are you sure?" confirm-button="Yes"
                cancel-button="Cancel" href="{{ route('contact.destroy',$contact->id) }}" method="DELETE"> Delete </Link>
            @endcell
        </x-splade-table>
        </div>
    </div>
</x-app-layout>
