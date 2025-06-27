<?php

namespace Tests\Unit;

use App\Http\Controllers\ProfileController;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Mockery;
use Tests\TestCase;

class ProfileControllerTest extends TestCase
{
    public function test_update_profile_sets_email_verified_at_null_if_email_is_dirty()
    {
        $userMock = Mockery::mock();
        $userMock->shouldReceive('fill')->once();
        $userMock->shouldReceive('isDirty')->with('email')->once()->andReturn(true);
        $userMock->email_verified_at = now(); // old value
        $userMock->shouldReceive('save')->once();

        $requestMock = Mockery::mock(ProfileUpdateRequest::class);
        $requestMock->shouldReceive('validated')->andReturn(['email' => 'new@example.com']);
        $requestMock->shouldReceive('user')->andReturn($userMock);

        $controller = new ProfileController();

        $response = $controller->update($requestMock);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('profile.edit'), $response->getTargetUrl());
    }

    public function test_destroy_profile_logs_out_and_deletes_user()
    {
        $userMock = Mockery::mock();
        $userMock->shouldReceive('delete')->once();

        $sessionMock = Mockery::mock(\Illuminate\Session\Store::class);
        $sessionMock->shouldReceive('invalidate')->once();
        $sessionMock->shouldReceive('regenerateToken')->once();

        $requestMock = Mockery::mock(Request::class);
        $requestMock->shouldReceive('validateWithBag')
            ->once()
            ->with('userDeletion', ['password' => ['required', 'current_password']]);

        $requestMock->shouldReceive('user')->andReturn($userMock);
        $requestMock->shouldReceive('session')->andReturn($sessionMock);

        Auth::shouldReceive('logout')->once();

        $controller = new ProfileController();

        $response = $controller->destroy($requestMock);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(url('/'), $response->getTargetUrl());
    }


    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
