@extends('dashboard')

@section('content')
<div class="container-fluid mt-5">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Data Jenis Kamar</h1>
    </div>


    <div class="form-add p-4 bg-white rounded-5 shadow mb-5">
        <form action="{{ route('jenis-kamar-store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="kamar_id" class="form-label">Jenis Ruangan <span>*</span></label>
                <select class="form-control input" id="kamar_id" name="kamar_id">
                    <option value="" disabled selected id="defautlSelect">Pilih Jenis Ruangan
                    </option>
                    @foreach ($kamar as $item)
                    <option value="{{ $item->id }}">{{ $item->jenis }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="jumlah_kamar" class="form-label">Jumlah Kamar <span>*</span></label>
                <input type="number" class="form-control input " id="jumlah_kamar" name="jumlah_kamar" placeholder="Masukkan Jumlah Kamar"
                    required>
            </div>
            <button type="submit" class="btn btn-primary py-2 px-5 rounded-3 w-100">Submit</button>
        </form>
    </div>

</div>
@endsection
