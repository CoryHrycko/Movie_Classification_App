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
                'format'        => 'dvd',
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
                'format'        => 'dvd',
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
                'format'        => 'dvd',
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
                'format'        => 'dvd',
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
                'format'        => 'dvd',
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
    public function index_happy_path()
    {
        // needs to use the user to see the movie
        $user = User::factory()->create(); //

        $response = $this->actingAs($user, 'api')->json(
            'GET',
            'api/movie',
        )
        ->assertOk();
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
            'format'        => 'dvd',
            'length'        => 500,
            'release_year'  => 2018,
            'rating'        => 5,
        ];

        $movie = Movie::create($movieData);

        $change = [
            'title'         => 'star wars 2',
            'format'        => 'Blue-Ray',
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
