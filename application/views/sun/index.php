<h2><?php echo $title; ?></h2>
 
<table border='1' cellpadding='4'>
    <tr>
        <td><strong>sun Name</strong></td>
        <td><strong>sun Size</strong></td>
        <td><strong>sun Cordinates(X,Y,Z)</strong></td>
        <td><strong>Action</strong></td>
    </tr>
<?php foreach ($sun as $sun_item): ?>
        <tr>
            <td><?php echo $sun_item['Name']; ?></td>
            <td><?php echo $sun_item['Size']; ?></td>
            <td><?php echo '('.$sun_item['CoordinateX'].','.$sun_item['CoordinateY'].','.$sun_item['CoordinateZ'].')'; ?></td>
            <td>
              
                <a href="<?php echo site_url('sun/edit/'.$sun_item['id']); ?>">Edit</a> | 
                <a href="<?php echo site_url('sun/delete/'.$sun_item['id']); ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
            </td>
        </tr>
<?php endforeach; ?>
</table>
