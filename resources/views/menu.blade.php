@extends('layouts.app')

@section('content')
    {{-- Start Header --}}

    <div class="container-fluid">
        {{-- Form inputan menu --}}

        <div class="mb-5">

            <label for="projectName" class="form-label mt-4">nama_pasien</label>
            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Masukkan nama pasien"
                value="{{ old('nama_pasien') }}">


            <label for="projectName" class="form-label mt-4">alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat"
                placeholder="Masukkan alamat"value="{{ old('alamat') }}">

                <label for="projectName" class="form-label mt-4">nomor_telp</label>
            <input type="text" class="form-control" id="nomor_telp" name="nomor_telp"
                placeholder="Masukkan nomor telpon"value="{{ old('nomor_telp') }}">

                <label for="projectName" class="form-label mt-4">vaksin</label>
            <input type="text" class="form-control" id="vaksin" name="vaksin"
                placeholder="Masukkan nama vaksin"value="{{ old('vaksin') }}">


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
                    var nama_pasien = $('#nama_pasien').val();
                    var alamat = $('#alamat').val();
                    var nomor_telp = $('#nomor_telp').val();
                    var vaksin = $('#vaksin').val();
                    var url = "{{ url('/tambah-buku') }}";
                    if (nama_pasien != "" && alamat != "" && vaksin != "") {
                        $.ajax({
                            url: url,
                            type: "POST",
                            data: {
                                nama_pasien: nama_pasien,
                                alamat: alamat,
                                nomor_telp: nomor_telp,
                                vaksin: vaksin,
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
                    var nama_pasien = $('#nama_pasien').val();
                    var alamat = $('#alamat').val();
                    var nomor_telp = $('#nomor_telp').val();
                    var vaksin = $('#vaksin').val();
                    var url = "{{ url('/hapus-buku') }}";
                    if (nama_pasien != "" && alamat != "") {
                        $.ajax({
                            url: url,
                            type: "DELETE",
                            data: {
                                nama_pasien: nama_pasien,
                                alamat: alamat,
                                nomor_telp: nomor_telp,
                                vaksin:    vaksin,
                            },
                            cache: false,
                            success: function(dataResult) {
                                console.log(dataResult);
                                var dataResult = JSON.parse(dataResult);
                                if (dataResult.statusCode == 200) {
                                    window.location = "/show-table";
                                } else if (dataResult.statusCode == 201) {
                                    alert("Masukkan nama_pasien dan alamat Dengan Benar");
                                }
                            }
                        });
                    } else {
                        alert('Data tidak boleh kosong !');
                    }
                });

                $('#butEdit').on('click', function() {
                    var nama_pasien = $('#nama_pasien').val();
                    var alamat = $('#alamat').val();
                    var nomor_telp = $('#nomor_telp').val();
                    var vaksin = $('#vaksin').val();
                    var url = "{{ url('/edit-buku') }}";
                    if (nama_pasien != "" && alamat != "") {
                        $.ajax({
                            url: url,
                            type: "POST",
                            data: {
                                nama_pasien: nama_pasien,
                                alamat: alamat,
                                nomor_telp: nomor_telp,
                                vaksin: vaksin,
                            },
                            cache: false,
                            success: function(dataResult) {
                                console.log(dataResult);
                                var dataResult = JSON.parse(dataResult);
                                if (dataResult.statusCode == 200) {
                                    window.location = "/show-table";
                                } else if (dataResult.statusCode == 201) {
                                    alert("Masukkan nama_pasien Dengan Benar");
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
