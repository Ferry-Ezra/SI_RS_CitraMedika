@extends('dashboard')

@section('content')
    <div class="head-title">
        <div class="left">
            <h1>Dashboard</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right' ></i></li>
                <li>
                    <a class="active" href="#">Home</a>
                </li>
            </ul>
        </div>
    </div>

    <ul class="box-info">
        <li>
            <i class='bx bx-plus-medical'></i>
            <span class="text">
                <h3>{{ $dokterCount }}</h3>
                <p>Data Dokter</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-group' ></i>
            <span class="text">
                <h3>{{ $pasienCount }}</h3>
                <p>Data Pasien</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-calendar-check' ></i>
            <span class="text">
                <h3>{{ $pemeriksaanCount }}</h3>
                <p>Data Pemeriksaan</p>
            </span>
        </li>
    </ul>
@endsection