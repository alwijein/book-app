@extends('layouts.app')

@section('content')
    {{-- Start Header --}}

    <div class="container-fluid">
        {{-- Form inputan menu --}}

        <div class="mb-5">

            <label for="projectName" class="form-label mt-4">nama_pembeli</label>
            <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" placeholder="Masukkan nama pembeli"
                value="{{ old('nama_pembeli') }}">


            <label for="projectName" class="form-label mt-4">menu</label>
            <input type="text" class="form-control" id="menu" name="menu"
                placeholder="Masukkan menu"value="{{ old('menu') }}">

                <label for="projectName" class="form-label mt-4">harga</label>
            <input type="number" class="form-control" id="harga" name="harga"
                placeholder="Masukkan harga"value="{{ old('harga') }}">

                <label for="projectName" class="form-label mt-4">banyak</label>
            <input type="number" class="form-control" id="banyak" name="banyak"
                placeholder="Masukkan banyak"value="{{ old('banyak') }}">


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
                    var nama_pembeli = $('#nama_pembeli').val();
                    var menu = $('#menu').val();
                    var harga = $('#harga').val();
                    var banyak = $('#banyak').val();
                    var url = "{{ url('/tambah-buku') }}";
                    if (nama_pembeli != "" && menu != "" && banyak != "") {
                        $.ajax({
                            url: url,
                            type: "POST",
                            data: {
                                nama_pembeli: nama_pembeli,
                                menu: menu,
                                harga: harga,
                                banyak: banyak,
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
                    var nama_pembeli = $('#nama_pembeli').val();
                    var menu = $('#menu').val();
                    var harga = $('#harga').val();
                    var banyak = $('#banyak').val();
                    var url = "{{ url('/hapus-buku') }}";
                    if (nama_pembeli != "" && menu != "") {
                        $.ajax({
                            url: url,
                            type: "DELETE",
                            data: {
                                nama_pembeli: nama_pembeli,
                                menu: menu,
                                harga: harga,
                                banyak:    banyak,
                            },
                            cache: false,
                            success: function(dataResult) {
                                console.log(dataResult);
                                var dataResult = JSON.parse(dataResult);
                                if (dataResult.statusCode == 200) {
                                    window.location = "/show-table";
                                } else if (dataResult.statusCode == 201) {
                                    alert("Masukkan nama_pembeli dan menu Dengan Benar");
                                }
                            }
                        });
                    } else {
                        alert('Data tidak boleh kosong !');
                    }
                });

                $('#butEdit').on('click', function() {
                    var nama_pembeli = $('#nama_pembeli').val();
                    var menu = $('#menu').val();
                    var harga = $('#harga').val();
                    var banyak = $('#banyak').val();
                    var url = "{{ url('/edit-buku') }}";
                    if (nama_pembeli != "" && menu != "") {
                        $.ajax({
                            url: url,
                            type: "POST",
                            data: {
                                nama_pembeli: nama_pembeli,
                                menu: menu,
                                harga: harga,
                                banyak: banyak,
                            },
                            cache: false,
                            success: function(dataResult) {
                                console.log(dataResult);
                                var dataResult = JSON.parse(dataResult);
                                if (dataResult.statusCode == 200) {
                                    window.location = "/show-table";
                                } else if (dataResult.statusCode == 201) {
                                    alert("Masukkan nama_pembeli Dengan Benar");
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
