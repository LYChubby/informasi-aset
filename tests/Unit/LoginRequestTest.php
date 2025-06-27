<?php

namespace Tests\Unit;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class LoginRequestTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        RateLimiter::clear('farras@example.com|127.0.0.1'); // Clear throttle key sebelum tiap test
    }

    public function test_authenticate_successful()
    {
        $request = LoginRequest::create('/login', 'POST', [
            'email' => 'farras@example.com',
            'password' => 'password',
        ]);
        $request->setLaravelSession(app('session.store')); // ✅ fix
        $request->setUserResolver(fn () => null);
        $request->setMethod('POST');
        $request->server->set('REMOTE_ADDR', '127.0.0.1');

        RateLimiter::shouldReceive('tooManyAttempts')
            ->once()
            ->andReturn(false);

        Auth::shouldReceive('attempt')
            ->once()
            ->with(['email' => 'farras@example.com', 'password' => 'password'], false)
            ->andReturn(true);

        RateLimiter::shouldReceive('clear')
            ->once();

        $request->authenticate();

        $this->assertTrue(true); // ✅ Jika sampai sini, tidak ada exception = lolos
    }

    public function test_authenticate_failed_should_throw_validation_exception()
    {
        $this->expectException(ValidationException::class);

        $request = LoginRequest::create('/login', 'POST', [
            'email' => 'farras@example.com',
            'password' => 'wrongpassword',
        ]);
        $request->setMethod('POST');
        $request->server->set('REMOTE_ADDR', '127.0.0.1');

        // ✅ Tambahkan ini supaya RateLimiter tidak error
        RateLimiter::shouldReceive('tooManyAttempts')
            ->once()
            ->andReturn(false);

        RateLimiter::shouldReceive('hit')
            ->once();

        Auth::shouldReceive('attempt')
            ->once()
            ->andReturn(false);

        $request->authenticate();
    }

    public function test_ensure_is_not_rate_limited_allows_login_if_under_limit()
    {
        $request = LoginRequest::create('/login', 'POST', [
            'email' => 'farras@example.com',
        ]);
        $request->server->set('REMOTE_ADDR', '127.0.0.1');

        RateLimiter::shouldReceive('tooManyAttempts')
            ->once()
            ->andReturn(false);

        $request->ensureIsNotRateLimited();

        $this->assertTrue(true);
    }

    public function test_ensure_is_not_rate_limited_throws_exception_if_exceeded()
    {
        $this->expectException(ValidationException::class);

        $request = LoginRequest::create('/login', 'POST', [
            'email' => 'farras@example.com',
        ]);
        $request->server->set('REMOTE_ADDR', '127.0.0.1');

        RateLimiter::shouldReceive('tooManyAttempts')
            ->once()
            ->andReturn(true);

        RateLimiter::shouldReceive('availableIn')
            ->once()
            ->andReturn(60);

        Event::fake([Lockout::class]);

        $request->ensureIsNotRateLimited();
    }
}
