<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{

    /**
     * These are mostly stubs to plan out what needs done.
     * user needs done first
     */


    public function test_register_new_user_happy_path()
    {
        $this->postJson('/api/user', ['name' => 'Sally'])
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }

    public function test_register_old_user_should_fail()
    {
        $this->postJson('/api/user', ['name' => 'Sally'])
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }
    
    public function test_login_user_happy_path()
    {
        $this->postJson('/api/login', ['name' => 'Sally'])
            ->assertStatus(200);
    }
}
