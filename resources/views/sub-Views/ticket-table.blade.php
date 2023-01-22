<div class="container">

    <div class="d-flex flex-row-reverse align-items-center">
        <div class="p-2">
            <select onchange="changeTable()" name="sort" id="sort" class="text-center form-control" aria-label=".form-select-sm example">
                <option value="Alle">Alle</option>
                <option value="Ausstehend">Ausstehend</option>
                <option value="Bearbeitung">Bearbeitung</option>
                <option value="Abgeschlossen">Abgeschlossen</option>
            </select>
        </div>
        <div class="p-2">
            <label class="label fw-bold" for="sort">Anzeigen: </label>
        </div>
    </div>

    <div class="container-fluent" id="Alle">
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
                        <td>{{$ticket->reason}}</td>
                        <td>{{$ticket->specifikation}}</td>
                        <td>{{$ticket->email}}</td>
                        <td>{{$ticket->created_at}}</td>
                        <td>
                            <select name="status_{{$ticket->id}}" id="status" class="text-center form-control" aria-label=".form-select-sm example">
                                <option value="Ausstehend" @if($ticket->state == 'Ausstehend') selected @endif>Ausstehend</option>
                                <option value="Bearbeitung" @if($ticket->state == 'Bearbeitung') selected @endif>Bearbeitung</option>
                                <option value="Abgeschlossen" @if($ticket->state == 'Abgeschlossen') selected @endif>Abgeschlossen</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <input type="submit" value="Speichern" class="btn btn-dark fw-bold w-100">
        </form>
    </div>

    <div class="container-fluent" id="Ausstehend" style="display: none;">
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
                    @if($ticket->state == 'Ausstehend')
                        <tr>
                            <th scope="col">{{$loop->iteration}}</th>
                            <td>{{$ticket->reason}}</td>
                            <td>{{$ticket->specifikation}}</td>
                            <td>{{$ticket->email}}</td>
                            <td>{{$ticket->created_at}}</td>
                            <td>
                                <select name="status_{{$ticket->id}}" id="status" class="text-center form-control" aria-label=".form-select-sm example">
                                    <option value="Ausstehend" @if($ticket->state == 'Ausstehend') selected @endif>Ausstehend</option>
                                    <option value="Bearbeitung" @if($ticket->state == 'Bearbeitung') selected @endif>Bearbeitung</option>
                                    <option value="Abgeschlossen" @if($ticket->state == 'Abgeschlossen') selected @endif>Abgeschlossen</option>
                                </select>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            <input type="submit" value="Speichern" class="btn btn-dark fw-bold w-100">
        </form>
    </div>

    <div class="container-fluent" id="Bearbeitung" style="display: none;">
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
                    @if($ticket->state == 'Bearbeitung')
                        <tr>
                            <th scope="col">{{$loop->iteration}}</th>
                            <td>{{$ticket->reason}}</td>
                            <td>{{$ticket->specifikation}}</td>
                            <td>{{$ticket->email}}</td>
                            <td>{{$ticket->created_at}}</td>
                            <td>
                                <select name="status_{{$ticket->id}}" id="status" class="text-center form-control" aria-label=".form-select-sm example">
                                    <option value="Ausstehend" @if($ticket->state == 'Ausstehend') selected @endif>Ausstehend</option>
                                    <option value="Bearbeitung" @if($ticket->state == 'Bearbeitung') selected @endif>Bearbeitung</option>
                                    <option value="Abgeschlossen" @if($ticket->state == 'Abgeschlossen') selected @endif>Abgeschlossen</option>
                                </select>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            <input type="submit" value="Speichern" class="btn btn-dark fw-bold w-100">
        </form>
    </div>

    <div class="container-fluent" id="Abgeschlossen" style="display: none;">
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
                    @if($ticket->state == 'Abgeschlossen')
                        <tr>
                            <th scope="col">{{$loop->iteration}}</th>
                            <td>{{$ticket->reason}}</td>
                            <td>{{$ticket->specifikation}}</td>
                            <td>{{$ticket->email}}</td>
                            <td>{{$ticket->created_at}}</td>
                            <td>
                                <select name="status_{{$ticket->id}}" id="status" class="text-center form-control" aria-label=".form-select-sm example">
                                    <option value="Ausstehend" @if($ticket->state == 'Ausstehend') selected @endif>Ausstehend</option>
                                    <option value="Bearbeitung" @if($ticket->state == 'Bearbeitung') selected @endif>Bearbeitung</option>
                                    <option value="Abgeschlossen" @if($ticket->state == 'Abgeschlossen') selected @endif>Abgeschlossen</option>
                                </select>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            <input type="submit" value="Speichern" class="btn btn-dark fw-bold w-100">
        </form>
    </div>
</div>

<script type="application/javascript">
    function changeTable(){
        current = document.getElementById('sort').value;

        console.log(current);
        if(current == "Alle"){
            document.getElementById('Alle').style.display = "block";
            document.getElementById('Bearbeitung').style.display = "none";
            document.getElementById('Ausstehend').style.display = "none";
            document.getElementById('Abgeschlossen').style.display = "none";
        }
        if(current == "Ausstehend"){
            document.getElementById('Alle').style.display = "none";
            document.getElementById('Bearbeitung').style.display = "none";
            document.getElementById('Ausstehend').style.display = "block";
            document.getElementById('Abgeschlossen').style.display = "none";
        }
        if(current == 'Bearbeitung'){
            document.getElementById('Alle').style.display = 'none';
            document.getElementById('Bearbeitung').style.display = 'block';
            document.getElementById('Ausstehend').style.display = 'none';
            document.getElementById('Abgeschlossen').style.display = 'none';
        }
        if(current == 'Abgeschlossen'){
            document.getElementById('Alle').style.display = 'none';
            document.getElementById('Bearbeitung').style.display = 'none';
            document.getElementById('Ausstehend').style.display = 'none';
            document.getElementById('Abgeschlossen').style.display = 'block';
        }

    }
</script>
