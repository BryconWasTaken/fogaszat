@extends('visit.visits')
@section('visit')
    <table>
        <tr>
            <th>Id</th>
            <th>Visit Date</th>
            <th>Patient ID</th>
            <th>Treatment</th>
        </tr>

        <tbody>
            @foreach ($visit as $v)
                <th>{{ $v->id }}</th>
                <th>{{ $v->visit_date }}</th>
                <th>{{ $v->patient->firstname }}</th>
                <th>{{ $v->patient->surname }}</th>
                <th>{{$v->treatment->treatment_name}}</th>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
