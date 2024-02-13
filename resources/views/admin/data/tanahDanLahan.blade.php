@extends('admin.layouts.main')
@section('page')
    <div class="row">
        <div class="col-lg-12">
            <div class="card h-100 p-4">
                <form action="" method="POST">
                    <div class="row">
                        <div class="form-group col-md-3 col-12">
                            <label for="filter-kec">Filter Kecamatan</label>
                            <select class="form-control dropdown-toggle" name="kecamatan" id="filter-kec"
                                style="width: 100%;">
                                <option value="">-- Semua Kecamatan --</option>
                                <option value="337601">Tegal Barat</option>
                                <option value="337602">Tegal Timur</option>
                                <option value="337603">Tegal Selatan</option>
                                <option value="337604">Margadana</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 col-12 dropdown">
                            <label for="filter-kel">Filter Kelurahan</label>
                            <select class="form-control" name="kelurahan" id="filter-kel" style="width: 100%;">
                                <option value="">-- Semua Kelurahan --</option>
                                <option value="3376011001">Pesurungan Kidul</option>
                                <option value="3376011002">Debong Lor</option>
                                <option value="3376011003">Kemandungan</option>
                                <option value="3376011004">Pekauman</option>
                                <option value="3376011005">Kraton</option>
                                <option value="3376011006">Tegalsari</option>
                                <option value="3376011007">Muarareja</option>
                                <option value="3376021001">Kejambon</option>
                                <option value="3376021002">Slerok</option>
                                <option value="3376021003">Panggung</option>
                                <option value="3376021004">Mangkukusuman</option>
                                <option value="3376021005">Mintaragen</option>
                                <option value="3376031001">Kalinyamat Wetan</option>
                                <option value="3376031002">Bandung</option>
                                <option value="3376031003">Debong Kidul</option>
                                <option value="3376031004">Tunon</option>
                                <option value="3376031005">Keturen</option>
                                <option value="3376031006">Debong Kulon</option>
                                <option value="3376031007">Debong Tengah</option>
                                <option value="3376031008">Randugunting</option>
                                <option value="3376041001">Kaligangsa</option>
                                <option value="3376041002">Krandon</option>
                                <option value="3376041003">Cabawan</option>
                                <option value="3376041004">Kalinyamat Kulon</option>
                                <option value="3376041005">Margadana</option>
                                <option value="3376041006">Sumurpanggang</option>
                                <option value="3376041007">Pesurungan Lor</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2 text-right">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn btn-success waves-effect waves-light w-md mt-4"><i
                                    class="bx bx-cloud-download font-size-16"></i> Export Excel</button>
                        </div>

                        <div class="form-group col-md-2 text-left">
                            <label>&nbsp;</label>
                            <button type="button" class="btn btn-warning waves-effect waves-light w-md mt-4"
                                id="btn-import"><i class="bx bx-cloud-upload font-size-16"></i> Import Excel</button>
                        </div>

                        <div class="form-group col-md-2">
                            <label>&nbsp;</label>
                            <a href="{{ route('tanah-lahan.make') }}"
                                class="btn btn-primary waves-effect waves-light w-md mt-4"><i
                                    class="bx bx-edit font-size-16"></i> Tambah</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card h-100 p-4">
                <form action="" method="POST">
                    <input type="hidden" name="" value="">
                    <input type="hidden" name="jenis" value="back">
                    <div class="table-responsive">
                        <table id="myTable" class="table align-items-center mb-0 table-hover">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">No.</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Kecamatan</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Kelurahan</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Pemegang Hak</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Lahan Terbangun</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Penggunaan Lahan</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Kode</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Nomor</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">1.</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">Tegal Timur</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">Panggung</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">Pemerintah Kota Tegal</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">Terbangun</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">Tanah SK</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">Tambak</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">BLM HP</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">KALKUL 03</p>
                                    </td>
                                    <td class="align-middle">
                                        <div class="btn-group">
                                            <button class="btn btn-outline-success btn-up-sertifikat btn-tooltip"  data-bs-toggle="tooltip" data-bs-placement="top" title="Upload Sertifikat" data-container="body" data-animation="true"><i class="bx bxs-file-pdf" ></i></button>
                                            <button class="btn btn-outline-info btn-up-lokasi btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Upload Foto Tanah" data-container="body" data-animation="true"><i class="bx bx-image-add" ></i></button>
                                            <a class="btn btn-outline-primary btn-tooltip" href="#" target="_blank"  data-bs-toggle="tooltip" data-bs-placement="top" title="Patok" data-container="body" data-animation="true"><i class="bx bx-map"></i></a>
                                            <a class="btn btn-outline-dark btn-tooltip" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail" data-container="body" data-animation="true"><i class="bx bx-detail"></i></a>
                                            <a class="btn btn-outline-warning btn-update btn-tooltip" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah" data-container="body" data-animation="true"><i class="bx bx-pencil"></i></a>
                                            <button class="btn btn-outline-danger btn-remove btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" data-container="body" data-animation="true"><i class="bx bx-trash" ></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">5.</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">Margadana</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">Cabawan</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">Pemerintah Kota Tegal</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">Non Terbangun</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">Belum bersertfikat</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">SD N Cabawan 2</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">BLM HP</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">CB 01</p>
                                    </td>
                                    <td class="align-middle">
                                        <div class="btn-group">
                                            <button class="btn btn-outline-success btn-up-sertifikat btn-tooltip"  data-bs-toggle="tooltip" data-bs-placement="top" title="Upload Sertifikat" data-container="body" data-animation="true"><i class="bx bxs-file-pdf" ></i></button>
                                            <button class="btn btn-outline-info btn-up-lokasi btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Upload Foto Tanah" data-container="body" data-animation="true"><i class="bx bx-image-add" ></i></button>
                                            <a class="btn btn-outline-primary btn-tooltip" href="#" target="_blank"  data-bs-toggle="tooltip" data-bs-placement="top" title="Patok" data-container="body" data-animation="true"><i class="bx bx-map"></i></a>
                                            <a class="btn btn-outline-dark btn-tooltip" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail" data-container="body" data-animation="true"><i class="bx bx-detail"></i></a>
                                            <a class="btn btn-outline-warning btn-update btn-tooltip" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah" data-container="body" data-animation="true"><i class="bx bx-pencil"></i></a>
                                            <button class="btn btn-outline-danger btn-remove btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" data-container="body" data-animation="true"><i class="bx bx-trash" ></i></button>
                                        </div>
                                    </td>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
