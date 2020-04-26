@extends('layouts.app')


@section('content')
    @if (Route::has('login'))

    @endif




    <div class="accueilAll">

        <div class="accueilContain">
            <div class="partage">
                <img src="{{asset('img/imgacc2.jpg')}}" alt="partage" width="330px" class="imgvirus"/>
                <p class="textPartage">Partagez vos masques, tissus, impressions 3D  sur notre plateforme et rentrez dans vos frais</p>
            </div>
            <div class="ou">OU</div>
            <div class="trouver">
                <p class="textTrouver">Trouvez des masques et/ou du matériel pour leur confection, auprès de notre communauté</p>
                <img src="{{asset('img/imgacc1.jpg')}}" alt="trouver" width="330px"/>
            </div>
            <div class="question">
                <p class="questionTexte"><span class="quest">Qu’est-ce que <strong>Maskattack ?</strong></span><br><br>
                    Maskattack est une initiative citoyenne qui vise à mettre en relation des citoyens couturiers amateurs ou professionnels avec d’autres citoyens pour qui la nécessité du port du masque se fait sentir.
                    Cette initiative est entièrement gratuite et bénévole.</p>
            </div>
        </div>

        <h3 class="fabtitle"><strong>Comment</strong> fabriquer vos masques ?</h3>
        <div class="fabriqueAll">

            <div class="fabriquer">
                <p class="fabriquerTexte"> FABRIQUER DES MASQUES EN TISSU:<br><br>
                    - Niveau Fédéral: Spf santé publique:<br>
                    Faites votre masque buccal: Méthode / Tutoriel<br>
                    <a href="https://faitesvotremasquebuccal.be"> https://faitesvotremasquebuccal.be (FR)</a><br>
                    <a href="https://www.uza.be/mondmaskers">https://www.uza.be/mondmaskers (NL)</a><br><br>
                    - Langue des signes : plusieurs vidéos des mesures de précautions<br>
                    <a href="https://www.info-coronavirus.be/fr/videos#interactions">https://www.info-coronavirus.be/fr/videos#interactions</a> <br><br>
                    Lire ! : Coutures & Paillettes - Ingénieur textile<br>
                    <a href="https://coutureetpaillettes.com/mes-coutures/masques-tissus-prevention-coronavirus/?fbclid=IwAR0hquPS80JQK7g5UKEjcLUCLmK_lsANSab7p-9CJywUtLZLD7KzJStJdZo"> La Place des masques en tissus dans la prévention du Coronavirus</a><br>
                    (Comparatif Coton-Polyester / conseils,<br>
                    source: <a href="https://www.repairtogether.be/news/coronavirus-appels-fabrication-de-masque-de-protection">RepairTogether</a>
                </p>
            </div>
            <div class="imgFab"><img class="imglitto" src="{{asset('img/imgacc3.jpg')}}" alt="règle hygiénique" /></div>
        </div>

    </div>
@endsection
@section('scripts')

@endsection
