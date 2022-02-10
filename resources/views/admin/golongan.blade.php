@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between flex-wrap">
                    <div class="header-title mt-2">
                        <h5 class="card-title">Golongan Darah</h5>
                    </div>

                    <div class="">
                        <a class=" text-center btn btn-sm btn-danger btn-icon mt-lg-0 mt-md-0 mt-3" data-bs-toggle="modal"
                            data-bs-target="#tambah">
                            <i class="btn-inner">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </i>
                            <span>Tambah</span>
                        </a>
                    </div>

                </div>
                <div class="card-body p-0">
                    <div class="table-responsive mt-4" style="font-size: 15px">
                        <table id="basic-table" class="table table-striped mb-0" role="grid">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Rhesus</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $golongan)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <p>{{ $golongan->nm_golongan }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="fw-bold">{{ $golongan->resus_golongan }}</div>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-icon text-danger" data-bs-toggle="tooltip" title=""
                                                href="{{ route('golongan.hapus', $golongan->id) }}"
                                                onclick="event.preventDefault();document.getElementById('delete{{ $loop->iteration }}').submit();"
                                                data-bs-original-title="Delete">
                                                <form action="{{ route('golongan.hapus', $golongan->id) }}" method="POST"
                                                    class="d-none" id="delete{{ $loop->iteration }}">@csrf @method('DELETE')</form>
                                                <span class="btn-inner">
                                                    <svg width="20" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                        <path
                                                            d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826"
                                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path d="M20.708 6.23975H3.75" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path
                                                            d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973"
                                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}

    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('golongan.tambah') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label" for="nama">Nama Golongan</label>
                            <input type="text" class="form-control" name="nama" placeholder="Contoh: AB" autocomplete="off" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="resus">Rhesus Golongan</label>
                            <select name="resus" id="resus" class="form-select mb-3 shadow-none" required>
                                <option selected disabled>Pilih</option>
                                <option value="Positif (+)">Positif (+)</option>
                                <option value="Negatif (-)">Negatif (-)</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
