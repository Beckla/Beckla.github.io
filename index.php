<?php
include_once "header.php";
?>
<form>


    <input type = "text"name="Thing" placeholder="Players 1 Char 1">
    <input type = "text"name="p1c2" placeholder="Players 1 Char 2">
    <input type = "text"name="p1c3" placeholder="Players 1 Char 3">
    <input type = "text"name="p2c1" placeholder="Players 2 Char 1">
    <input type = "text"name="p2c2" placeholder="Players 2 Char 2">
    <input type = "text"name="p2c3" placeholder="Players 2 Char 3">
    
    <button type='submit' value="submit" name="submit"> Submit</button>
</form>
</body>


<?php
include_once 'include/totalget.inc.php';
    if (isset($_GET['submit']))
    {
        $result = $_GET['Thing'];
        RowToGet($result);
    }

?>
</html>