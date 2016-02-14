<?php
if ($_SESSION['is_authenticated']) {
    $user = $_SESSION['user'];
    
    if($user->getUsername() === $list['username']) {
        


?>
<table border="1">

    <tr>
        <td>
            <?php echo $list['id'] ?>
        <td>
<?php echo $list['username'] ?>
        </td>
        <td>
<?php echo $list['message'] ?>
        </td>
        <td>
<?php echo $list['date'] ?>
        </td>
    </tr>


</table>

<form method="POST">
    <input type="text" name="id" value ="<?= $list['id'] ?>">
    <input type="text" name="_method" value="DELETE">
    <input type="submit" value="Delete">
</form>

<?php 
    }
}?>