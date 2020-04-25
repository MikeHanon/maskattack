<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                text-align:right;
                margin:25px 70px;
                line-height:100px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .accueilAll, .logoacc{
                width:90%;
                margin:auto;
            }
            .accueilContain{
                width : 100%;
                margin : auto;
            }
            .partage, .question{
                background-color: #142740;
                color:#FFF;
                display:flex;
                flex-direction:row;
                padding:30px 20px;
            }
            .textPartage{
                margin-left:7%;
                margin-top:5%;
                font-size:18pt;
            }
            .ou{
                margin:auto;
                text-align:center;
                font-size:40pt;
                color:#C9DFF2;
                font-weight: 700;
                font-family:helvetica;
                margin-top:-30px;
                margin-bottom:-20px;
            }
            .trouver{
                background-color:#FFF;
                color:#142740;
                display:flex;
                flex-direction:row;
                padding:30px 30px;
            }
            .textTrouver{
                margin-right:7%;
                margin-left:3%;
                margin-top:5%;
                font-size:18pt;
            }
            .question{
                text-align:center;
            }
            .questionTexte{
                font-size:18pt;
            }
            .quest{
                font-size:25pt;
                font-weight:500;
            }
            .fabriquer{
                width:100%;
                margin:auto;
                margin-top:50px;
                margin-left:10%;
            }
            .imgFab{
                margin-top:50px;
                margin-right:10%;
            }
            .fabriqueAll{
                display:flex;
                flex-direction:row;
                margin-bottom:5%;
            }
            .logoacc{
                margin-top:-6%;
                margin-left:7%;
                margin-bottom:70px;
            }
            .imgvirus{
                margin-left:3%;
            }
            .bandeau{
                background-color:#142740;
                color:#FFF;
                padding:10px 15px;
                font-style:italic;
                width:35%;
                margin:auto;
                margin-bottom:25px;
                margin-top:-15px;
                border-radius:7px;
            }
        </style>
    </head>
    <body>


            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">{{ trans('global.logout') }}</a>

                        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                            <button type="submit">logout</button>
                            {{ csrf_field() }}
                        </form>
{{--                        menu quand autentifier--}}
                    @else
                        <a href="{{ route('login') }}">Connexion</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Inscription</a>
                            <a href="{{route('contact.form')}}">Contactez-nous</a>
                        @endif
                    @endauth
                </div>
            @endif


            <div class="logoacc">
                <img src="{{asset('img/logo-maskattack.png')}}" alt="logo"/>
            </div>

            <div class="accueilAll">
            <p class="bandeau">Les préinscriptions sont ouvertes, lancement de la plateforme le Mercredi 29/04/2020</p>
            <div class="accueilContain">
                <div class="partage">
                    <img src="{{asset('img/imgacc1.jpg')}}" alt="partage" width="330px" class="imgvirus"/>
                    <p class="textPartage">Partagez vos masques, tissus, impressions 3D  sur notre plateforme et rentrez dans vos frais</p>
                </div>
                <div class="ou">OU</div>
                <div class="trouver">
                    <p class="textTrouver">Trouvez des masques et/ou du matériel pour leur confection, auprès de notre communauté</p>
                    <img src="{{asset('img/imgacc2.jpg')}}" alt="trouver" width="330px"/>
                </div>
                <div class="question">
                    <p class="questionTexte"><span class="quest">Qu’est-ce que Maskattack ?</span><br><br>
                    Maskattack est une initiative citoyenne qui vise à mettre en relation des citoyens couturiers amateurs ou professionnels avec d’autres citoyens pour qui la nécessité du port du masque se fait sentir.
                    Cette initiative est entièrement gratuite et bénévole.</p>
                </div>
            </div>

            <div class="fabriqueAll">
            <div class="fabriquer">
                <h3>Comment fabriquer vos masques ?</h3>
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
            <div class="imgFab"><img src="{{asset('img/imgacc3.jpg')}}" alt="règle hygiénique" width="600px" height="630px"/></div>
            </div>

            </div>
    </body>
</html>

