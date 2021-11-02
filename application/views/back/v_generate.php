                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Export</h1>
                    </div>

                    <div class="card bg-dark text-white shadow mb-4">
                        <div class="card-body">Export Data Laporan Pengaduan menjadi file <b>PDF</b>.</div>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-4 mb-2">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <a class="text-decoration-none" href="<?= base_url('admin/generate/semua'); ?>">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Export Semua Laporan</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fas fa-download"></i> Export PDF</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-book fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-4 mb-2">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Export Berdasarkan Tanggal</div>
                                            <form method="post" action="<?= base_url('admin/generate/cek_tgl'); ?>">
                                                <input type="date" value="<?= $tgl; ?>" min="2016-01-01" max="2030-12-31" name="tgl">
                                                <button class="btn btn-sm btn-danger" type="submit">Export</button>
                                            </form>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-4 mb-2">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Export Berdasarkan Status</div>
                                            <form method="post" action="<?= base_url('admin/generate/cek_status'); ?>">
                                                <select name="status">
                                                    <option value="0">Laporan Baru</option>
                                                    <option value="tolak">Laporan Ditolak</option>
                                                    <option value="proses">Laporan Diproses</option>
                                                    <option value="selesai">Laporan Selesai</option>
                                                </select>
                                                <button class="btn btn-sm btn-success" type="submit">Export</button>
                                            </form>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-exclamation fa-2x text-gray-300"></i>
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


                <!-- Berdasarkan Tanggal   -->
                <div class="modal fade" id="tanggal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form method="post" action="<?= base_url('admin/generate/cek_tgl'); ?>">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Berdasarkan Tanggal</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    <!-- <input type="text" name="tgl" placeholder="Contoh : 19-09-2019"> -->
                                    <input type="date" value="<?= $tgl; ?>" min="2016-01-01" max="2030-12-31" name="tgl"><button class="btn btn-sm btn-success" type="submit">Generate</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>