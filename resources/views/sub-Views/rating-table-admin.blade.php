<div class="container">
    <form method="post" action="/adminbereich/bewertung_speichern">
        {{csrf_field()}}
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
                    <td>{{$bewertung->gerichte_id}}</td>
                    <td>{{$bewertung->sterne_bewertung}}</td>
                    <td>{{$bewertung->bemerkung}}</td>
                    <td><input type="checkbox" name="{{$loop->iteration}}" value="{{$bewertung->id}}"
                        @if($bewertung->wird_angezeigt)
                            checked
                        @endif
                        ></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <input type="submit" value="Speichern" class="btn btn-dark fw-bold w-100">
    </form>
</div>
