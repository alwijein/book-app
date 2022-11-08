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
                            nama_pemesan
                        </th>
                        <th class="text-start text-uppercase text-secondary text-xxx font-weight-bolder opacity-7 ps-2">
                            no_hp
                        </th>
                        <th class="text-start text-uppercase text-secondary text-xxx font-weight-bolder opacity-7 ps-2">
                            nama_kereta
                        </th>
                        <th class="text-start text-uppercase text-secondary text-xxx font-weight-bolder opacity-7 ps-2">
                            stasiun_tujuan
                        </th>
                        <th class="text-start text-uppercase text-secondary text-xxx font-weight-bolder opacity-7 ps-2">
                            harga_tiket
                        </th>
                        <th class="text-start text-uppercase text-secondary text-xxx font-weight-bolder opacity-7 ps-2">
                            jumlah_tiket
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
                                <p class="text-md text-wrap font-weight-bold mb-0">{{ $menu->nama_pemesan }}</p>
                            </td>

                            <td class="align-middle text-start text-md">
                                <p class="text-md text-wrap font-weight-bold mb-0">{{ $menu->no_hp }}</p>
                            </td>
                            <td class="align-middle text-start text-md">
                                <p class="text-md text-wrap font-weight-bold mb-0">{{ $menu->nama_kereta }}</p>
                            </td>
                            <td class="align-middle text-start text-md">
                                <p class="text-md text-wrap font-weight-bold mb-0">{{ $menu->stasiun_tujuan}}</p>
                            </td>
                            <td class="align-middle text-start text-md">
                                <p class="text-md text-wrap font-weight-bold mb-0">{{ $menu->harga_tiket}}</p>
                            </td>
                            <td class="align-middle text-start text-md">
                                <p class="text-md text-wrap font-weight-bold mb-0">{{ $menu->jumlah_tiket}}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
