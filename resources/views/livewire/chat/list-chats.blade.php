<div id="users-list" class="chat-user-list-wrapper list-group">
    <h4 class="chat-list-title">Chats</h4>
    <ul class="chat-users-list chat-list media-list">
      @php
            dd($chats);
      @endphp
      @foreach ((array)$chats as $chat)
        <li>
          <a href="{{ route('chat', ['id' => $chat->id])}}" class="d-flex justify-content-between">
            <span class="avatar"><img src="../../../app-assets/images/portrait/small/avatar-s-3.jpg" height="42" width="42" alt="Generic placeholder image" />
              <span class="avatar-status-offline"></span>
            </span>
            <div class="chat-info flex-grow-1">
              <h5 class="mb-0">Elizabeth Elliott</h5>
              <p class="card-text text-truncate"> Cake pie jelly jelly beans. Marzipan lemon drops halvah cake. Pudding cookie lemon drops icing</p>
            </div>
            <div class="chat-meta text-nowrap">
              <small class="float-right mb-25 chat-time">4:14 PM</small>
              <span class="badge badge-danger badge-pill float-right">3</span>
            </div>
          </a>
        </li>
      @endforeach
      <li class="no-results">
        <h6 class="mb-0">Sin resultados</h6>
      </li>
    </ul>
    <h4 class="chat-list-title">Instructores</h4>
    <ul class="chat-users-list contact-list media-list">
      @foreach ((array)$contacts as $contact)    
        <li>
          <a href="#" class="d-flex justify-content-start">
            <span class="avatar" ><img src="../../../app-assets/images/portrait/small/avatar-s-7.jpg" height="42" width="42" alt="Generic placeholder image" />
            </span>
            <div class="chat-info">
              <h5 class="mb-0">Jenny Perich</h5>
              <p class="card-text text-truncate">
                Tart dragée carrot cake chocolate bar. Chocolate cake jelly beans caramels tootsie roll candy canes.
              </p>
            </div>
          </a>
        </li>
      @endforeach
      <li class="no-results">
        <h6 class="mb-0">Sin resultados</h6>
      </li>
    </ul>
</div>