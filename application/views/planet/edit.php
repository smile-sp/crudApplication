<h2><?php echo $title; ?></h2>
 
<?php echo validation_errors(); ?>
 
<?php echo form_open('planet/edit/'.$planet_item['id']); ?>
    <table>
        <tr>
            <td><label for="title">planet Name</label></td>
            <td><input type="input" name="title" size="50" value="<?php echo $planet_item['Name'] ?>" /></td>
        </tr>
         <tr>
            <td><label for="title">planet Size</label></td>
            <td><input type="input" name="size" size="20" value="<?php echo $planet_item['Size'] ?>" /></td>
        </tr>
        <tr>
            <td><label for="text">Coordinates in (X)</label></td>
            <td><input type="input" name="cordx" size="20" value="<?php echo $planet_item['CoordinateX'] ?>"/></td>
        </tr>
         <tr>
            <td><label for="text">Coordinates in (Y)</label></td>
            <td><input type="input" name="cordy" size="20" value="<?php echo $planet_item['CoordinateY'] ?>" /></td>
        </tr>
         <tr>
            <td><label for="text">Coordinates in (Z)</label></td>
            <td><input type="input" name="cordz" size="20" value="<?php echo $planet_item['CoordinateZ'] ?>"/></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Edit Planet" /></td>
        </tr>
    </table>
</form>
