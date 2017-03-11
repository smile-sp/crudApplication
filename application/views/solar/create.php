<h2><?php echo $title; ?></h2>
 
<?php echo validation_errors(); ?>
 
<?php echo form_open('solar/create'); ?>    
    <table>
        <tr>
            <td><label for="title">Solar Name</label></td>
            <td><input type="input" name="title" size="50" /></td>
        </tr>
         <tr>
            <td><label for="title">Solar Size</label></td>
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
            <td><label for="text">Sun List</label></td>
            <td>    <?php  //echo '',print_r($sungroups);?>    
               <select name="sunId" class="form-control">
                <option value=''>Select</option>
                <?php                         //$data = $this->solar_model->getAllGroups();
                foreach($sungroups as $each)
                { ?><option value="<?php echo $each['id']; ?>"><?php echo $each['Name']; ?></option>';
                <?php }
                ?>
                </select>
            </td>    
        <tr>
        <tr>
            <td><label for="text">Planet List</label></td>
            <td>   
             <?php 
             
               foreach($planetgroups as $grp) 
               { 
               ?>
                  <input type="checkbox" name="planet[]" value="<?php echo $grp['id']; ?>"> <?php echo $grp['Name']; ?>
               <?php 
               } 
               ?>
            </td>    
        </tr>    
        <tr>
           <td></td>
            <td><input type="submit" name="submit" value="Create  solar" /></td>
        </tr>
    </table>    
</form>
