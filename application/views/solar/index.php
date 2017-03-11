<h2><?php echo $title; ?></h2>
 
<table border='1' cellpadding='4'>
    <tr>
        <td><strong>Solar Name</strong></td>
        <td><strong>Solar Size</strong></td>
        <td><strong>Solar Cordinates(X,Y,Z)</strong></td>
        <td><strong>Sun</strong></td>
        <td><strong>Planets</strong></td>
        <td><strong>Action</strong></td>
    </tr>
<?php foreach ($solar as $solar_item): ?>
        <tr>
            <td><?php echo $solar_item['Name']; ?></td>
            <td><?php echo $solar_item['Size']; ?></td>
            <td><?php echo '('.$solar_item['CoordinateX'].','.$solar_item['CoordinateY'].','.$solar_item['CoordinateZ'].')'; ?></td>
            <td><?php echo $solar_item['sunname']; ?></td>
            <td><?php echo $solar_item['planetName']; ?></td>
            <td>
                 
                <a href="<?php echo site_url('solar/edit/'.$solar_item['id']); ?>">Edit</a> | 
                <a href="<?php echo site_url('solar/delete/'.$solar_item['id']); ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
            </td>
        </tr>
<?php endforeach; ?>
</table>
