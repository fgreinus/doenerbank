@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Bestellung</div>

				<div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-md-6">
                        <h4>Neue Bestellung eintragen</h4>
                        <form action="#" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="order_id">Datum der Bestellung</label>
                                <select name="order_id" id="order_id" class="form-control">
                                    @foreach($orders as $order)
                                        <option value="{{ $order->id }}"
                                                @if($order->is_closed) disabled @endif
                                                >{{ $order->date }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="article_id">Gewünschter Artikel</label>
                                <select name="article_id" id="article_id" class="form-control">
                                    @foreach($articles as $article)
                                        <option value="{{ $article->id }}">{{ $article->name }} ({{ number_format($article->price, 2) }} &euro;)</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="amount">Gewünschte Anzahl</label>
                                <input type="text" name="amount" id="amount" value="1" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="notes">Notizen</label>
                                <textarea name="notes" id="notes" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <input class="btn btn-success" type="submit" name="submit" id="submit" value="Bestellen">
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <h4>Bestehende Bestellungen einsehen</h4>
                        <table class="table table-striped">
                            @foreach($orders as $order)
                                <tr>
                                    <th>{{ $order->date }}</th>
                                    <th>Verwalter: {{ $order->allocatedUser->name }}</th>
                                    <th><i class="glyphicon glyphicon-{{ $order->is_closed ? 'lock' : 'ok' }}"></i></th>
                                </tr>
                                @foreach($order->orderLines as $line)
                                    <tr>
                                        <td></td>
                                        <td>{{ $line->amount }}x {{ $line->article->name }} ({{ number_format($line->amount * $line->article->price, 2) }} &euro;)</td>
                                        <td>{{ $line->user->name }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </table>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
