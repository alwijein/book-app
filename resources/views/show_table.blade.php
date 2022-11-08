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
                            nama_pembeli
                        </th>
                        <th class="text-start text-uppercase text-secondary text-xxx font-weight-bolder opacity-7 ps-2">
                            menu
                        </th>
                        <th class="text-start text-uppercase text-secondary text-xxx font-weight-bolder opacity-7 ps-2">
                            harga
                        </th>
                        <th class="text-start text-uppercase text-secondary text-xxx font-weight-bolder opacity-7 ps-2">
                            banyak
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
                                <p class="text-md text-wrap font-weight-bold mb-0">{{ $menu->nama_pembeli }}</p>
                            </td>

                            <td class="align-middle text-start text-md">
                                <p class="text-md text-wrap font-weight-bold mb-0">{{ $menu->menu }}</p>
                            </td>
                            <td class="align-middle text-start text-md">
                                <p class="text-md text-wrap font-weight-bold mb-0">{{ $menu->harga }}</p>
                            </td>
                            <td class="align-middle text-start text-md">
                                <p class="text-md text-wrap font-weight-bold mb-0">{{ $menu->banyak}}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
