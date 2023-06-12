<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<a href="{{ route('index') }}" class="btn btn-primary">Home</a>
<div class="container">

    <form action="/visit" method="POST">
        @csrf
        <input type="datetime-local" name="visit_date" placeholder="date">
        <input type="number" name="patient_id" placeholder="patient id">
        <input type="number" name="treatment_id" placeholder="treatment id">
        <button type="submit">Submit</button>
    </form>

    <form type="get" action="{{ url('visit/search') }}">
        <input name="query" type="date" placeholder="Search Visit by ID">
        <button type="submit">Search</button>
    </form>

    <table class="table table-hover">
        <tr>
            <thead class="table table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Visit Date</th>
                    <th scope="col">Patient name</th>
                    <th></th>
                    <th scope="col">Treatment</th>
                    <th scope="col">Price HUF</th>
                    <th></th>
                </tr>
            </thead>
            @foreach ($visit as $v)
                <th>{{ $v->id }}</th>
                <th>{{ $v->visit_date }}</th>
                <th>{{ $v->patient->firstname }}</th>
                <th>{{ $v->patient->surname }}</th>
                <th>{{ $v->treatment->treatment_name ?? 'N/A'}}</th>
                <th>{{ $v->treatment->price ?? 'N/A'}}</th>
                <td><a href="{{url('/edit-visit/'.$v->id)}}" class="btn btn-primary">Edit</a></td>
                </tr>
        @endforeach
    </table>

</div>
