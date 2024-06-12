<h3 class="text-center text-success">All brands</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th>Serial No</th>
            <th>brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $select_brand="select * from brands";
        $result=mysqli_query($con,$select_brand);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $brand_id=$row['brand_id'];
            $brand_title=$row['brand_title'];
            $number++;
        ?>
        <tr class="text-center">
            <td><?php echo $number; ?></td>
            <td><?php echo $brand_title;?></td>
            <td><a class='icon-link icon-link-hover' style='--bs-link-hover-color-rgb: 25, 135, 84;' href='index.php?edit_brands=<?php echo $brand_id ?>'><i class='fas fa-pen-square px-3'></i><svg class='bi' aria-hidden='true'><use xlink:href='#arrow-right'></use></svg></a>
                </td>
            <td><a class='icon-link' href='index.php?delete_brand=<?php echo $brand_id; ?>'><svg class='bi' aria-hidden='true'><use xlink:href='#box-seam'></use></svg><i class='fas fa-trash-alt'></i></a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>