<h2><?php echo $title; ?></h2>
 
<?php echo validation_errors(); ?>
 
<?php echo form_open('Planet/create'); ?>    
    <table>
        <tr>
            <td><label for="title">Planet Name</label></td>
            <td><input type="input" name="title" size="50" /></td>
        </tr>
         <tr>
            <td><label for="title">Planet Size</label></td>
            <td><input type="input" name="size" size="20" /></td>
        </tr>
        <tr>
            <td><label for="text">Coordinates in (X)</label></td>
            <td><input type="input" name="cordx" size="20" /></td>
        </tr>
         <tr>
            <td><label for="text">Coordinates in (Y)</label></td>
            <td><input type="input" name="cordy" size="20" /></td>
        </tr>
         <tr>
            <td><label for="text">Coordinates in (Z)</label></td>
            <td><input type="input" name="cordz" size="20" /></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Create  Planet" /></td>
        </tr>
    </table>    
</form>
