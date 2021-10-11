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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div x-cloak class="p-6 bg-white border-b border-gray-200">
                {{$movie->title}}  {{$movie->format}}  {{$movie->length}}  {{$movie->release_year}}   {{$movie->rating}} <button onclick="deleteMovie({{$movie->id}})">delete</button>
                <button onclick="getListOfMovies()">Movies!</button>    
                <button onclick="editMovie({{$movie->id}})">Edit!</button>    
            </div>
            </div>
        @endforeach
        </div>
    </div>

    <script>

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
            const data = await fetchResponse.json();
            return data;
        } catch (e) {
            return e;
        }    
    }

    editMovie = async (id) => {
		const options = {
			title: 'Edit a Client',
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
                    headers: {
                        Accept: 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        title: document.getElementById('swal-input-title').value,
                        format: document.getElementById('swal-input-format').value,
                        length: document.getElementById('swal-input-length').value,
                        release_year: document.getElementById('swal-input-release').value,
                        rating: document.getElementById('swal-input-rating').value,
                    })
                };
                try {
                    const fetchResponse = await fetch(`http://${location}/api/movie/`.id, settings);
                    const data = await fetchResponse.json();
                    return data;
                } catch (e) {
                    return e;
                }    

            }
        })
                    .then((json) => {
					if (!json.hasOwnProperty('message')) {
						Swal.fire(
							'Movie Created!',
							'',
							'success'
						);
                        location.reload();
					} else {
                        console.log(json.hasOwnProperty('message'))
						Swal.fire(
							'Warning!',
							json.message +
							'error'
						);
					}
				});
    }
    

    newMovie = async () => {
		const options = {
			title: 'Create a new Client',
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
                    headers: {
                        Accept: 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        title: document.getElementById('swal-input-title').value,
                        format: document.getElementById('swal-input-format').value,
                        length: document.getElementById('swal-input-length').value,
                        release_year: document.getElementById('swal-input-release').value,
                        rating: document.getElementById('swal-input-rating').value,
                    })
                };
                try {
                    const fetchResponse = await fetch(`http://${location}/api/movie/`, settings);
                    const data = await fetchResponse.json();
                    return data;
                } catch (e) {
                    return e;
                }    

            }
        })
                    .then((json) => {
					if (!json.hasOwnProperty('message')) {
						Swal.fire(
							'Movie Created!',
							'',
							'success'
						);
                        location.reload();
					} else {
                        console.log(json.hasOwnProperty('message'))
						Swal.fire(
							'Warning!',
							json.message +
							'error'
						);
					}
				});
    }

    deleteMovie = async (id) => {
        const location = window.location.hostname;
        const settings = {
            method: 'DELETE',
            headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json',
            }
        };
        try {
            const fetchResponse = await fetch(`http://${location}/api/movie/`.id, settings);
            const data = await fetchResponse.json();
            return data;
        } catch (e) {
            return e;
        }    
    }
    </script>
</x-app-layout>