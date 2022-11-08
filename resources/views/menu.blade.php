@extends('layouts.app')

@section('content')
    {{-- Start Header --}}

    <div class="container-fluid">
        {{-- Form inputan menu --}}

        <div class="mb-5">

            <label for="projectName" class="form-label mt-4">nama_menu</label>
            <input type="text" class="form-control" id="nama_menu" name="nama_menu" placeholder="Masukkan nama menu"
                value="{{ old('nama_menu') }}">


            <label for="projectName" class="form-label mt-4">harga_menu</label>
            <input type="number" class="form-control" id="harga_menu" name="harga_menu"
                placeholder="Masukkan harga menu"value="{{ old('harga_menu') }}">

                <label for="projectName" class="form-label mt-4">banyak</label>
            <input type="number" class="form-control" id="banyak" name="banyak"
                placeholder="Masukkan harga menu"value="{{ old('banyak') }}">


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
                    var nama_menu = $('#nama_menu').val();
                    var harga_menu = $('#harga_menu').val();
                    var banyak = $('#banyak').val();
                    var url = "{{ url('/tambah-buku') }}";
                    if (nama_menu != "" && harga_menu != "") {
                        $.ajax({
                            url: url,
                            type: "POST",
                            data: {
                                nama_menu: nama_menu,
                                harga_menu: harga_menu,
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
                    var nama_menu = $('#nama_menu').val();
                    var harga_menu = $('#harga_menu').val();
                    var banyak = $('#banyak').val();
                    var url = "{{ url('/hapus-buku') }}";
                    if (nama_menu != "" && harga_menu != "") {
                        $.ajax({
                            url: url,
                            type: "DELETE",
                            data: {
                                nama_menu: nama_menu,
                                harga_menu: harga_menu,
                                banyak: banyak,
                            },
                            cache: false,
                            success: function(dataResult) {
                                console.log(dataResult);
                                var dataResult = JSON.parse(dataResult);
                                if (dataResult.statusCode == 200) {
                                    window.location = "/show-table";
                                } else if (dataResult.statusCode == 201) {
                                    alert("Masukkan nama_menu dan harga_menu Dengan Benar");
                                }

                            }
                        });
                    } else {
                        alert('Data tidak boleh kosong !');
                    }
                });

                $('#butEdit').on('click', function() {
                    var nama_menu = $('#nama_menu').val();
                    var harga_menu = $('#harga_menu').val();
                    var banyak = $('#banyak').val();
                    var url = "{{ url('/edit-buku') }}";
                    if (nama_menu != "" && harga_menu != "") {
                        $.ajax({
                            url: url,
                            type: "POST",
                            data: {
                                nama_menu: nama_menu,
                                harga_menu: harga_menu,
                                banyak: banyak,
                            },
                            cache: false,
                            success: function(dataResult) {
                                console.log(dataResult);
                                var dataResult = JSON.parse(dataResult);
                                if (dataResult.statusCode == 200) {
                                    window.location = "/show-table";
                                } else if (dataResult.statusCode == 201) {
                                    alert("Masukkan nama_menu Dengan Benar");
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
