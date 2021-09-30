<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
    public function __invoke()
    {
        $courses = Course::whereStatus(3)->latest('id')->limit(8)->get();

        return view('welcome', compact('courses'));
    }

    public function getPlayListDetail()
    {
        $url = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet%2C+id&playlistId=PLhSj3UTs2_yVoP9-88WZI3HBS25vP6KoD&key=AIzaSyBrwwpU68mK88ZLoL3gzu1caizA3sRTYnw';

        $nextPageToken = 'EAAaBlBUOkNBVQ'; //obtenido de la primera url en el campo nextPageToken
        $nextPage = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet%2C+id&pageToken='.$nextPageToken.'&playlistId=PLhSj3UTs2_yVoP9-88WZI3HBS25vP6KoD&key=AIzaSyBrwwpU68mK88ZLoL3gzu1caizA3sRTYnw';
    }

    public function getYoutubeDuration() {
        $video_id = 'gagwW_wjeLE';
        $token = 'AIzaSyBrwwpU68mK88ZLoL3gzu1caizA3sRTYnw';
        
        $url = 'https://www.googleapis.com/youtube/v3/videos?part=contentDetails&id='.$video_id.'&key='.$token;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);
        
        // response()->json($response->items);
        $time = $this->covtime($response->items[0]->contentDetails->duration);
        return $time;
    }

    function covtime($youtube_time){
        if($youtube_time) {
            $start = new \DateTime('@0');
            $start->add(new \DateInterval($youtube_time));
            $youtube_time = $start->format('H:i:s');
        }
        
        return $youtube_time;
    }
}
