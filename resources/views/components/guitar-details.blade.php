@props(['type','colour','brand', 'image', 'price'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 max-w-xl mx-auto">

    <h1 class="font-bold text-black-600 mb-2" style="font-size: 3rem;">{{$type }}</h1>
    <div class="overflow-hidden rounded-lg mb-4 flex justify-center">
        <img src="{{ asset('images/guitar/' .$image) }}" alt="{{$type}}" class="w-full max-w-xs h-auto object-cover">
    </div>

    <h3 class="text-gray-800 text-sm italic mb-2" style="font-size: 2rem">Brand</h3>
    <p class="text-gray-700 leading-relaxed">{{ $brand }}</p>
    <h3 class="text-gray-800 text-sm italic mb-2" style="font-size: 2rem">colour</h3>
    <p class="text-gray-700 leading-relaxed">{{ $colour }}</p>
</div>
