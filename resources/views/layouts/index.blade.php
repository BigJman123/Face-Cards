@extends ('layouts.master')

@section ('content')

	 <main role="main">

        <div class="jumbotron">
          <h1 class="display-3">This is Face Cards!</h1>
          <p class="lead">This game is designed to help you remember the names of over 200+ Wilber employees. Start learning now!</p>

          <a class="btn btn-lg btn-primary" href="{{route('play')}}">Play</a>
        </div>

        <!-- <div class="row marketing">
          <div class="col-lg-6">
            <h4>Subheading</h4>
            <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
          </div>
        </div> -->

      </main>

@endsection