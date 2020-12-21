<?php include_once "config/config.php" ?>
<?php include_once SECURITY_REGISTER ?>
<?php include_once HEADER_PATH ?>
<!-- ======================================================================= -->

<h1>Inscription</h1>

<div class="row">
    <div class="col-md-6 offset-md-3">
        
        <form method="POST" novalidate>

            <!-- firstname -->
            <div class="form-group">
                <label class="sr-only" for="firstname">Prénom</label>
                <input class="form-control" type="text" name="firstname" id="firstname" placeholder="Prénom" required>
            </div>

            <!-- lastname -->
            <div class="form-group">
                <label class="sr-only" for="lastname">Nom</label>
                <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Nom" required>
            </div>

            <!-- birthtday -->
            <div class="form-group">
                <label class="sr-only" for="birthday">Birthday</label>

                <div class="row">

                    <div class="col-3">
                        <select name="birth[day]" id="birthday" class="form-control" required>
                            <option value="0">Jour</option>
                            <?php for ($i=1; $i<=31; $i++): ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor ?>
                        </select>
                    </div>

                    <div class="col-5">
                        <select name="birth[month]" class="form-control" required>
                            <option value="0">Mois</option>
                            <?php foreach ($month_text as $key => $value): ?>
                            <option value="<?= $key+1 ?>"><?= $value ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="col-4">
                        <select name="birth[year]" class="form-control" required>
                            <option value="0">Année</option>
                            <?php for ($i=$current_year; $i>=$current_year-100; $i--): ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor ?>
                        </select>
                    </div>

                </div>

            </div>

            <!-- email -->
            <div class="form-group">
                <label class="sr-only" for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="Email" required>
            </div>

            <!-- password -->
            <div class="form-group">
                <label class="sr-only" for="password">Mot de passe</label>
                <input class="form-control" type="text" name="password" id="password" placeholder="Nouveau mot de passe" required>
            </div>

            <!-- password confirmation -->
            <div class="form-group">
                <label class="sr-only" for="password_confirmation">Confirmation du mot de passe</label>
                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmation du mot de passe">
            </div>

            <!-- Agree terms -->
            <div class="form-group">
                <input type="checkbox" name="agreeTerms" id="agreeTerms" required>
                <label for="agreeTerms">J'accepte le CGU.</label>
            </div>

            <button type="submit" class="btn btn-success btn-block">Je m'inscrit</button>

        </form>

    </div>
</div>

<!-- ======================================================================= -->
<?php include_once FOOTER_PATH ?>