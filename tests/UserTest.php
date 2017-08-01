<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    #use WithoutMiddleware;
    #use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testNewUserRegistration()
    {
        $user = factory(App\User::class)->make();
	$this->visit('/register')
	     ->type($user->name, 'name')
	     ->type($user->email, 'email')
	     ->type($user->password, 'password')
	     ->type($user->password, 'password_confirmation')
	     ->press('Register')
	     ->seePageIs('/tasks')
	     ->visit('/logout'); // log out user
    }
}
