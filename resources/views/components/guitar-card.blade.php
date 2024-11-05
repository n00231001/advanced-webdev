

@props(['type', 'price', 'colour', 'brand', 'image'])

<div>
    <div class="border rounded-lg shadow lg shadow-md p-6 bg-white hover:shadow-lg transistion duration-300">
        <h4 class="font-bold text-lg">{{$type}}</h4>

        <p class="text-gray-600">{{{ $brand }}}</p>
        <p class="text-gray-800 mt-4">{{$price}}</p>
        <p class="text-gray-800 mt-4">{{$colour}}</p>
        <img src="{{asset( 'image/' .$image)}}" alt="{{$type}}">
</div>
