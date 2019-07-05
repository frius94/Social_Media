@foreach($friendRequests as $person)


	<div class="alert alert-dismissible alert-success mb-1">
		<button type="button" class="close" data-dismiss="alert">&times;</button>

		<div class="container">New Friend request From <a href="/profile/{{$person->id}}">{{$person->firstname}}</a></div>

		<div class="btn-group container mt-2 mb-0 ml-5">
			<form action="addFriend/{{$person->id}}/1" method="post">
				@csrf
				<input class="btn btn-success mr-3" type="submit" value="Accept">

			</form>

			<form action="addFriend/{{$person->id}}/0" method="post">
				@csrf
				<input class="btn btn-danger" type="submit" value="Decline">

			</form>

		</div>

	</div>


@endforeach