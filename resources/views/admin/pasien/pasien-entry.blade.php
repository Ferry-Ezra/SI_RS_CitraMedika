@extends('dashboard')

@section('content')
<div class="container-fluid mt-5">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Data Pasien</h1>
    </div>


    <div class="form-add p-4 bg-white rounded-5 shadow mb-5">
        <form action="{{ route('pasien-store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="nama" class="form-label">Nama Pasien <span>*</span></label>
                <input type="text" class="form-control input " id="nama" name="nama" placeholder="Masukkan Nama Pasien"
                    required>
            </div>
            <div class="mb-4">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span>*</span></label>
                <input type="date" class="form-control input " id="tanggal_lahir" name="tanggal_lahir"
                    placeholder="Masukkan Tanggal Lahir" required>
            </div>
            <div class="mb-4">
                <label for="gender" class="form-label">Jenis Kelamin <span>*</span></label>
                <select class="form-control input" id="gender" name="gender">
                    <option value="" disabled selected id="defautlSelect">Pilih Jenis Kelamin
                    </option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control input id=" alamat" name="alamat" rows="5" placeholder="Masukkan Alamat"
                    required></textarea>
            </div>
            <button type="submit" class="btn btn-primary py-2 px-5 rounded-3 w-100">Submit</button>
        </form>
    </div>

</div>
@endsection
