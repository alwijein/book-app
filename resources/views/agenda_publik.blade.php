@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url({{ asset('assets/img/curved-images/curved0.jpg') }}); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            Alwi Jein
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            13020180227
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;"
                                    role="tab" aria-selected="true">
                                    <span class="ms-1">Tugas MID</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        {{-- Form inputan buku --}}

<div class="mb-5">

        <label for="projectName" class="form-label mt-4">Kode_Buku</label>
        <input type="text" class="form-control" id="kode_buku" name="kode_buku" placeholder="Masukkan kode buku"
            value="{{ old('kode_buku') }}">


        <label for="projectName" class="form-label mt-4">Nama_Buku</label>
        <input type="text" class="form-control" id="nama_buku" name="nama_buku"
            placeholder="Masukkan Nama Buku"value="{{ old('nama_buku') }}">


        <div class="d-flex justify-content-end mt-4">
            <button type="submit" name="button" class="btn bg-gradient-success m-0 ms-2" id="butsave">Simpan</button>
            <button type="submit" name="button" class="btn bg-gradient-info m-0 ms-2" id="butEdit">Edit</button>
            <button type="submit" name="button" class="btn bg-gradient-danger m-0 ms-2" id="butHapus">Hapus</button>
        </div>
    </div>

        {{-- end form inputan buku --}}

        <div class="card mt-2">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxx font-weight-bolder opacity-7 ps-2">No
                            </th>
                            <th class="text-start text-uppercase text-secondary text-xxx font-weight-bolder opacity-7 ps-2">
                                Kode_Buku
                            </th>
                            {{-- <th class="text-start text-uppercase text-secondary text-xxx font-weight-bolder opacity-7 ps-2">Hari
                            </th> --}}
                            <th class="text-start text-uppercase text-secondary text-xxx font-weight-bolder opacity-7 ps-2">
                                Nama_Buku
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td class="align-middle text-start text-md">
                                    <p class="text-md text-wrap font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                </td>

                                <td class="align-middle text-start text-md">
                                    <p class="text-md text-wrap font-weight-bold mb-0">{{ $book->kode_buku }}</p>
                                </td>

                                <td class="align-middle text-start text-md">
                                    <p class="text-md text-wrap font-weight-bold mb-0">{{ $book->nama_buku }}</p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('additional-script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#butsave').on('click', function() {
                var kode_buku = $('#kode_buku').val();
                var nama_buku = $('#nama_buku').val();
                var url = "{{ url('/tambah-buku') }}";
                if (kode_buku != "" && nama_buku != "") {
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            kode_buku: kode_buku,
                            nama_buku: nama_buku,
                        },
                        cache: false,
                        success: function(dataResult) {
                            console.log(dataResult);
                            var dataResult = JSON.parse(dataResult);
                            if (dataResult.statusCode == 200) {
                                window.location = "/";
                            } else if (dataResult.statusCode == 201) {
                                alert("Error occured !");
                            }

                        }
                    });
                } else {
                    alert('Data tidak boleh kosong !');
                }
            });

            $('#butHapus').on('click', function() {
                var kode_buku = $('#kode_buku').val();
                var nama_buku = $('#nama_buku').val();
                var url = "{{ url('/hapus-buku') }}";
                if (kode_buku != "" && nama_buku != "") {
                    $.ajax({
                        url: url,
                        type: "DELETE",
                        data: {
                            kode_buku: kode_buku,
                            nama_buku: nama_buku,
                        },
                        cache: false,
                        success: function(dataResult) {
                            console.log(dataResult);
                            var dataResult = JSON.parse(dataResult);
                            if (dataResult.statusCode == 200) {
                                window.location = "/";
                            } else if (dataResult.statusCode == 201) {
                                alert("Masukkan Kode_buku dan Nama_buku Dengan Benar");
                            }

                        }
                    });
                } else {
                    alert('Data tidak boleh kosong !');
                }
            });

            $('#butEdit').on('click', function() {
                var kode_buku = $('#kode_buku').val();
                var nama_buku = $('#nama_buku').val();
                var url = "{{ url('/edit-buku') }}";
                if (kode_buku != "" && nama_buku != "") {
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            kode_buku: kode_buku,
                            nama_buku: nama_buku,
                        },
                        cache: false,
                        success: function(dataResult) {
                            console.log(dataResult);
                            var dataResult = JSON.parse(dataResult);
                            if (dataResult.statusCode == 200) {
                                window.location = "/";
                            } else if (dataResult.statusCode == 201) {
                                alert("Masukkan Kode_buku Dengan Benar");
                            }

                        }
                    });
                } else {
                    alert('Data tidak boleh kosong !');
                }
            });
        });
    </script>
@endsection
