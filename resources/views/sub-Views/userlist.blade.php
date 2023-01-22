<div class="container">
    <form method="post" action="/admin_liste_speichern#user_list">
        {{csrf_field()}}
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Letzte Anmeldung</th>
                <th scope="col">Admin Rolle</th>
            </tr>
            </thead>
            <tbody>
            @foreach($benutzer as $user)
                <tr>
                    <th scope="col">{{$loop->iteration}}</th>
                    <td>{{$user->NAME}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->lastRegistration}}</td>
                    <td><input type="checkbox" name="{{$loop->iteration}}" value="{{$user->id}}"
                               @if($user->admin)
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
