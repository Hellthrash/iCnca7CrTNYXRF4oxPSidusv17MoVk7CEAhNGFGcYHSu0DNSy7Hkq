@extends('layout.app')


		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}
		</style>


@section('content')

				<div class="title">Laravel 5</div>

	{!! Form::open(['url'=>['ciudades/update',1], 'method'=>'PUT']) !!}


		<button type="submit" class="btn btn-default">Editar</button>

	{!!Form::close()!!}@endsection
