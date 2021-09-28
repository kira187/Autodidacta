<div class="active-chat">
    <!-- Chat Header -->
    <div class="chat-navbar">
        <header class="chat-header">
            <div class="d-flex align-items-center">
                <div class="sidebar-toggle d-block d-lg-none mr-1">
                    <i data-feather="menu" class="font-medium-5"></i>
                </div>
                @if (isset($chat))
                    <div class="avatar avatar-border m-0 mr-1">
                        <img src="{{ $chat->user_receiver->id == Auth::user()->id ? $chat->user_sender->profile_photo_url : $chat->user_receiver->profile_photo_url }}" alt="avatar" height="36" width="36" />
                        <span class="avatar-status-busy"></span>
                    </div>
                    <h6 class="mb-0">{{ $chat->user_receiver->id == Auth::user()->id ? $chat->user_sender->name : $chat->user_receiver->name }}</h6>
                @else
                    <div class="avatar avatar-border m-0 mr-1">
                        <img src="{{ $user->profile_photo_url }}" alt="avatar" height="36" width="36" />
                        <span class="avatar-status-busy"></span>
                    </div>
                    <h6 class="mb-0">{{ $user->name }}</h6>
                @endif
            </div>
            <div class="d-flex align-items-center">
                <i data-feather="search" class="cursor-pointer d-sm-block d-none font-medium-2"></i>
                <div class="dropdown">
                    <button class="btn-icon btn btn-transparent hide-arrow btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                        <i data-feather="more-vertical" id="chat-header-actions" class="font-medium-2"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="chat-header-actions">
                        <a class="dropdown-item" href="javascript:void(0);">View Contact</a>
                        <a class="dropdown-item" href="javascript:void(0);">Mute Notifications</a>
                        <a class="dropdown-item" href="javascript:void(0);">Block Contact</a>
                        <a class="dropdown-item" href="javascript:void(0);">Clear Chat</a>
                        <a class="dropdown-item" href="javascript:void(0);">Report</a>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <!--/ Chat Header -->                
    <!-- User Chat messages -->
    <div class="user-chats">
        @if(isset($chat))    
            <div class="chats">
                <div class="chat">
                    <div class="chat-avatar">
                        <span class="avatar box-shadow-1 cursor-pointer">
                            <img src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="36" width="36" />
                        </span>
                    </div>
                    <div class="chat-body">
                        <div class="chat-content">
                            <p>How can we help? We're here for you! 😄</p>
                        </div>
                    </div>
                </div>
                <div class="chat chat-left">
                    <div class="chat-avatar">
                        <span class="avatar box-shadow-1 cursor-pointer">
                            <img src="../../../app-assets/images/portrait/small/avatar-s-7.jpg" alt="avatar" height="36" width="36" />
                        </span>
                    </div>
                    <div class="chat-body">
                        <div class="chat-content">
                            <p>Hey John, I am looking for the best admin template.</p>
                            <p>Could you please help me to find it out? 🤔</p>
                        </div>
                        <div class="chat-content">
                            <p>It should be Bootstrap 4 compatible.</p>
                        </div>
                    </div>
                </div>
                {{-- <div class="divider">
                    <div class="divider-text">Yesterday</div>
                </div> --}}
            </div>
        @else
            <h1>Sin mensajes</h1>
        @endif
    </div>
    <!-- Submit Chat form -->
    @livewire('chat.message-input', ['userChatId' => $userChatId])
    <!--/ Submit Chat form -->
</div>

@push('js')
    <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('7e09772448daeb317034', {
        cluster: 'us2'
        });

        var channel = pusher.subscribe('chat-channel');
        channel.bind('chat-event', function(data) {
        alert(JSON.stringify(data));
        });
    </script>
@endpush