<?php 
include_once "config/config.php";
include_once "config/db_connect.php";

// Check user session
// On redirige l'utilisateur si celui-ci est deja identifié
if (isset($_SESSION['user']))
{
    header("location: /profil.php");
    exit;
}

$firstname = null;
$lastname = null;
$birth_day = 0;
$birth_month = 0;
$birth_year = 0;
$email = null;

include_once SECURITY_REGISTER;
include_once HEADER_PATH;
?>
<!-- ======================================================================= -->

<h1>Inscription</h1>

<div class="row">
    <div class="col-md-6 offset-md-3">
        
        <form method="POST" novalidate>

            <!-- firstname -->
            <div class="form-group">
                <label class="sr-only" for="firstname">Prénom</label>
                <input class="form-control <?= isset($errors['firstname']) ? "is-invalid" : null ?>" type="text" name="firstname" id="firstname" placeholder="Prénom" value="<?= $firstname ?>" required>
                <?php if (isset($errors['firstname'])): ?>
                <div class="invalid-feedback"><?= $errors['firstname'] ?></div>
                <?php endif ?>
            </div>

            <!-- lastname -->
            <div class="form-group">
                <label class="sr-only" for="lastname">Nom</label>
                <input class="form-control <?= isset($errors['lastname']) ? "is-invalid" : null ?>" type="text" name="lastname" id="lastname" placeholder="Nom" value="<?= $lastname ?>" required>
                <?php if (isset($errors['lastname'])): ?>
                <div class="invalid-feedback"><?= $errors['lastname'] ?></div>
                <?php endif ?>
            </div>

            <!-- birthtday -->
            <div class="form-group">
                <label class="sr-only" for="birthday">Birthday</label>

                <div class="row">

                    <div class="col-3">
                        <select name="birth[day]" id="birthday" class="form-control <?= isset($errors['birthday']) ? "is-invalid" : null ?>" required>
                            <option value="0">Jour</option>
                            <?php for ($i=1; $i<=31; $i++): ?>
                                <option value="<?= $i ?>" <?php 
                                if ($i == $birth_day)
                                {
                                    echo "selected";
                                }    
                                ?>><?= $i ?></option>
                            <?php endfor ?>
                        </select>
                    </div>
                    <div class="col-5">
                        <select name="birth[month]" class="form-control <?= isset($errors['birthday']) ? "is-invalid" : null ?>" required>
                            <option value="0">Mois</option>
                            <?php foreach ($month_text as $key => $value): ?>
                            <option value="<?= $key+1 ?>" <?php 
                                if ($key+1 == $birth_month)
                                {
                                    echo "selected";
                                }    
                                ?>><?= $value ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="col-4">
                        <select name="birth[year]" class="form-control <?= isset($errors['birthday']) ? "is-invalid" : null ?>" required>
                            <option value="0">Année</option>
                            <?php for ($i=$current_year; $i>=$current_year-100; $i--): ?>
                                <option value="<?= $i ?>" <?php 
                                if ($i == $birth_year)
                                {
                                    echo "selected";
                                }    
                                ?>><?= $i ?></option>
                            <?php endfor ?>
                        </select>
                    </div>

                </div>

                <?php if (isset($errors['birthday'])): ?>
                <div class="invalid-feedback d-block"><?= $errors['birthday'] ?></div>
                <?php endif ?>
            </div>

            <!-- email -->
            <div class="form-group">
                <label class="sr-only" for="email">Email</label>
                <input class="form-control <?= isset($errors['email']) ? "is-invalid" : null ?>" type="email" name="email" id="email" placeholder="Email" value="<?= $email ?>" required>
                <?php if (isset($errors['email'])): ?>
                <div class="invalid-feedback"><?= $errors['email'] ?></div>
                <?php endif ?>
            </div>

            <!-- password -->
            <div class="form-group">
                <label class="sr-only" for="password">Mot de passe</label>
                <input class="form-control <?= isset($errors['password']) ? "is-invalid" : null ?>" type="password" name="password" id="password" placeholder="Nouveau mot de passe" required>
                <?php if (isset($errors['password'])): ?>
                <div class="invalid-feedback"><?= $errors['password'] ?></div>
                <?php endif ?>
            </div>

            <!-- password confirmation -->
            <div class="form-group">
                <label class="sr-only" for="password_confirmation">Confirmation du mot de passe</label>
                <input class="form-control <?= isset($errors['confirmation']) ? "is-invalid" : null ?>" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmation du mot de passe">
                <?php if (isset($errors['confirmation'])): ?>
                <div class="invalid-feedback"><?= $errors['confirmation'] ?></div>
                <?php endif ?>
            </div>

            <!-- Agree terms -->
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" name="agreeTerms" id="agreeTerms" class="form-check-input <?= isset($errors['agreeTerms']) ? "is-invalid" : null ?>" required>
                    <label class="form-check-label" for="agreeTerms">J'accepte le CGU.</label>
                </div>
            </div>

            <button type="submit" class="btn btn-success btn-block">Je m'inscrit</button>

        </form>

    </div>
</div>

<!-- ======================================================================= -->
<?php include_once FOOTER_PATH ?>