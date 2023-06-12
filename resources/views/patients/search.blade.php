@extends('patients.index')
@section ('patients')
<table>
    <tr>
    <th>Id</th>
    <th>firstname</th>
    <th>surname</th>
    <th>taj</th>
    <th>birthdate</th>
    </tr>
    <tbody>
        @foreach ($patient as $p )
        <p>{{ $p->id }}</p>
        <p>{{ $p->firstname }}</p>
        <p>{{ $p->surname }}</p>
        <p>{{ $p->taj }}</p>
        <p>{{ $p->birthdate }}</p>
        <br>
        @endforeach
    </tbody>
</table>

@endsection

