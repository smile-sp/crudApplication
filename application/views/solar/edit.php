<h2><?php echo $title; ?></h2>
 
<?php echo validation_errors(); ?>
 
<?php echo form_open('solar/edit/'.$solar_item['id']); ?>
    <table>
        <tr>
            <td><label for="title">Solar Name</label></td>
            <td><input type="input" name="title" size="50" value="<?php echo $solar_item['Name'] ?>" /></td>
        </tr>
         <tr>
            <td><label for="title">Solar Size</label></td>
            <td><input type="input" name="size" size="20" value="<?php echo $solar_item['Size'] ?>" /></td>
        </tr>
        <tr>
            <td><label for="text">Coordinates in (X)</label></td>
            <td><input type="input" name="cordx" size="20" value="<?php echo $solar_item['CoordinateX'] ?>"/></td>
        </tr>
         <tr>
            <td><label for="text">Coordinates in (Y)</label></td>
            <td><input type="input" name="cordy" size="20" value="<?php echo $solar_item['CoordinateY'] ?>" /></td>
        </tr>
         <tr>
            <td><label for="text">Coordinates in (Z)</label></td>
            <td><input type="input" name="cordz" size="20" value="<?php echo $solar_item['CoordinateZ'] ?>"/></td>
        </tr>

        <tr>
            <td><label for="text">Sun List</label></td>
            <td>    <?php  //echo '',print_r($sungroups);?>    
               <select name="sunId" class="form-control">
                <option value=''>Select</option>
                <?php                         //$data = $this->solar_model->getAllGroups();
                foreach($sungroups as $each)
                {
                    $selected='';
                    if($each['id']==$solar_item['sunId']){
                        $selected='selected';
                    }
                 ?><option value="<?php echo $each['id']; ?>" <?php echo $selected; ?>><?php echo $each['Name']; ?></option>';
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

                $checked="";
                if(isset($solarplanetgroups)){
                    foreach ($solarplanetgroups as $planets) {
                        if($grp['id']==$planets['planet_id']){
                            $checked="checked='checked'";
                                              
                        }    # code...
                    }
                        
                }
                
                
               ?>
                  <input type="checkbox" name="planet[]" value="<?php echo $grp['id']; ?>" <?php echo $checked;?>> <?php echo $grp['Name']; ?>
               <?php 
               } 
               ?>
            </td>    
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Edit solar " /></td>
        </tr>
    </table>
</form>
