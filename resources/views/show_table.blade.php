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
                            user_id
                        </th>
                        <th class="text-start text-uppercase text-secondary text-xxx font-weight-bolder opacity-7 ps-2">
                            team_name
                        </th>
                        <th class="text-start text-uppercase text-secondary text-xxx font-weight-bolder opacity-7 ps-2">
                            player_id
                        </th>
                        <th class="text-start text-uppercase text-secondary text-xxx font-weight-bolder opacity-7 ps-2">
                            player_fullname
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
                                <p class="text-md text-wrap font-weight-bold mb-0">{{ $menu->user_id }}</p>
                            </td>

                            <td class="align-middle text-start text-md">
                                <p class="text-md text-wrap font-weight-bold mb-0">{{ $menu->team_name }}</p>
                            </td>
                            <td class="align-middle text-start text-md">
                                <p class="text-md text-wrap font-weight-bold mb-0">{{ $menu->player_id }}</p>
                            </td>
                            <td class="align-middle text-start text-md">
                                <p class="text-md text-wrap font-weight-bold mb-0">{{ $menu->player_fullname}}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
