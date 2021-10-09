<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Movie;
use Tests\TestCase;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MovieTest extends TestCase
{
    use RefreshDatabase;
    /**
     * These are mostly stubs to plan out what needs done.
     */

    /**
     * 
     * @test 
     */
    public function save_happy_path()
    {
        // needs to use the user to save the movie

        $user = User::factory()->create(); //


        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $input = [
                'title'         => 'star wars',
                'format'        => 'DVD',
                'length'        => 500,
                'release_year'  => 2018,
                'rating'        => 5,
            ];

        $response = $this->actingAs($user, 'api')->json(
            'POST',
            'api/movie',
            $input
        )
        ->assertCreated();

        $this->assertEquals(Arr::get($input, 'title'), $response->original->title);
        $this->assertEquals(Arr::get($input, 'format'), $response->original->format);
        $this->assertEquals(Arr::get($input, 'length'), $response->original->length);
        $this->assertEquals(Arr::get($input, 'release_year'), $response->original->release_year);
        $this->assertEquals(Arr::get($input, 'rating'), $response->original->rating);
    }
    /**
     * 
     * @test 
     */
    public function save_sad_path_no_title()
    {
        // needs to use the user to save the movie

        $user = User::factory()->create(); //


        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $input = [
                'format'        => 'DVD',
                'length'        => 500,
                'release_year'  => 2018,
                'rating'        => 5,
            ];

        $response = $this->actingAs($user, 'api')->json(
            'POST',
            'api/movie',
            $input
        )        
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY );
    }
    /**
     * 
     * @test 
     */
    public function save_sad_path_no_format()
    {
        // needs to use the user to save the movie

        $user = User::factory()->create(); //


        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $input = [
                'title'         => 'star wars',
                'length'        => 500,
                'release_year'  => 2018,
                'rating'        => 5,
            ];

        $response = $this->actingAs($user, 'api')->json(
            'POST',
            'api/movie',
            $input
        )
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY );
    }
    /**
     * 
     * @test 
     */
    public function save_sad_path_no_length()
    {
        // needs to use the user to save the movie

        $user = User::factory()->create(); //


        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $input = [
                'title'         => 'star wars',
                'format'        => 'DVD',
                'release_year'  => 2018,
                'rating'        => 5,
            ];

        $response = $this->actingAs($user, 'api')->json(
            'POST',
            'api/movie',
            $input
        )
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY );
    }
    /**
     * 
     * @test 
     */
    public function save_sad_path_no_release_year()
    {
        // needs to use the user to save the movie

        $user = User::factory()->create(); //


        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $input = [
                'title'         => 'star wars',
                'format'        => 'DVD',
                'length'        => 500,
                'rating'        => 5,
            ];

        $response = $this->actingAs($user, 'api')->json(
            'POST',
            'api/movie',
            $input
        )
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY );
    }
    /**
     * 
     * @test 
     */
    public function save_sad_path_no_rating()
    {
        // needs to use the user to save the movie

        $user = User::factory()->create(); //


        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $input = [
                'title'         => 'star wars',
                'format'        => 'DVD',
                'length'        => 500,
                'release_year'  => 2018,
            ];

        $response = $this->actingAs($user, 'api')->json(
            'POST',
            'api/movie',
            $input
        )
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY );
    }
    /**
     * 
     * @test 
     */
    public function save_sad_path_under_min_title()
    {
        // needs to use the user to save the movie

        $user = User::factory()->create(); //


        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $input = [
            'title'         => '',
            'format'        => 'DVD',
            'length'        => 500,
            'release_year'  => 2018,
            'rating'        => 5,
            ];

        $response = $this->actingAs($user, 'api')->json(
            'POST',
            'api/movie',
            $input
        )
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY );
    }
    /**
     * 
     * @test 
     */
    public function save_sad_path_under_max_title()
    {
        // needs to use the user to save the movie

        $user = User::factory()->create(); //


        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);


        $stupidlyLargeString = "gXGhCQlUCiBxWTkXdiSeOvMCHuINkYcsXmkxLrryJENLdEUeizSzBCWZnNqbRbdgbeZSdPdusKmibusMCDfhTMKcanIsdBSMHtjj
                                AsisiSCzbiKSSIgBmSJfooBRIBNpAOBsOKybMatieHAWUOrgQMbUwmVoZFvNVnscnDczESzlYQrrUoUnnDbKHyUaOnhRozRDGbfb
                                OSJLFhZqlpJbhqicCvruBDoXiAoYbPIJayhHEPMDbTNzNBQdaaJapUVGVJMJnHNcoIzOncstGGyWCJjFftcEhlqedgoMNjwYtHVF
                                QMrnodLqdUNEdGpQVsLNSWcJEHEzQBzfoIOcDOJhzEnEiciaKpIhcXYdQYyXpKDYjyAdivNRAiljSqjIOGdvAtnRdcLaNnIwcBAH
                                ZPomTxoSVOccqUWHMxXHSuSzVXIxvzwztWJRocTvrefuqHZjAYrOSQnSkcBSeravYfKAVFpLslgiKgrlaSYLpASOhIRPvEelIWpS
                                CDlmcuEZksAuSbPtXhso";

        $input = [
            'title'         => $stupidlyLargeString,
            'format'        => 'DVD',
            'length'        => 500,
            'release_year'  => 2018,
            'rating'        => 5,
            ];

        $response = $this->actingAs($user, 'api')->json(
            'POST',
            'api/movie',
            $input
        )
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY );
    }
    /**
     * 
     * @test 
     */
    public function save_sad_path_under_max_length()
    {
        // needs to use the user to save the movie

        $user = User::factory()->create(); //


        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $input = [
            'title'         => 'StarWars',
            'format'        => 'DVD',
            'length'        => 501,
            'release_year'  => 2018,
            'rating'        => 5,
            ];

        $response = $this->actingAs($user, 'api')->json(
            'POST',
            'api/movie',
            $input
        )
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY );
    }
    /**
     * 
     * @test 
     */
    public function save_sad_path_under_min_length()
    {
        // needs to use the user to save the movie

        $user = User::factory()->create(); //


        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $input = [
            'title'         => 'StarWars',
            'format'        => 'DVD',
            'length'        => -1,
            'release_year'  => 2018,
            'rating'        => 5,
            ];

        $response = $this->actingAs($user, 'api')->json(
            'POST',
            'api/movie',
            $input
        )
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY );
    }
    /**
     * 
     * @test 
     */
    public function save_sad_path_under_min_release_year()
    {
        // needs to use the user to save the movie

        $user = User::factory()->create(); //


        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $input = [
            'title'         => 'StarWars',
            'format'        => 'DVD',
            'length'        => 250,
            'release_year'  => 1799,
            'rating'        => 5,
            ];

        $response = $this->actingAs($user, 'api')->json(
            'POST',
            'api/movie',
            $input
        )
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY );
    }
    /**
     * 
     * @test 
     */
    public function save_sad_path_under_max_release_year()
    {
        // needs to use the user to save the movie

        $user = User::factory()->create(); //


        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $input = [
            'title'         => 'StarWars',
            'format'        => 'DVD',
            'length'        => 250,
            'release_year'  => 2101,
            'rating'        => 5,
            ];

        $response = $this->actingAs($user, 'api')->json(
            'POST',
            'api/movie',
            $input
        )
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY );
    }
    /**
     * 
     * @test 
     */
    public function save_sad_path_under_min_rating()
    {
        // needs to use the user to save the movie

        $user = User::factory()->create(); //


        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $input = [
            'title'         => 'StarWars',
            'format'        => 'DVD',
            'length'        => 250,
            'release_year'  => 1989,
            'rating'        => 0,
            ];

        $response = $this->actingAs($user, 'api')->json(
            'POST',
            'api/movie',
            $input
        )
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY );
    }
    /**
     * 
     * @test 
     */
    public function save_sad_path_under_max_rating()
    {
        // needs to use the user to save the movie

        $user = User::factory()->create(); //


        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $input = [
            'title'         => 'StarWars',
            'format'        => 'DVD',
            'length'        => 250,
            'release_year'  => 1989,
            'rating'        => 6,
            ];

        $response = $this->actingAs($user, 'api')->json(
            'POST',
            'api/movie',
            $input
        )
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY );
    }
    /**
     * 
     * @test 
     */
    public function save_sad_path_under_other_format()
    {
        // needs to use the user to save the movie

        $user = User::factory()->create(); //


        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $input = [
            'title'         => 'StarWars',
            'format'        => 'Blu-Ray',
            'length'        => 250,
            'release_year'  => 1989,
            'rating'        => 5,
            ];

        $response = $this->actingAs($user, 'api')->json(
            'POST',
            'api/movie',
            $input
        )
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY );
    }

    /**
     * 
     * @test 
     */
    public function index_happy_path()
    {
        // needs to use the user to see the movie
        $user = User::factory()->create(); //

        Movie::factory()->count(5)->create();

        $response = $this->actingAs($user, 'api')->json(
            'GET',
            'api/movie',
        )
        ->assertOk();

        $movies = Movie::all();

        for($i=0;$i<5;$i++) {
            $this->assertEquals($movies[$i]->title, $response->original[$i]->title);
            $this->assertEquals($movies[$i]->format, $response->original[$i]->format);
            $this->assertEquals($movies[$i]->length, $response->original[$i]->length);
            $this->assertEquals($movies[$i]->release_year, $response->original[$i]->release_year);
            $this->assertEquals($movies[$i]->rating, $response->original[$i]->rating);
        }
    }

    /**
     * 
     * @test 
     */
    public function update_happy_path()
    {
        // needs to use the user to update the movie

        $user = $this->makeUser(); //

        
        $movieData = [
            'title'         => 'star wars',
            'format'        => 'DVD',
            'length'        => 500,
            'release_year'  => 2018,
            'rating'        => 5,
        ];

        $movie = Movie::create($movieData);

        $change = [
            'title'         => 'star wars 2',
            'format'        => 'DVD',
            'length'        => 500,
            'release_year'  => 2018,
            'rating'        => 5,
        ];


        $response = $this->actingAs($user, 'api')->json(
            'PUT',
            'api/movie/'.$movie->id,
            $change
        )
        ->assertStatus(Response::HTTP_ACCEPTED);

        $movieCheck =  Movie::find($movie->id);

        $this->assertEquals(Arr::get($change, 'title'), $movieCheck->title);
        $this->assertEquals(Arr::get($change, 'format'), $movieCheck->format);
        $this->assertEquals(Arr::get($change, 'length'), $movieCheck->length);
        $this->assertEquals(Arr::get($change, 'release_year'), $movieCheck->release_year);
        $this->assertEquals(Arr::get($change, 'rating'), $movieCheck->rating);
    }

    private function makeUser()
    {
        return User::factory()->make();;
    } 
}
