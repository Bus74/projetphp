// Fonction permettant de mettre un champ (field) en rouge (grâce à la classe Bootstrap is-invalid) et de créer un message d'erreur contenant un texte (errorText), inséré sous le champ.
function setError(field, errorText){

    // Ajout de la classe Bootstrap is-invalid sur le champ
    field.addClass('is-invalid');

    // Création d'un message d'erreur ( <div class="invalid-feedback">message</div> )
    let errorDiv = $('<div></div>');
    errorDiv.addClass('invalid-feedback');
    errorDiv.text( errorText );

    // Insertion du message après le champ
    field.after( errorDiv );

}

// Fonction permettant de mettre un champ (field) en vert (grâce à la classe Bootstrap is-valid)
function setSuccess(field){

    // Ajout de la classe Bootstrap is-valid sur le champ
    field.addClass('is-valid');
}

// Fonction permettant de nettoyer d'un seul coup tous les champ du formulaire (suppression des couleurs + suppression des messages d'erreurs)
function resetForm(form){

    // Suppression de tout les éléments qui ont la classe invalid-feedback (ce sont les messages d'erreurs)
    form.find('.invalid-feedback').remove();
    // On enlève la classe is-invalid de tous les champs
    form.find('.is-invalid').removeClass('is-invalid');
    // On enlève la classe is-valid de tous les champs
    form.find('.is-valid').removeClass('is-valid');

}

// Si le formulaire est envoyé (cliqué sur le bouton envoyer)
$('form').submit(function(e){

    // Empêcher la redirection du formulaire
    e.preventDefault();


    // Nettoyage du formulaire (suppression des anciens messages d'erreurs et des couleurs de champ)
    resetForm( $(this) );

    // Variables pointant sur les champs du formulaire
    let lastnameField = $('#form-lastname');
    let firstnameField = $('#form-firstname');
    let messageField = $('#form-message');
    let genderField = $('#form-gender');

    // Variable témoin servant à savoir si le formulaire est complètement ok ou pas. (Si au moins un champ n'est pas bon, cette variable passera à true, ce qui empêchera sa validation à la fin)
    let formFailed = false;

    // Verification du champ Nom (le nombre de caractères doit être inférieur à 3 pour être invalid)
    if(lastnameField.val().length < 3){

        // On passe le champ en rouge avec un message d'erreur
        setError( lastnameField, 'Doit contenir au moins 3 caractères' );
        // On empêche le formulaire d'être ok à la fin
        formFailed = true;
    } else {

        // On met le champ en vert
        setSuccess( lastnameField );
    }


    // Verification du champ Prénom (le nombre de caractères doit être inférieur à 3 pour être invalid)
    if(firstnameField.val().length < 3){

        // On passe le champ en rouge avec un message d'erreur
        setError( firstnameField, 'Doit contenir au moins 3 caractères' );
        // On empêche le formulaire d'être ok à la fin
        formFailed = true;
    } else {
        // On met le champ en vert
        setSuccess( firstnameField );
    }


    // Verification du champ Sexe
    if(genderField.val() != 'h' && genderField.val() != 'f'){

        // On passe le champ en rouge avec un message d'erreur
        setError( genderField, 'Un élément doit être sélectionné' );
        // On empêche le formulaire d'être ok à la fin
        formFailed = true;
    } else {
        // On met le champ en vert
        setSuccess( genderField );
    }


    // Verification du champ Message (le nombre de caractères doit être inférieur à 3 pour être invalid)
    if(messageField.val().length < 3){

        // On passe le champ en rouge avec un message d'erreur
        setError( messageField, 'Doit contenir au moins 3 caractères' );
        // On empêche le formulaire d'être ok à la fin
        formFailed = true;
    } else {
        // On met le champ en vert
        setSuccess( messageField );
    }

    // Si le formulaire est ok (variable témoin toujours égale à false)
    if(!formFailed){
        
        // Création d'une div contenant un messager de succès ( <div class="alert alert-success">Message</div> )
        let successMessage = $('<div></div>');

        successMessage.text('Formulaire envoyé !');
        successMessage.addClass('alert alert-success');

        // Insertion du message de succès après le formulaire
        $(this).after( successMessage );

        // Suppression du formulaire
        $(this).remove();

    }

});

// Si un des champs a été modifié, on le reset
$('form input[type=text], form select, form textarea').change(function(){
    
    // Suppression de l'élément HTML situé juste après le champ (s'il existe ça sera forcément un message d'erreur)
    $(this).next().remove();

    // On retire les classes d'erreurs/succès du champ
    $(this).removeClass('is-invalid is-valid');

});


// Si le bouton reset est cliqué, on appelle la fonction de "nettoyage" du formulaire pour bien enlever tous les messages d'erreurs et les encadrés rouges/verts
$('form input[type=reset]').click(function(){
    
    // Appel de la fonction de nettoyage du formulaire
    resetForm( $(this).parent().parent() );

});