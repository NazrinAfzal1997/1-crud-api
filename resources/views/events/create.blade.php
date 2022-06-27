@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" >
                        <p class="h3" style="color: black"><b>{{ __('Create Event') }}</b></p>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form id="createEventForm">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="event_name">Event Name</label>
                                <input type="text" class="form-control" id="event_name" name="event_name" placeholder="Enter Event's Name" value="{{ old('event_name') }}" required>
                                <span class="text-danger" id="name_error"></span>
                            </div>

                            <div class="form-group mb-2">
                                <label for="event_status">Example select</label>
                                <select class="form-control" id="event_status" name="event_status" required>
                                  <option value="" selected>Select Event Status</option>
                                  <option value="active">Active</option>
                                  <option value="inactive">Inactive</option>
                                </select>
                                <span class="text-danger" id="status_error"></span>
                              </div>

                            <div class="form-group mb-2">
                                <label for="event_name">Start At</label>
                                <input type="datetime-local" class="form-control" id="start_at" name="start_at" placeholder="Event Start At" value="{{ old('start_at') }}" required>
                                <span class="text-danger" id="start_at_error"></span>
                            </div>

                            <div class="form-group mb-2">
                                <label for="event_name">End At</label>
                                <input type="datetime-local" class="form-control" id="end_at" name="end_at" placeholder="Event End At" value="{{ old('end_at') }}" required>
                                <span class="text-danger" id="end_at_error"></span>
                            </div>

                            <a type="button" href="/events" class="btn btn-danger my-3">Cancel</a>
                            <button type="submit" class="btn btn-primary my-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
