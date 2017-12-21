@extends ('layouts.master')

@section ('content')
	
	<div class="container text-center marketing">
		<h1>{{ $right . '/' . $total }}</h1>

		<div class="container text-center marketing">
			
			<a class="btn btn-lg btn-primary" href="{{ route('start') }}">Home</a>

			<a class="btn btn-lg btn-primary" href="{{ route('play') }}">Play Again?</a>

		</div>
	</div>



@endsection