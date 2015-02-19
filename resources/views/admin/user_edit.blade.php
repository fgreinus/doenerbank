@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Administration: Benutzer</div>

                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <td>Name:</td>
                                <td><input name="name" value="{{ $user->name }}" class="input-lg"></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input name="name" value="{{ $user->name }}" class="input-lg"></td>
                            </tr>
                            <tr>
                                <td>Administrator:</td>
                                <td><input name="checkbox" value="1"
                                           @if($user->is_admin) checked @endif
                                           class="input-lg"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
