@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/chat.css') }}">
@endpush

@section('content')
    <div id="chat-container">
        <div id="header" class="bg-primary">
            <img src="{{ asset('f/avatar/' . $data->foto) }}" alt="avatar" class="avatar">
            <div class="col">
                <div class="text-white">{{ $data->nama }}</div>
                <div class="text-white">{{ $data->email }}</div>
            </div>
        </div>
        <div id="MessageList">

        </div>
        <div id="footer">
            <form action="" method="POST" onsubmit="sendChat(event)">
                <div class="form-group row m-0">
                    <div class="col-10 col-md-11">
                        <input type="text" class="form-control" placeholder="Aa" autocomplete="off" name="pesan" id="pesan"
                            required>
                    </div>
                    <button class="btn btn-primary px-0 col-2 col-md-1">
                        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21.4274 2.5783C20.9274 2.0673 20.1874 1.8783 19.4974 2.0783L3.40742 6.7273C2.67942 6.9293 2.16342 7.5063 2.02442 8.2383C1.88242 8.9843 2.37842 9.9323 3.02642 10.3283L8.05742 13.4003C8.57342 13.7163 9.23942 13.6373 9.66642 13.2093L15.4274 7.4483C15.7174 7.1473 16.1974 7.1473 16.4874 7.4483C16.7774 7.7373 16.7774 8.2083 16.4874 8.5083L10.7164 14.2693C10.2884 14.6973 10.2084 15.3613 10.5234 15.8783L13.5974 20.9283C13.9574 21.5273 14.5774 21.8683 15.2574 21.8683C15.3374 21.8683 15.4274 21.8683 15.5074 21.8573C16.2874 21.7583 16.9074 21.2273 17.1374 20.4773L21.9074 4.5083C22.1174 3.8283 21.9274 3.0883 21.4274 2.5783Z"
                                fill="currentColor"></path>
                            <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd"
                                d="M3.01049 16.8079C2.81849 16.8079 2.62649 16.7349 2.48049 16.5879C2.18749 16.2949 2.18749 15.8209 2.48049 15.5279L3.84549 14.1619C4.13849 13.8699 4.61349 13.8699 4.90649 14.1619C5.19849 14.4549 5.19849 14.9299 4.90649 15.2229L3.54049 16.5879C3.39449 16.7349 3.20249 16.8079 3.01049 16.8079ZM6.77169 18.0003C6.57969 18.0003 6.38769 17.9273 6.24169 17.7803C5.94869 17.4873 5.94869 17.0133 6.24169 16.7203L7.60669 15.3543C7.89969 15.0623 8.37469 15.0623 8.66769 15.3543C8.95969 15.6473 8.95969 16.1223 8.66769 16.4153L7.30169 17.7803C7.15569 17.9273 6.96369 18.0003 6.77169 18.0003ZM7.02539 21.5683C7.17139 21.7153 7.36339 21.7883 7.55539 21.7883C7.74739 21.7883 7.93939 21.7153 8.08539 21.5683L9.45139 20.2033C9.74339 19.9103 9.74339 19.4353 9.45139 19.1423C9.15839 18.8503 8.68339 18.8503 8.39039 19.1423L7.02539 20.5083C6.73239 20.8013 6.73239 21.2753 7.02539 21.5683Z"
                                fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        setInterval(() => {
            loadData()
        }, 1000);

        function loadData() {
            $.ajax({
                type: 'GET',
                url: '{{ route('chat-data', $data->id) }}',
                success: function(response) {
                    $("#MessageList").html(response)
                }
            });
        }

        function scroll() {
            $("#MessageList").scrollTop($("#MessageList")[0].scrollHeight);
        }

        function sendChat(e) {
            e.preventDefault()
            let pesan = $('#pesan').val()
            $.ajax({
                url: "{{ route('chat-send', $data->id) }}",
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'pesan': pesan,
                },
                success: function(response) {
                    if (response == 200) {
                        loadData()
                        scroll()
                    }
                    $('#pesan').val("")
                }
            })
        }
    </script>
@endpush
