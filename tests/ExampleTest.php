<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Flyers');
    }

    public function anotherOKMethod()
    {
        $this->call('GET', '/');

        $this->assertResponseOk();
    }

    public function user_can_register()
    {
        $this->visit('GET', 'auth/register');

        $this->assertResponseOk();

        $this->submitForm(
            ['name'=>'xavier',
             'email'=>'mind.dev@gmail.com',
             'password'=>Hash::make('aaa000'),
             'confirm_pssword'=>Hash::make('aaa000')
            ]);
        $this->assertRedirectedTo('/');
    }
    public function user_can_login_and_logout()
    {

    }
}
