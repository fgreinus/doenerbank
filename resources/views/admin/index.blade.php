@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Administration</div>

                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Benutzername</th>
                                <th>Email-Adresse</th>
                                <th>Rang</th>
                                <th>Aktionen</th>
                            </tr>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->is_admin ? 'Admin' : 'Benutzer' }}</td>
                                    <td>
                                        <a href="{{ route('admin_user_delete', ['userid' => $user->id]) }}"><i class="glyphicon glyphicon-remove"></i></a>
                                    </td>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
