@extends('layouts.admin')
@section('admin-section')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row mb-xl-3 mb-2">
                <div class="d-none d-sm-block col-auto">
                    <h3><strong>Active</strong> Games</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            @forelse($games as $game)
                                <div class="col-sm-3" id="gameCard{{$game->id}}">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h5 class="card-title">{{ $game->title }}</h5>
                                                </div>
                                            </div>
                                            <div class="py-2">
                                                <span class="h2 text-primary mb-3 mt-1">{{ count($game->activeTickets) }}</span>
                                                <span class="h4">{{count($game->activeTickets) > 1 ? Str::plural('Ticket') : 'Ticket'}} Found</span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="text-muted">{{ date('jS M, Y', strtotime($game->updated_at)) }}</span>
                                            </div>

                                            <button class="btn btn-sm btn-info {{ $game->activeTickets->count() ? '' : 'd-none' }} mt-2"
                                                onclick="runGame({{ $game->id }})">Run Game</button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h4 class="text-info text-center">No Game Found</h4>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('admin-script')
    <script>
        function runGame(id) {
            axios.get(`/admin/game/run/${id}`)
                .then((res) => {
                    // console.log(res);

                    if (res.data.status === 'success') {
                        document.querySelector('#gameCard' + id).remove();
                        notify(res.data.message, res.data.status);
                    }

                    if (res.data.status === 'error') {
                        notify(res.data.message, res.data.status);
                    }
                })
                .catch((err) => {
                    console.log(err);
                })
        }
    </script>
@endpush
