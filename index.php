<?php
include_once "header.php";

?>
<form method="POST">
<select name="to_user" class="form-control">
<option value="pick">Choose a char</option>
<?php
include_once "include/dbh.inc.php";
$sql = mysqli_query($conn, "SELECT Name From character_stats_sheet");
$row = mysqli_num_rows($sql);
while ($row = mysqli_fetch_array($sql)){
echo "<option value='". $row['Name'] ."'>" .$row['Name'] ."</option>" ;
}
?>
</select>
<?php
include_once "include/dbh.inc.php";
$sql = mysqli_query($conn,"SELECT Name,Health,Defence,Magic_Defence,Speed,Movement FROM character_stats_sheet Where Name='to_user'");
$row = mysqli_num_rows($sql);
$names = $Health = $Defence = $Magic_Defence = $Speed = $Movement = array();
if(isset($_POST['submit2']))
{
    $id = mysqli_real_escape_string($conn,$_POST['to_user']);
    $runit="SELECT Name,Health,Defence,Magic_Defence,Speed,Movement FROM character_stats_sheet Where Name='$id'";
    $result=mysqli_query($conn,$runit);
    $names = $Health = $Defence = $Magic_Defence = $Speed = $Movement = array();
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
        while ($row = mysqli_fetch_assoc($result))
        {
           $names = $row['Name'];
           $Health= $row['Health'];
           $Defence= $row['Defence'];
           $Magic_Defence= $row['Magic_Defence'];
           $Speed= $row['Speed'];
           $Movement= $row['Movement'];

            echo "Name: " . $names. "<br>";
            echo "Health: " . $Health. "<br>";
            echo "Defence: " . $Defence. "<br>";
            echo "Magic defence: ". $Magic_Defence. "<br>";
            echo "Speed: " . $Speed. "<br>";
            echo "Movement: " .  $Movement. "<br>";

        }
    }


}
?>
    <input type = "text"name="Power" placeholder="Power">
    <input type = "text"name="Mod" placeholder="Modfier...1.25">
    <button type='submit' value="submit2" name="submit2"> Submit</button>
</form>
<?php
include_once "include/dbh.inc.php";
if(isset($_POST['submit2']))
{
    $power = mysqli_real_escape_string($conn,$_POST['Power']);
    $mod=mysqli_real_escape_string($conn,$_POST['Mod']);
    echo "Power: ".$power ."<br>Mod: ". $mod . "<br>Defence: ".intval($Defence). "<br>Magic Defence: ". intval($Magic_Defence);
    
    $onehundred = 100;
    $powmod = $power * $mod;
    $defrat= $onehundred + intval($Defence);
    $magrat= $onehundred + intval($Magic_Defence);
    $defmod =$onehundred / $defrat;
    $mdefmod = $onehundred / $magrat;
    echo "<br>Modified power: " . $powmod. "<br>";
    $damage =$powmod *  $defmod;
    $mdamage= $powmod * $mdefmod;



    echo "<br>Defence Damge Rounded: ".ceil($damage)."<br>Defence Damage Rounded Number: " .$damage;
    echo "<br>Magic Damge Rounded: ".ceil($mdamage)."<br>Magic Damage Rounded Number: " .$mdamage;


}

