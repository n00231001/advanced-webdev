@props(['action', 'method', 'artist', 'guitars', 'artistsGuitars'])


<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mb-4">

        <label for="Colour" class="block text-sm font-medium text-gray-700">name</label>
        <input type="text" name="name" id="name" value="{{ old('brand', $artist->name ?? '') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus-indigo-500 focus: border-indigo-500" />
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror

        <label for="Colour" class="block text-sm font-medium text-gray-700">Description</label>
        <input type="text" name="description" id="name" value="{{ old('brand', $artist->description ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus-indigo-500 focus: border-indigo-500" />
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">artist image</label>
            <input type="file" name="image" id="image" {{ isset($artist) ? '' : 'required' }}
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
            @error('image')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- guitars = ALL guitars, not necessarily owned -->
        <!-- artistsGuitars = ONLY the guitars owned by the artist we're currently editing -->
        @foreach ($guitars as $guitar)


            <!-- first argument of this function = the thing you want to search for -->
            <!-- second argument = the array to search in -->
            <!-- so, we want to see if this guitar we're currently looking at inside this array (of ALL guitars) is currently an owned guitar -->
            <!-- is so, we should show a CHECKED checkbox. otherwise, show an UNCHECKED checkbox -->


                @if (isset( $artistsGuitars) && in_array($guitar->id, $artistsGuitars))
                    <input checked="true" type="checkbox" name="guitars[]" value="{{ $guitar->id }}">
                    <label for="{{ $guitar->id }}">{{ $guitar->brand }} {{ $guitar->type }}</label><br>

                @else
                    <input type="checkbox" name="guitars[]" value="{{ $guitar->id }}">
                    <label for="{{ $guitar->id }}">{{ $guitar->brand }} {{ $guitar->type }}</label><br>
                @endif
        @endforeach

    </div>

    <div>
        <x-primary-button class="bg-gradient-to-r from-orange-400 bg-gradient-to-r from-cyan-500 to-red-500">
            {{ isset($artist) ? 'updated artist' : 'add artist' }}
        </x-primary-button>
    </div>
</form>
