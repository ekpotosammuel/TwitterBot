<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\Models\User;

class SocialMediaController extends Controller
{
    public function twitterConnect()
    {
        $callback = route('twitter.callback');
        // $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token, $access_token_secret);
        // $content = $connection->get("account/verify_credentials"); 
        $connect = new TwitterOAuth(env('API_KEY'), env('API_SECRET_KEY'));
        $accToken = $connect->oauth('oauth/request_token', ['oauth_callback' => $callback]);
        $route = $connect->url('oauth/authorize', ['oauth_token' => $accToken['oauth_token']]);
        // dd($connect);
        return redirect($route);
    }

    public function twitterCallback(Request $request)
    {
        // dd($request->all());
        $response = $request->all();
        $oauth_token = $response['oauth_token'];
        $oauth_verifier = $response['oauth_verifier'];
        $connect = new TwitterOAuth(env('API_KEY'), env('API_SECRET_KEY'), $oauth_token, $oauth_verifier);
        $details = $connect->oauth('oauth/access_token', ['oauth_verifier' => $oauth_verifier]);
        // dd($details);
        $already_exist = User::where("twitter_id", $details['user_id'])->first();
        if ($already_exist == null) {
            $user = User::create(
                [
                    'twitter_id' => $details['user_id'],
                    'name' => $details['screen_name'],
                ]
            );
            $user->save();
        }
        dd($details);
    }
}
