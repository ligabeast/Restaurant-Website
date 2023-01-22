<div class="container">
    <div class="d-flex justify-content-center flex-wrap">
        @foreach($gerichte as $gericht)
            <div class="p-2">
                <div class="card text-dark bg-light mb-3 justify-content-center" style="max-width: 18rem;">
                    <div class="align-items-center d-flex justify-content-center card-header text-center fw-bold" style="height: 80px; width: 232px; font-size: 20px;">
                        {{$gericht->name}}
                    </div>
                    <div class="card-body justify-content-center">
                        <img alt="FAILED" class="rounded mx-auto d-block image_showed" src="
                            @if(file_exists('img/gerichte/'.$gericht->id.'_'.$gericht->name.'.jpg'))
                                {{asset('img/gerichte/'.$gericht->id.'_'.$gericht->name.'.jpg')}}
                            @else
                                {{asset('img/gerichte/00_image_missing.jpg')}}
                            @endif
                        ">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<style>
    .image_showed {
        width: 200px;
        height: 200px;
    }
</style>
