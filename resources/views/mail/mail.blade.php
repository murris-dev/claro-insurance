@extends('layouts.app')

@section('content')
<div class="container">
	<p class="text-center">
		<a class="btn btn-primary" href="{{ route('mail.create') }}">nuevo correo</a>
	</p>

	@if($emails->isEmpty())
		<p>Array vacio</p>
	@else
	<table class="table">
		<thead>
			<tr>
				<th>Destition</th>
				<th>Title</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($emails as $email)
			<tr>
				<td>{{ $email->destination }}</td>
				<td>{{ $email->title }}</td>
				<td>
					@if(!$email->send_to)
						<a href="#" class="btn btn-link"><i class="fa fa-envelope"></i></a>
						<a href="#" class="btn btn-link"><i class="fa fa-edit"></i></a>
					@endif
					<a href="#" class="btn btn-link"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
</div>
@endsection