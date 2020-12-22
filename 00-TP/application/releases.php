<?php 
include_once "config/config.php";
include_once "config/db_connect.php";

// Requete sur la liste des albums
$sql = "SELECT DISTINCT
    t1.title as album_title,
    t4.firstname as artist_fname,
    t4.lastname as artist_lname,
    t4.nickname as artist,
    count(t2.id) as nb_track

FROM
    `release` as t1
    INNER JOIN release_track_relation as t2 ON t2.release_id = t1.id
    INNER JOIN track_person_relation as t3 ON t3.track_id = t2.track_id
    INNER JOIN person as t4 ON t4.id = t3.person_id

GROUP BY
    t1.title, t4.firstname, t4.lastname, t4.nickname";

$query = $pdo->prepare($sql);
$query->execute();

$albums = $query->fetchAll(PDO::FETCH_OBJ);


include_once HEADER_PATH
?>
<!-- ======================================================================= -->

<h1>Albums</h1>

<table class="table">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Artiste</th>
            <th>Nbr Piste</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($albums as $album): ?>
        <tr>
            <td><?= $album->album_title ?></td>
            <td>
            <?php
            $name = "";

            if ($album->artist_fname != "-")
            {
                $name .= $album->artist_fname;
            }

            if (!empty($name))
            {
                $name .= " ";
            }

            if ($album->artist_lname != "-")
            {
                $name .= $album->artist_lname;
            }

            $name = trim($name);

            if (!empty($name))
            {
                $name .= " ";
            }

            if ($album->artist != null)
            {
                $parenthese = false;

                if (!empty($name))
                {
                    $parenthese = true;
                    $name .= "(";
                }

                $name .= $album->artist;

                if ($parenthese)
                {
                    $name .= ")";
                }
            }

            echo $name;
            ?>
            </td>
            <td><?= $album->nb_track ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<!-- ======================================================================= -->
<?php include_once FOOTER_PATH ?>