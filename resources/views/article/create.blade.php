	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	    <link rel="stylesheet" href="css/styles.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<title>Articulo</title>
	</head>
	<body>
		<h1>Write a New Article</h1>

		</hr>

		@section('conteiner ')

			{!! Form::open(['url' => 'articles']) !!}

				<div class="form-group">
					{!! Form::label('name', 'Name:') !!}
					{!! Form::text('name', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('body', 'Body:') !!}
					{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Add Article', ['class' => 'btn btn-primary form-control']) !!}
				</div>

			{!! Form::close() !!}


	</body>
	</html>


