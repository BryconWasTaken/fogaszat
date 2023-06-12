<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<a href="{{ route('index') }}" class="btn btn-primary">Home</a>
<div class="container">

    <form action="/treatment" method="POST">
        @csrf
        <input type="text" name="treatment_name" placeholder="Treatment name">
        <input type="text" name="treatment_length" placeholder="Treatment length">
        <input type="number" name="price" placeholder="Price">
        <button type="submit">Submit</button>
    </form>

    <form type="get" action="{{ url('/treatment/search') }}">
        <input name="query" type="search" placeholder="Search treatment by ID">
    </form>

    <table class="table table-hover">
        <tr>
            <thead class="table table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Treatment Name</th>
                    <th scope="col">Treatment Length</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            @foreach ($treatment as $t)
                <th>{{ $t->id }}</th>
                <th>{{ $t->treatment_name }}</th>
                <th>{{ $t->treatment_length }}</th>
                <th>{{ $t->price }}</th>
                </tr>
            @endforeach
    </table>

</div>
