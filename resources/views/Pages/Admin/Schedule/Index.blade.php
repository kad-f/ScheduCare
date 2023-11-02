@extends('Layouts.AppLayout')
@section('Pages')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
        <a href="/schedule/create" class="btn btn-outline-success">
            <span data-feather="plus" class="align-text-center"></span>
        </a>
    </div>
    <div class="table">
        <table class="table table-striped table-sm align-middle">
            <thead>
                <tr>
                    <th class="text-center" scope="col">No.</th>
                    <th class="text-center" scope="col">Day</th>
                    <th class="text-center" scope="col">Start Time</th>
                    <th class="text-center" scope="col">Break Time</th>
                    <th class="text-center" scope="col">End Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}.</td>
                        <td class="text-center">{{ $schedule->day }}</td>
                        <td class="text-center">{{ $schedule->startTime }}</td>
                        <td class="text-center">{{ $schedule->breakTime }}</td>
                        <td class="text-center">{{ $schedule->endTime }}</td>
                        <td class="text-end">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-secondary dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="/schedule/{{ $schedule->id }}/edit">
                                            <span data-feather="edit-2" class="align-text-center"></span> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <form action="/schedule/{{ $schedule->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button
                                                onclick="return confirm('Are you sure you want to perform this action?')"
                                                class="dropdown-item">
                                                <span data-feather="trash"></span> Delete
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @if ($schedules->count() === 0)
                    <tr>
                        <td class="text-center" colspan="6">No Schedule Data Available.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
