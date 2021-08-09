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
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="tile">
                        <form action="{{ route('admin.users.store') }}" method="POST" role="form">
                            @csrf
                            <h3 class="tile-title">Add User</h3>
                            <hr>
                            <div class="tile-body">
                                <div class="form-group">
                                    <label class="control-label" for="name">Name</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        placeholder="Name"
                                        id="name"
                                        name="name"
                                    />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="email"> Email</label>
                                    <input
                                        class="form-control"
                                        type="email"
                                        placeholder="Email address"
                                        id="email"
                                        name="email"
                                    />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="default_email_address"> Roll</label>
                                        <select class="form-control" name="roll">
                                            <option value="">-- Select Roll --</option>
                                            @forelse ($rolls as $roll)
                                            <option value="{{$roll->id}}">{{$roll->roll_name}}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                </div>

                            </div>
                            <div class="tile-footer">
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Create User</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
