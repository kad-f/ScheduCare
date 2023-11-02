@extends('Layouts.AppLayout')
@section('Pages')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
        <a href="/user/create" class="btn btn-outline-success">
            <span data-feather="plus" class="align-text-center"></span>
        </a>
    </div>
    <div class="table">
        <table class="table table-striped table-sm align-middle">
            <thead>
                <tr>
                    <th class="text-center" scope="col">No.</th>
                    <th class="text-center" scope="col">Email</th>
                    <th class="text-center" scope="col">Name</th>
                    <th class="text-center" scope="col">Gender</th>
                    <th class="text-center" scope="col">Address</th>
                    <th class="text-center" scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}.</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <p>
                                {{ $user->name }}
                                <span
                                    class="badge {{ $user->role == 'admin' ? 'bg-dark' : ($user->role == 'doctor' ? 'bg-primary' : 'bg-success') }}">
                                    @if ($user->role == 'admin')
                                        Admin
                                    @elseif ($user->role == 'doctor')
                                        Doctor
                                    @elseif ($user->role == 'patient')
                                        Patient
                                    @endif
                                </span>
                            </p>
                        </td>
                        <td class="text-center">
                            @if ($user->gender == 'M')
                                <span class="badge rounded-pill text-bg-primary">Male</span>
                            @elseif ($user->gender == 'F')
                                <span class="badge rounded-pill text-bg-danger">Female</span>
                            @elseif ($user->gender == 'L')
                                <span class="badge rounded-pill text-bg-secondary">Lesbian</span>
                            @elseif ($user->gender == 'G')
                                <span class="badge rounded-pill text-bg-success">Gay</span>
                            @elseif ($user->gender == 'B')
                                <span class="badge rounded-pill text-bg-warning">Bisexual</span>
                            @elseif ($user->gender == 'T')
                                <span class="badge rounded-pill text-bg-light">Transgender</span>
                            @elseif ($user->gender == 'N')
                                <span class="badge rounded-pill text-bg-dark">User Privacy</span>
                            @endif
                        </td>
                        <td>{{ $user->address }}</td>
                        <td class="text-end">
                            @if ($user->role !== 'admin')
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-secondary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="/user/{{ $user->id }}/edit">
                                                <span data-feather="edit-2" class="align-text-center"></span> Edit
                                            </a>
                                        </li>
                                        <li>
                                            <form action="/user/{{ $user->id }}" method="POST" class="d-inline">
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
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
