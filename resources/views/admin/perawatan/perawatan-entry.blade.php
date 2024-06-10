@extends('dashboard')

@section('content')
<div class="container-fluid mt-5">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Perawatan</h1>
    </div>


    <div class="form-add p-4 bg-white rounded-5 shadow mb-5">
        <form action="{{ route('perawatan-store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="rawat_jalan_id" class="form-label">ID Rawat Jalan
                    <span>*</span></label>
                <select class="form-control input" id="rawat_jalan_id" name="rawat_jalan_id">
                    <option value="" disabled selected id="defautlSelect">Pilih
                        ID Rawat Jalan
                    </option>
                    @foreach ($rawatJalan as $item)
                    <option value="{{ $item->id }}">{{ $item->id }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="rawat_inap_id" class="form-label">ID Rawat Inap
                    <span>*</span></label>
                <select class="form-control input" id="rawat_inap_id" name="rawat_inap_id">
                    <option value="" disabled selected id="defautlSelect">Pilih
                        ID Rawat Inap
                    </option>
                    @foreach ($rawatInap as $item)
                    <option value="{{ $item->id }}">{{ $item->id }}
                    </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary py-2 px-5 rounded-3 w-100">Submit</button>
        </form>
    </div>

</div>
@endsection
