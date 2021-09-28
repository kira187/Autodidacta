<!DOCTYPE html>
<html class="loading" lang="es" data-textdirection="ltr">
  <head>
    <title>Autodidacta</title>
    @include('layouts.sections.styles')
    @livewireStyles
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-chat.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-chat-list.min.css') }}">
  </head>

  <body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="">
    @include('layouts.sections.header')

    @include('layouts.sections.menu')

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-body">
                <div class="chat-application">
                    <div class="content-area-wrapper container-xxl p-0">
                        <div class="sidebar-left">
                            <div class="sidebar">
                                <div class="sidebar-content">
                                    <div class="chat-fixed-search">
                                        <div class="d-flex align-items-center w-100">
                                            <livewire:chat.search-input /> 
                                        </div>
                                    </div>
                                    <livewire:chat.list-chats>
                                </div>
                            </div>
                        </div>
                        <div class="content-right">
                            <div class="content-wrapper container-xxl p-0">
                                <div class="content-header row"></div>
                                <div class="content-body">
                                    <div class="body-content-overlay"></div>
                                    <section class="chat-app-window">
                                        @if (isset($slot) && $slot != null )
                                            {{ $slot }}
                                        @else
                                            <div class="start-chat-area">
                                                <div class="mb-1 start-chat-icon">
                                                    <i data-feather="message-square"></i>
                                                </div>
                                                <h4 class="sidebar-toggle start-chat-text">Iniciar conversación</h4>
                                            </div>
                                        @endif
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.sections.footer')
    @livewireScripts
    <script src="{{ asset('app-assets/js/scripts/pages/app-chat.min.js') }}"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    @stack('js')
  </body>
</html>
