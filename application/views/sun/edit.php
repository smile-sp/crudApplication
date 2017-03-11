<h2><?php echo $title; ?></h2>
 
<?php echo validation_errors(); ?>
 
<?php echo form_open('sun/edit/'.$sun_item['id']); ?>
    <table>
        <tr>
            <td><label for="title">sun Name</label></td>
            <td><input type="input" name="title" size="50" value="<?php echo $sun_item['Name'] ?>" /></td>
        </tr>
         <tr>
            <td><label for="title">sun Size</label></td>
            <td><input type="input" name="size" size="20" value="<?php echo $sun_item['Size'] ?>" /></td>
        </tr>
        <tr>
            <td><label for="text">Coordinates in (X)</label></td>
            <td><input type="input" name="cordx" size="20" value="<?php echo $sun_item['CoordinateX'] ?>"/></td>
        </tr>
         <tr>
            <td><label for="text">Coordinates in (Y)</label></td>
            <td><input type="input" name="cordy" size="20" value="<?php echo $sun_item['CoordinateY'] ?>" /></td>
        </tr>
         <tr>
            <td><label for="text">Coordinates in (Z)</label></td>
            <td><input type="input" name="cordz" size="20" value="<?php echo $sun_item['CoordinateZ'] ?>"/></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Edit sun " /></td>
        </tr>
    </table>
</form>
