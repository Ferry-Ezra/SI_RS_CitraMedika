@extends('dashboard')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid mt-5">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pemeriksaan</h1>
        <div class="d-flex">
            <a href="{{ route('pemeriksaan-report') }}" class="d-flex align-items-center btn-sm btn-success shadow-sm mr-4 px-3 py-2"><i
                    class='bx bxs-report mr-2'></i> Generate Report</a>
            <a href="{{ route('pemeriksaan-entry') }}"
                class="d-flex align-items-center btn-sm btn-primary shadow-sm px-3 py-2""><i class='bx bx-plus mr-2'></i></i> Add Data</a>
            </div>
            

        </div>

        <!-- DataTales Example -->
        <div class=" card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pemeriksaan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Dokter</th>
                                    <th>Nama Tenaga Kesehatan</th>
                                    <th>Nama Pasien</th>
                                    <th>Tanggal</th>
                                    <th>Diagnosa</th>
                                    <th>Perawatan ID</th>
                                    <th>Nama Obat</th>
                                    <th>Rencana</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @forelse ($pemeriksaan as $data)
                                    <td>{{ $data->id }}</td>
                                    @foreach ($dokter as $item)
                                    <td>{{ $item->nama }}</td>
                                    @endforeach
                                    @foreach ($tenagaKesehatan as $item)
                                    <td>{{ $item->nama }}</td>
                                    @endforeach
                                    @foreach ($pasien as $item)
                                    <td>{{ $item->nama }}</td>
                                    @endforeach
                                    <td>{{ $data->tanggal_pemeriksaan }}</td>
                                    <td>{{ $data->diagnosa }}</td>
                                    @foreach ($perawatan as $item)
                                    <td>{{ $item->id }}</td>
                                    @endforeach
                                    @foreach ($obat as $item)
                                    <td>{{ $item->nama }}</td>
                                    @endforeach
                                    <td>{{ $data->rencana_perawatan }}</td>

                                    <td class="d-flex align-items-center justify-content-center">
                                        <button class="btn btn-primary px-4 mr-3" data-toggle="modal"
                                            data-target="#target{{ $data->id }}">
                                            Edit
                                        </button>
                                        <button type="submit" class="btn btn-danger delete-btn" data-toggle="modal"
                                            data-target="#delete{{ $data->id }}">Delete</button>
                                    </td>
                                </tr>
                                {{-- Modal Edit --}}
                                <div class="modal fade" id="target{{ $data->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data</h1>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('pemeriksaan-update',['id' => $data->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    <div class="mb-4">
                                                        <label for="dokter_id" class="form-label">Nama Dokter
                                                            <span>*</span></label>
                                                        <select class="form-control input" id="dokter_id" name="dokter_id">
                                                            <option value="" disabled selected id="defautlSelect">Pilih
                                                               Dokter
                                                            </option>
                                                            @foreach ($dokter as $item)
                                                            <option value="{{ $item->id }}" {{ $data->dokter_id == $item->id ? 'selected' : '' }}>{{ $item->nama }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="tenaga_kesehatan_id" class="form-label">Nama Tenaga Kesehatan
                                                            <span>*</span></label>
                                                        <select class="form-control input" id="tenaga_kesehatan_id" name="tenaga_kesehatan_id">
                                                            <option value="" disabled selected id="defautlSelect">Pilih
                                                                Tenaga Kesehatan
                                                            </option>
                                                            @foreach ($tenagaKesehatan as $item)
                                                            <option value="{{ $item->id }}" {{ $data->tenaga_kesehatan_id == $item->id ? 'selected' : '' }}>{{ $item->nama }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="pasien_id" class="form-label">Nama Pasien
                                                            <span>*</span></label>
                                                        <select class="form-control input" id="pasien_id" name="pasien_id">
                                                            <option value="" disabled selected id="defautlSelect">Pilih
                                                                Pasien
                                                            </option>
                                                            @foreach ($pasien as $item)
                                                            <option value="{{ $item->id }}" {{ $data->pasien_id == $item->id ? 'selected' : '' }}>{{ $item->nama }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="tanggal_pemeriksaan" class="form-label">Tanggal Pemeriksaan <span>*</span></label>
                                                        <input type="date" class="form-control input" id="tanggal_pemeriksaan" name="tanggal_pemeriksaan" placeholder="Masukkan Tanggal Pemeriksaan" required value="{{ $data->tanggal_pemeriksaan }}">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="diagnosa" class="form-label">Diagnosa <span>*</span></label>
                                                        <input type="text" class="form-control input" id="diagnosa" name="diagnosa" placeholder="Masukkan Diagnosa" required value="{{ $data->diagnosa }}">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="perawatan_id" class="form-label">Jenis Perawatan
                                                            <span>*</span></label>
                                                        <select class="form-control input" id="perawatan_id" name="perawatan_id">
                                                            <option value="" disabled selected id="defautlSelect">Pilih
                                                                Jenis Perawatan
                                                            </option>
                                                            @foreach ($perawatan as $item)
                                                            <option value="{{ $item->id }}" {{ $data->perawatan_id == $item->id ? 'selected' : '' }}>{{ $item->id }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="obat_id" class="form-label">Nama Obat
                                                            <span>*</span></label>
                                                        <select class="form-control input" id="obat_id" name="obat_id">
                                                            <option value="" disabled selected id="defautlSelect">Pilih
                                                                Obat
                                                            </option>
                                                            @foreach ($obat as $item)
                                                            <option value="{{ $item->id }}" {{ $data->obat_id == $item->id ? 'selected' : '' }}>{{ $item->nama }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="rencana_perawatan" class="form-label">Rencana Perawatan <span>*</span></label>
                                                        <input type="date" class="form-control input" id="rencana_perawatan" name="rencana_perawatan" placeholder="Masukkan Rencana Perawatan" required value="{{ $data->rencana_perawatan }}">
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-primary py-2 px-5 rounded-3 w-100">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- End Modal Edit --}}

                                {{-- Modal Delete --}}
                                <div class="modal delete fade" id="delete{{ $data->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div
                                                class="modal-body d-flex flex-column align-items-center justify-content-center">
                                                <img src="{{ asset('img/ask.png') }}" width="300">
                                                <h1 class="fs-2 text-center fw-semibold text-black-50">Are you sure
                                                    wan't to delete this data?
                                                </h1>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary border-0 px-4"
                                                    data-bs-dismiss="modal" style="background-color: #d33">No</button>
                                                <form action="{{ route('pemeriksaan-delete', ['id' => $data->id]) }}"
                                                    method="delete">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary border-0 px-4"
                                                        style="background-color: #3085d6">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- End Modal Delete --}}
                                @empty
                                <tr>
                                    <td colspan="10" align="center">Tidak Ada Data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

        </div>

    </div>
    @endsection
