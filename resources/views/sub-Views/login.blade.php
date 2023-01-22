<div class="modal fade collapse multi-collapse" id="login">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="p-0 modal-body font-weight-bold">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                <div class="myform bg-dark rounded">
                    <h1 class="text-center text-white">Einloggen</h1>
                    <form method="post" action="/anmeldung_verifizieren">
                        {{ csrf_field() }}
                        <div class="container mb-3">
                            <label class="text-white">Email</label>
                            <input name="email" class="form-control" type="email">
                        </div>
                        <div class="container mb-3">
                            <label class="text-white"for="passwd">Passwort</label>
                            <input name="password" id="passwd" class="form-control" type="password">
                        </div>
                        <div class="container mb-3 text-center">
                            <input type="submit" class="login-button w-75 p-2 fw-bold rounded btn-white" value="Login">
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
    .login-button:hover{
        background-color: #D6D3D3;
    }
    .login-button:active{
        background-color: #BEBBBB;
    }
</style>
