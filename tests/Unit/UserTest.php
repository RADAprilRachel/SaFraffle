<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    private function pageAuth($role, $page, $status)
    {
        $user = factory(User::class)->create();
        $user->role = $role;
        $response = $this->actingAs($user)
                         ->get($page);
        $response->assertStatus($status);
    }

    public function testUserPolicyOnUserIndexGuest()
    {
        $response = $this->call('GET', 'users');
        $response->assertStatus(403);
    }

    public function testUserPolicyOnUserIndexEditor()
    {
        $this->pageAuth('editor', 'users', 403);
    }

    public function testUserPolicyOnUserIndexAdmin()
    {
        $this->pageAuth('admin', 'users', 200);
    }

    public function testUserPolicyOnUserEditGuest()
    {
        $response = $this->call('GET', 'users/1/edit');
        $response->assertStatus(403);
    }

    public function testUserPolicyOnUserEditEditor()
    {
        $this->pageAuth('editor', 'users/1/edit', 403);
    }

    public function testUserPolicyOnUserEditAdmin()
    {
        $this->pageAuth('admin', 'users/1/edit', 200);
    }

}
