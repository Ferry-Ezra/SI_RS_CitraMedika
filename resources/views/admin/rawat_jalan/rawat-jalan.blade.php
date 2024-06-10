@extends('dashboard')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid mt-5">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Rawat Jalan</h1>
        <div class="d-flex">
            <a href="{{ route('rawat-jalan-report') }}" class="d-flex align-items-center btn-sm btn-success shadow-sm mr-4 px-3 py-2"><i
                    class='bx bxs-report mr-2'></i> Generate Report</a>
            <a href="{{ route('rawat-jalan-entry') }}"
                class="d-flex align-items-center btn-sm btn-primary shadow-sm px-3 py-2""><i class='bx bx-plus mr-2'></i></i> Add Data</a>
            </div>
            

        </div>

        <!-- DataTales Example -->
        <div class=" card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Rawat Jalan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tanggal Kunjung</th>
                                    <th>Diagnosis</th>
                                    <th>Biaya</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @forelse ($rawat_jalan as $data)
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->tanggal }}</td>
                                    <td>{{ $data->diagnosis }}</td>
                                    <td>{{ $data->biaya }}</td>
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
                                <div class="modal fade" id="target{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                <form action="{{ route('rawat-jalan-update',['id' => $data->id]) }}" method="post">
                                                    @csrf
                                                    <div class="mb-4">
                                                        <label for="tanggal" class="form-label">Tanggal Kunjung <span>*</span></label>
                                                        <input type="date" class="form-control input " id="tanggal" name="tanggal" placeholder="Masukkan Tanggal Kunjung"
                                                            required value="{{ $data->tanggal }}">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="diagnosis" class="form-label">Diagnosis <span>*</span></label>
                                                        <input type="text" class="form-control input " id="diagnosis" name="diagnosis" placeholder="Masukkan Diagnosis"
                                                            required value="{{ $data->diagnosis }}">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="biaya" class="form-label">Biaya <span>*</span></label>
                                                        <input type="number" class="form-control input " id="biaya" name="biaya" placeholder="Masukkan Biaya"
                                                            required value="{{ $data->biaya }}">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary py-2 px-5 rounded-3 w-100">Submit</button>
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
                                                <form action="{{ route('rawat-jalan-delete', ['id' => $data->id]) }}" method="delete">
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
                                    <td colspan="7" align="center">Tidak Ada Data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

        </div>

    </div>
    @endsection