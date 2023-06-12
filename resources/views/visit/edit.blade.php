<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <a href="{{ route('visit.index') }}" class="btn btn-primary">Back</a>
<h1> You can edit visits here</h1>
<div class ="container">
<form method="POST" action="{{url('/edit-product')}}">
{{ csrf_field() }}

<div class="form-group">
    <label for="exampleFormControlInput1">Visit Date</label>
    <input type="datetime-local" name="date" class="form-control" placeholder="Date">
</div>


<select name="patient_id" class="form-control" id="exampleFormControlSelect1">
    @foreach ($patient as $p)
    <option value="{{$p->id}}">{{$p->firstname}} {{$p->surname}}</option>
    @endforeach
</select>
<select name="treatment_id" class="form-control" id="exampleFormControlSelect1">
    @foreach ($treatment as $t)
    <option value="{{$t->id}}">{{$t->treatment_name}}</option>
    @endforeach
</select>

<button class="btn btn-primary mt-3">Submit</button>
</form>
