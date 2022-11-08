@extends('layouts.app')

@section('content')
    {{-- Start Header --}}

    <div class="container-fluid">
        {{-- Form inputan menu --}}

        <div class="mb-5">

            <label for="projectName" class="form-label mt-4">nama_pengguna</label>
            <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Masukkan nama pengguna"
                value="{{ old('nama_pengguna') }}">


            <label for="projectName" class="form-label mt-4">no_hp</label>
            <input type="number" class="form-control" id="no_hp" name="no_hp"
                placeholder="Masukkan nomor handphone"value="{{ old('no_hp') }}">

                <label for="projectName" class="form-label mt-4">no_kamar</label>
            <input type="number" class="form-control" id="no_kamar" name="no_kamar"
                placeholder="Masukkan nomor kamar"value="{{ old('no_kamar') }}">

                <label for="projectName" class="form-label mt-4">lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi"
                placeholder="Masukkan lokasi"value="{{ old('lokasi') }}">


            <div class="d-flex justify-content-end mt-4">
                <button type="submit" name="button" class="btn bg-gradient-success m-0 ms-2"
                    id="butsave">Simpan</button>
                <button type="submit" name="button" class="btn bg-gradient-info m-0 ms-2" id="butEdit">edit</button>
                <button type="submit" name="button" class="btn bg-gradient-danger m-0 ms-2" id="butHapus">Hapus</button>
            </div>
        </div>

        {{-- end form inputan menu --}}
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
                    var nama_pengguna = $('#nama_pengguna').val();
                    var no_hp = $('#no_hp').val();
                    var no_kamar = $('#no_kamar').val();
                    var lokasi = $('#lokasi').val();
                    var url = "{{ url('/tambah-buku') }}";
                    if (nama_pengguna != "" && no_hp != "") {
                        $.ajax({
                            url: url,
                            type: "POST",
                            data: {
                                nama_pengguna: nama_pengguna,
                                no_hp: no_hp,
                                no_kamar: no_kamar,
                                lokasi: lokasi,
                            },
                            cache: false,
                            success: function(dataResult) {
                                console.log(dataResult);
                                var dataResult = JSON.parse(dataResult);
                                if (dataResult.statusCode == 200) {
                                    window.location = "/show-table";
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
                    var nama_pengguna = $('#nama_pengguna').val();
                    var no_hp = $('#no_hp').val();
                    var no_kamar = $('#no_kamar').val();
                    var lokasi = $('#lokasi').val();
                    var url = "{{ url('/hapus-buku') }}";
                    if (nama_pengguna != "" && no_hp != "") {
                        $.ajax({
                            url: url,
                            type: "DELETE",
                            data: {
                                nama_pengguna: nama_pengguna,
                                no_hp: no_hp,
                                no_kamar: no_kamar,
                                lokasi: lokasi,
                            },
                            cache: false,
                            success: function(dataResult) {
                                console.log(dataResult);
                                var dataResult = JSON.parse(dataResult);
                                if (dataResult.statusCode == 200) {
                                    window.location = "/show-table";
                                } else if (dataResult.statusCode == 201) {
                                    alert("Masukkan nama_pengguna dan no_hp Dengan Benar");
                                }

                            }
                        });
                    } else {
                        alert('Data tidak boleh kosong !');
                    }
                });

                $('#butEdit').on('click', function() {
                    var nama_pengguna = $('#nama_pengguna').val();
                    var no_hp = $('#no_hp').val();
                    var no_kamar = $('#no_kamar').val();
                    var lokasi = $('#lokasi').val();
                    var url = "{{ url('/edit-buku') }}";
                    if (nama_pengguna != "" && no_hp != "") {
                        $.ajax({
                            url: url,
                            type: "POST",
                            data: {
                                nama_pengguna: nama_pengguna,
                                no_hp: no_hp,
                                no_kamar: no_kamar,
                                lokasi: lokasi,
                            },
                            cache: false,
                            success: function(dataResult) {
                                console.log(dataResult);
                                var dataResult = JSON.parse(dataResult);
                                if (dataResult.statusCode == 200) {
                                    window.location = "/show-table";
                                } else if (dataResult.statusCode == 201) {
                                    alert("Masukkan nama_pengguna Dengan Benar");
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
