<div class="chat-app-form">
    <div class="input-group input-group-merge mr-1 form-send-message">
        <input wire:model="text" wire:keydown.enter="sendMessage" type="text"  id="message" class="form-control message {{ ($errors->has('text') ? 'is-invalid' : '')  }}" placeholder="Escribe un mensaje" />
    </div>
    @if (!empty($text))
        <button type="button" class="btn btn-primary send" wire:click="sendMessage">
            <i data-feather="send" class="d-lg-none"></i>
            <span class="d-none d-lg-block">Enviar</span>
        </button>
    @endif
</div>