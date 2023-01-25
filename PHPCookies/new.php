<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Formulario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <!--Links-->
    <?php include('movie.php')?>
    <?php include('movies.php')?>

    <!--Formulario-->
    <?php
    if(isset($_POST["user"])){
        $user = $_POST["user"];
        setcookie("username", $user,time()+3600);
    }
    ?>
    <h1>Hello <?php 
    if(isset($_POST["user"])){
        echo $user;
    }
    else{
        echo $_COOKIE["username"];
    }
    ?></h1>
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" />
        <br><br>
        <label for="isan">ISAN:</label>
        <input type="text" id="isan" name="isan" />
        <br><br>
        <label for="year">Year:</label>
        <input type="text" id="year" name="year" />
        <br><br>
        <label for="points">Points:</label>
        <select name="points" id="points">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <br><br>
        <input type="submit" name="enviar" value="Enviar" />
    </form>

    <?php
    $movies = new Movies();
    if(isset($_POST["isan"]) && isset($_POST["name"]) && isset($_POST["year"]) && isset($_POST["points"])){
        if($_POST["isan"]!="" && $_POST["name"]!=""){
            $pos=0;
            $encontrado=false;
            $isans=explode(",",$_COOKIE["isan_movie"]);
            for ($i=0; $i < count($isans); $i++) { 
                if($isans[$i]==$_POST["isan"]){
                    $encontrado=true;
                    $pos=$i;
                }
            }
            if($encontrado){
                $names=explode(",",$_COOKIE["name_movie"]);
                $years=explode(",",$_COOKIE["year_movie"]);
                $points=explode(",",$_COOKIE["points_movie"]);
                $years[$pos]=$_POST["year"];
                $points[$pos]=$_POST["points"];
                $names[$pos]=$_POST["name"];
                $isans[$pos]=$_POST["isan"];

                for ($o=0; $o < count($names); $o++) { 
                    $names_bien.=$names[$o].",";
                    $isans_bien.=$isans[$o].",";
                    $points_bien.=$points[$o].",";
                    $years_bien.=$years[$o].",";
                }
                setcookie("name_movie",$names_bien,time()+3600);
                setcookie("isan_movie",$isans_bien,time()+3600);
                setcookie("year_movie",$years_bien,time()+3600);
                setcookie("points_movie",$points_bien,time()+3600);

                $names_sep=explode(",",$names_bien);
                $isans_sep=explode(",",$isans_bien);
                $years_sep=explode(",",$years_bien);
                $points_sep=explode(",",$points_bien);
                $tabla="<table border='1'>";
                $tabla.="<tr><td>Nombre</td><td>Isan</td><td>Puntuacion</td><td>Año</td>";
                for($i=0;$i<count($names_sep);$i++){
                    if($names_sep[$i]!="" && $isans_sep[$i]!=""){
                        $tabla.="<tr><td>".$names_sep[$i]."</td><td>".$isans_sep[$i]."</td><td>".$years_sep[$i]."</td><td>".$points_sep[$i]."</td></tr>" ;
                    }
                }
                $tabla.="</table>";
                echo $tabla;

            }else{
                $names_bien=$_COOKIE["name_movie"].",".$_POST["name"];
                $isans_bien=$_COOKIE["isan_movie"].",".$_POST["isan"];
                $years_bien=$_COOKIE["year_movie"].",".$_POST["year"];
                $points_bien=$_COOKIE["points_movie"].",".$_POST["points"];
                setcookie("name_movie",$names_bien,time()+3600);
                setcookie("isan_movie",$isans_bien,time()+3600);
                setcookie("year_movie",$years_bien,time()+3600);
                setcookie("points_movie",$points_bien,time()+3600);

                $names_sep=explode(",",$names_bien);
                $isans_sep=explode(",",$isans_bien);
                $years_sep=explode(",",$years_bien);
                $points_sep=explode(",",$points_bien);
                $tabla="<table border='1'>";
                $tabla.="<tr><td>Nombre</td><td>Isan</td><td>Puntuacion</td><td>Año</td>";
                for($i=0;$i<count($names_sep);$i++){
                    if($names_sep[$i]!="" && $isans_sep[$i]!=""){
                        $tabla.="<tr><td>".$names_sep[$i]."</td><td>".$isans_sep[$i]."</td><td>".$years_sep[$i]."</td><td>".$points_sep[$i]."</td></tr>" ;
                    }
                }
                $tabla.="</table>";
                echo $tabla;
            }
        }else if($_POST["isan"]!="" && $_POST["name"]==""){
            $isans=explode(",",$_COOKIE["isan_movie"]);
            for ($i=0; $i < count($isans); $i++) { 
                if($isans[$i]==$_POST["isan"]){
                    $posicion=$i;
                }
            }

            $names=explode(",",$_COOKIE["name_movie"]);
            $years=explode(",",$_COOKIE["year_movie"]);
            $points=explode(",",$_COOKIE["points_movie"]);
            
            for ($i=0; $i < count($names); $i++) { 
                if($i!=$posicion){
                    $names_bien.=$names[$i].",";
                    $years_bien.=$years[$i].",";
                    $points_bien.=$points[$i].",";
                    $isans_bien.=$isans[$i].",";
                }  
            }

            setcookie("name_movie",$names_bien,time()+3600);
            setcookie("isan_movie",$isans_bien,time()+3600);
            setcookie("year_movie",$years_bien,time()+3600);
            setcookie("points_movie",$points_bien,time()+3600);

            $names_sep=explode(",",$names_bien);
            $isans_sep=explode(",",$isans_bien);
            $years_sep=explode(",",$years_bien);
            $points_sep=explode(",",$points_bien);
            $tabla="<table border='1'>";
            $tabla.="<tr><td>Nombre</td><td>Isan</td><td>Puntuacion</td><td>Año</td>";
            for($i=0;$i<count($names_sep);$i++){
                if($names_sep[$i]!="" && $isans_sep[$i]!=""){
                    $tabla.="<tr><td>".$names_sep[$i]."</td><td>".$isans_sep[$i]."</td><td>".$years_sep[$i]."</td><td>".$points_sep[$i]."</td></tr>" ;
                }
            }
            $tabla.="</table>";
            echo $tabla;

        }else if($_POST["isan"]=="" && $_POST["name"]!=""){
            $names=explode(",",$_COOKIE["name_movie"]);
            $years=explode(",",$_COOKIE["year_movie"]);
            for ($i=0; $i < count($names); $i++) { 
                if(str_contains($names[$i],$_POST["name"])){
                    echo "<p>".$names[$i]." from ".$years[$i]."</p>";
                }
            }
        }
        $peli=new Movie($_POST['name'], $_POST['isan'], $_POST['year'], $_POST['points']);
        $movies->add($peli);
    }
        /*$name = $_POST['name'];
        $isan = $_POST['isan'];
        $year = $_POST['year'];
        $points = $_POST['points'];
        $movies = new Movies();
        $m1 = new Movie($name, $isan, $year, $points);
        $movies->add($m1);*/
?>
</body>

</html>