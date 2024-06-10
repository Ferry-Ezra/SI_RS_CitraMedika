@extends('dashboard')

@section('content')
<div class="container-fluid mt-5">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Data Obat</h1>
    </div>


    <div class="form-add p-4 bg-white rounded-5 shadow mb-5">
        <form action="{{ route('obat-store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="nama" class="form-label">Nama Obat <span>*</span></label>
                <input type="text" class="form-control input " id="nama" name="nama" placeholder="Masukkan Nama Obat"
                    required>
            </div>
            <div class="mb-4">
                <label for="jenis" class="form-label">Jenis Obat <span>*</span></label>
                <input type="text" class="form-control input " id="jenis" name="jenis"
                    placeholder="Masukkan Jenis Obat" required>
            </div>
            <div class="mb-4">
                <label for="dosis" class="form-label">Dosis Obat <span>*</span></label>
                <input type="text" class="form-control input " id="dosis" name="dosis"
                    placeholder="Masukkan Dosis Obat" required>
            </div>
            <div class="mb-4">
                <label for="indikasi" class="form-label">Indikasi</label>
                <textarea class="form-control input id=" alamat" name="indikasi" rows="5" placeholder="Masukkan Indikasi"
                    required></textarea>
            </div>
            <button type="submit" class="btn btn-primary py-2 px-5 rounded-3 w-100">Submit</button>
        </form>
    </div>

</div>
@endsection
