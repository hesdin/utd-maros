@extends('layouts.app')

@section('title', 'Data Pendonor')

@section('content')
    <div class="row">
        <div class="col-sm-12 m-0 p-0">
            @if (Session::get('success'))
                <div class="alert alert-success alert-solid alert-dismissible fade show p-2 " role="alert">
                    <span>{{ Session::get('success') }}</span>
                    <button type="button" class="btn-close btn-close-white btn-sm pb-2" data-bs-dismiss="alert"
                        aria-label="Close">
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h5 class="card-title">Data Pendonor</h5>
                    </div>

                    {{-- <div class="">
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
                    </div> --}}

                </div>
                <div class="card-body" style="font-size: 14px;">
                    <div class="table-responsive">
                        <table id="table" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>JK</th>
                                    <th>No HP</th>
                                    <th>Gol. Darah</th>
                                    <th>Rhesus</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse ($dPendonor as $pendonor )
                                    <tr>
                                        <td class="fw-bold">{{ $pendonor->user->nama }}</td>
                                        <td>{{ $pendonor->user->jk }}</td>
                                        <td>{{ $pendonor->no_hp }}</td>
                                        <td>{{ $pendonor->golongan->nm_golongan }}</td>
                                        <td>{{ $pendonor->golongan->resus_golongan }}</td>

                                        <td>

                                            <a class="btn btn-sm btn-icon text-danger " data-bs-toggle="tooltip" title=""
                                                href="{{ route('data.pendonor.hapus', $pendonor->id) }}"
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

                                            <form action="{{ route('data.pendonor.hapus', $pendonor->id) }}" method="POST"
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
