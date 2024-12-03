@props(['action', 'method', 'artist'])

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
        <input type="text" name="name" id="name" value="{{ old('brand', $artist->description ?? '') }}" required
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
    </div>

    <div>
        <x-primary-button>
            {{ isset($artist) ? 'updated artist' : 'add artist' }}
        </x-primary-button>
    </div>
</form>
