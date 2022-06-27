@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <p class="h3" style="color: black">Event : {{ $event->name }}</p>
                        <button class="btn btn-{{ ($event->status=='active')? 'success' : 'danger' }}">{{ ucfirst($event->status) }}</button>
                    </div>

                    <div class="card-body">

                        <form>
                            @csrf
                            <div class="form-group">
                                <label for="event_name" class="col">Event Name</label>
                                <p class="h4" style="color: black">{{ $event->name }}</p>
                            </div>
                            <div class="form-group">
                                <label for="event_slug" class="col">Event Slug</label>
                                <p class="h4" style="color: black">{{ $event->slug }}</p>
                            </div>
                            <hr>
                            @if (!empty($event->start_at))
                            <div class="row">
                                <p class="h4">Event Date & Time</p>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="event_slug" class="col">Start At</label>
                                    <p class="h4" style="color: black">{{ date("j F Y, g:i a", strtotime($event->start_at)) }}</p>
                                </div>
                                <div class="col-6">
                                    <label for="event_slug" class="col">End At</label>
                                    <p class="h4" style="color: black">{{ date("j F Y, g:i a", strtotime($event->end_at)) }}</p>
                                </div>
                            </div>
                            @endif
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <label for="event_slug" class="col">Created At</label>
                                    <p class="h4" style="color: black">{{ date("j F Y, g:i a", strtotime($event->created_at)) }}</p>
                                </div>
                                <div class="col-6">
                                    <label for="event_slug" class="col">Updated At</label>
                                <p class="h4" style="color: black">{{ date("j F Y, g:i a", strtotime($event->updated_at)) }}</p>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
