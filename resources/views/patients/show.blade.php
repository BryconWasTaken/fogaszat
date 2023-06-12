<form action="/patient/show" method="post">
    @csrf
    <input type="number" name="id" placeholder="ID">
    <button type="submit">Show</button>
</form>
