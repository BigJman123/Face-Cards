@extends('layouts.master')

@section('content')
<h3>{{$count+1}} / 10</h3>
<div class="container">
	<div class="row">
		<img class="rounded mx-auto d-block" src="{{ asset($selected->path) }}">	
	</div>

	<div class="text-center marketing">
      <div class="col-lg-12">

        @foreach($cards as $card)
          <button class="btn btn-primary" onclick="{{ $card->id === $selected->id ? 'right('.$card->id.')' : 'wrong('.$card->id.')'}}">
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
      
      function right(id) {
        $('button').attr('disabled', true);
        document.getElementById('correctDiv').style.display = "block";

        $.post("card/"+id+"/attempt", {'answer': 1}).always(function (data) {
              setTimeout(function() {
                window.location.reload();
              }, 700);
          });

      }

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