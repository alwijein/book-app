@extends('layouts.app')

@section('content')
    {{-- Start Header --}}

    <div class="container-fluid">
        {{-- Form inputan menu --}}

        <div class="mb-5">

            <label for="projectName" class="form-label mt-4">user_id</label>
            <input type="text" class="form-control" id="user_id" name="user_id" placeholder="Masukkan nama menu"
                value="{{ old('user_id') }}">


            <label for="projectName" class="form-label mt-4">team_name</label>
            <input type="text" class="form-control" id="team_name" name="team_name"
                placeholder="Masukkan harga menu"value="{{ old('team_name') }}">

                <label for="projectName" class="form-label mt-4">player_id</label>
            <input type="text" class="form-control" id="player_id" name="player_id"
                placeholder="Masukkan harga menu"value="{{ old('player_id') }}">

                <label for="projectName" class="form-label mt-4">player_fullname</label>
            <input type="text" class="form-control" id="player_fullname" name="player_fullname"
                placeholder="Masukkan harga menu"value="{{ old('player_fullname') }}">


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
                    var user_id = $('#user_id').val();
                    var team_name = $('#team_name').val();
                    var player_id = $('#player_id').val();
                    var player_fullname = $('#player_fullname').val();
                    var url = "{{ url('/tambah-buku') }}";
                    if (user_id != "" && team_name != "" && player_fullname != "") {
                        $.ajax({
                            url: url,
                            type: "POST",
                            data: {
                                user_id: user_id,
                                team_name: team_name,
                                player_id: player_id,
                                player_fullname: player_fullname,
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
                    var user_id = $('#user_id').val();
                    var team_name = $('#team_name').val();
                    var player_id = $('#player_id').val();
                    var player_fullname = $('#player_fullname').val();
                    var url = "{{ url('/hapus-buku') }}";
                    if (user_id != "" && team_name != "") {
                        $.ajax({
                            url: url,
                            type: "DELETE",
                            data: {
                                user_id: user_id,
                                team_name: team_name,
                                player_id: player_id,
                                player_fullname:    player_fullname,
                            },
                            cache: false,
                            success: function(dataResult) {
                                console.log(dataResult);
                                var dataResult = JSON.parse(dataResult);
                                if (dataResult.statusCode == 200) {
                                    window.location = "/show-table";
                                } else if (dataResult.statusCode == 201) {
                                    alert("Masukkan user_id dan team_name Dengan Benar");
                                }
                            }
                        });
                    } else {
                        alert('Data tidak boleh kosong !');
                    }
                });

                $('#butEdit').on('click', function() {
                    var user_id = $('#user_id').val();
                    var team_name = $('#team_name').val();
                    var player_id = $('#player_id').val();
                    var player_fullname = $('#player_fullname').val();
                    var url = "{{ url('/edit-buku') }}";
                    if (user_id != "" && team_name != "") {
                        $.ajax({
                            url: url,
                            type: "POST",
                            data: {
                                user_id: user_id,
                                team_name: team_name,
                                player_id: player_id,
                                player_fullname: player_fullname,
                            },
                            cache: false,
                            success: function(dataResult) {
                                console.log(dataResult);
                                var dataResult = JSON.parse(dataResult);
                                if (dataResult.statusCode == 200) {
                                    window.location = "/show-table";
                                } else if (dataResult.statusCode == 201) {
                                    alert("Masukkan user_id Dengan Benar");
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
