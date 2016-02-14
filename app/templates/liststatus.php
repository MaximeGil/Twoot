<table border="1">
    
    <?php foreach ($list as $key => $val) { ?>
    <tr>
        <td>
            <?php echo $val['id'] ?>
        </td>
        <td>
            <?php echo $val['username']?>
        </td>
        <td>
            <?php echo $val['message']?>
        </td>
        <td>
            <?php echo $val['date']?>
        </td>
    </tr>
        
        <?php } ?>

</table>

<form  method="POST">

    <label for="username">Username:</label>
   <?php if($_SESSION['is_authenticated']) {  $user = $_SESSION['user'];?>
    <input type="text" name="username" value="<?php echo $user->getUsername()?>" readonly/>
   <?php } else {?>
    <input type="text" name="username" value="Anonymous" readonly/>
   <?php } ?>

    <label for="message">Message:</label>
    <textarea name="message"></textarea>

    <input type="submit" value="Tweet!">
</form>