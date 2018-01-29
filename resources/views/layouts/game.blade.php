@extends('layouts.master')

@section('content')

<!-- This increments after every card guess -->
<h3>{{ $count+1 }} / 10</h3>
<div class="container">

  <!-- This gets the image path of the selected card -->
	<div class="row">
		<img class="rounded mx-auto d-block" src="{{ asset($selected->path) }}">	
	</div>

	<div class="text-center marketing">
      <div class="col-lg-12">

        <!-- This displays four random buttons -->
        @foreach($cards as $card)
          <button class="btn btn-primary" onclick="{{ $card->id === $selected->id ? 'right('.$selected->id.')' : 'wrong('.$selected->id.')'}}">
            {{ $card->name }}
          </button>
        @endforeach
      	

      </div>
    </div>

    <!-- This displays when you get a correct answer -->
    <div id="correctDiv" class="container alert alert-success" style="display: none" value="showDiv">
      <h4>Correct</h4>
    </div>

    <!-- This displays when you get the answer wrong -->
    <div id="wrongDiv" class="container alert alert-danger" style="display: none" value="showDiv">
      <h4>Wrong. Try again.</h4>
    </div>

</div>
@endsection

@section('footer')
<script type="text/javascript">
      
      // This JS disables buttons after press
      function right(id) {
        $('button').attr('disabled', true);
        document.getElementById('correctDiv').style.display = "block";

        // this makes an ajax request to "card/id/attempt and passes 1/true and then reloads the window"
        $.post("card/"+id+"/attempt", {'answer': 1}).always(function (data) {
              setTimeout(function() {
                window.location.reload();
              }, 700);
          });
      }

      // this makes an ajax request to "card/id/attempt and passes 0/false and then reloads the window"
      function wrong(id) {
        $('button').attr('disabled', true);
        document.getElementById('wrongDiv').style.display = "block";

        $.post("card/"+id+"/attempt", {'answer': 0}).always(function (data) {
              setTimeout(function() {
                window.location.reload();
              }, 700);
          });
      }
</script>
@endsection 