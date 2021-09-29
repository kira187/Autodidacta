<div id="users-list" class="chat-user-list-wrapper list-group">
    <h4 class="chat-list-title">Chats</h4>
    <ul class="chat-users-list chat-list media-list">
      @if (count($chats) > 0)
        @foreach ($chats as $chat)
          <li>
            <a href="{{ route('chat', ['id' => $chat->id])}}" class="d-flex justify-content-between">
              <span class="avatar"><img src="{{ $chat->user_receiver->id == $currentUser ? $chat->user_sender->profile_photo_url : $chat->user_receiver->profile_photo_url }}" height="42" width="42" />
                <span class="avatar-status-offline"></span>
              </span>
              <div class="chat-info flex-grow-1">
                <h5 class="mb-0">{{ $chat->user_receiver->id == $currentUser ? $chat->user_sender->name : $chat->user_receiver->name }}</h5>
                <p class="card-text text-truncate"> {{ $chat->messages[0]->message }} </p>
              </div>
              <div class="chat-meta text-nowrap">
                <small class="float-right mb-25 chat-time"> {{ 'Hace '.str_replace('después', '', \Carbon\Carbon::now()->diffForHumans($chat->messages[0]->send_date)) }} </small>
                {{-- <span class="badge badge-danger badge-pill float-right">3</span> --}}
              </div>
            </a>
          </li>
        @endforeach
      @endif
      <li class="no-results">
        <h6 class="mb-0">Sin resultados</h6>
      </li>
    </ul>
    <h4 class="chat-list-title">Instructores</h4>
    <ul class="chat-users-list contact-list media-list">
      @if (count($contacts) > 0)
        @foreach ($contacts as $contact)
          <li>
            <a href="{{ route('chat', ['id' => $contact->id])}}" class="d-flex justify-content-start">
              <span class="avatar" ><img src="{{ $contact->profile_photo_url }}" height="42" width="42" alt="Generic placeholder image" />
              </span>
              <div class="chat-info">
                <h5 class="mb-0">{{ $contact->name }}</h5>
                <p class="card-text text-truncate">
                  Tart dragée carrot cake chocolate bar. Chocolate cake jelly beans caramels tootsie roll candy canes.
                </p>
              </div>
            </a>
          </li>
        @endforeach
      @endif
      <li class="no-results">
        <h6 class="mb-0">Sin resultados</h6>
      </li>
    </ul>
</div>