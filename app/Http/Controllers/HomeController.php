<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;

class HomeController extends Controller
{
    public function __invoke()
    {
        $courses = Course::whereStatus(3)->latest('id')->limit(8)->get();

        return view('welcome', compact('courses'));
    }

    public function getPlayListDetail($playListId)
    {
        $url = 'https://www.googleapis.com/youtube/v3/playlists?id='.$playListId.'&key=';
        $response = $this->consultaYoutube($url, true);
        
        $instructor = $response->items[0]->snippet->channelTitle;
        $tituloCurso = $response->items[0]->snippet->title;
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $tituloCurso);
        
        $url = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet%2C+id&playlistId='.$playListId.'&key=';
        $response = $this->consultaYoutube($url, false);
        
        $user = User::create([
            'name' => $instructor,
            'email' => trim($instructor).'@instructor.com',
            'password' => bcrypt(123)
        ]);

        $curso = Course::Create([
            'title' => $tituloCurso,
            'subtitle' => 'lorem ipsun',
            'description' => 'lorem ipsun',
            'status' => 3,
            'slug' => $slug,
            'user_id' => $user->id,
            'level_id' => rand(1,3),
            'category_id' => rand(1,3),
            'price_id' => 1,
        ]);
        // titulo, slug, subitulo, descripcion del curso, categoria, nivel, precio, imagen, 
        //secciones > lecciones > nombre, plataforma, url > descripcion, recursos
        //metas del curso
        //requerimientos del curso
        //audiencia del curso
        //poner como aprobado
        
        $videos = array();

        foreach ($response->items as $video) {
            $currentVideo =  array(
                'titulo' => $video->snippet->title,
                'descripcion' => $video->snippet->description,
                'video_id' => $video->snippet->resourceId->videoId,
                'posicion_list' => $video->snippet->position,
            );
            array_push($videos, $currentVideo);
        }

        if (isset($response->nextPageToken)) {
            $totalResults = $response->pageInfo->totalResults;
            $iteracions = intval(ceil($totalResults / 50 ));
            $nextPageToken = $response->nextPageToken;

            for ($i=1; $i < $iteracions; $i++){
                $url = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet%2C+id&pageToken='.$nextPageToken.'&playlistId='.$playListId.'&key=';
    
                $response = $this->consultaYoutube($url, false);

                foreach ($response->items as $video) {
                    $currentVideo =  array(
                        'titulo' => $video->snippet->title,
                        'descripcion' => $video->snippet->description,
                        'video_id' => $video->snippet->resourceId->videoId,
                        'posicion_list' => $video->snippet->position,
                    );
                    array_push($videos, $currentVideo);
                }
            }
        }

        return $videos;
    }

    public function consultaYoutube($url, $onlyInfo)
    {
        $token = 'AIzaSyBrwwpU68mK88ZLoL3gzu1caizA3sRTYnw';

        if ($onlyInfo == true) {
            $url = $url . $token . '&part=id,snippet&fields=items(snippet(title,channelTitle))';
        } else {
            $url = $url . $token.'&fields=nextPageToken,items(snippet(title,description,channelTitle,position,resourceId(videoId))),pageInfo(totalResults)&maxResults=50';
        }
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response);

    }

    public function getYoutubeDuration() {
        $url = '<iframe width="560" height="315" src="https://www.youtube.com/embed/tDgFOKvQajg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        $matches = array();
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $matches);
        $video_id = $matches[1];

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
        $time = $this->convertFormatTime($response->items[0]->contentDetails->duration);
        return $time;
    }

    function convertFormatTime($youtube_time){
        if($youtube_time) {
            $start = new \DateTime('@0');
            $start->add(new \DateInterval($youtube_time));
            $youtube_time = $start->format('H:i:s');
        }
        
        return $youtube_time;
    }
}
