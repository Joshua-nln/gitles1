<?php
require_once '../session.inc.php';
$id = $_GET['id'];
?>
<html>

<form action="foto-verwerk.php" method="post" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <p>
        <label for="foto">Foto:</label>
        <input type="file" name="foto" id="foto" required="required">
    </p>

    <p>
        <input type="submit" name="submit" id="submit" value="uploaden">
        <button onclick="history.back(); return false;">Annuleren</button>
    </p>

</form>
<?php
//is er al een foto voor dit lid?
if (file_exists(__DIR__ . '/uploads/' . $id . '.jpg')){
    echo "<p><img src='uploads/" . $id . ".jpg' alt='foto'></p>";
}
?>
</html>
