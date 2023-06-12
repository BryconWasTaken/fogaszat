<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<a href="{{ route('index') }}" class="btn btn-primary">Home</a>
<div class="container">

    <form action="/patient" method="POST">
        @csrf
        <input type="text" name="firstname" placeholder="firstname">
        <input type="text" name="surname" placeholder="surname">
        <input type="number" name="taj" placeholder="TAJ">
        <input type="date" name="birthdate" placeholder="birthdate">
        <button type="submit">Submit</button>
    </form>

    <form type="get" action="{{ url('/patient/search') }}">
        <input name="query" type="search" placeholder="Search Patient by ID">
    </form>

    <table class="table table-hover">
        <tr>
            <thead class="table table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Surname</th>
                    <th scope="col">TAJ</th>
                    <th scope="col">Birthdate</th>
                </tr>
            </thead>
            @foreach ($patient as $p)
                <th>{{ $p->id }}</th>
                <th>{{ $p->firstname }}</th>
                <th>{{ $p->surname }}</th>
                <th>{{ $p->taj }}</th>
                <th>{{ $p->birthdate }}</th>
        </tr>
        @endforeach
    </table>

</div>
