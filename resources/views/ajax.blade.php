<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title></title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<style >
		#image img {
			max-width: 300px;
		}
	</style>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="image">
				</div>
				<button class="btn btn-success" id="load_anh">Load ảnh</button>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function () {
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

			$("#load_anh").click(function () {
				$.ajax({
					method: 'POST',
					url: '{{ route('anh-gai-xinh') }}',
					success: function (result) {
						$("#image").html(result)
					}
				})
			});
		});
	</script>
</body>
</html>