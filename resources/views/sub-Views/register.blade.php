<div class="modal fade" id="register">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="p-0 modal-body font-weight-bold">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                <div class="bg-dark myform rounded h-100">
                    <h1 class="text-center text-white">Account erstellen</h1>
                    <form method="post" action="/registrierung_verifizieren">
                        {{ csrf_field() }}
                        <div class="container mb-3">
                            <label class="text-white">Name</label>
                            <input REQUIRED name="name" class="form-control" type="text">
                        </div>
                        <div class="container mb-3">
                            <label class="text-white">Email</label>
                            <input REQUIRED name="email" class="form-control" type="email">
                        </div>
                        <div class="container mb-3">
                            <label class="text-white"for="passwd">Passwort</label>
                            <input REQUIRED name="password" id="passwd" class="form-control" type="password">
                        </div>
                        <div class="container mb-3 text-center">
                            <input type="submit" class="register-button w-75 p-2 fw-bold rounded btn-white" value="Registrieren">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-close{
        position: absolute;
        right: 2%;
        top:2%;
        padding-top: 1em;
    }
    .myform{
        max-width: 100%;
        padding: 2em;
        box-shadow: 0 4px 6px 0px rgba(22,22,26,0.18);
    }
    .register-button:hover{
        background-color: #D6D3D3;
    }
    .register-button:active{
        background-color: #BEBBBB;
    }
</style>


