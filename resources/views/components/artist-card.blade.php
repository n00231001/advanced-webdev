@props(['name', 'image', 'description'])


    <div class="border rounded-lg shadow lg shadow-md p-6 bg-white hover:shadow-lg transistion duration-300">
        <h4 class="font-bold text-lg">{{$name}}</h4>

        <img src="{{asset( 'images/artist/' .$image)}}" alt="{{$name}}">
        <p class="text-gray-800 mt-4">{{$description}}</p>
    </div>
