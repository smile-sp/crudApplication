<h2><?php //echo $title; ?></h2>
 
<table border='1' cellpadding='4'>
    <tr>
        <td><strong>Name</strong></td>
        <td><strong>Size</strong></td>
        <td><strong>Cordinates(X,Y,Z)</strong></td>
        
    </tr>
<?php 
//echo '<pre>',print_r($search);
foreach ($search as $sun_item): ?>
        <tr>
            <td><?php echo $sun_item['Name']; ?></td>
            <td><?php echo $sun_item['Size']; ?></td>
            <td><?php echo '('.$sun_item['CoordinateX'].','.$sun_item['CoordinateY'].','.$sun_item['CoordinateZ'].')'; ?></td>
            
        </tr>
<?php endforeach; ?>
</table>
