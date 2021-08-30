<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            if ($e instanceof \ErrorException) {
                $this->reportarExceptionWebhook(request(), $e);
            }    
        });
    }

    public function reportarExceptionWebhook($request, $exception)
    {
        $url = $request->getHttpHost();
        $dominio = explode('.', $url);
        $permitir = true;
        
        if ($permitir) {
            $webhookurl = env('ERRORES_WEB_HOOK');
            $autor = $request->user() ? $request->user()->email : strtoupper($url);
            $errorMessage = $exception->getMessage();
            $errorMessage = str_replace('\\','\\\\', $errorMessage);
            $errorFile = $exception->getFile();
            $errorFile = str_replace('\\','\\\\', $errorFile);
            $errorRoute = $request->fullUrl();
            $errorLine = $exception->getLine();
            $timestamp = date("c", strtotime("now"));
            $json_data = json_encode([
                "username" => "Se ha detectado un nuevo error",
                "content" => "Error en [ ".$url." ]",
                "tts" => true,
                "embeds" => [
                    [
                        "title" => "[ ".$url." ]",
                        "type" => "rich",
                        "url" => "http://".$url,
                        "timestamp" => $timestamp,
                        "color" => hexdec( "ff0000" ),
                        "footer" => [
                            "text" => "Enviado desde $url ",
                            "icon_url" => "https://i.pinimg.com/originals/fa/4e/46/fa4e4672197c6991c48a6687e23cd999.jpg?size=375"
                        ],
                        "author" => [
                            "name" => "Enviado por: $autor",
                            "color" => hexdec( "000000" )
                        ],
                        "fields" => [
                            [
                                "name" => " __[  DESCRIPCIÓN DEL ERROR  ]__\n\n**Ruta del error** ",
                                "value" => $errorRoute,
                                "inline" => false
                            ],
                            [
                                "name" => "**Error**",
                                "value" => $errorMessage,
                                "inline" => false
                            ],
                            [
                                "name" => "**Archivo**",
                                "value" => $errorFile,
                                "inline" => false
                            ],
                            [
                                "name" => "**Linea**",
                                "value" => $errorLine,
                                "inline" => false
                            ],
                            [
                                "name" => "**Data**",
                                "value" => var_export($request->input(), true),
                                "inline" => false
                            ]
                        ]
                    ]
                ]

            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

            $ch = curl_init( $webhookurl );
            curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
            curl_setopt( $ch, CURLOPT_POST, 1);
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt( $ch, CURLOPT_HEADER, 0);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec( $ch );
            curl_close( $ch );
        }
    }

}
