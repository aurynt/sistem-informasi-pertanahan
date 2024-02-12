@extends('layouts.main')
@section('page')
    <!-- Hero Start -->
    <section class="bg-half-170 d-table w-100"
        style="background: url('assets/images/bg-alun-tegal.jpeg') center center; background-repeat: no-repeat; background-size: cover;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="pages-heading title-heading">
                        <h2 class="text-white title-dark"> Data Ruas Jalan </h2>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="position-breadcrumb">
                <nav aria-label="breadcrumb" class="d-inline-block">
                    <ul class="breadcrumb rounded shadow mb-0 px-4 py-2">
                        <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Ruas Jalan</li>
                    </ul>
                </nav>
            </div>
        </div> <!--end container-->
    </section><!--end section-->
    <div class="position-relative">
        <div class="shape overflow-hidden text-color-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- Hero End -->

    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="card custom-form border-0">
                        <div class="card-body">
                            <form class="rounded shadow p-4"
                                action="https://ministry.phicos.co.id/tegal-sip/export/excel_jalan/export" method="POST">
                                <input type="hidden" name="tegal-sip-token" value="9037360785d265fd2d3156f7100b3b34">
                                <input type="hidden" name="jenis" value="front">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Kecamatan :</label>
                                            <select class="form-control form-select" name="kecamatan" id="filter-kec">
                                                <option value="">--Semua Kecamatan--</option>
                                                <option value="337601">Tegal Barat</option>
                                                <option value="337602">Tegal Timur</option>
                                                <option value="337603">Tegal Selatan</option>
                                                <option value="337604">Margadana</option>
                                            </select>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Kelurahan :</label>
                                            <select class="form-control form-select" name="kelurahan" id="filter-kel">
                                                <option value="">--Semua Kelurahan--</option>
                                            </select>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="filter-stat">Status :</label>
                                            <select class="form-control form-select" name="stat" id="filter-stat">
                                                <option value="">-- Semua --</option>
                                                <option value="Jalan Kota">Jalan Kota</option>
                                            </select>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="filter-fungsi">Fungsi :</label>
                                            <select class="form-control form-select" name="fungsi" id="filter-fungsi">
                                                <option value="">-- Semua --</option>
                                                <option value="Jalan Lokal Sekunder">Jalan Lokal Sekunder</option>
                                                <option value="Jalan Arteri Sekunder">Jalan Arteri Sekunder</option>
                                                <option value="Jalan Kolektor Sekunder">Jalan Kolektor Sekunder</option>
                                                <option value="Jalan Lingkungan Sekunder">Jalan Lingkungan Sekunder</option>
                                                <option value="Jalan Liingkungan Sekunder">Jalan Liingkungan Sekunder
                                                </option>
                                                <option value="-">-</option>
                                                <option value="Jalan Lokal">Jalan Lokal</option>
                                            </select>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="filter-tipe_hak">Tipe Hak :</label>
                                            <select class="form-control form-select" name="tipe_hak" id="filter-tipe_hak">
                                                <option value="">-- Semua --</option>
                                                <option value="Hak Pakai">Hak Pakai</option>
                                            </select>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-success text-center">Cetak Excel</button>
                                    </div>
                                </div><!--end row-->
                            </form><!--end form-->
                        </div>
                    </div><!--end custom-form-->
                </div>
            </div>
            <!-- data table start -->
            <div class="card custom-form border-0">
                <div class="card-body">
                    <div class="table-responsive rounded shadow p-4">
                        <div id="table-data_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row dt-row">
                                <div class="col-sm-12">
                                    <table id="myTable" class="table-striped table-bordered dataTable no-footer"
                                        style="width: 100%;" aria-describedby="table-data_info">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Ruas</th>
                                                <th>Kecamatan</th>
                                                <th>Kelurahan</th>
                                                <th>Luas Sertifikat</th>
                                                <th>Status</th>
                                                <th>Fungsi</th>
                                                <th>Tipe Hak</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td>Jalan K.S. Tubun</td>
                                                <td>Tegal Timur</td>
                                                <td>Kejambon</td>
                                                <td>11828</td>
                                                <td>Jalan Kota</td>
                                                <td>Jalan Arteri Sekunder</td>
                                                <td>Hak Pakai</td>
                                                <td>
                                                    <div class="btn-group"><button
                                                            class="btn btn-primary btn-sm btn-detail" type="button"
                                                            data-id="REVxMjhGNlBLckJ4SHFQUFRUQjB2S3ViVlhyVVpobjFTUStib3FqQlY1MD0="
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Detail">Detail</button><button
                                                            class="btn btn-warning btn-sm btn-cetak" type="button"
                                                            data-id="REVxMjhGNlBLckJ4SHFQUFRUQjB2S3ViVlhyVVpobjFTUStib3FqQlY1MD0="
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Cetak">Cetak</button></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>7.</td>
                                                <td>Jalan S.I. Lorem</td>
                                                <td>Tegal Barat Daya</td>
                                                <td>Kejambon</td>
                                                <td>11828</td>
                                                <td>Jalan Kota Lorem</td>
                                                <td>Jalan Arteri Premier</td>
                                                <td>Hak Asasi</td>
                                                <td>
                                                    <div class="btn-group"><button
                                                            class="btn btn-primary btn-sm btn-detail" type="button"
                                                            data-id="REVxMjhGNlBLckJ4SHFQUFRUQjB2S3ViVlhyVVpobjFTUStib3FqQlY1MD0="
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Detail">Detail</button><button
                                                            class="btn btn-warning btn-sm btn-cetak" type="button"
                                                            data-id="REVxMjhGNlBLckJ4SHFQUFRUQjB2S3ViVlhyVVpobjFTUStib3FqQlY1MD0="
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Cetak">Cetak</button></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- data table ends -->
        </div><!--end container-->
    </section>

    @include('layouts.footer')
@endsection