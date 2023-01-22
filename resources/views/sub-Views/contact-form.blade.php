<div class="container">
    <h5 class="text-center mt-5">1. Möglichkeit Embedded Ticket-System</h5>
    <h5 class="text-center mb-5">Um unser Ticket-System benutzen zu können, müssen Sie
        <a data-bs-toggle="modal" data-bs-target="#login"  class="link-secondary login-link">angemeldet</a>
        sein! Fall Sie noch keinen Account haben, können Sie sich
        <a data-bs-toggle="modal" data-bs-target="#register"  class="link-secondary login-link">hier</a>
        einen neuen Account erstellen.</h5>
    <div class="form-group rounded border bg-dark p-5">
        <form method="get" action="/erstelle_ticket">
            <div class="container m-3">
                <label for="reason" class="text-white text-weight-bold control-label">Was ist Ihr Grund für den Kontakt?</label>
                <select onchange="openSecondSelection()" required name="reason" id="reason" class="text-center form-control" aria-label=".form-select-sm example">
                    <option disabled selected>Bitte wählen Sie eine Option aus</option>
                    <option value="Webseiten Probleme">Webseiten Probleme</option>
                    <option value="Zusammenarbeit">Zusammenarbeit</option>
                    <option value="Buchung">Buchung</option>
                    <option value="Beschwerde">Beschwerde</option>
                </select>
            </div>

            <div onchange="openEmail()" class="container m-3" id="secondSelection" style="display: none;">
                <label for="specification" class="text-white text-weight-bold control-label">Bitte spezifizieren Sie Ihren Grund</label>
                <select required id="specification" name="specification" class="text-center form-control">
                    <option disabled selected>Bitte wählen Sie eine Option aus</option>
                </select>
            </div>

            <div onclick="openTextField()" class="container m-3" id="email" style="display: none;">
                <label for="email" class="text-white text-weight-bold control-label">Email</label>
                <input required name="email" type="email" class="form-control">
            </div>

            <div onclick="openButton()" class="container m-3" id="textfield" style="display: none;">
                <label for="comment" class="text-white text-weight-bold control-label">Bitte erzählen Sie uns mehr.</label>
                <textarea name="comment" maxlength="200" style="resize: none;" required minlength="15" class="form-control" rows="5" id="comment"></textarea>
                <input class="fw-bold p-2 m-2 float-end rounded" type="submit" id="submit-button" style="display: none;">
            </div>
        </form>
    </div>

    <h5 class="text-center my-5">2. Möglichkeit über
        <a class="link-secondary" href="mailto:Baran_ozbey02@outlook.de?subject=Kontaktformular&body=Mein Name ist: %0D%0AGrund meines Kontaktes: %0D%0AWaren Sie bereits bei uns essen: %0D%0ABeschreiben Sie Ihre Anfrage: %0D%0A">Email</a>
        können Sie auch unser Kontaktformular ausfüllen.
    </h5>
</div>

<script>
    function removeOptions(selectElement) {
        var i, L = selectElement.options.length - 1;
        for(i = L; i >= 0; i--) {
            selectElement.remove(i);
        }
    }

    function openButton(){
        document.getElementById('submit-button').style.display = 'block';
    }

    function openTextField(){
        document.getElementById('textfield').style.display = 'block';
    }

    function openEmail(){
        document.getElementById('email').style.display = 'block';
    }

    function openSecondSelection(){
        var second = document.getElementById('secondSelection');
        var secondSelect = document.getElementById('specification');

        if(secondSelect.options.length != 1){
            removeOptions(secondSelect);
            var option = document.createElement("option");
            option.text = 'Bitte wählen Sie eine Option aus';
            option.value = 'null';
            option.disabled = true;
            option.selected = true;

            secondSelect.add(option);
        }

        console.log(document.getElementById('reason').value);

        switch(document.getElementById('reason').value) {
            case 'Webseiten Probleme':{
                var option1 = document.createElement("option");
                option1.text = 'Fehler Melden';
                option1.value = 'Fehler';

                var option2 = document.createElement("option");
                option2.text = 'Probleme mit Account';
                option2.value = 'Account';

                secondSelect.add(option1);
                secondSelect.add(option2);
                break;
            }
            case 'Zusammenarbeit':{
                var option3 = document.createElement("option");
                option3.text = 'Promotion';
                option3.value = 'Promotion';

                var option4 = document.createElement("option");
                option4.text = 'Lieferung von Zutaten';
                option4.value = 'Lieferung';

                secondSelect.add(option3);
                secondSelect.add(option4);
                break;
            }
            case 'Buchung':{
                var option5 = document.createElement("option");
                option5.text = 'Für eine private Veranstalltung';
                option5.value = 'privat';

                var option6 = document.createElement("option");
                option6.text = 'Für eine öffentliche Veranstalltung';
                option6.value = 'öffentlich';

                secondSelect.add(option5);
                secondSelect.add(option6);
                break;
            }
            case 'Beschwerde':{
                var option7 = document.createElement("option");
                option7.text = 'Über ein Personal anonyme Beschwerde einreichen';
                option7.value = 'personal';

                var option8 = document.createElement("option");
                option8.text = 'Über Lieferung Beschwerde einreichen';
                option8.value = 'Lieferung';

                secondSelect.add(option7);
                secondSelect.add(option8);
                break;
            }

        }
        second.style.display = 'block';
    }
</script>
