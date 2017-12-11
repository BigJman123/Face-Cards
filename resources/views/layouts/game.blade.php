@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<img class="rounded mx-auto d-block" src="{{ asset($card->path) }}">	
	</div>

	<div class="row marketing">
      <div class="col-lg-8">
        
      	<button class="btn btn-primary" onclick="rightDiv()">
          {{ $card->name }}
        </button>

      	<button class="btn btn-primary" onclick="wrongDiv()">
          {{ $name->random() }}
        </button>

      	<button class="btn btn-primary" onclick="wrongDiv()">
          {{ $name->random() }}
        </button>

      	<button class="btn btn-primary" onclick="wrongDiv()">
          {{ $name->random() }}
        </button>

      </div>
    </div>

    <div id="correctDiv" class="container alert alert-success" style="display: none" value="showDiv">
      <h4>Correct</h4>
    </div>

    <div id="wrongDiv" class="container alert alert-danger" style="display: none" value="showDiv">
      <h4>Wrong</h4>
    </div>

</div>
@endsection