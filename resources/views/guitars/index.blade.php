
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-x1 text-grey-800 leading-tight">
                {{__('All guitars')}}
            </h2>
        </x-slot>

    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of guitars:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($guitars as $guitar)

                            <x-guitar-card
                            :type="$guitar->type"
                            :colour="$guitar->colour"
                            :price="$guitar->price"
                            :brand="$guitar->brand"
                        />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->

