<?php
    require('connect.php');

    error_reporting(0);
    ini_set('display errors', 0);

    if(isset($_GET['jegyid']) && isset($_GET['tipus']) && isset($_GET['tema']) && isset($_GET['jegy']) && isset($_GET['datum'])) {

        foreach ($rows as $row) {
            foreach ($row as $honap) {
                foreach ( (array) $honap as $jegy) {
                    
                }
            }
        }
    } else{
        header('location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Értékelés szerkesztése</title>
    <link rel="stylesheet" href="st.css">
</head>
<body class="edit">
    <div class="edit-container">
        <form action="feldolgoz.php" class="edit-form" method="POST">
            <input type="hidden" name="jegyid" id="jegyid" value="<?php echo $_GET['jegyid'] ?>">
            <div class="edit-header">
                <span class="edit-title">Értékelés módosítása</span>
            </div>
            <div class="edit-row">
                <h4>Értékelő</h4>
                <span>Géczi Kornél</span>
            </div>
            <div class="edit-row">
                <h4>Bejegyzés dátuma</h4>
                <input type="date" value="<?php echo $_GET['datum']; ?>" class="input" name="szdate" id="szdate" required>
            </div>
            <div class="edit-row">
                <h4>Típus</h4>
                <select name="mod" id="mod" class="input mod" required>
                    <option value="">Kérem válasszon...</option>
                    <option value="Na" <?php echo $_GET['tipus'] == "Na" ? "selected" : "" ?>>Na</option>
                    <option value="Írásbeli témazáró dolgozat" <?php echo $_GET['tipus'] == "Írásbeli témazáró dolgozat" ? "selected" : "" ?>>Írásbeli témazáró dolgozat</option>
                    <option value="Írásbeli röpdolgozat" <?php echo $_GET['tipus'] == "Írásbeli röpdolgozat" ? "selected" : "" ?>>Írásbeli röpdolgozat</option>
                    <option value="Szóbeli felelet" <?php echo $_GET['tipus'] == "Szóbeli felelet" ? "selected" : "" ?>>Szóbeli felelet</option>
                    <option value="Beszámoló" <?php echo $_GET['tipus'] == "Beszámoló" ? "selected" : "" ?>>Beszámoló</option>
                    <option value="Gyakorlati feladat" <?php echo $_GET['tipus'] == "Gyakorlati feladat" ? "selected" : "" ?>>Gyakorlati feladat</option>
                    <option value="Kisérettségi" <?php echo $_GET['tipus'] == "Kisérettségi" ? "selected" : "" ?>>Kisérettségi</option>
                    <option value="Házi dolgozat" <?php echo $_GET['tipus'] == "Házi dolgozat" ? "selected" : "" ?>>Házi dolgozat</option>
                    <option value="Házi feladat" <?php echo $_GET['tipus'] == "Házi feladat" ? "selected" : "" ?>>Házi feladat</option>
                    <option value="Projektmunka" <?php echo $_GET['tipus'] == "Projektmunka" ? "selected" : "" ?>>Projektmunka</option>
                    <option value="Órai munka" <?php echo $_GET['tipus'] == "Órai munka" ? "selected" : "" ?>>Órai munka</option>
                    <option value="Órai feladat" <?php echo $_GET['tipus'] == "Órai feladat" ? "selected" : "" ?>>Órai feladat</option>
                    <option value="Teszt feladat" <?php echo $_GET['tipus'] == "Teszt feladat" ? "selected" : "" ?>>Teszt feladat</option>
                    <option value="Feladatlap" <?php echo $_GET['tipus'] == "Feladatlap" ? "selected" : "" ?>>Feladatlap</option>
                    <option value="Félévi értékelés" <?php echo $_GET['tipus'] == "Félévi értékelés" ? "selected" : "" ?>>Félévi értékelés</option>
                    <option value="Év végi értékelés" <?php echo $_GET['tipus'] == "Év végi értékelés" ? "selected" : "" ?>>Év végi értékelés</option>
                </select>
            </div>
            <div class="edit-row">
                <h4>Téma</h4>
                <input type="text" value="<?php echo $_GET['tema']; ?>" class="input">
            </div>
            <div class="edit-row radios">
                <h4>Osztályzat</h4>
                <div>
                    <input type="radio" name="<?php echo sha1($row->nev); ?>" id="<?php echo $row->id + 2; ?>" value="1" <?php echo $_GET["jegy"] == "1" ? "checked" : "" ?>>
                    <label for="<?php echo $row->id + 2; ?>" class="radioLabel bigger">1</label>
                    
                    <input type="radio" name="<?php echo sha1($row->nev); ?>" id="<?php echo $row->id + 3; ?>" value="2" <?php echo $_GET["jegy"] == "2" ? "checked" : "" ?>>
                    <label for="<?php echo $row->id + 3; ?>" class="radioLabel bigger">2</label>
                    
                    <input type="radio" name="<?php echo sha1($row->nev); ?>" id="<?php echo $row->id + 4; ?>" value="3" <?php echo $_GET["jegy"] == "3" ? "checked" : "" ?>>
                    <label for="<?php echo $row->id + 4; ?>" class="radioLabel bigger">3</label>

                    <input type="radio" name="<?php echo sha1($row->nev); ?>" id="<?php echo $row->id + 5; ?>" value="4" <?php echo $_GET["jegy"] == "4" ? "checked" : "" ?>>
                    <label for="<?php echo $row->id + 5; ?>" class="radioLabel bigger">4</label>
                    
                    <input type="radio" name="<?php echo sha1($row->nev); ?>" id="<?php echo $row->id + 6; ?>" value="5" <?php echo $_GET["jegy"] == "5" ? "checked" : "" ?>>
                    <label for="<?php echo $row->id + 6; ?>" class="radioLabel bigger">5</label>

                    <input type="radio" name="<?php echo sha1($row->nev); ?>" id="<?php echo $row->id + 7; ?>" value="-" <?php echo $_GET["jegy"] == "-" ? "checked" : "" ?>>
                    <label for="<?php echo $row->id + 7; ?>" class="radioLabel bigger">-</label>
                </div>
            </div>
            <div class="buttons">
                <button class="mentes" type="submit" id="szerkesztes" name="szerkesztes">Mentés</button>
                <button class="mentes torles" type="submit" id="torles" name="torles">Törlés</button>
                <button class="mentes megse" type="submit" id="megse" name="megse">Mégse</button>
            </div>
        </form>
    </div>
</body>
</html>