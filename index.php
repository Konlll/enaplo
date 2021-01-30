<?php
    if (extension_loaded("mongodb")) {
        
        require('connect.php');
    
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KRÉTA Iskolai Alaprendszer 2020</title>
    <link rel="stylesheet" href="st.css">
</head>
<body>
    <div class="wrapper">
        <form action="feldolgoz.php" method="POST">
            <div class="ertekeles-datum">
                <div>
                    <label for="mod">Értékelés módja</label>
                    <select name="mod" id="mod" class="input mod" required>
                        <option value="" selected>Kérem válasszon...</option>
                        <option value="Na">Na</option>
                        <option value="Írásbeli témazáró dolgozat">Írásbeli témazáró dolgozat</option>
                        <option value="Írásbeli röpdolgozat">Írásbeli röpdolgozat</option>
                        <option value="Szóbeli felelet">Szóbeli felelet</option>
                        <option value="Beszámoló">Beszámoló</option>
                        <option value="Gyakorlati feladat">Gyakorlati feladat</option>
                        <option value="Kisérettségi">Kisérettségi</option>
                        <option value="Házi dolgozat">Házi dolgozat</option>
                        <option value="Házi feladat">Házi feladat</option>
                        <option value="Projektmunka">Projektmunka</option>
                        <option value="Órai munka">Órai munka</option>
                        <option value="Órai feladat">Órai feladat</option>
                        <option value="Teszt feladat">Teszt feladat</option>
                        <option value="Feladatlap">Feladatlap</option>
                        <option value="Félévi értékelés">Félévi értékelés</option>
                        <option value="Év végi értékelés">Év végi értékelés</option>
                    </select>
                </div>
                <div>
                    <label for="date">Bejegyzés dátuma</label>
                    <input type="date" id="date" name="date" class="input" required>
                </div>
            </div>
            <div class="temaDiv">
                <label for="tema">Értékelés témája</label>
                <input type="text" id="tema" name="tema" class="input w-70">
            </div>
            <div class="btnDiv">
                <button type="submit" class="mentes" id="mentes" name="mentes"> + Mentés</button>
                <button type="submit" class="mentes" id="tanulo_hozzaadas" name="tanulo_hozzaadas">Tanuló hozzáadása</button>
            </div>
            <table class="nevsor">
                <thead>
                    <tr>
                        <th class="text-left">Név</th>
                        <th>09</th>
                        <th>10</th>
                        <th>11</th>
                        <th>12</th>
                        <th>01/I</th>
                        <th>I</th>
                        <th>01/II</th>
                        <th>02</th>
                        <th>03</th>
                        <th>04</th>
                        <th>05</th>
                        <th>06</th>
                        <th>II</th>
                        <th>Átlag</th>
                        <th>
                            <button type="button" class="full" id="full1">1</button>
                            <button type="button" class="full" id="full2">2</button>
                            <button type="button" class="full" id="full3">3</button>
                            <button type="button" class="full" id="full4">4</button>
                            <button type="button" class="full" id="full5">5</button>
                            <button type="button" class="full"  id="fullx">x</button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $jegyek = array();
                        foreach($rows as $row):
                    ?>
                    <tr>
                        <td><?php echo "$row->nev"; ?></td>
                        <td><?php foreach($row->szeptember as $jegy): echo "
                            <div class='tooltip'>
                                <a href='edit.php?jegyid=$jegy->jegy_id&tipus=$jegy->tipus&tema=$jegy->tema&jegy=$jegy->jegy&datum=$jegy->datum' class='jegy-elvalaszto' id='modalBtn'>$jegy->jegy</a>
                                <span class='tooltiptext'>
                                    <div class='tooltipErtekeles'>
                                        $jegy->jegy
                                    </div>
                                    <p>$jegy->datum</p>
                                    <p>$jegy->tipus</p>
                                    <p>Téma: $jegy->tema</p>
                                    <p>Géczi Kornél</p>
                                </span>
                            </div>
                        "; array_push($jegyek, $jegy->jegy); endforeach; ?></td>
                        <td><?php foreach($row->oktober as $jegy): echo "
                            <div class='tooltip'>
                                <span class='jegy-elvalaszto'>$jegy->jegy</span>
                                <span class='tooltiptext'>
                                    <div class='tooltipErtekeles'>
                                        $jegy->jegy
                                    </div>
                                    <p>$jegy->datum</p>
                                    <p>$jegy->tipus</p>
                                    <p>Téma: $jegy->tema</p>
                                    <p>Géczi Kornél</p>
                                </span>
                            </div>
                        "; array_push($jegyek, $jegy->jegy); endforeach; ?></td>
                        <td><?php foreach($row->november as $jegy): echo "
                            <div class='tooltip'>
                                <span class='jegy-elvalaszto'>$jegy->jegy</span>
                                <span class='tooltiptext'>
                                    <div class='tooltipErtekeles'>
                                        $jegy->jegy
                                    </div>
                                    <p>$jegy->datum</p>
                                    <p>$jegy->tipus</p>
                                    <p>Téma: $jegy->tema</p>
                                    <p>Géczi Kornél</p>
                                </span>
                            </div>
                        "; array_push($jegyek, $jegy->jegy); endforeach; ?></td>
                        <td><?php foreach($row->december as $jegy): echo "
                            <div class='tooltip'>
                                <span class='jegy-elvalaszto'>$jegy->jegy</span>
                                <span class='tooltiptext'>
                                    <div class='tooltipErtekeles'>
                                        $jegy->jegy
                                    </div>
                                    <p>$jegy->datum</p>
                                    <p>$jegy->tipus</p>
                                    <p>Téma: $jegy->tema</p>
                                    <p>Géczi Kornél</p>
                                </span>
                            </div>
                        "; array_push($jegyek, $jegy->jegy); endforeach; ?></td>
                        <td><?php foreach($row->januaregy as $jegy): echo "
                            <div class='tooltip'>
                                <span class='jegy-elvalaszto'>$jegy->jegy</span>
                                <span class='tooltiptext'>
                                    <div class='tooltipErtekeles'>
                                        $jegy->jegy
                                    </div>
                                    <p>$jegy->datum</p>
                                    <p>$jegy->tipus</p>
                                    <p>Téma: $jegy->tema</p>
                                    <p>Géczi Kornél</p>
                                </span>
                            </div>
                        "; array_push($jegyek, $jegy->jegy); endforeach; ?></td>
                        <td><?php foreach($row->elsofelev as $jegy): echo "
                            <div class='tooltip'>
                                <span class='jegy-elvalaszto'>$jegy->jegy</span>
                                <span class='tooltiptext'>
                                    <div class='tooltipErtekeles'>
                                        $jegy->jegy
                                    </div>
                                    <p>$jegy->datum</p>
                                    <p>$jegy->tipus</p>
                                    <p>Téma: $jegy->tema</p>
                                    <p>Géczi Kornél</p>
                                </span>
                            </div>
                        "; endforeach; ?></td>
                        <td><?php foreach($row->januarketto as $jegy): echo "
                            <div class='tooltip'>
                                <span class='jegy-elvalaszto'>$jegy->jegy</span>
                                <span class='tooltiptext'>
                                    <div class='tooltipErtekeles'>
                                        $jegy->jegy
                                    </div>
                                    <p>$jegy->datum</p>
                                    <p>$jegy->tipus</p>
                                    <p>Téma: $jegy->tema</p>
                                    <p>Géczi Kornél</p>
                                </span>
                            </div>
                        "; array_push($jegyek, $jegy->jegy); endforeach; ?></td>
                        <td><?php foreach($row->februar as $jegy): echo "
                            <div class='tooltip'>
                                <span class='jegy-elvalaszto'>$jegy->jegy</span>
                                <span class='tooltiptext'>
                                    <div class='tooltipErtekeles'>
                                        $jegy->jegy
                                    </div>
                                    <p>$jegy->datum</p>
                                    <p>$jegy->tipus</p>
                                    <p>Téma: $jegy->tema</p>
                                    <p>Géczi Kornél</p>
                                </span>
                            </div>
                        "; array_push($jegyek, $jegy->jegy); endforeach; ?></td>
                        <td><?php foreach($row->marcius as $jegy): echo "
                            <div class='tooltip'>
                                <span class='jegy-elvalaszto'>$jegy->jegy</span>
                                <span class='tooltiptext'>
                                    <div class='tooltipErtekeles'>
                                        $jegy->jegy
                                    </div>
                                    <p>$jegy->datum</p>
                                    <p>$jegy->tipus</p>
                                    <p>Téma: $jegy->tema</p>
                                    <p>Géczi Kornél</p>
                                </span>
                            </div>
                        "; array_push($jegyek, $jegy->jegy); endforeach; ?></td>
                        <td><?php foreach($row->aprilis as $jegy): echo "
                            <div class='tooltip'>
                                <span class='jegy-elvalaszto'>$jegy->jegy</span>
                                <span class='tooltiptext'>
                                    <div class='tooltipErtekeles'>
                                        $jegy->jegy
                                    </div>
                                    <p>$jegy->datum</p>
                                    <p>$jegy->tipus</p>
                                    <p>Téma: $jegy->tema</p>
                                    <p>Géczi Kornél</p>
                                </span>
                            </div>
                        "; array_push($jegyek, $jegy->jegy); endforeach; ?></td>
                        <td><?php foreach($row->majus as $jegy): echo "
                            <div class='tooltip'>
                                <span class='jegy-elvalaszto'>$jegy->jegy</span>
                                <span class='tooltiptext'>
                                    <div class='tooltipErtekeles'>
                                        $jegy->jegy
                                    </div>
                                    <p>$jegy->datum</p>
                                    <p>$jegy->tipus</p>
                                    <p>Téma: $jegy->tema</p>
                                    <p>Géczi Kornél</p>
                                </span>
                            </div>
                        "; array_push($jegyek, $jegy->jegy); endforeach; ?></td>
                        <td><?php foreach($row->junius as $jegy): echo "
                            <div class='tooltip'>
                                <span class='jegy-elvalaszto'>$jegy->jegy</span>
                                <span class='tooltiptext'>
                                    <div class='tooltipErtekeles'>
                                        $jegy->jegy
                                    </div>
                                    <p>$jegy->datum</p>
                                    <p>$jegy->tipus</p>
                                    <p>Téma: $jegy->tema</p>
                                    <p>Géczi Kornél</p>
                                </span>
                            </div>
                        "; array_push($jegyek, $jegy->jegy); endforeach; ?></td>
                        <td><?php foreach($row->masodikfelev as $jegy): echo "
                            <div class='tooltip'>
                                <span class='jegy-elvalaszto'>$jegy->jegy</span>
                                <span class='tooltiptext'>
                                    <div class='tooltipErtekeles'>
                                        $jegy->jegy
                                    </div>
                                    <p>$jegy->datum</p>
                                    <p>$jegy->tipus</p>
                                    <p>Téma: $jegy->tema</p>
                                    <p>Géczi Kornél</p>
                                </span>
                            </div>
                        "; endforeach; ?></td>
                        <td>
                            <?php 
                                $atlag = array_sum($jegyek) / count($jegyek);
                                echo "<p class='text-center'>",round($atlag, 2),"</p>";
                            ?>
                        </td>
                        <td>
                            <input type="radio" name="<?php echo sha1($row->nev); ?>" id="<?php echo $row->id + 2; ?>" value="1">
                            <label for="<?php echo $row->id + 2; ?>" class="radioLabel">1</label>
                            
                            <input type="radio" name="<?php echo sha1($row->nev); ?>" id="<?php echo $row->id + 3; ?>" value="2">
                            <label for="<?php echo $row->id + 3; ?>" class="radioLabel">2</label>
                            
                            <input type="radio" name="<?php echo sha1($row->nev); ?>" id="<?php echo $row->id + 4; ?>" value="3">
                            <label for="<?php echo $row->id + 4; ?>" class="radioLabel">3</label>

                            <input type="radio" name="<?php echo sha1($row->nev); ?>" id="<?php echo $row->id + 5; ?>" value="4">
                            <label for="<?php echo $row->id + 5; ?>" class="radioLabel">4</label>
                            
                            <input type="radio" name="<?php echo sha1($row->nev); ?>" id="<?php echo $row->id + 6; ?>" value="5">
                            <label for="<?php echo $row->id + 6; ?>" class="radioLabel">5</label>

                            <input type="radio" name="<?php echo sha1($row->nev); ?>" id="<?php echo $row->id + 7; ?>" value="-">
                            <label for="<?php echo $row->id + 7; ?>" class="radioLabel">-</label>
                        </td>
                    </tr>
                    <?php endforeach;} ?>
                </tbody>
            </table>
        </form>
    </div>

    <script src="main.js"></script>
</body>
</html>