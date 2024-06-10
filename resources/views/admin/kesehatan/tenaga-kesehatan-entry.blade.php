@extends('dashboard')

@section('content')
<div class="container-fluid mt-5">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Data Tenaga Kesehatan</h1>
    </div>


    <div class="form-add p-4 bg-white rounded-5 shadow mb-5">
        <form action="{{ route('tenaga-kesehatan-store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="jenis" class="form-label">Jenis Tenaga Kesehatan <span>*</span></label>
                <select class="form-control input" id="jenis" name="jenis">
                    <option value="" disabled selected id="defautlSelect">Pilih Jenis Tenaga Kesehatan
                    </option>
                    <option value="Bidan">Bidan</option>
                    <option value="Perawat">Perawat</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="nama" class="form-label">Nama Tenaga Kesehatan <span>*</span></label>
                <input type="text" class="form-control input " id="nama" name="nama" placeholder="Masukkan Nama Kesehatan"
                    required>
            </div>
            <div class="mb-4">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control input id=" alamat" name="alamat" rows="5" placeholder="Masukkan Alamat"
                    required></textarea>
            </div>
            <div class="mb-4">
                <label for="telp" class="form-label">No. Telp <span>*</span></label>
                <input type="tel" class="form-control input " id="telp" name="telp" placeholder="Masukkan No. Telp"
                    required>
            </div>
            <button type="submit" class="btn btn-primary py-2 px-5 rounded-3 w-100">Submit</button>
        </form>
    </div>

</div>
@endsection
