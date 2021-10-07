<?php

namespace Tests\Unit;

use Tests\TestCase;

class MovieTest extends TestCase
{

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

        $user = $this->makeUser(); //

        $response = $this->actingAs($user, 'api')->json(
            'POST',
            'api/movie',
            ['data' => $input]
        )
        
        ->assertCreated();
    }

    /**
     * 
     * @test 
     */
    public function index_happy_path()
    {
        // needs to use the user to see the movie

        $user = $this->makeUser(); //

        $response = $this->actingAs($user, 'api')->json(
            'GET',
            'api/movie',
        );
    }

    /**
     * 
     * @test 
     */
    public function update_happy_path()
    {
        // needs to use the user to update the movie

        $user = $this->makeUser(); //

        $response = $this->actingAs($user, 'api')->json(
            'POST',
            'api/movie',
            ['data' => $input]
        );
    }

    private function makeUser()
    {
        return factory(\App\Users::class)->make();
    } 
}
