<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Sterne</th>
            <th scope="col">Bemerkung</th>
            <th scope="col">Anzeigen auf Hauptseite</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bewertungen as $bewertung)
            <tr>
                <th scope="col">{{$loop->iteration}}</th>
                <td>{{$bewertung->food_id}}</td>
                <td>{{$bewertung->rating}}</td>
                <td>{{$bewertung->comment}}</td>
                <td>
                    <a href="loesche_bewertung?id={{$bewertung->id}}" class="link-dark">Löschen</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
