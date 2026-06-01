<?php

namespace App\Http\Controllers;

use App\Models\SsoProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SsoController extends Controller
{
    public function redirect()
    {
        $query = http_build_query([
            'client_id' => env('OIDC_CLIENT_ID'),
            'redirect_uri' => env('OIDC_REDIRECT_URI'),
            'response_type' => 'code',
            'scope' => 'openid email profile',
        ]);

        return redirect(env('OIDC_ISSUER') . '/protocol/openid-connect/auth?' . $query);
    }

    public function callback()
    {
        $code = request('code');

        if (! $code) {
            abort(403, 'Authorization code not found.');
        }

        $tokenResponse = Http::asForm()->post(env('OIDC_ISSUER') . '/protocol/openid-connect/token', [
            'grant_type' => 'authorization_code',
            'client_id' => env('OIDC_CLIENT_ID'),
            'client_secret' => env('OIDC_CLIENT_SECRET'),
            'redirect_uri' => env('OIDC_REDIRECT_URI'),
            'code' => $code,
        ]);

        if (! $tokenResponse->successful()) {
            abort(403, 'Failed to get access token.');
        }

        $accessToken = $tokenResponse->json('access_token');

        $userInfoResponse = Http::withToken($accessToken)
        ->get(env('OIDC_ISSUER') . '/protocol/openid-connect/userinfo');

        if (! $userInfoResponse->successful()) {
            abort(403, 'Failed to get user info.');
        }

        $ssoUser = $userInfoResponse->json();

        $user = User::updateOrCreate(
            ['email' => $ssoUser['email']],
            [
                'name' => $ssoUser['name'] ?? $ssoUser['preferred_username'] ?? $ssoUser['email'],
                'password' => bcrypt(Str::random(32)),
                ]
            );

            Auth::login($user);

            return redirect()->intended('/dashboard');
        }

        public function receive(Request $request)
        {
            $request->validate([
                'ticket' => ['required', 'string'],
                'source' => ['required', 'string'],
            ]);

            $next = $request->query('next', '/dashboard');

            if (! str_starts_with($next, '/')) {
                $next = '/dashboard';
            }

            $source = Str::lower($request->source);

            $provider = SsoProvider::where('code', $source)
            ->where('is_active', true)
            ->firstOrFail();

            $verifyUrl = rtrim($provider->base_url, '/') . '/' . ltrim($provider->verify_path, '/');

            $response = Http::withHeaders([
                'X-SSO-Handoff-Secret' => $provider->secret,
                ])->post($verifyUrl, [
                    'ticket' => $request->ticket,
                ]);

                if (! $response->ok()) {
                    abort(403, 'Ticket tidak valid atau sudah expired.');
                }

                $ssoUser = $response->json();

                $user = User::updateOrCreate(
                    ['email' => $ssoUser['email']],
                    [
                        'name' => $ssoUser['name'] ?? $ssoUser['email'],
                        'password' => bcrypt(Str::random(32)),
                        ]
                    );

                    Auth::login($user);

                    $request->session()->regenerate();

                    return redirect($next);
                }
            }
