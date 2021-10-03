<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Category;
use App\Models\Level;
use App\Models\Price;
use App\Models\Goal;
use App\Models\Section;
use App\Models\Audience;
use App\Models\Requirement;
use App\Models\Lesson;
use App\Models\Description;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function __invoke()
    {
        $courses = Course::whereStatus(3)->latest('id')->with(['teacher', 'image'])->get();

        return view('welcome', compact('courses'));
    }

    public function getPlayListDetail($playListId)
    {
        $url = 'https://www.googleapis.com/youtube/v3/playlists?id='.$playListId.'&key=';
        $response = $this->consultaYoutube($url, true);
        
        $instructor = $response->items[0]->snippet->channelTitle;
        $tituloCurso = $response->items[0]->snippet->title;
        
        $url = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet%2C+id&playlistId='.$playListId.'&key=';
        $response = $this->consultaYoutube($url, false);
        

        $categories = Category::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');
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

        return view('youtube.form-playlist', compact('videos', 'categories', 'levels', 'prices', 'tituloCurso', 'instructor'));
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

    public function saveCourse(Request $request)
    {   
        $request->validate([
            'title' => 'required|min:10',
            'slug' => 'required|unique:courses',
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'file' => 'image',
            'nombre_instructor' => 'required',
            'correo_instructor' => 'required',
            'password' => 'required',
            'secciones' => 'required',
            'metas' => 'required',
            'requerimientos' => 'required',
            'audiencia' => 'required',
        ]);

        $user = User::create([
            'name' => $request->nombre_instructor,
            'email' => trim($request->nombre_instructor).'@instructor.com',
            'password' => bcrypt($request->password)
        ]);

        $curso = Course::Create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'status' => 3,
            'slug' => $request->slug,
            'user_id' => $user->id,
            'level_id' => $request->level_id,
            'category_id' => $request->category_id,
            'price_id' => 1,
        ]);

        $curso->status = 3;
        $curso->save();

        if ($request->file('file')) {
            $url = Storage::put('courses', $request->file('file'));

            $curso->image()->create([
                'url' => $url
            ]);
        }
        
        if ($request->secciones[0] != null) {
            foreach ($request->secciones as $seccion) {
                $seccion = Section::create([
                    'name' => $seccion,
                    'course_id' => $curso->id
                ]);
            }
        }

        if ($request->metas[0] != null) {
            foreach ($request->metas as $meta) {
                $meta = Goal::create([
                    'name' => $meta,
                    'course_id' => $curso->id
                ]);
            }
        }

        if ($request->requerimientos[0] != null) {
            foreach ($request->requerimientos as $requerimiento) {
                $requerimiento = Requirement::create([
                    'name' => $requerimiento,
                    'course_id' => $curso->id
                ]);
            }
        }

        if ($request->audiencia[0] != null) {
            foreach ($request->audiencia as $audiencia) {
                $audiencia = Audience::create([
                    'name' => $audiencia,
                    'course_id' => $curso->id
                ]);
            }
        }

        $sections = Section::where('course_id', $curso->id)->pluck( 'id');
        for ($i=0; $i < count($request->video_id); $i++) {
            $leccion = Lesson::create([
                'name' => $request->titulo[$i],
                'url' => 'https://www.youtube.com/watch?v='.$request->video_id[$i],
                'iframe' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$request->video_id[$i].'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
                'platform_id' => 1,
                'section_id' => $sections[$request->section_id[$i]-1]
            ]);
            
            Description::create([
                'name' => substr($request->description_video[$i],0,250),
                'lesson_id' => $leccion->id
            ]);
        }

        return redirect(route('home'));
    }
}