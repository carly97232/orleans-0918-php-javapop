<?php
require '../header.php';
?>


<main class="container  ">
    <div class="row justify-content-center">
        <h1 class="col">Gérez vos événements</h1>
        <p class="col">Veuillez compléter les champs suivants</p>
    </div>
    <form class="row">
        <div class="form-group row">
            <label for="title">Titre de l'événement: </label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="date">Date de l'événement: </label>
            <input type="date" class="form-control" id="date" name="date" placeholder="2018-04-12" required>
        </div>
        <div class="form-group">
            <label for="comment">Présentation de l'événement</label>
            <textarea class="form-control" id="comment" name="comment" rows="5"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-success">Valider</button>
        </div>
</form>
</main>

