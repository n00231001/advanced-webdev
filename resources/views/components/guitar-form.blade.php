@props(['action', 'method', 'guitar'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($emthod)
    @endif

    <div class="mb-4">
        <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('title' , $guitar->name ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus-indigo-500 focus: border-indigo-500"
            />
        @error("name")
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
        <label for="Colour" class="block text-sm font-medium text-gray-700">Colour</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('title' , $guitar->name ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus-indigo-500 focus: border-indigo-500"
            />
        @error("name")
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>


        @isset($guitar->image)
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Guitar image</label>
            <input
            type="file"
            name="image"
            id="image"
            {{ isset($guitar) ? "" : 'required'}}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
            @error('image')
            <p class="text-sm text-red-600">{{$message}}</p>
            @enderror
        </div>
        @endisset

        @isset($guitar->image)
        <div class="mb-4">
            <img src="{{asset($guitar->image)}}" alt="guitar image" class="w-24 h-32 object-cover">
        </div>
        @endisset

        <div>
            <x-primary-button>
                {{ isset($guitar) ? 'updated guitar' : 'add guitar' }}
            </x-primary-button>
        </div>
    </form>
