@extends ('layouts.master')

@section ('content')

	 <main role="main">

        <div class="jumbotron">
          <h1 class="display-3">This is Face Cards!</h1>
          <p class="lead">This game is designed to help you remember the names of over 200+ Wilber employees. Start learning now!</p>

          <a class="btn btn-lg btn-primary" href="{{route('play')}}">Play</a>
        </div>

      </main>

@endsection