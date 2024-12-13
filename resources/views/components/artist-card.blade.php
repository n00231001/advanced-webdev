@props(['name', 'image', 'description'])

    <div class="border rounded-lg shadow lg shadow-md p-6 bg-white hover:shadow-lg transistion duration-300 bg-gradient-to-r bg-gradient-to-r from-blue-900 to-purple-900 text-white">
        <h4 class="font-bold text-lg ">{{$name}}</h4>

        <img src="{{asset( 'images/artists/' .$image)}}" alt="{{$name}}">
        <p class="text-white-800 mt-4">{{$description}}</p>
    </div>
