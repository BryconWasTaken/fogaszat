@extends('patients.treatment')
@section ('treatment')
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
@endsection

