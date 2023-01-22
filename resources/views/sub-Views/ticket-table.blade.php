<div class="container">
    <form method="get" action="/veraendere_status">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Grund</th>
                <th scope="col">Spezifizierter Grund</th>
                <th scope="col">Email</th>
                <th scope="col">Zeitpunkt</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <th scope="col">{{$loop->iteration}}</th>
                    <td>{{$ticket->grund}}</td>
                    <td>{{$ticket->spezifiziert}}</td>                    <td>{{$ticket->email}}</td>
                    <td>{{$ticket->zeitpunkt}}</td>
                    <td>
                        <select name="status_{{$ticket->id}}" id="status" class="text-center form-control" aria-label=".form-select-sm example">
                            <option value="Ausstehend" @if($ticket->status == 'Ausstehend') selected @endif>Ausstehend</option>
                            <option value="Bearbeitung" @if($ticket->status == 'Bearbeitung') selected @endif>Bearbeitung</option>
                            <option value="Abgeschlossen" @if($ticket->status == 'Abgeschlossen') selected @endif>Abgeschlossen</option>
                        </select>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <input type="submit" value="Speichern" class="btn btn-dark fw-bold w-100">
    </form>
</div>
