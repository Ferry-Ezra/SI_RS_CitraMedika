<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/style.css">

	<link href="css/bootstrap.min.css" rel="stylesheet">

	<title>RS CITRA MEDIKA</title>
</head>
<body>


	<!-- SIDEBAR -->    
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">RS CITRA MEDIKA</span>
		</a>
		<ul class="side-menu top">
			<li class="@if (Request::routeIs('home')) active @endif">
				<a href="{{ route('home') }}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="@if (Request::routeIs('dokter','dokter-entry')) active @endif">
				<a href="{{ route('dokter') }}">
					<i class='bx bx-plus-medical'></i>
					<span class="text">Dokter</span>
				</a>
			</li>
			<li class="@if (Request::routeIs('tenaga-kesehatan','tenaga-kesehatan-entry')) active @endif">
				<a href="{{ route('tenaga-kesehatan') }}">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Tenaga Kesehatan</span>
				</a>
			</li>
			<li class="@if (Request::routeIs('obat','obat-entry')) active @endif">
				<a href="{{ route('obat') }}">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Obat</span>
				</a>
			</li>
			<li class="@if (Request::routeIs('pasien','pasien-entry')) active @endif">
				<a href="{{ route('pasien') }}">
					<i class='bx bxs-group' ></i>
					<span class="text">Pasien</span>
				</a>
			</li>
			<li class="@if (Request::routeIs('pembayaran','pembayaran-entry')) active @endif">
				<a href="{{ route('pembayaran') }}">
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">Pembayaran</span>
				</a>
			</li>
            <li class="@if (Request::routeIs('pemeriksaan','pemeriksaan-entry')) active @endif">
				<a href="{{ route('pemeriksaan') }}">
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">Pemeriksaan Dokter</span>
				</a>
			</li>
            <li class="@if (Request::routeIs('perawatan','perawatan-entry')) active @endif">
				<a href="{{ route('perawatan') }}">
					<i class='bx bxs-book-alt'></i>
					<span class="text">Jenis Perawatan</span>
				</a>
			</li>
            <li class="@if (Request::routeIs('rawat-jalan','rawat-jalan-entry')) active @endif">
				<a href="{{ route('rawat-jalan') }}">
					<i class='bx bxs-building-house'></i>
					<span class="text">Rawat Jalan</span>
				</a>
			</li>
            <li class="@if (Request::routeIs('rawat-inap','rawat-inap-entry')) active @endif">
				<a href="{{ route('rawat-inap') }}">
					<i class='bx bxs-buildings'></i>
					<span class="text">Rawat Inap</span>
				</a>
			</li>
            <li class="@if (Request::routeIs('jenis-kamar','jenis-kamar-entry')) active @endif">
				<a href="{{ route('jenis-kamar') }}">
					<i class='bx bxs-blanket'></i>
					<span class="text">Jenis Kamar</span>
				</a>
			</li>
            <li class="@if (Request::routeIs('kamar','kamar-entry')) active @endif">
				<a href="{{ route('kamar') }}">
					<i class='bx bxs-bed' ></i>
					<span class="text">Kamar</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="profile">
				<img src="img/Gambar logo.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<section class="content-header">
				@yield('content')
			</section>	
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>