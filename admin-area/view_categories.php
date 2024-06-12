<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th>Serial No</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $select_category="select * from categories";
        $result=mysqli_query($con,$select_category);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $category_id=$row['category_id'];
            $category_title=$row['category_title'];
            $number++;
        ?>
        <tr class="text-center">
            <td><?php echo $number; ?></td>
            <td><?php echo $category_title;?></td>
            <td><a class='icon-link icon-link-hover' style='--bs-link-hover-color-rgb: 25, 135, 84;' href='index.php?edit_category=<?php echo $category_id;?>'><i class='fas fa-pen-square px-3'></i><svg class='bi' aria-hidden='true'><use xlink:href='#arrow-right'></use></svg></a>
                </td>
            <td><a class='icon-link' href='index.php?delete_category=<?php echo $category_id; ?>'><svg class='bi' aria-hidden='true'><use xlink:href='#box-seam'></use></svg><i class='fas fa-trash-alt'></i></a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>