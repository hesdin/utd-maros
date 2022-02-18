@extends('layouts.app')

@push('styles')
    <style>
        .avatar {
            width: 30px;
            height: 30px;
            object-fit: cover;
            border-radius: 50%;
        }

    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @if (Session::get('success'))
                <div class="alert alert-success alert-solid alert-dismissible fade show p-2 " role="alert">
                    <span>{{ Session::get('success') }}</span>
                    <button type="button" class="btn-close btn-close-white btn-sm pb-2" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between flex-wrap">
                    <div class="header-title mt-2">
                        <h5 class="card-title">Pesan Masuk</h5>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive mt-4" style="font-size: 15px">
                        <table class="table table-striped mb-0" role="grid">
                            <thead>
                                <tr>
                                    <th>Avatar</th>
                                    <th>Pengirim</th>
                                    <th>Pesan Terakhir</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="user-list">
                                <tr>
                                    <td colspan="4" class="text-center">Loading...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            setInterval(() => {
                loadData()
            }, 1000)
        })

        function loadData() {
            $.ajax({
                type: 'GET',
                url: '{{ route('chat-user-data') }}',
                success: function(response) {
                    $("#user-list").html(response)
                }
            });
        }
    </script>
@endpush
