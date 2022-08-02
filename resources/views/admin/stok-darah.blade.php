@extends('layouts.app')

@section('title', 'Stok Darah')

@section('content')
    <div class="row">
        <div class="col-sm-12 m-0 p-0">
            @if (Session::get('success'))
                <div class="alert alert-success alert-solid alert-dismissible fade show p-2 " role="alert">
                    <span>{{ Session::get('success') }}</span>
                    <button type="button" class="btn-close btn-close-white btn-sm pb-2" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h5 class="card-title">Stok Darah</h5>
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
                <div class="card-body" style="font-size: 14px;">
                    <div class="table-responsive">
                        <table id="table" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Skt.</th>
                                    <th>Tipe</th>
                                    <th>Golongan</th>
                                    <th>Rhesus Golongan</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse ($daftarSDarah as $sDarah )
                                    <tr>
                                        <td class="fw-bold">{{ $sDarah->tipe->skt_type }}</td>
                                        <td>{{ $sDarah->tipe->nm_type }}</td>
                                        <td>{{ $sDarah->golongan->nm_golongan }}</td>
                                        <td>{{ $sDarah->golongan->resus_golongan }}</td>
                                        <td>{{ $sDarah->jumlah }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-icon text-primary flex-end" data-bs-toggle="tooltip"
                                                title="" href="{{ route('stok.darah.edit', $sDarah->id) }}"
                                                data-bs-original-title="Edit">
                                                <span class="btn-inner">
                                                    <svg width="20" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341"
                                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z"
                                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </a>

                                            <a class="btn btn-sm btn-icon text-danger " data-bs-toggle="tooltip" title=""
                                                href="{{ route('stok.darah.hapus', $sDarah->id) }}"
                                                onclick="event.preventDefault();document.getElementById('delete{{ $loop->iteration }}').submit();"
                                                data-bs-original-title="Delete">
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

                                            <form action="{{ route('stok.darah.hapus', $sDarah->id) }}" method="POST"
                                                class="d-none" id="delete{{ $loop->iteration }}">
                                                @csrf @method('DELETE')
                                            </form>

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
                <div class="modal-body">
                    <form action="{{ route('stok.darah.tambah') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label class="form-label">Tipe</label>
                            <select name="tipe" class="form-select mb-3 shadow-none">
                                <option selected disabled>Pilih</option>

                                @foreach ($daftarTGDarah as $tGDarah)
                                    <option value="{{ $tGDarah->id }}">{{ $tGDarah->nm_type }}
                                        ({{ $tGDarah->skt_type }})</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Golongan</label>
                            <select name="golongan" class="form-select mb-3 shadow-none">
                                <option selected disabled>Pilih</option>

                                @foreach ($daftarGDarah as $gDarah)
                                    <option value="{{ $gDarah->id }}">
                                        {{ $gDarah->nm_golongan . ' ' . $gDarah->resus_golongan }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="jumlah">Jumlah</label>
                            <input type="text" class="form-control" name="jumlah" autocomplete="off">
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

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.css" />
@endpush

@push('js')

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "bSort": false
            });
        });
    </script>
@endpush
