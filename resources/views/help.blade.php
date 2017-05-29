@extends('layouts.app')

@section('content')
    <div style="font-size: 20px;">
        <div class="container">
            <h1>
                Besoin d'aide ?
            </h1>
            <p>
                Pour commencer à utiliser ce site, vous devez déjà créer un compte chez nous et vous connecter.
            </p>
            <p>
                Une fois cette opération effectuée, vous aurez accès à de nouvelles fonctionnalités.
                Vous disposez en plus à présent d'une section Vidéo ainsi que d'une section Commentaire.
            </p>
            <p>
                Accéder à la section Vidéo vous permet de créer des vidéos.
            </p>
            <img src="img/video.PNG" alt="video explanation 1" class="img-thumbnail"/>
            <legend class="text-center">
                <small>Section création vidéo sans modifications</small>
            </legend>
            <p>
                A partir de cette section, nous pouvons commencer à déplacer des blocs pour programmer le robot.
                Il s'agit simplement d'un système de drag and drop sur la partie bleue à droite.
            </p>
            <img src="img/video_made.PNG" alt="video explanation 2" class="img-thumbnail"/>
            <legend class="text-center">
                <small>Section création vidéo après ajout de quelques blocs</small>
            </legend>
            <p>
                Après validation de notre vidéo, nous pouvons désormais en commencer une nouvelle, ou bien commencer
                à faire des commentaires sur une vidéo. Vous pouvez accéder à l'un comme à l'autre librement.
            </p>
            <p>
                Commenter une vidéo d'un autre utilisateur est fait à partir de cette section :
            </p>
            <img src="img/comment.PNG" alt="comment explanation 1" class="img-thumbnail"/>
            <legend class="text-center">
                <small>Section commentaire vidéo</small>
            </legend>
            <p>
                Le bouton "Charger" permet de sélectionner une vidéo aléatoire des autres utilisateurs.
            </p>
            <img src="img/comment_loaded.PNG" alt="comment explanation 2" class="img-thumbnail"/>
            <legend class="text-center">
                <small>Section commentaire vidéo après chargement</small>
            </legend>
            <p>
                On peut à partir de là jouer la vidéo ou l'arrêter et faire un commentaire simple de ce que
                l'on voit. Après validation, le site va automatiquement charger une nouvelle vidéo à commenter.
                Si vous désirez la commenter vous pouvez :)
            </p>
            <hr>
            <legend class="text-justify">
                <strong>Vidéo Aide ?</strong>
            </legend>
            <div>
                <video class="img-thumbnail" controls>
                    <source src="vid/video.mp4" type="video/mp4">

                    Your browser does not support the video tag.
                </video>
                <legend class="text-justify">
                    <small>Création vidéo</small>
                </legend>
            </div>

            <div>
                <video class="img-thumbnail" controls>
                    <source src="vid/comment.mp4" type="video/mp4">

                    Your browser does not support the video tag.
                </video>
                <legend class="text-justify">
                    <small>Commenter un vidéo</small>
                </legend>
            </div>
        </div>
    </div>
@endsection
