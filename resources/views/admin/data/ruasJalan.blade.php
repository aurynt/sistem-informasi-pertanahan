@extends('admin.layouts.main')
@section('page')
    <div class="row">
        <div class="col-lg-12">
            <div class="card h-100 p-4">
                <div class="row">
                    <div class="form-group col-md-3 col-12">
                        <label for="filter-kec">Filter Kecamatan</label>
                        <select class="form-control" name="kecamatan" id="filter-kec" style="width: 100%;">
                            <option value="">-- Semua Kecamatan --</option>
                            @foreach ($kecamatan as $item)
                                <option value="{{ $item->id_kecamatan }}">{{ $item->nama_kecamatan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-12">
                        <label for="filter-kel">Filter Kelurahan</label>
                        <select class="form-control" name="kelurahan" id="filter-kel" style="width: 100%;">
                        </select>
                    </div>

                    <div class="form-group col-md-2 col-12 text-right">
                        <label>&nbsp;</label>
                        <button id="export" class="btn btn-success waves-effect waves-light w-md mt-4"><i
                                class="bx bx-cloud-download font-size-16"></i> Export Excel</button>
                    </div>

                    <div class="form-group col-md-2 col-12 text-left">
                        <label>&nbsp;</label>
                        <button class="btn btn-warning waves-effect waves-light w-md mt-4" data-bs-toggle="modal"
                            data-bs-target="#modal-import-jalan" id="btn-import"><i
                                class="bx bx-cloud-upload font-size-16"></i> Import Excel</button>
                    </div>

                    <div class="form-group col-md-2 col-12">
                        <label>&nbsp;</label>
                        <a href="{{ route('create.jalan') }}" class="btn btn-primary waves-effect waves-light w-md mt-4"><i
                                class="bx bx-edit font-size-16"></i> Tambah</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card h-100 p-4">
                <div class="table-responsive">
                    <table id="myTable" class="table align-items-center mb-0 table-hover">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder">No.</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Nama
                                    Ruas</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Kecamatan
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Kelurahan
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Luas
                                    Sertifikat</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Status
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Fungsi
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Tipe Hak
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Ruas Awal
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.modal.importExcelJalan')
    <script>
        $(document).ready(() => {
            const appUrl = "{{ env('APP_URL') }}" + ':8000'
            $('#filter-kec').on('change', (e) => {
                $('#filter-kel').empty()
                $('<option></option>').attr('value', '').text('-- pilih kelurahan --')
                    .appendTo(
                        '#filter-kel')

                $.get(`${appUrl}/api/kelurahan/${e.target.value}`, (res) => {
                    res.map((item) => (
                        $('<option></option>').attr('value', item.id_kelurahan).text(item
                            .nama_kelurahan)
                        .appendTo(
                            '#filter-kel')
                    ))
                })
            })

            $(document).on('click', '.btn-remove', function() {
                let id = $(this).data('id');
                window.csrfToken = "{{ csrf_token() }}";
                const token = localStorage.getItem('apiToken');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `${appUrl}/api/jalan/${id}`,
                            method: "DELETE",
                            headers: {
                                'X-CSRF-TOKEN': window.csrfToken,
                                'Authorization': `Bearer ${token}`
                            },
                            success: (res) => {
                                Swal.fire({
                                    title: "Done",
                                    text: "Data has been deleted",
                                    icon: "success"
                                });

                                $('#myTable').DataTable().ajax.reload();

                            },
                            error: (err) => {
                                Swal.fire({
                                    title: "Failed!",
                                    text: err.responseJSON.message,
                                    icon: "error"
                                })
                            }
                        });
                    }
                });
            })
        })
    </script>

    <script>
        window.csrfToken = "{{ csrf_token() }}";
        const token = localStorage.getItem('apiToken');

        function filterTanah(data) {
            const selectedValues = {
                kode_kec: $('#filter-kec').val(),
                kode_kel: $('#filter-kel').val(),
            };
            return data.filter((item) => {
                for (const [key, value] of Object.entries(selectedValues)) {
                    if (value && item[key] !== value) {
                        return false;
                    }
                }
                return true;
            })
        }

        function exportExcel(data, nameFile) {
            const dataExport = data.map((item) => {
                return {
                    'NAMA RUAS': item.nama_ruas,
                    'KECAMATAN': item.kecamatan,
                    'KELURAHAN': item.kel,
                    'KODE KECAMATAN': item.kode_kec,
                    'KODE KELURAHAN': item.kode_kel,
                    'PANJANG': item.panjang,
                    'LEBAR': item.lebar,
                    'LUAS SERTIFIKAT': item.luas_sertifikat,
                    'LUAS PETA': item.luas_peta,
                    'STATUS': item.status,
                    'FUNGSI': item.fungsi,
                    'TIPE HAK': item.tipe_hak,
                    'TIPE PRODUK': item.tipe_produk,
                    'TIPE JALAN': item.tipe_jalan,
                    'HP': item.hp,
                    'NIB': item.nib,
                    'KODE PATOK': item.kode_patok,
                    'RUAS AWAL': item.ruas_awal,
                    'RUAS AKHIR': item.ruas_akhir,
                    'KM AWAL': item.km_awal,
                    'KM FEEDER': item.km_akhir,
                    'KONDISI RINGAN': item.kondisi_ringan,
                    'KONDISI SEDANG': item.kondisi_sedang,
                    'KONDISI RUSAK': item.kondisi_rusak,
                    'LHRT': item.lhrt,
                    'VCR': item.vcr,
                    'MST': item.mst,
                    'TANAH': item.tanah,
                    'MACADAM': item.macadam,
                    'ASPAL': item.aspal,
                    'TAHUN': item.tahun
                }
            })
            console.log(dataExport);
            const worksheet = XLSX.utils.json_to_sheet(dataExport);
            const workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, worksheet, "Dates");
            XLSX.writeFile(workbook, `${nameFile}.xlsx`, {
                compression: true
            });
        }

        function getJalan() {
            return new Promise((resolve, reject) => {
                const datas = []
                $.ajax({
                    url: "{{ route('jalan.all') }}",
                    method: "GET",
                    headers: {
                        'X-CSRF-TOKEN': window.csrfToken,
                        'Authorization': `Bearer ${token}`
                    },
                    success: (res) => {
                        res.map((item, i) => {
                            const newdata = {
                                no: i + 1,
                                ...item
                            }
                            datas.push(newdata)
                        });
                        resolve(datas)
                    },
                    error: (err) => {
                        reject(err)
                    }
                })
            })
        }

        function generateDataTable(data) {
            return new DataTable('#myTable', {
                data: data,
                columns: [{
                        data: 'no',
                    }, {
                        data: 'nama_ruas',
                    },
                    {
                        data: 'nama_kecamatan',
                    },
                    {
                        data: 'nama_kelurahan',
                    },
                    {
                        data: 'luas_sertifikat',
                    },
                    {
                        data: 'status',
                    },
                    {
                        data: 'fungsi',
                    },
                    {
                        data: 'tipe_hak',
                    },
                    {
                        data: 'ruas_awal',
                    },
                    {
                        render: (data, type, row) => {
                            const option = $('<div></div>', {
                                class: 'btn-group',
                                html: [
                                    $('<a/>', {
                                        href: `/detail-ruas-jalan/${row.id}`,
                                        class: 'btn btn-outline-dark btn-tooltip',
                                        "data-bs-toggle": "tooltip",
                                        "data-bs-placement": "top",
                                        title: "Detail",
                                        "data-container": "body",
                                        "data-animation": "true",
                                        html: [
                                            $('<i/>', {
                                                class: 'bx bx-detail'
                                            })
                                        ]
                                    }),
                                    $('<a/>', {
                                        href: `/edit-ruas-jalan/${row.id}`,
                                        class: 'btn btn-outline-warning btn-tooltip',
                                        "data-bs-toggle": "tooltip",
                                        "data-bs-placement": "top",
                                        title: "Ubah",
                                        "data-container": "body",
                                        "data-animation": "true",
                                        html: [
                                            $('<i/>', {
                                                class: 'bx bx-detail'
                                            })
                                        ]
                                    }),
                                    $('<button></button>', {
                                        class: 'btn btn-outline-danger btn-remove btn-tooltip',
                                        type: 'button',
                                        "data-id": row.id,
                                        "data-bs-toggle": "tooltip",
                                        "data-bs-placement": "top",
                                        title: "Hapus",
                                        "data-container": "body",
                                        "data-animation": "true",
                                        html: [
                                            $('<i/>', {
                                                class: 'bx bx-trash'
                                            })
                                        ]
                                    })
                                ]
                            })
                            return option.prop('outerHTML')
                        }
                    },
                ]
            })
        }

        getJalan().then((res) => {
            const table = generateDataTable(res);
            const selectElements = ['#filter-kec', '#filter-kel', ];
            selectElements.forEach((id) => {
                $(id).on('change', () => {
                    const filteredData = filterTanah(res);
                    table.clear().rows.add(filteredData).draw();
                });
            });
            $('#export').on('click', () => {
                const filteredData = filterTanah(res);
                exportExcel(filteredData, `tanah_report_${Date.now()}`);
            });
        });
    </script>
@endsection
