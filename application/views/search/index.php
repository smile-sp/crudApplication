<h2><?php echo $title; ?></h2>
 
<table border='0' cellpadding='4'>
    <tr>
        <td><strong>search For</strong></td>
        <td><select class="searchFor">
            <option value="">Select</option>
            <option value="solar">Solar System</option>
            <option value="planet">Planet</option>
            <option value="sun">Sun</option>
        </select></td>
        <td><strong>Search To</strong></td>
        <td><select class="searchTo">
            <option value="">Select</option>
            <option value="name">Name</option>
            <option value="size">Size</option>            
        </select></td>
        <td><input type="text" class="txtsearch" size=20></td>
        <td><button id="search">Search</button></td>
    </tr>

</table>

<div id="search-list"></div>
