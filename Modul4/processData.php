<?php
require_once 'validate.inc'; 
$errors = array();

if (isset($_POST['surname'])) {
    validateName($errors, $_POST, 'surname');

    // Validasi email
    if (empty($_POST['email'])) {
        $errors['email'] = 'required';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'invalid format';
    }

    // Validasi password
    if (empty($_POST['password'])) {
        $errors['password'] = 'required';
    } elseif (strlen($_POST['password']) < 6) {
        $errors['password'] = 'too short (min 6 characters)';
    }

    if ($errors) {
        echo '<h2>Invalid, correct the following errors:</h2>';
        foreach ($errors as $field => $error) {
            echo "<p><strong>$field</strong>: $error</p>";
        }
        include 'form.inc';
    } else {
        echo '<h2>Form submitted successfully with no errors</h2>';
        echo '<p><strong>Surname:</strong> ' . htmlspecialchars($_POST['surname']) . '</p>';
        echo '<p><strong>Email:</strong> ' . htmlspecialchars($_POST['email']) . '</p>';
        echo '<p><strong>Password:</strong> ' . htmlspecialchars($_POST['password']) . '</p>';
    }
} else {
    include 'form.inc';
}
?>
