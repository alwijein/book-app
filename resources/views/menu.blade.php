@extends('layouts.app')

@section('content')
    {{-- Start Header --}}

    <div class="container-fluid">
        {{-- Form inputan no_hp --}}

        <div class="mb-5">

            <label for="projectName" class="form-label mt-4">nama_pemesan</label>
            <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" placeholder="Masukkan nama pembeli"
                value="{{ old('nama_pemesan') }}">


            <label for="projectName" class="form-label mt-4">no_hp</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp"
                placeholder="Masukkan no_hp"value="{{ old('no_hp') }}">

                <label for="projectName" class="form-label mt-4">nama_kereta</label>
            <input type="text" class="form-control" id="nama_kereta" name="nama_kereta"
                placeholder="Masukkan nama_kereta"value="{{ old('nama_kereta') }}">

                <label for="projectName" class="form-label mt-4">stasiun_tujuan</label>
            <input type="text" class="form-control" id="stasiun_tujuan" name="stasiun_tujuan"
                placeholder="Masukkan stasiun_tujuan"value="{{ old('stasiun_tujuan') }}">

                <label for="projectName" class="form-label mt-4">harga_tiket</label>
            <input type="number" class="form-control" id="harga_tiket" name="harga_tiket"
                placeholder="Masukkan harga_tiket"value="{{ old('harga_tiket') }}">

                <label for="projectName" class="form-label mt-4">jumlah_tiket</label>
            <input type="number" class="form-control" id="jumlah_tiket" name="jumlah_tiket"
                placeholder="Masukkan jumlah_tiket"value="{{ old('jumlah_tiket') }}">


            <div class="d-flex justify-content-end mt-4">
                <button type="submit" name="button" class="btn bg-gradient-success m-0 ms-2"
                    id="butsave">Simpan</button>
                <button type="submit" name="button" class="btn bg-gradient-info m-0 ms-2" id="butEdit">edit</button>
                <button type="submit" name="button" class="btn bg-gradient-danger m-0 ms-2" id="butHapus">Hapus</button>
            </div>
        </div>

        {{-- end form inputan no_hp --}}
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
                    var nama_pemesan = $('#nama_pemesan').val();
                    var no_hp = $('#no_hp').val();
                    var nama_kereta = $('#nama_kereta').val();
                    var stasiun_tujuan = $('#stasiun_tujuan').val();
                    var harga_tiket = $('#harga_tiket').val();
                    var jumlah_tiket = $('#jumlah_tiket').val();
                    var url = "{{ url('/tambah-buku') }}";
                    if (nama_pemesan != "" && no_hp != "" && stasiun_tujuan != "") {
                        $.ajax({
                            url: url,
                            type: "POST",
                            data: {
                                nama_pemesan: nama_pemesan,
                                no_hp: no_hp,
                                nama_kereta: nama_kereta,
                                stasiun_tujuan: stasiun_tujuan,
                                harga_tiket: harga_tiket,
                                jumlah_tiket: jumlah_tiket,
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
                    var nama_pemesan = $('#nama_pemesan').val();
                    var no_hp = $('#no_hp').val();
                    var nama_kereta = $('#nama_kereta').val();
                    var stasiun_tujuan = $('#stasiun_tujuan').val();
                    var harga_tiket = $('#harga_tiket').val();
                    var jumlah_tiket = $('#jumlah_tiket').val();
                    var url = "{{ url('/hapus-buku') }}";
                    if (nama_pemesan != "" && no_hp != "") {
                        $.ajax({
                            url: url,
                            type: "DELETE",
                            data: {
                                nama_pemesan: nama_pemesan,
                                no_hp: no_hp,
                                nama_kereta: nama_kereta,
                                stasiun_tujuan:    stasiun_tujuan,
                                harga_tiket: harga_tiket,
                                jumlah_tiket: jumlah_tiket,
                            },
                            cache: false,
                            success: function(dataResult) {
                                console.log(dataResult);
                                var dataResult = JSON.parse(dataResult);
                                if (dataResult.statusCode == 200) {
                                    window.location = "/show-table";
                                } else if (dataResult.statusCode == 201) {
                                    alert("Masukkan nama_pemesan dan no_hp Dengan Benar");
                                }
                            }
                        });
                    } else {
                        alert('Data tidak boleh kosong !');
                    }
                });

                $('#butEdit').on('click', function() {
                    var nama_pemesan = $('#nama_pemesan').val();
                    var no_hp = $('#no_hp').val();
                    var nama_kereta = $('#nama_kereta').val();
                    var stasiun_tujuan = $('#stasiun_tujuan').val();
                    var harga_tiket = $('#harga_tiket').val();
                    var jumlah_tiket = $('#jumlah_tiket').val();
                    var url = "{{ url('/edit-buku') }}";
                    if (nama_pemesan != "" && no_hp != "") {
                        $.ajax({
                            url: url,
                            type: "POST",
                            data: {
                                nama_pemesan: nama_pemesan,
                                no_hp: no_hp,
                                nama_kereta: nama_kereta,
                                stasiun_tujuan: stasiun_tujuan,
                                harga_tiket: harga_tiket,
                                jumlah_tiket: jumlah_tiket,
                            },
                            cache: false,
                            success: function(dataResult) {
                                console.log(dataResult);
                                var dataResult = JSON.parse(dataResult);
                                if (dataResult.statusCode == 200) {
                                    window.location = "/show-table";
                                } else if (dataResult.statusCode == 201) {
                                    alert("Masukkan nama_pemesan Dengan Benar");
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
