<div class="active-chat">
    <!-- Chat Header -->
    <div class="chat-navbar">
        <header class="chat-header">
            <div class="d-flex align-items-center">
                <div class="sidebar-toggle d-block d-lg-none mr-1">
                    <i data-feather="menu" class="font-medium-5"></i>
                </div>
                @if (isset($user))
                    <div class="avatar avatar-border m-0 mr-1">
                        <img src="{{ $user->profile_photo_url }}" alt="avatar" height="36" width="36" />
                        <span class="avatar-status-online"></span>
                    </div>
                    <div>
                        <h6 class="mb-0">{{ $user->name }}</h6>
                        <div class="hidden" id="content-typing">
                            <small class="text-muted" id="user-typing" ></small>
                        </div>
                    </div>
                @else
                    <div class="avatar avatar-border m-0 mr-1">
                        <img src="{{ $chat->user_receiver->id == Auth::user()->id ? $chat->user_sender->profile_photo_url : $chat->user_receiver->profile_photo_url }}" alt="avatar" height="36" width="36" />
                        <span class="avatar-status-online"></span>
                    </div>
                    <div>
                        <h6 class="mb-0">{{ $chat->user_receiver->id == Auth::user()->id ? $chat->user_sender->name : $chat->user_receiver->name }}</h6>
                        <div class="" id="content-typing">
                            <small class="text-muted" id="user-typing" ></small>
                        </div>
                    </div>
                @endif
            </div>
            <div class="d-flex align-items-center">
                <i data-feather="search" class="cursor-pointer d-sm-block d-none font-medium-2"></i>
                <div class="dropdown">
                    <button class="btn-icon btn btn-transparent hide-arrow btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                        <i data-feather="more-vertical" id="chat-header-actions" class="font-medium-2"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="chat-header-actions">
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
        @if(isset($user))
            <div class="start-chat-area">
                <div class="mb-1 start-chat-icon">
                    <i data-feather="message-square"></i>
                </div>
                <h4 class="sidebar-toggle start-chat-text">Iniciar conversación</h4>
            </div>
        @else
            @foreach ($chat->messages as $message)
                <div class="chats">
                    <div class="chat {{ $message->user_id != Auth::user()->id ? 'chat-left' : ''}}">
                        <div class="chat-avatar">
                            <span class="avatar box-shadow-1 cursor-pointer">
                                <img src="{{ $message->user->profile_photo_url }}" alt="avatar" height="36" width="36" />
                            </span>
                        </div>
                        <div class="chat-body">
                            <div class="chat-content">
                                <p> {{ $message->message }} </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <!-- Submit Chat form -->
    @livewire('chat.message-input', ['userChatId' => $userChatId])
    <!--/ Submit Chat form -->
</div>

@push('js')
    <script>
        const userTyping = document.querySelector('#user-typing');
        const contentTyping = document.querySelector('#content-typing');
        const inputMessage = document.querySelector('#message');
        const chatId = {!! isset($user) ? $user->id : $chat->id !!};
        
        var pusher = new Pusher('7e09772448daeb317034', {
        cluster: 'us2'
        });

        var channel = pusher.subscribe('chat-channel');
        channel.bind('chat-event', function(data) {
            window.livewire.emit('reciveMessage');
        });

        inputMessage.addEventListener('keyup', (event) => {
            const chat = Echo.private(`chat.${chatId}`);

            setTimeout(() => {
                chat.whisper('typing', {
                    user : {!! auth()->user()->id !!},
                    typing: true,
                    chatId: chatId
                });
            }, 300);
        });

        Echo.private(`chat.${chatId}`)
        .listenForWhisper('typing', (e) => {
            if(e.chatId === chatId){
                console.log(e);
                userTyping.innerHTML = `Escribiendo ...`;
                e.typing ? contentTyping.style.display = "block" : contentTyping.style.display = "none";

                setTimeout(() => {
                    contentTyping.style.display = "none";
                }, 3000);
            }
        });
    </script>
@endpush