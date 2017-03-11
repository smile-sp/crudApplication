<h2><?php echo $title; ?></h2>
 
<table border='1' cellpadding='4'>
    <tr>
        <td><strong>planet Name</strong></td>
        <td><strong>planet Size</strong></td>
        <td><strong>planet Cordinates(X,Y,Z)</strong></td>
        <td><strong>Action</strong></td>
    </tr>
<?php foreach ($planets as $planet_item): ?>
        <tr>
            <td><?php echo $planet_item['Name']; ?></td>
            <td><?php echo $planet_item['Size']; ?></td>
            <td><?php echo '('.$planet_item['CoordinateX'].','.$planet_item['CoordinateY'].','.$planet_item['CoordinateZ'].')'; ?></td>
            <td>
                
                <a href="<?php echo site_url('planet/edit/'.$planet_item['id']); ?>">Edit</a> | 
                <a href="<?php echo site_url('planet/delete/'.$planet_item['id']); ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
            </td>
        </tr>
<?php endforeach; ?>
</table>
