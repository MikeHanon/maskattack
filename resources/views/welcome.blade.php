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
                position: absolute;
                right: 10px;
                top: 18px;
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
            .accueilAll{
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
                padding:20px 30px;
            }
            .textPartage{
                margin-left:30px;
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
                padding:20px 30px;
            }
            .textTrouver{
                margin-right:30px;
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
            }
            .imgFab{
                margin-top:50px;
            }
            .fabriqueAll{
                display:flex;
                flex-direction:row;
            }
        </style>
    </head>
    <body>

            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <li class="nav-item">
                            <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                <p>
                                    <i class="fas fa-fw fa-sign-out-alt nav-icon">

                                    </i>
                                <p>{{ trans('global.logout') }}</p>

                            </a>
                        </li>
                        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                            <button type="submit">logout</button>
                            {{ csrf_field() }}
                        </form>
{{--                        menu quand autentifier--}}
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="accueilAll">

            <div class="accueilContain">
                <div class="partage">
                    <img src="#" alt="partage"/>
                    <p class="textPartage">Partagez vos masques, tissus, impressions 3D  sur notre plateforme et rentrez dans vos frais</p>
                </div>
                <div class="ou">OU</div>
                <div class="trouver">
                    <p class="textTrouver">Trouvez des masques et/ou du matériel pour leur confection, auprès de notre communauté</p>
                    <img src="#" alt="trouver"/>
                </div>
                <div class="question">
                    <p class="questionTexte"><span class="quest">Qu’est-ce que Maskattack ?</span><br><br>
                    Maskattack est une initiative citoyenne qui vise à mettre en relation des citoyens couturiers amateurs ou professionels avec d’autres citoyens pour qui la necessité du port du masque se fait sentir. 
                    Cette initiative est entièrement gratuite et bénévole.</p>
                </div>
            </div>

            <div class="fabriqueAll">
            <div class="fabriquer">
                <h3>Comment fabriquer vos masques ?</h3>
                <p class="fabriquerTexte"> FABRIQUER DES MASQUES EN TISSU:<br><br>
                    - Niveau Fédéral: Spf santé publique:<br>
                    Faites votre masque buccal: Méthode / Tutoriel<br>
                    https://faitesvotremasquebuccal.be (FR)<br>
                    https://www.uza.be/mondmaskers (NL)<br><br>
                    - Langue des signes : plusieurs vidéos des mesures de précautions<br>
                    https://www.info-coronavirus.be/fr/videos#interactions<br><br>
                    Lire ! : Coutures & Paillettes - Ingénieur textile<br>
                    La Place des masques en tissus dans la prévention du Coronavirus<br>
                    (Comparatif Coton-Polyester / conseils,<br>
                    source: <a href="https://www.repairtogether.be/news/coronavirus-appels-fabrication-de-masque-de-protection">RepairTogether</a>
                </p>
            </div>
            <div class="imgFab"><img src="#" alt="règle hygiénique" width="600px" height="630px"/></div>
            </div>

            </div>
    </body>
</html>

