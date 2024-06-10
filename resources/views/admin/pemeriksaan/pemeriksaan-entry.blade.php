@extends('dashboard')

@section('content')
<div class="container-fluid mt-5">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Pemeriksaan</h1>
    </div>


    <div class="form-add p-4 bg-white rounded-5 shadow mb-5">
        <form action="{{ route('pemeriksaan-store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="dokter_id" class="form-label">Nama Dokter <span>*</span></label>
                <select class="form-control input" id="dokter_id" name="dokter_id">
                    <option value="" disabled selected id="defaultSelect">Pilih Dokter</option>
                    @foreach ($dokter as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="tenaga_kesehatan_id" class="form-label">Nama Tenaga Kesehatan <span>*</span></label>
                <select class="form-control input" id="tenaga_kesehatan_id" name="tenaga_kesehatan_id">
                    <option value="" disabled selected id="defaultSelect">Pilih Tenaga Kesehatan</option>
                    @foreach ($tenagaKesehatan as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="pasien_id" class="form-label">Nama Pasien <span>*</span></label>
                <select class="form-control input" id="pasien_id" name="pasien_id">
                    <option value="" disabled selected id="defaultSelect">Pilih Pasien</option>
                    @foreach ($pasien as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="tanggal_pemeriksaan" class="form-label">Tanggal Pemeriksaan <span>*</span></label>
                <input type="date" class="form-control input" id="tanggal_pemeriksaan" name="tanggal_pemeriksaan" placeholder="Masukkan Tanggal Pemeriksaan" required>
            </div>
            <div class="mb-4">
                <label for="diagnosa" class="form-label">Diagnosa <span>*</span></label>
                <input type="text" class="form-control input" id="diagnosa" name="diagnosa" placeholder="Masukkan Diagnosa" required>
            </div>
            <div class="mb-4">
                <label for="perawatan_id" class="form-label">Jenis Perawatan <span>*</span></label>
                <select class="form-control input" id="perawatan_id" name="perawatan_id">
                    <option value="" disabled selected id="defaultSelect">Pilih Jenis Perawatan</option>
                    @foreach ($perawatan as $item)
                    <option value="{{ $item->id }}">{{ $item->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="obat_id" class="form-label">Nama Obat <span>*</span></label>
                <select class="form-control input" id="obat_id" name="obat_id">
                    <option value="" disabled selected id="defaultSelect">Pilih Obat</option>
                    @foreach ($obat as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="rencana_perawatan" class="form-label">Rencana Perawatan <span>*</span></label>
                <input type="date" class="form-control input" id="rencana_perawatan" name="rencana_perawatan" placeholder="Masukkan Rencana Perawatan" required>
            </div>
            <button type="submit" class="btn btn-primary py-2 px-5 rounded-3 w-100">Submit</button>
        </form>
        
    </div>

</div>
@endsection
