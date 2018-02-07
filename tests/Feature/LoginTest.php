<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class LoginTest.
 *
 * @package Tests\Feature
 */
class LoginTest extends TestCase
{

    /**
     * @test
     */
    public function see_login_page()
    {
        $this->
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('login');

    }

    /**
     * @test
     */
    public function login_in_with_github()
    {
        $user = factory(User::class)->create([
            'stripe_account_id' => null,
            'stripe_access_token' => null,
        ]);
        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->clickLink('sign in with Github')
                ->assertUrlIs('https://connect.stripe.com/oauth/authorize')
                ->assertQueryStringHas('response_type', 'code')
                ->assertQueryStringHas('scope', 'read_write')
                ->assertQueryStringHas('client_id', config('services.stripe.client_id'))
                ->clickLink("Skip this account form")
                ->assertRouteIs('backstage.concerts.index');
            tap($user->fresh(), function ($user) {
                $this->assertNotNull($user->stripe_account_id);
                $this->assertNotNull($user->stripe_access_token);
                $connectedAccount = \Stripe\Account::retrieve(null, [
                    'api_key' => $user->stripe_access_token
                ]);
                $this->assertEquals($connectedAccount->id, $user->stripe_account_id);
            });
        });
    }
}
