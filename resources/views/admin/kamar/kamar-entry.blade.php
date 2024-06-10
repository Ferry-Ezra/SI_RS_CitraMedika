@extends('dashboard')

@section('content')
<div class="container-fluid mt-5">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Data Kamar</h1>
    </div>


    <div class="form-add p-4 bg-white rounded-5 shadow mb-5">
        <form action="{{ route('kamar-store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="jenis" class="form-label">Jenis Ruangan <span>*</span></label>
                <select class="form-control input" id="jenis" name="jenis">
                    <option value="" disabled selected id="defautlSelect">Pilih Jenis Ruangan
                    </option>
                    <option value="ICU">ICU</option>
                    <option value="IGD">IGD</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="kapasitas" class="form-label">Kapasitas <span>*</span></label>
                <input type="number" class="form-control input " id="kapasitas" name="kapasitas" placeholder="Masukkan Kapasitas Kamar"
                    required>
            </div>
            <div class="mb-4">
                <label for="no_kamar" class="form-label">No. Kamar <span>*</span></label>
                <input type="number" class="form-control input " id="no_kamar" name="no_kamar" placeholder="Masukkan No. Kamar"
                    required>
            </div>
            <div class="mb-4">
                <label for="status" class="form-label">Status Ketersediaan <span>*</span></label>
                <select class="form-control input" id="status" name="status">
                    <option value="" disabled selected id="defautlSelect">Pilih Status Ketersediaan
                    </option>
                    <option value="Tersedia">Tersedia</option>
                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="keterangan" class="form-label">Keterangan <span>*</span></label>
                <input type="text" class="form-control input " id="keterangan" name="keterangan" placeholder="Masukkan Keterangan Kamar"
                    required>
            </div>
            <button type="submit" class="btn btn-primary py-2 px-5 rounded-3 w-100">Submit</button>
        </form>
    </div>

</div>
@endsection
