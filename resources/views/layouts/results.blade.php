@extends ('layouts.master')

@section ('content')
	
	<div class="container text-center marketing">
		<h1>{{ $right . '/' . $total }}</h1>

		<!-- This displays when you get the answer wrong -->
		<div id="zeroCorrect" class="container alert alert-danger" style="display: none;" value="showDiv">
			<h4>
				Doh! 😲 You didn't get any. In the words of Marty McFly, 
				"If you put your mind to it, you can accomplish anything." Try again! 👍
			</h4>
		</div>

		<!-- This displays when you get the answer wrong -->
		<div id="betweenOneAndThree" class="container alert alert-danger" style="display: none" value="showDiv">
			<h4>Good start. 🤔 Think hard. With some extra practice you can get them all!</h4>
		</div>
		
		<!-- This displays when you get the answer wrong -->
		<div id="betweenFourAndSix" class="container alert alert-warning" style="display: none" value="showDiv">
			<h4>Good job. 🙂 You've gotten more than a few correct. Keep going! I believe in you!</h4>
		</div>
		
		<!-- This displays when you get the answer wrong -->
		<div id="betweeSevenAndNine" class="container alert alert-success" style="display: none" value="showDiv">
			<h4>Well Done. 😀 You've gotten a significant amount correct. You're so close to getting them all! Keep going!</h4>
		</div>
		
		<!-- This displays when you get the answer wrong -->
		<div id="tenOutOfTen" class="container alert alert-success" style="display: none" value="showDiv">
			<h4>Great job! 😁 🎉 You got all of them correct! 🎉 I knew you could do it! 🎉 👍 </h4>
		</div>

		<div class="container text-center marketing">
			
			<a class="btn btn-lg btn-primary" href="{{ route('start') }}">Home</a>

			<a class="btn btn-lg btn-primary" href="{{ route('play') }}">Play Again?</a>

		</div>
	</div>

	<script type="text/javascript">

		let right = '{{ $right }}'

		function between(x, min, max) {
			return x >= min && x <= max;
		}
      
		if(between(right, 0, 0)) {
			document.getElementById('zeroCorrect').style.display = "block";
		}
		else if(between(right, 1, 3)) {
			document.getElementById('betweenOneAndThree').style.display = "block";
		}
		else if(between(right, 4, 6)) {
			document.getElementById('betweenFourAndSix').style.display = "block";
		}
		else if(between(right, 7, 9)) {
			document.getElementById('betweeSevenAndNine').style.display = "block";
		}
		else {
			document.getElementById('tenOutOfTen').style.display = "block";
		}


	</script>


@endsection