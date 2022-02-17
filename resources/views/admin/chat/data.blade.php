@foreach ($data as $pesan)
    <div class="message {{ $pesan->pengirim == 'admin' ? 'me' : '' }}">
        <div class="message-item col">
            <div class="bubble">
                <span>{{ $pesan->pesan }}</span>
            </div>
            <small
                class="d-block">{{ $pesan->sentAt }}</small>
        </div>
    </div>
@endforeach
