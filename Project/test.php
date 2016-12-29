<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tutorijal 7 Zadatak 1</title>
    <link rel="stylesheet" type="text/css" href="stil.css" >
</head>
<body>
<?php
$red_izmjena=-1;
if(isset($_REQUEST['Ime']) && !empty($_REQUEST['Ime']) && isset($_REQUEST['Prezime']) && !empty($_REQUEST['Prezime']) && isset($_REQUEST['Broj']) && !empty($_REQUEST['Broj']) && isset($_REQUEST['Opcija']) && !empty($_REQUEST['Opcija'])){
    if($_REQUEST['Opcija']=="Dodaj"){
        $dodaj= array();
        $dodaj[0]=$_REQUEST['Ime'];
        $dodaj[1]=$_REQUEST['Prezime'];
        $dodaj[2]=$_REQUEST['Broj'];
        $file=fopen("imenik.csv","a");
        fputcsv($file,$dodaj);
        fclose($file);
    }
}
$keys=array_keys($_GET);
foreach ($keys as $key => $value) {
    if($_REQUEST[$keys[$key]]=="Obrisi" || $_REQUEST[$keys[$key]]=="Izmjeni" || $_REQUEST[$keys[$key]]=="Sacuvaj"){
        $koji_red=intval(explode("_",$keys[$key])[1]);
        if($_REQUEST[$keys[$key]]=="Obrisi"){
            $red = 0;
            $stringovi=array();
            $file = fopen("imenik.csv","r");
            while(!feof($file))
            {
                $unos=fgetcsv($file);
                if(!feof($file) && $red!=$koji_red){
                    array_push($stringovi, $unos);
                }
                $red++;
            }
            fclose($file);
            $file = fopen("imenik.csv","w");
            foreach ($stringovi as $value) {
                fputcsv($file,$value);
            }
            fclose($file);
        }
        else if($_REQUEST[$keys[$key]]=="Sacuvaj"){
            $red = 0;
            $stringovi=array();
            $file = fopen("imenik.csv","r");
            while(!feof($file))
            {
                $unos=fgetcsv($file);
                if(!feof($file) && $red!=$koji_red){
                    array_push($stringovi, $unos);
                }
                if($red==$koji_red){
                    $unos[0]=$_REQUEST['Ime'];
                    $unos[1]=$_REQUEST['Prezime'];
                    $unos[2]=$_REQUEST['Broj'];
                    array_push($stringovi, $unos);
                }
                $red++;
            }
            fclose($file);
            $file = fopen("imenik.csv","w");
            foreach ($stringovi as $value) {
                fputcsv($file,$value);
            }
            fclose($file);
        }
        else{
            $red_izmjena=$koji_red;
        }
    }
}
?>
<form action="test.php" method="get">
    <table>
        <tr>
            <th>
                Ime
            </th>
            <th>
                Prezime
            </th>
            <th>
                Broj
            </th>
            <th>
                Opcija a
            </th>
            <th>
                Opcija b
            </th>
        </tr>
        <?php
        $broj = 0;
        if (file_exists("imenik.csv")){
            $file = fopen("imenik.csv","r");
            while(!feof($file))
            {
                $unos=fgetcsv($file);
                if(!feof($file)){
                    if($broj!=$red_izmjena){
                        print "<tr>";
                        print "<td>".$unos[0]."</td><td>".$unos[1]."</td><td>".$unos[2]."</td><td><input class='dugme' type='submit' name='Opcija_".$broj."' value='Obrisi'></td><td><input class='dugme' type='submit' name='Opcija_".$broj."'value='Izmjeni'></td>";
                        print "</tr>";
                    }
                    else{
                        print "<tr>";
                        print "<td><input type='text' name='Ime' value='".$unos[0]."'></td>";
                        print  "<td><input type='text' name='Prezime' value='".$unos[1]."'></td>";
                        print  "<td><input type='text' name='Broj' value='".$unos[2]."'></td>";
                        print  "<td><input class='dugme' type='submit' name='Opcija_".$broj."' value='Obrisi'>";
                        print   "<td><input class='dugme' type='submit' name='Opcija_".$broj."' value='Sacuvaj'>";
                        print "</tr>";
                    }
                }
                $broj++;
            }
            fclose($file);
        }
        ?>
        <?php
        if($red_izmjena==-1){
            print "<tr>";
            print "<td><input type='text' name='Ime' value=''></td>";
            print  "<td><input type='text' name='Prezime' value=''></td>";
            print  "<td><input type='text' name='Broj' value=''></td>";
            print  "<td colspan='2'><input class='dugme' type='submit' name='Opcija' value='Dodaj'></td>";
            print "</tr>";
        }
        ?>
    </table>
</form>

</body>
</html>
