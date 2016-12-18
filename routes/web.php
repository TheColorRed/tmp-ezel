<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Http\Request;

Route::get('/', function (Request $request) {

    // $oauth = __DIR__ . '/../resources/apis/client_secret_' . env('GOOGLE_CLIENT_ID') . '.json';

    // $client = new Google_Client(['client_id'=>env('GOOGLE_CLIENT_ID')]);
    // $client->setAuthConfig($oauth);
    // $client->setScopes('email');

    // $token = $client->fetchAccessTokenWithAuthCode('eyJhbGciOiJSUzI1NiIsImtpZCI6IjUyMGI0NjgyZWY0NTJkNGVmOWE5MTc4YTFhYTgyNDc1ZThmMDlhMjEifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwiaWF0IjoxNDgxOTkyNDgyLCJleHAiOjE0ODE5OTYwODIsImF0X2hhc2giOiJDS1B3azg0SXo1dXdYZjJldWkyUXNRIiwiYXVkIjoiNTk5MDA3MDQzOTU0LXRyMTI3Zjg5ZmQ4Mmk3cmRybWplMWlmYXE2a2ZkZXVhLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwic3ViIjoiMTA3NjA2MTU0Mjc5ODg0MTQzNzg0IiwiZW1haWxfdmVyaWZpZWQiOnRydWUsImF6cCI6IjU5OTAwNzA0Mzk1NC10cjEyN2Y4OWZkODJpN3Jkcm1qZTFpZmFxNmtmZGV1YS5hcHBzLmdvb2dsZXVzZXJjb250ZW50LmNvbSIsImVtYWlsIjoidW50dW5lZDIwQGdtYWlsLmNvbSIsIm5hbWUiOiJSeWFuIE5hZGR5IiwicGljdHVyZSI6Imh0dHBzOi8vbGgzLmdvb2dsZXVzZXJjb250ZW50LmNvbS8tUElWV25MZEpnV2cvQUFBQUFBQUFBQUkvQUFBQUFBQUFBRmMvT2N5ZnNMNGxfcjgvczk2LWMvcGhvdG8uanBnIiwiZ2l2ZW5fbmFtZSI6IlJ5YW4iLCJmYW1pbHlfbmFtZSI6Ik5hZGR5IiwibG9jYWxlIjoiZW4ifQ.cPPSH3AfmLwEAR5yPTUAruSE2GfWl96AxyDL1tZt9ItDtjB69RQ7ZGrSoI5SWDV4NJsiinuj1ejcK4_0cHxXHVzHghOmWA-OvBUp8VoFkyU0hyyNuvoGC8sYDcguECpNgw5WI81lUoAKtWexBwZ1tXLQ94yg4RVRjE-TxoDyUecjdHF3CpbHAncvklwnrsmm1FJbGiU5AVvrhWf3CLqzmHnUbJMhQhE-Hh1KBV6oQTWKARo6d6E6aK4wx5TT0BXsuCU5b3bjCXFZ0YR9xIzQBCCaJME8U9NzrHvA2FAGfKRuMDV6iiuK2Swfok8xtvm7wRXQ33oaEZ-EZB8XYJdwKQ');
    // $client->setAccessToken($token);

    // $payload = $client->verifyIdToken();

    // dd($payload);

    return view('welcome');
});

Route::post('/login', function (Request $request) {
    $client = new Google_Client(['client_id'=>env('GOOGLE_CLIENT_ID')]);
    $payload = $client->verifyIdToken($request->input('token'));
    if ($payload) {
        dd($payload);
    }
});

Route::get('glogin', array('as'=>'glogin','uses'=>'UserController@googleLogin')) ;
Route::get('google-user', array('as'=>'user.glist','uses'=>'UserController@listGoogleUser')) ;
