@foreach($searchResult as $user)
    <div class="card mb-3 mx-auto" style="max-width: 800px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <a href="/profile/{{$user->id}}" class="text-decoration-none pictureHover">
                <img src="/storage/profile_pictures/{{$user->profile_picture}}" class="card-img"
                     alt="profile_picture"></a>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$user->firstname . ' ' . $user->lastname}}</h5>
                    <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                    <p class="mb-0">Geburtsdatum: {{date('d.m.Y', strtotime($user->birthDate))}}</p>
                    <p class="mb-0">Wohnort: {{\App\City::find($user->cities_id)->name}}</p>
                    <p class="mb-0">Klasse: {{\App\SchoolClass::find($user->schoolClasses_id)->classname}}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach
