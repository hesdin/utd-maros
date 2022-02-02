@extends('layouts.app')

@section('title', 'Edit Stok Darah')

@section('content')
    <div class="row">
        <div class="col-xl-8 col-lg-8">

            @if (Session::get('fail'))
                <div class="alert alert-danger alert-solid alert-dismissible fade show p-2 " role="alert">
                    <span>{{ Session::get('fail') }}</span>
                    <button type="button" class="btn-close btn-close-white btn-sm pb-2" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h5 class="card-title">Edit Data</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="new-user-info">
                        <form action="{{ route('stok.darah.edit', $sDarah->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="form-group">
                                    <label class="form-label">Tipe</label>
                                    <select name="tipe" class="form-select mb-3 shadow-none">
                                        <option selected disabled>Pilih</option>

                                        @foreach ($daftarTGDarah as $tGDarah)
                                            <option value="{{ $tGDarah->id }}"
                                                {{ $sDarah->tipe_id == $tGDarah->id ? 'selected' : '' }}>
                                                {{ $tGDarah->nm_type }}
                                                ({{ $tGDarah->skt_type }})
                                            </option>

                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Golongan</label>
                                    <select name="golongan" class="form-select mb-3 shadow-none">
                                        <option selected disabled>Pilih</option>

                                        @foreach ($daftarGDarah as $gDarah)
                                            <option value="{{ $gDarah->id }}"
                                                {{ $sDarah->golongan_id == $gDarah->id ? 'selected' : '' }}>
                                                {{ $gDarah->nm_golongan . ' ' . $gDarah->resus_golongan }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="jumlah">Jumlah</label>
                                    <input type="text" class="form-control" name="jumlah" value="{{ $sDarah->jumlah }}">
                                </div>

                            </div>

                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            <a href="{{ route('stok.darah') }}" class="btn btn-sm btn-danger">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
