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
    <!--Code PHP-->
    <?php
    session_start();
        $movies = new Movies("");
        $_SESSION['movies'] = $movies->convertToString();
    if(isset($_POST['enviar'])){
        $name = $_POST['name'];
        $isan = $_POST['isan'];
        $year = $_POST['year'];
        $points = $_POST['points'];
        $m1 = new Movie($name, $isan, $year, $points);

        $movies->add($m1);
        $_SESSION['movies'] = $movies->add($m1);
        $movies->toString();
    }
?>
    <!--Formulario-->
    <?php
    if(isset($_POST['user'])){
        $_SESSION['user'] = $_POST['user'];
    }
    ?>
    <h1>Hello <?php echo $_SESSION['user']; ?></h1>
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
</body>

</html>