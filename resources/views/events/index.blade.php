@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3><b>{{ __('Events') }}</b></h3>
                        <a href="{{ route('events.create') }}" type="button" class="btn btn-primary"><i
                                class="fas fa-plus"></i>&nbsp;Add Event</a>
                    </div>

                    <div class="card-body">
                        <table class="table align-items-center datatable border-1" id="EventsTable" style="border: 1px solid block;">
                            <thead class="">
                                <tr>
                                    <th scope="col" width="10%" class="text-center">NO</th>
                                    <th scope="col" width="30%" class="text-center">EVENTS</th>
                                    <th scope="col" width="30%" class="text-center">SLUG</th>
                                    <th scope="col" class="text-center">ACTIONS</th>
                                </tr>
                            </thead>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
