@extends('Layouts.AppLayout')
@section('Pages')
    <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="/schedule" class="btn btn-outline-primary me-3">
            <span data-feather="arrow-left" class="align-text-center"></span>
        </a>
        <h1 class="h2">{{ $title }}</h1>
    </div>
    <div class="row">
        <div class="col-12 col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="/schedule" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="startTime">Start Working Time</label>
                            <input type="time" name="startTime" id="startTime"
                                class="form-control @error('startTime') is-invalid @enderror" autofocus
                                value="{{ old('startTime') }}" required>
                            @error('startTime')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="breakTime">Break Time</label>
                            <input type="time" name="breakTime" id="breakTime"
                                class="form-control @error('breakTime') is-invalid @enderror"
                                value="{{ old('breakTime') }}">
                            @error('breakTime')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="endTime">End Working Time</label>
                            <input type="time" name="endTime" id="endTime" class="form-control @error('endTime') is-invalid @enderror" value="{{ old('endTime') }}" required>
                            @error('endTime')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="day">Working Day</label>
                            <select name="day" id="day" class="form-select @error('day') is-invalid @enderror"
                                required>
                                <option selected disabled hidden>Select Day...</option>
                                <option @if (old('day') == 'Monday') selected @endif value="Monday">Monday</option>
                                <option @if (old('day') == 'Tuesday') selected @endif value="Tuesday">Tuesday</option>
                                <option @if (old('day') == 'Wednesday') selected @endif value="Wednesday">Wednesday</option>
                                <option @if (old('day') == 'Thursday') selected @endif value="Thursday">Thursday</option>
                                <option @if (old('day') == 'Friday') selected @endif value="Friday">Friday</option>
                                <option @if (old('day') == 'Saturday') selected @endif value="Saturday">Saturday</option>
                                <option @if (old('day') == 'Sunday') selected @endif value="Sunday">Sunday</option>
                            </select>
                            @error('day')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-success">
                                <span data-feather="save" class="align-text-bottom"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
