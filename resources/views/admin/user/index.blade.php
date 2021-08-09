@extends('admin.app')

@section('title') {{ 'User Manage' }} @endsection

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-cogs"></i> {{ 'User Manage' }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row user">

        <div class="col-md-12">
            <a href="{{ route('admin.users.create')}}" class="btn btn-primary">
                Add User
            </a>
        </div>
        <div class="col-md-12">
            <div class="tab-content">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">roll</th>
                      </tr>
                    </thead>
                    <tbody>

                        @forelse ($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->roll->roll_name}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>
                                No data available
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
