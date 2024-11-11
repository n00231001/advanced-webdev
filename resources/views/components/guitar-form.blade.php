@props(['action', 'method', 'guitar'])

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

        <label for="Colour" class="block text-sm font-medium text-gray-700">Brand</label>
        <input type="text" name="brand" id="brand" value="{{ old('brand', $guitar->brand ?? '') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus-indigo-500 focus: border-indigo-500" />
        @error('brand')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror

        <label for="Colour" class="block text-sm font-medium text-gray-700">Price</label>
        <input type="number" name="price" id="price" value="{{ old('price', $guitar->price ?? '') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus-indigo-500 focus: border-indigo-500" />
        @error('price')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror

        <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
        <input type="text" name="type" id="type" value="{{ old('type', $guitar->type ?? '') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus-indigo-500 focus: border-indigo-500" />
        @error('title')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
        <label for="Colour" class="block text-sm font-medium text-gray-700">Colour</label>
        <input type="text" name="colour" id="colour" value="{{ old('colour', $guitar->colour ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus-indigo-500 focus: border-indigo-500" />
        @error('title')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Guitar image</label>
            <input type="file" name="image" id="image" {{ isset($guitar) ? '' : 'required' }}
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
            @error('image')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div>
        <x-primary-button>
            {{ isset($guitar) ? 'updated guitar' : 'add guitar' }}
        </x-primary-button>
    </div>
</form>
