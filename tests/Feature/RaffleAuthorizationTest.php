<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RaffleAuthorizationTest extends TestCase
{
    private function pageAuth($role, $page, $status)
    {
        $user = factory(User::class)->create();
        $user->role = $role;
        $response = $this->actingAs($user)
                         ->get($page);
        $response->assertStatus($status);
    }

    public function testRafflePolicyOnRaffleIndexGuest()
    {
        $response = $this->call('GET', 'raffles');
        $response->assertStatus(403);
    }

    public function testRafflePolicyOnRaffleIndexEditor()
    {
        $this->pageAuth('editor', 'raffles', 200);
    }

    public function testRafflePolicyOnRaffleIndexAdmin()
    {
        $this->pageAuth('admin', 'raffles', 200);
    }

    public function testRafflePolicyOnRaffleEditGuest()
    {
        $response = $this->call('GET', 'raffles/1/edit');
        $response->assertStatus(403);
    }

    public function testRafflePolicyOnRaffleEditEditor()
    {
        $this->pageAuth('editor', 'raffles/1/edit', 200);
    }

    public function testRafflePolicyOnRaffleEditAdmin()
    {
        $this->pageAuth('admin', 'raffles/1/edit', 200);
    }

}
