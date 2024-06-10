@extends('dashboard')

@section('content')
<div class="container-fluid mt-5">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Rawat Jalan</h1>
    </div>


    <div class="form-add p-4 bg-white rounded-5 shadow mb-5">
        <form action="{{ route('rawat-jalan-store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="tanggal" class="form-label">Tanggal Kunjung <span>*</span></label>
                <input type="date" class="form-control input " id="tanggal" name="tanggal" placeholder="Masukkan Tanggal Kunjung"
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
