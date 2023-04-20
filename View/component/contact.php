<section>
    <form method="post">
        <label for="text">Votre nom et prénom*</label>
        <input type="text" name="nom et prénom" required>
        <label for="email">Votre adresse mail*</label>
        <input type="email" name="email" required>
        <label for="text">Votre numéro de téléphone</label>
        <input type="text" name="numéro de téléphone">
        <label for="text">Votre message :*</label>
        <textarea name="message" id="message" cols="30" rows="10"></textarea>
        <input class="submit" type="submit" name="Soumettre">
        <p>* : Champs obligatoires</p>
<?php
if (isset($_POST['message'])) {
    $entete  = 'MIME-Version: 1.0' . "\r\n";
    $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $entete .= 'From: ' . $_POST['email'] . "\r\n";
    $entete .= 'Reply-to: ' . $_POST['email'];

    $message = '<h1>Message envoyé depuis la page Contact de Culin\'Air</h1>
        <p><b>Email : </b>' . $_POST['email'] . '<br>
        <b>Message : </b>' . htmlspecialchars($_POST['message']) . '</p>';

    ini_set('SMTP', 'smtp.free.fr');
    ini_set('sendmail_from', 'contact.culinair@gmail.com');
    $retour = mail('contact.culinair@gmail.com', 'Envoi depuis page Contact', $message, $entete);
    if ($retour)
        echo '<p>Votre message a bien été envoyé.</p>';
}
?>
    </form>
</section>