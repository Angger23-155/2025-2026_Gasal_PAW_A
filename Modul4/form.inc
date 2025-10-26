<form method="post" action="processData.php">
    <h2>Form Input Data Mahasiswa</h2>

    <label for="surname">Surname:</label><br>
    <input type="text" name="surname" id="surname"
           value="<?php echo isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : ''; ?>">
    <?php
        if (isset($errors['surname'])) {
            echo "<span style='color:red;'> Error: {$errors['surname']} </span>";
        }
    ?>
    <br><br>

    <label for="email">Email:</label><br>
    <input type="text" name="email" id="email"
           value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
    <?php
        if (isset($errors['email'])) {
            echo "<span style='color:red;'> Error: {$errors['email']} </span>";
        }
    ?>
    <br><br>

    <label for="password">Password:</label><br>
    <input type="password" name="password" id="password">
    <?php
        if (isset($errors['password'])) {
            echo "<span style='color:red;'> Error: {$errors['password']} </span>";
        }
    ?>
    <br><br>

    <input type="submit" value="Submit">
</form>
