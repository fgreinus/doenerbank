@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Bestelltage konfigurieren</div>

                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Datum</th>
                                <th>bisherige Bestellungen</th>
                                <th>Besteller</th>
                                <th>Aktionen</th>
                            </tr>
                            @if($orderDays->count() > 0)
                                @foreach($orderDays as $day)
                                    <tr>
                                        <td>{{ $day->date_of_order }}</td>
                                        <td>{{ $day->orders->count() }}</td>
                                        <td>{{ $day->manager->name }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">
                                        Keine Bestelltage vorhanden.
                                    </td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
