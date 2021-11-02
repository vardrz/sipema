                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <div class="card bg-success text-white shadow mb-4">
                        <div class="card-body">
                            Welcome <b><?= $this->session->userdata('nama'); ?></b> to SiPeMa
                            <div class="text-white small"> NIK : <?= $this->session->userdata('nik');?></div>
                        </div>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Total Laporan -->
                        <div class="col-xl-6 col-md-6 mb-2">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Laporan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_laporan; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Laporan Tolak -->
                        <div class="col-xl-6 col-md-6 mb-2">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Laporan Ditolak</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_laporan_tolak; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-ban fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Laporan Proses -->
                        <div class="col-xl-6 col-md-6 mb-2">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Laporan Proses</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_laporan_proses; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-tasks fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Laporan Selesai -->
                        <div class="col-xl-6 col-md-6 mb-2">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Laporan Selesai</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_laporan_selesai; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-check-square fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->