@extends('layouts.app')

@section('content')
    {{-- Start table --}}

    <div class="card mt-2">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>

                        <th class="text-uppercase text-secondary text-xxx font-weight-bolder opacity-7 ps-2">No
                        </th>
                        <th class="text-start text-uppercase text-secondary text-xxx font-weight-bolder opacity-7 ps-2">
                            nama_pasien
                        </th>
                        <th class="text-start text-uppercase text-secondary text-xxx font-weight-bolder opacity-7 ps-2">
                            alamat
                        </th>
                        <th class="text-start text-uppercase text-secondary text-xxx font-weight-bolder opacity-7 ps-2">
                            nomor_telp
                        </th>
                        <th class="text-start text-uppercase text-secondary text-xxx font-weight-bolder opacity-7 ps-2">
                            vaksin
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $menu)
                        <tr>
                            <td class="align-middle text-start text-md">
                                <p class="text-md text-wrap font-weight-bold mb-0">{{ $loop->iteration }}</p>
                            </td>

                            <td class="align-middle text-start text-md">
                                <p class="text-md text-wrap font-weight-bold mb-0">{{ $menu->nama_pasien }}</p>
                            </td>

                            <td class="align-middle text-start text-md">
                                <p class="text-md text-wrap font-weight-bold mb-0">{{ $menu->alamat }}</p>
                            </td>
                            <td class="align-middle text-start text-md">
                                <p class="text-md text-wrap font-weight-bold mb-0">{{ $menu->nomor_telp }}</p>
                            </td>
                            <td class="align-middle text-start text-md">
                                <p class="text-md text-wrap font-weight-bold mb-0">{{ $menu->vaksin}}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
