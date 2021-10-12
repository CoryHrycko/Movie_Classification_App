<x-app-layout>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <button onclick="newMovie()"> Add New </button>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @foreach($movies as $movie)
            <div id="{{$movie->id}}" class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div x-cloak class="p-6 bg-white border-b border-gray-200">
                {{$movie->title}}  {{$movie->format}}  {{$movie->length}}  {{$movie->release_year}}   {{$movie->rating}} 
                <button class="focus:outline-none focus:ring-4 focus:ring-red-500 focus:ring-opacity-50"  onclick="deleteMovie({{$movie->id}})">delete</button>
                <button class="focus:outline-none focus:ring-4 focus:ring-green-500 focus:ring-opacity-50" onclick="editMovie({{$movie->id}})">Edit!</button>    
            </div>
            </div>
        @endforeach
        </div>
    </div>

    <script>

    // Healpers
    htmlTemplate = () => {
        return '<form id="myForm">' +
            '<div id="swal1-content" style="display: block;">Please enter the title</div>' +
			'<div><input type="text" id="swal-input-title" class="swal2-input"></div><br>' +
            '<div id="swal1-content" style="display: block;">Please enter format</div>' +
            '<div><input type="text" id="swal-input-format" class="swal2-input"></div><br>' +
            '<div id="swal1-content" style="display: block;">Please enter length</div>' +
            '<div><input type="text" id="swal-input-length" class="swal2-input"></div><br>' +
            '<div id="swal1-content" style="display: block;">Please enter Release Year</div>' +
			'<div><input type="text" id="swal-input-release" class="swal2-input"></div><br>' +
            '<div id="swal1-content" style="display: block;">Please enter personal rating</div>' +
			'<div><input type="text" id="swal-input-rating" class="swal2-input"></div><br>'+
            '</form>';
    }
    displayResults = (json,result) => {
        if (!json.hasOwnProperty('message')) {
            Swal.fire(
                `Movie ${result}!`,
                '',
                'success'
            );
                location.reload();
        } else {
            Swal.fire(
                'Warning!',
                json.message +
                'error'
            );
        }
    };
    elementTargets = () => {
        return JSON.stringify({
                        title: document.getElementById('swal-input-title').value,
                        format: document.getElementById('swal-input-format').value,
                        length: document.getElementById('swal-input-length').value,
                        release_year: document.getElementById('swal-input-release').value,
                        rating: document.getElementById('swal-input-rating').value,
                    });
    } 
    getHeaders = () => {
        return {
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        }
    }
    getListOfMovies = async () => {
        const location = window.location.hostname;
        const settings = {
            method: 'get',
            headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json',
            }
        };
        try {
            const fetchResponse = await fetch(`http://${location}/api/movie/`, settings);
            return await fetchResponse.json();
        } catch (e) {
            return e;
        }    
    }


    // Modals
    editMovie = async (id) => {
		const options = {
			title: 'Edit a Movie',
			icon: 'question',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			html: htmlTemplate(),
		};
		return Swal.fire(options).then(async (result) => {
			if (result.value) {
                const location = window.location.hostname;
                const settings = {
                    method: 'put',
                    headers: getHeaders(),
                    body: elementTargets()
                };
                try {
                    const fetchResponse = await fetch(`http://${location}/api/movie/${id}`, settings);
                    return await fetchResponse.json();
                } catch (e) {
                    return e;
                }    

            }
        })
        .then((json) => {
                displayResults(json, 'Edited');
            });
    }

    newMovie = async () => {
		const options = {
			title: 'Create a new Movie',
			icon: 'question',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			html: htmlTemplate(),
		};
		return Swal.fire(options).then(async (result) => {
			if (result.value) {
                const location = window.location.hostname;
                const settings = {
                    method: 'POST',
                    headers: getHeaders(),
                    body: elementTargets()
                };
                try {
                    const fetchResponse = await fetch(`http://${location}/api/movie/`, settings);
                    return await fetchResponse.json();
                } catch (e) {
                    return e;
                }    

            }
        })
            .then((json) => {
                displayResults(json, 'Created');
            });
    }

    deleteMovie = async (id) => {
		const options = {
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
		};
        return Swal.fire(options).then(async (result) => {
        const location = window.location.hostname;
        const settings = {
            method: 'DELETE',
            headers: getHeaders(),
        };
        if (result.value) {
            try {
                const fetchResponse = await fetch(`http://${location}/api/movie/${id}`, settings);
                return await fetchResponse.json();
            } catch (e) {
                return e;
            }
        }})   
        .then(async (json) => {
                displayResults(json, 'Deleted');
            }); 
    }
    </script>
</x-app-layout>