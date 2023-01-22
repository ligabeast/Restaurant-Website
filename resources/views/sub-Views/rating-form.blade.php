<div class="container my-5">
    <div class="form-group rounded border bg-dark p-5">
        <form method="post" action="/bewertung_verifizieren">
            {{ csrf_field()  }}
            <div class="container m-3">
                <label for="gericht" class="text-white text-weight-bold control-label">Um welches Gericht handelt es sich?</label>
                <select onchange="openStars()" required name="gericht" id="gericht" class="mb-3 text-center form-control" aria-label=".form-select-sm example">
                    <option disabled selected>Bitte wählen Sie eine Option aus</option>
                    @foreach($gerichte as $gericht)
                        <option value="{{$gericht}}">{{$gericht}}</option>
                    @endforeach
                </select>
                <div style="display: none;" class="container-fluent mb-3" id="second">
                <label for="sterne_bewertung" class=" text-white text-weight-bold control-label">Wie viele Sterne vergeben Sie?</label>
                    <select onchange="openText()" required name="rating" id="sterne_bewertung" class="text-center form-control" aria-label=".form-select-sm example">
                        <option disabled selected>Bitte wählen Sie eine Option aus</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div style="display: none;" class="container-fluent" id="third">
                    <label for="comment" class="text-white text-weight-bold control-label">Bitte geben Sie eine Bemerkung ein.</label>
                    <textarea name="bemerkung" onclick="showButton()" maxlength="200" style="resize: none;" required minlength="15" class="form-control" rows="5" id="bemerkung"></textarea>
                    <input class="fw-bold p-2 m-2 float-end rounded" type="submit" id="submit-button" style="display: none;">
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function openStars() {
        document.getElementById('second').style.display = 'block';
    }
    function openText(){
        document.getElementById('third').style.display = 'block';
    }
    function showButton(){
        document.getElementById('submit-button').style.display = 'block';
    }
</script>
