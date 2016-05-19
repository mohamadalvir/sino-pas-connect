<?php 
	include "../connect/conn.php";
	session_start();
	if(isset($_SESSION['username'])){
		//koneksi terpusat
		$username=$_SESSION['username'];
		$nis = $_SESSION['nis'];
		$statement = $pdo->query("SELECT siswa.nama_siswa, siswa.alamat_wali, siswa.no_telpon_wali, siswa.pekerjaan_wali, siswa.alamat_ortu, siswa.no_telpon_ortu, siswa.pekerjaan_ayah, siswa.pekerjaan_ibu, siswa.nama_wali, siswa.no_telpon_anak, siswa.asal_sekolah, siswa.asal_kelas, siswa.tgl_terima, siswa.nama_ayah, siswa.nama_ibu,  siswa.alamat_siswa, siswa.status, siswa.anak_ke, siswa.tempat_lahir, siswa.tanggal_lahir, siswa.kelamin, siswa.agama, siswa.nis, kelas.nama_kelas from tbl_ruangan ruangan, data_siswa siswa, setup_kelas kelas WHERE ruangan.nis=siswa.nis and ruangan.nis='$nis' and ruangan.id_kelas=kelas.id_kelas");
		$siswa = $statement->fetch(PDO::FETCH_ASSOC);
		$nama_siswa = $siswa['nama_siswa'];
		$nis=$siswa['nis'];
		$nama_kelas=$siswa['nama_kelas'];
		$tempat_lahir=$siswa['tempat_lahir'];
		$tanggal_lahir=$siswa['tanggal_lahir'];
		$kelamin=$siswa['kelamin'];
		$agama=$siswa['agama'];
		$status=$siswa['status'];
		$anak_ke=$siswa['anak_ke'];
		$alamat_siswa=$siswa['alamat_siswa'];
		$no_telpon_anak=$siswa['no_telpon_anak'];
		$asal_sekolah=$siswa['asal_sekolah'];
		$asal_kelas=$siswa['asal_kelas'];
		$tgl_terima=$siswa['tgl_terima'];
		$nama_ayah=$siswa['nama_ayah'];
		$nama_ibu=$siswa['nama_ibu'];
		$alamat_ortu=$siswa['alamat_ortu'];
		$no_telpon_ortu=$siswa['no_telpon_ortu'];
		$pekerjaan_ayah=$siswa['pekerjaan_ayah'];
		$pekerjaan_ibu=$siswa['pekerjaan_ibu'];
		$nama_wali=$siswa['nama_wali'];
		$alamat_wali=$siswa['alamat_wali'];
		$no_telpon_wali=$siswa['no_telpon_wali'];
		$pekerjaan_wali=$siswa['pekerjaan_wali'];
	}
	else {
		$nama_siswa=0; //supaya engga error, karena tampilan dibawah tetep ke load dan butuh var $nama_siswa
		$nama_kelas=0;
		header('Location: ../'); 
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title>Sistem Informasi Nilai Online</title>

    <!-- Memanggil CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
	<!-- Memanggil Font dan Ikon-->
	<link href='https://fonts.googleapis.com/css?family=Montserrat:300,400,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link rel="icon" type="image/x-icon" href="../assets/images/favicon.png"/>
</head>

<body>
<div id="wrapper">
<!-- Sidebar -->
	<div id="sidebar-wrapper">
		<ul class="sidebar-nav">
			<li class="sidebar-brand"><img src="../assets/images/logo-sino-dark.png"></li>
			<li><a href="../dashboard/"><i class="fa fa-home"></i>&nbsp; &nbsp; Dashboard</a></li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-line-chart"></i>&nbsp; &nbsp;Nilai Ulangan &nbsp;<span class="caret"></span></a>
			  <ul class="dropdown-menu" role="menu">
				<li><a href="nilai/uhar.php">Ulangan Harian</a></li>
				<li><a href="nilai/uts.php">Ulangan Tengah Semester</a></li>
				<li><a href="nilai/uas_1.php">Ulangan Akhir Semester</a></li>
			  </ul>
			</li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-question-circle"></i>&nbsp; &nbsp;Bantuan &nbsp;<span class="caret"></span></a>
			  <ul class="dropdown-menu" role="menu">
				<li><a href="#">FAQ</a></li>
				<li><a href="#">Documentation</a></li>
				<li><a href="#">Meet team</a></li>
				<li><a href="#">Feedback</a></li>
			  </ul>
			</li>
		</ul>
	</div>
<!-- Akhir Sidebar -->
<div id="page-content-wrapper">
<!-- Menu Atas -->
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header"><a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars"></i></a></div>
			<ul class="nav navbar-right top-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-bell-o"><span class="bubble"></span></i>
					</a>
					
					<ul class="dropdown-menu message-dropdown">
						<li class="message-header">
							Notifikasi
						</li>
						<?php
							$view=$pdo->query("SELECT info FROM info ORDER BY id_info desc");
							while($row = $view->fetch(PDO::FETCH_ASSOC)){
						?>
						<li class="message-preview">
							<p><?php echo $row['info'];?></p>
						</li>
						<?php
							}
						?>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
					<ul class="dropdown-menu">
						<li><a href="settings/"><i class="fa fa-cog"></i>    Pengaturan</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="../dashboard/logout"><i class="fa fa-sign-out"></i>    Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
<!-- Akhir Menu Atas -->
	  
<!-- Isi Halaman -->
	<div class="page-header">
		<ol class="breadcrumb">
		  <li class="active"><a href="../dashboard/">Dashboard</a></li>
		</ol>
		<h1>Dashboard</h1>
		<h5><?php echo $nama_siswa; ?> <span class="label label-default"><?php echo $nama_kelas; ?></span></h5>
	</div>
	<div class="container-fluid">
	<div class="page-content">
	<div class="row">
		<section>
			<div class="wizard">
				<div class="wizard-inner">
					<div class="connecting-line"></div>
					<ul class="nav nav-tabs" role="tablist">

						<li role="presentation" class="active">
							<a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
								<span class="round-tab">
									<i class="glyphicon glyphicon-folder-open"></i>
								</span>
							</a>
						</li>

						<li role="presentation" class="disabled">
							<a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
								<span class="round-tab">
									<i class="glyphicon glyphicon-pencil"></i>
								</span>
							</a>
						</li>
						<li role="presentation" class="disabled">
							<a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
								<span class="round-tab">
									<i class="glyphicon glyphicon-picture"></i>
								</span>
							</a>
						</li>

						<li role="presentation" class="disabled">
							<a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
								<span class="round-tab">
									<i class="glyphicon glyphicon-ok"></i>
								</span>
							</a>
						</li>
					</ul>
				</div>

				<form role="form">
					<div class="tab-content">
						<div class="tab-pane active" role="tabpanel" id="step1">
							<h3>Step 1</h3>
							<p>This is step 1</p>
							<ul class="list-inline pull-right">
								<li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
							</ul>
						</div>
						<div class="tab-pane" role="tabpanel" id="step2">
							<h3>Step 2</h3>
							<p>This is step 2</p>
							<ul class="list-inline pull-right">
								<li><button type="button" class="btn btn-default prev-step">Previous</button></li>
								<li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
							</ul>
						</div>
						<div class="tab-pane" role="tabpanel" id="step3">
							<h3>Step 3</h3>
							<p>This is step 3</p>
							<ul class="list-inline pull-right">
								<li><button type="button" class="btn btn-default prev-step">Previous</button></li>
								<li><button type="button" class="btn btn-default next-step">Skip</button></li>
								<li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
							</ul>
						</div>
						<div class="tab-pane" role="tabpanel" id="complete">
							<h3>Complete</h3>
							<p>You have successfully completed all steps.</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</form>
			</div>
		</section>
	</div>
	</div>
	</div>
	<div class="container-fluid">
		<div class=" page-content biru">
			<div class="row">
			  <div class="col-md-9">
				<div class="hero">Hai <?php echo $nama_siswa; ?>!</div>
				<div class="sub-hero">Selamat datang di SINO Pas Connect.</div>
				<p>Melalui aplikasi web ini dapatkan informasi nilai anda secara online, mudah dan cepat. Saran dan masukan Anda sangat diperlukan demi pengembangan aplikasi web ini.</p>
			  </div>
			  <div class="col-md-3">
				  <div class="pull-right">
					<img src="../assets/images/owl_ex1.png" style="width:120px">
				  </div>
			  </div>
			</div>
		</div>
		<div class=" page-content">
			<div class="row">
				<div class="col-md-12">
				  <h2>Data Siswa</h2>
					<form>
					  <div class="form-group">
						<input type="text" class="form-control" placeholder="Nama Lengkap">
					  </div>
					  <div class="form-group">
						<input type="text" class="form-control" placeholder="NISN">
					  </div>
					  <div class="form-group">
						<input type="text" class="form-control" placeholder="Tempat Lahit">
					  </div>
					  <div class="form-group">
						<input type="text" class="form-control" placeholder="Tanggal Lahir">
						<span id="helpBlock" class="help-block">Format tanggal:</span>
					  </div>
					  <div class="form-group">
						<select class="form-control">
						  <option>--Jenis Kelamin--</option>
						  <option>Laki-laki</option>
						  <option>Perempuan</option>
					    </select>
					  </div>
					  <div class="form-group">
						<input type="text" class="form-control" placeholder="Anak ke">
					  </div>
					  <div class="form-group">
						<textarea class="form-control" rows="3" placeholder="Alamat Siswa"></textarea>
					  </div>
					  <div class="form-group">
						<input type="text" class="form-control" placeholder="No Telepon Siswa">
					  </div>
					  <div class="form-group">
						<input type="text" class="form-control" placeholder="Asal Sekolah">
					  </div>
					  <div class="form-group">
						<input type="text" class="form-control" placeholder="Diterima di kelas">
					  </div>
					  <div class="form-group">
						<input type="text" class="form-control" placeholder="Diterima pada tanggal">
					  </div>
					  <div class="form-group">
						<input type="text" class="form-control" placeholder="Nama Ayah">
					  </div>
					  <div class="form-group">
						<input type="text" class="form-control" placeholder="Nama Ibu">
					  </div>
					  <div class="form-group">
						<input type="text" class="form-control" placeholder="Alamat Orang Tua">
					  </div>
					  <div class="form-group">
						<input type="text" class="form-control" placeholder="Nomor Telepon Rumah">
					  </div>
					  <div class="form-group">
						<input type="text" class="form-control" placeholder="Pekerjaan Ayah">
					  </div>
					  <div class="form-group">
						<input type="text" class="form-control" placeholder="Pekerjaan Ibu">
					  </div>
					  <div class="form-group">
						<input type="text" class="form-control" placeholder="Nama Wali">
					  </div>
					  <div class="form-group">
						<input type="text" class="form-control" placeholder="Nomor Telepon Wali">
					  </div>
					  <div class="form-group">
						<input type="text" class="form-control" placeholder="Pekerjaan Wali">
					  </div>
					  <div class="form-group">
						<input type="text" class="form-control" placeholder="username">
					  </div>
					  <div class="form-group">
						<input type="password" class="form-control" placeholder="Password">
					  </div>
					  <button type="submit" class="btn btn-default">Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
    <div class="footer"><i class="fa fa-copyright"></i> 2016. SINO V.4.0 Dibuat oleh IT Club SMAN 1 Cibadak</div>
<!-- Akhir Halaman -->
</div>
</div>
	
<!-- Javascript -->
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/sino.js"></script>
<!-- Akhir Javascript -->
</body>
</html>