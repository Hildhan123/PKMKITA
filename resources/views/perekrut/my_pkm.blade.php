<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Forms - Ready Bootstrap Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="{{ asset('assets/css/ready.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="index.html" class="logo">
					Panel Pekrekrut
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					
					<form class="navbar-left navbar-form nav-search mr-md-3" action="">
						<div class="input-group">
							<input type="text" placeholder="Search ..." class="form-control">
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="la la-search search-icon"></i>
								</span>
							</div>
						</div>
					</form>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
						</li>
						<li class="nav-item dropdown">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
							<img src="{{ asset('assets/img/profile.jpg') }}" alt="user-img" width="36" class="img-circle">
							<span >Hizrian</span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><img src="{{ asset('assets/img/profile.jpg') }}" alt="user"></div>
										<div class="u-text">
											<h4>Hizrian</h4>
											<p class="text-muted">hello@themekita.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
										</div>
									</li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="ti-user"></i> My Profile</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="ti-settings"></i> Account Setting</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="fa fa-power-off"></i> Logout</a>
								</ul> 
								<!-- /.dropdown-user -->
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
					<div class="user">
						<div class="photo">
							<img src="{{ asset('assets/img/profile.jpg') }}">
						</div>
						<div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									Hizrian
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample" aria-expanded="true" style="">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					
					<ul class="nav">
						<li class="nav-item">
							<a href="{{ route('perekrut') }}">
								<i class="la la-dashboard"></i>
								<p>Dashboard</p>
						
							</a>
						</li>
						<li class="nav-item active">
							<a href="{{ route('perekrut.my_pkm') }}">
								<i class="la la-keyboard-o"></i>
								<p>My PKM</p>
								
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('perekrut.calon_anggota') }}">
								<i class="la la-pencil-square-o"></i>
								<p>Daftar Calon Anggota</p>
								
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
@if(session()->has('pesan'))
<div class="alert alert-success la la-thumbs-up"> {{session()->get('pesan')}} </div>
@endif
						<h4 class="page-title">My PKM</h4>
						@if( $mypkm == null )
							<button class="btn btn-primary" data-toggle="modal" data-target="#ModalLoginForm">Buat PKM</button>
						@else
						<div class="row">
							<div class="row-md-12">
							<div class="card">
								<div class="col-lg-12">
									<table class="table table-head-bg-primary">
										<thead class="thead-light bg-primary">
										<tr>
											<th scope="col">ID PKM</th>
											<th scope="col">Nama proposal</th>
											<th scope="col">Kategori</th>
											<th scope="col">Deskripsi</th>
											<th scope="col">Prodi Yang dibutuhkan</th>
											<th scope="col">Universitas</th>
											<th scope="col">Status</th>
											<th scope="col">Aksi</th>
										</tr>
										</thead>
										<tbody>
											<tr>
												<th scope="row">{{ $mypkm->id }}</th>
												<th scope="row">{{ $mypkm->nama_proposal }}</th>
												<th scope="row">{{ $mypkm->kategori_pkm }}</th>
												<th scope="row">{{ $mypkm->deskripsi }}</th>
												<th scope="row">{{ $mypkm->prodi_dibutuhkan }}</th>
												<th scope="row">{{ Auth::user()->universitas }}</th>
												<th scope="row">
													<form id="switch" action="{{ route('perekrut.proses.my_pkm_switch') }}" method="post">@csrf @method('PATCH')</form>
													@if($mypkm->status == 'close')
													<p class="text-danger">Close</p>							
													@else
													<p class="text-success">Open</p>
													@endif
													<input type="submit" form="switch" class="btn btn-warning" name="switch" value="switch">
												</th>
												<th scope="row">
													<button class="btn btn-secondary" data-toggle="modal" data-target="#ModalLoginForm">Edit PKM</button>
													<input type="submit" form="switch" class="btn btn-danger" name="delete" value="delete" onclick="return confirm('Apakah anda yakin?');">
												</th>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							</div>
						</div>
						@endif
						<h4 class="page-title">Daftar Calon Anggota</h4>
						<div class="row">
							<div class="col-md-12">
								<div class="card">

									<div class="card-body">
										<table class="table table-head-bg-success table-striped table-hover">
											<thead>
												<tr>
													<th scope="col">#</th>
													<th scope="col">First</th>
													<th scope="col">Last</th>
													<th scope="col">Handle</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>Mark</td>
													<td>Otto</td>
													<td>@mdo</td>
												</tr>
												<tr>
													<td>2</td>
													<td>Jacob</td>
													<td>Thornton</td>
													<td>@fat</td>
												</tr>
												<tr>
												<td>3</td>
												<td colspan="2">Larry the Bird</td>
												<td>@twitter</td>
										</tr>
								</tbody>
							</table>
					</div>
				</div>
			</div>
	</div>
<!-- Modal HTML Markup -->				

<div id="ModalLoginForm" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
		
                <form role="form" method="POST" action="{{ route('perekrut.proses.my_pkm_proses') }}">
                @csrf
                    <div class="form-group">
                        <label class="control-label">Nama Proposal</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="nama_proposal" name="nama_proposal" placeholder="Ketik nama proposal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Kategori PKM</label>
                        <div>
                            <select class="form-control" id="kategori_pkm" name="kategori_pkm">
								<option value="PKM-RE">PKM-RE</option>
								<option value="PKM-RSH">PKM-RSH</option>
								<option value="PKM-K">PKM-K</option>
								<option value="PKM-PM">PKM-PM</option>
								<option value="PKM-PI">PKM-PI</option>
								<option value="PKM-KC">PKM-KC</option>
								<option value="PKM-KI">PKM-KI</option>
								<option value="PKM-VGK">PKM-VGK</option>
								<option value="PKM-GFT">PKM-GFT</option>
								<option value="PKM-AI">PKM-AI</option> 
							</select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Deskripsi</label>
                        <div>
                            <textarea type="text" class="form-control input-lg" id="deskripsi" name="deskripsi" placeholder="deskripsi"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Prodi yang dibutuhkan</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="prodi_dibutuhkan" name="prodi_dibutuhkan" placeholder="prodi yg dibutuhkan">
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label">Kategori PKM</label>
                        <div>
                            <select class="form-control" id="status" name="status">
								<option class="text-danger" value="close">Close</option>
								<option class="text-success" value="open">Open</option>
							</select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary">SUBMIT</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
				
	<!-- Modal -->
	<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h6 class="modal-title"><i class="la la-frown-o"></i> Under Development</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">									
					<p>Currently the pro version of the <b>Ready Dashboard</b> Bootstrap is in progress development</p>
					<p>
					<b>We'll let you know when it's done</b></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/chartist/chartist.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jquery-mapael/maps/world_countries.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/ready.min.js') }}"></script>
</html>