@extends('dashboard')

@section('content')
<div class="container-fluid mt-5">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Pembayaran</h1>
    </div>


    <div class="form-add p-4 bg-white rounded-5 shadow mb-5">
        <form action="{{ route('pembayaran-store') }}" method="post">
            @csrf
           <div class="mb-4">
            <label for="pasien_id" class="form-label">Nama Pasien
                <span>*</span></label>
            <select class="form-control input" id="pasien_id"
                name="pasien_id">
                <option value="" disabled selected id="defautlSelect">Pilih
                   Nama Pasien
                </option>
                @foreach ($pasien as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}
                </option>
                @endforeach
            </select>
           </div>
            <div class="mb-4">
                <label for="tanggal" class="form-label">Tanggal Pembayaran <span>*</span></label>
                <input type="date" class="form-control input " id="tanggal" name="tanggal" placeholder="Masukkan Tanggal Pembayaran"
                    required>
            </div>
            <div class="mb-4">
                <label for="total_biaya" class="form-label">Total Biaya <span>*</span></label>
                <input type="number" class="form-control input " id="total_biaya" name="total_biaya" placeholder="Masukkan Total Biaya"
                    required>
            </div>
            <div class="mb-4">

            
            <label for="cara_pembayaran" class="form-label">Cara Pembayaran <span>*</span></label>
            <select class="form-control input" id="cara_pembayaran" name="cara_pembayaran">
                <option value="" disabled selected id="defautlSelect">Pilih Cara Pembayaran
                </option>
                <option value="Cash">Cash</option>
                <option value="Debit">Debit</option>
            </select>
        </div>
            <button type="submit" class="btn btn-primary py-2 px-5 rounded-3 w-100">Submit</button>
        </form>
    </div>

</div>
@endsection
