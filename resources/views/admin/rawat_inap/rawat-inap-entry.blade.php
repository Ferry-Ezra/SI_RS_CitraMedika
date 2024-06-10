@extends('dashboard')

@section('content')
<div class="container-fluid mt-5">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Rawat Inap</h1>
    </div>


    <div class="form-add p-4 bg-white rounded-5 shadow mb-5">
        <form action="{{ route('rawat-inap-store') }}" method="post">
            @csrf
           <div class="mb-4">
            <label for="jenis_kamar_id" class="form-label">Jenis Kamar <span>*</span></label>
            <select class="form-control input" id="jenis_kamar_id" name="jenis_kamar_id">
                <option value="" disabled selected id="defautlSelect">Pilih Jenis Kamar
                </option>
                @foreach ($jenisKamar as $item)
                @foreach ($kamar as $data)
                <option value="{{ $item->id }}">{{ $data->jenis }}</option>
                @endforeach
                @endforeach
            </select>
           </div>
            <div class="mb-4">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk <span>*</span></label>
                <input type="date" class="form-control input " id="tanggal_masuk" name="tanggal_masuk" placeholder="Masukkan Tanggal Masuk"
                    required>
            </div>
            <div class="mb-4">
                <label for="tanggal_keluar" class="form-label">Tanggal Keluar <span>*</span></label>
                <input type="date" class="form-control input " id="tanggal_keluar" name="tanggal_keluar" placeholder="Masukkan Tanggal Keluar"
                    required>
            </div>
            <div class="mb-4">
                <label for="diagnosis" class="form-label">Diagnosis <span>*</span></label>
                <input type="text" class="form-control input " id="diagnosis" name="diagnosis" placeholder="Masukkan Diagnosis"
                    required>
            </div>
            <div class="mb-4">
                <label for="biaya" class="form-label">Biaya <span>*</span></label>
                <input type="number" class="form-control input " id="biaya" name="biaya" placeholder="Masukkan Biaya"
                    required>
            </div>
            <button type="submit" class="btn btn-primary py-2 px-5 rounded-3 w-100">Submit</button>
        </form>
    </div>

</div>
@endsection
