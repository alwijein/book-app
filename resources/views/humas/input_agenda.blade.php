@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-9 col-12 mx-auto">

            <div class="card card-body mt-1">
                <h6 class="mb-0">Logbook</h6>
                <p class="text-sm mb-0">Silahkan masukkan logbook baru sesuai dengan form yang ada</p>
                <hr class="horizontal dark my-3">

                <form action="{{ route('input-agenda') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <label for="projectName" class="form-label mt-4">Status Pengadu</label>
                    <input type="text" class="form-control" id="projectName" name="status_pengadu"
                        placeholder="Masukkan status pengadu" value="{{ old('status_pengadu') }}">
                    @error('status_pengadu')
                        <div class="text-danger mt-1 small">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="projectName" class="form-label mt-4">Nama Pengadu</label>
                    <input type="text" class="form-control" id="projectName" name="nama"
                        placeholder="Masukkan nama pengadu"value="{{ old('nama') }}">
                    @error('nama')
                        <div class="text-danger mt-1 small">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="projectName" class="form-label mt-4">Nomor HP Pengadu</label>
                    <input type="text" class="form-control" id="projectName" name="no_hp"
                        placeholder="Masukkan nomor hp pengadu" value="{{ old('no_hp') }}">
                    @error('no_hp')
                        <div class="text-danger mt-1 small">
                            {{ $message }}
                        </div>
                    @enderror

                    <label class="mt-4 form-label">Unit</label>
                    <select class="form-control" name="unit" id="choices-button" placeholder="Unit">
                        <option value="{{ old('service') }}" selected="" disabled>Pilih unit</option>
                        @foreach ($units as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->title }}</option>
                        @endforeach
                    </select>
                    @error('service')
                        <div class="text-danger mt-1 small">
                            {{ $message }}
                        </div>
                    @enderror

                    <label class="mt-4 form-label">Layanan</label>
                    <select class="form-control" name="service" id="choices-button" placeholder="Layanan">
                        <option value="{{ old('service') }}" selected="" disabled>Pilih layanan</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->service }}</option>
                        @endforeach
                    </select>
                    @error('service')
                        <div class="text-danger mt-1 small">
                            {{ $message }}
                        </div>
                    @enderror

                    <label class="mt-4 form-label">Sub Layanan</label>

                    <select class="form-control" name="sub_service" id="choices-button" placeholder="Layanan">
                        <option value="{{ old('sub_service') }}" selected="" disabled>Pilih sub layanan</option>
                        @foreach ($sub_services as $sub_service)
                            <option value="{{ $sub_service->id }}">{{ $sub_service->sub_service }}</option>
                        @endforeach
                    </select>
                    @error('sub_service')
                        <div class="text-danger mt-1 small">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="row mt-4">
                        <div class="col-6">
                            <label class="form-label">Tanggal Report</label>
                            <input class="form-control datetimepicker" name="tanggal_report" type="text"
                                placeholder="Pilih tanggal dimulai" value="{{ old('tanggal_report') }}">
                            @error('tanggal_report')
                                <div class="text-danger mt-1 small">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label class="form-label">Tanggal Selesai</label>
                            <input class="form-control datetimepicker" name="tanggal_berakhir" type="text"
                                placeholder="Pilih tanggal berakhir" value="{{ old('tanggal_berakhir') }}">
                            @error('tanggal_berakhir')
                                <div class="text-danger mt-1 small">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-6">
                            <label class="form-label">Jam Report</label>
                            <input class="form-control timepicker" name="jam_report" type="text"
                                placeholder="Pilih tanggal dimulai" value="{{ old('jam_report') }}">
                            @error('jam_report')
                                <div class="text-danger mt-1 small">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label class="form-label">Jam Berakhir</label>
                            <input class="form-control timepicker" name="jam_berakhir" type="text"
                                placeholder="Pilih tanggal berakhir" value="{{ old('jam_berakhir') }}">
                            @error('jam_berakhir')
                                <div class="text-danger mt-1 small">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <label class="mt-4 form-label">Penanggung Jawab</label>
                    <select class="form-control" name="penanggung_jawab[]" id="choices-multiple-remove-button" multiple>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('penanggung_jawab')
                        <div class="text-danger mt-1 small">
                            {{ $message }}
                        </div>
                    @enderror

                    <label class="mt-0">Uraian Masalah</label>
                    <textarea class="multisteps-form__textarea form-control" name="uraian_masalah" rows="5"
                        placeholder="Masukkan uraian_masalah terkait dengan kegiatan yang akan dibuat.">{{ old('uraian_masalah') }}</textarea>
                    @error('uraian_masalah')
                        <div class="text-danger mt-1 small">
                            {{ $message }}
                        </div>
                    @enderror

                    <label class="mt-4 form-label">Status</label>
                    <select class="form-control" name="status" id="choices-button" placeholder="Status">
                        <option value="Belum Di kerjakan">Belum Di kerjakan</option>
                        <option value="Dalam Proses">Dalam Proses</option>
                        <option value="Selesai">Selesai</option>
                    </select>

                    @error('status')
                        <div class="text-danger mt-1 small">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="projectName" class="form-label mt-4">Catatan</label>
                    <input type="text" class="form-control" id="projectName" name="catatan"
                        placeholder="Masukkan catatan" value="{{ old('catatan') }}">
                    @error('catatan')
                        <div class="text-danger mt-1 small">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="projectName" class="form-label mt-4">Diterima Oleh</label>
                    <input type="text" class="form-control" id="projectName" name="diterima_oleh"
                        placeholder="Masukkan Penerima" value="{{ old('diterim_oleh') }}">
                    @error('diterima_oleh')
                        <div class="text-danger mt-1 small">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- Upload image input-->
                    <label class="mt-4 form-label">Upload Gambar</label>
                    <div class="input-group mb-5 px-2 py-2 rounded-pill bg-white shadow-sm">
                        <input id="upload" name="gambar" type="file" onchange="readURL(this);"
                            class="form-control border-0">
                        <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                        <div class="input-group-append">
                            <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i
                                    class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                    class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                        </div>
                    </div>
                    @error('gambar')
                        <div class="text-danger mt-1 small">
                            {{ $message }}
                        </div>
                    @enderror


                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ url()->previous() }}">
                            <button type="button" name="button" class="btn btn-light m-0">Batalkan</button>
                        </a>
                        <button type="submit" name="button" class="btn bg-gradient-primary m-0 ms-2">Buat
                            Agenda</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        /*  ==========================================
                                                                                                                                                                                                                                                                                                SHOW UPLOADED IMAGE
                                                                                                                                                                                                                                                                                            * ========================================== */
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#imageResult')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function() {
            $('#upload').on('change', function() {
                readURL(input);
            });
        });

        /*  ==========================================
            SHOW UPLOADED IMAGE NAME
        * ========================================== */
        var input = document.getElementById('upload');
        var infoArea = document.getElementById('upload-label');

        input.addEventListener('change', showFileName);

        function showFileName(event) {
            var input = event.srcElement;
            var fileName = input.files[0].name;
            infoArea.textContent = 'File name: ' + fileName;
        }
    </script>
@endsection
