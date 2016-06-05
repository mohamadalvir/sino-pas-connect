<?php
	session_start();
	include_once '../../connect/conn.php';
	$bow=0;
	if(!isset($_SESSION['user']))
	{
		$row['nama_admin'] = 0;
		header("Location: ../../");
	} else {
		$res=$pdo->query("SELECT * FROM user_admin WHERE id_admin=".$_SESSION['user']);
		$row=$res->fetch(PDO::FETCH_ASSOC);
	}
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$res=$pdo->query("SELECT * FROM setup_pelajaran WHERE id_pelajaran='$id'");
		$bow=$res->fetch(PDO::FETCH_ASSOC);
	} 

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Edit Pelajaran - <?php echo $row['nama_admin']; ?> </title>
		<!--Import Google Icon Font-->
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="../../assets/css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../../assets/css/custom.css"  media="screen,projection"/>
		<link rel="stylesheet" href="../../assets/font/font-awesome/css/font-awesome.min.css">
		<link rel="icon" type="image/x-icon" href="../../assets/images/favicon.png"/>
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
    <body>
		<nav>
			<div class="nav-wrapper">
				<a href="#!" class="brand-logo">SINO</a>
				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<!-- <li><a href="sass.html"><i class="fa fa-bell-o"></i></a></li> -->
					<li><a href="../logout"><i class="fa fa-sign-out"></i></a></li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li><a href="../logout"><i class="fa fa-sign-out"></i> Keluar</a></li>
				</ul>
			</div>
		</nav>
		<!-- Page Layout here -->
		<div class="side-nav fixed">
			<div class="logo">
				<a href="#"><img class="logo-sino" src="../../assets/images/logo-sino-admin.png"></a>
			</div>
				<p class="text">
					<span><b><?php echo $row['nama_admin']; ?></b></span></br><?php echo $row['jabatan']; ?>
				</p>
				<li><a href="../">Dashboard</a></li>
				<li><a href="../DataSiswa">Data Siswa</a></a></li>
				<?php if($row['jabatan'] == 'Administrator') {
				?>
					<li><a href="../DataAdmin/">Data Admin</a></li>
				<?php }
				?>
				<li class="active"><a href="../SetupPelajaran/">Setup Pelajaran &rarr; Edit</a></li>
				<li><a href="../SetupKelas/">Setup Kelas</a></li>
				<li><a href="../notifikasi/">Tambah Notifikasi</a></li>
				<li><a href="../UploadNilai/">Upload Nilai</a></li>
				<li><a href="../Settings/">Pengaturan</a></li>
		</div>
		<main>
			<div class="container">
				<div class="col s12">
					<h2>Edit Pelajaran</h2>
					<div class="row">
						<form class="col s12" action="../SetupPelajaran/" method="post" name="edit">
							<input value="<?php echo $bow['id_pelajaran']; ?>" type="hidden" name="id_lama">
							<div class="input-field col s12">
								<input value="<?php echo $bow['nama_pelajaran']; ?>" id="first_name2" type="text" name="nama">
								<label class="active" for="first_name2">Nama Pelajaran</label>
							</div>
							<div class="input-field col s12">
								<input value="<?php echo $bow['id_pelajaran']; ?>" id="first_name2" type="text" name="id">
								<label class="active" for="first_name2">ID Pelajaran</label>
							</div>
							<div class="input-field col s12">
								<input value="<?php echo $bow['kkm']; ?>" id="first_name2" type="text" name="kkm">
								<label class="active" for="first_name2">KKM</label>
							</div>
							<button class="btn waves-effect waves-light" href="setup_pelajaran.php">Back
							</button>
							<button class="btn waves-effect waves-light" type="submit" name="submit">Submit
							</button>
						</form>
					</div>
				</div>
			</div>
	<div class="footer">
		<i class="fa fa-copyright"></i>2015. Dibuat oleh IT Club SMAN 1 Cibadak
	</div>
  
	</main>

          
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../assets/js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../assets/js/materialize.min.js"></script>
	  <script>  $(".button-collapse").sideNav();</script>
	  <script type="text/javascript" src="../assets/js/countup.js"></script>
	  </body>
  </html>