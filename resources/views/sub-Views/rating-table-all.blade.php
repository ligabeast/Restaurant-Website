<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Sterne</th>
            <th scope="col">Bemerkung</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bewertungen as $bewertung)
            <tr>
                <th scope="col">{{$loop->iteration}}</th>
                <td>{{$bewertung->gerichte_id}}</td>
                <td>{{$bewertung->sterne_bewertung}}</td>
                <td>{{$bewertung->bemerkung}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
