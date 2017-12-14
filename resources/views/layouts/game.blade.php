@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<img class="rounded mx-auto d-block" src="{{ asset($selected->path) }}">	
	</div>

	<div class="text-center marketing">
      <div class="col-lg-12">

        @foreach($cards as $card)
          <button class="btn btn-primary" onclick="{{ $card->id === $selected->id ? 'right()' : 'wrong()'}}">
            {{ $card->name }}
          </button>
        @endforeach
      	

      </div>
    </div>

    <div id="correctDiv" class="container alert alert-success" style="display: none" value="showDiv">
      <h4>Correct</h4>
    </div>

    <div id="wrongDiv" class="container alert alert-danger" style="display: none" value="showDiv">
      <h4>Wrong. Try again.</h4>
    </div>

</div>
@endsection

@section('footer')
<script type="text/javascript">
      
      function right() {

        document.getElementById('correctDiv').style.display = "block";

        setTimeout(function() {
          window.location.reload();
        }, 1000);

      }

      function wrong() {
        
        document.getElementById('wrongDiv').style.display = "block";

        setTimeout(() => document.getElementById('wrongDiv').style.display = "none", 1000);

      }

</script>
@endsection 