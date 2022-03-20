<?php
include_once "header.php";
include_once "include/totalget.inc.php";

?>
<form>


    <input type = "text"name="Thing" placeholder="Players 1 Char 1">
    <button type='submit' value="submit" name="submit"> Submit</button>
</form>
<h2>Player 1 char 1</h2>

<form method="POST">
<input type = "text"name="Thing" placeholder="Players 1 Char 2">
<button type='submit' value="submit" name="submit"> Submit</button>
</form>
<?php
include_once 'include/totalget.inc.php';
    if (isset($_GET['submit']))
    {
        $result = $_GET['Thing' ];
        RowToGet($result);
    }

?>
 <form>
     <select id="Name">
        <option value = "pick">Name</option>
        <?php 
        $sql=mysqli_query($conn,"SELECT Name FROM character_stats_sheet");
        $row = mysqli_num_rows($sql);
        while($row = mysqli_fetch_array($sql)){
            echo "<option value='".$row['Name']."'>" .$row['Name']."</option>";
        }
        ?>
     </select>
     
</form>

</body>
</html>