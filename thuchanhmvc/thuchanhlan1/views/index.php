<?php include_once "layouts/default.php"; ?>
<div class="container mt-5 mb-3">
        <a name="" id="" class="btn btn-primary mt-3 mb-5" href="web.php?controller=property&action=insert" role="button">ADD NEW PROPERTY</a>    
    <div class="table-responsive-lg">
        <table class="table table-light">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Location</th>
                    <th scope="col">Price</th>
                    <th scope="col">Agent</th>
                    <th scope="col">function</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($propertyList as $property){
                ?>
                <tr class="">
                    <td scope="row"><?=$property['PropertyId'] ?></td>
                    <td scope="row"><?=$property['PropertyName'] ?></td>
                    <td scope="row"><?=$property['Type'] ?></td>
                    <td scope="row"><?=$property['Location'] ?></td>
                    <td scope="row"><?=$property['Price'] ?></td>
                    <td scope="row"><?=$property['AgentId'] ?></td>
                    <td scope="row">
                        <a href="web.php?controller=property&action=edit&id=<?=$property['PropertyId'] ?>"
                            class="btn btn-success">Edit</a>
                        <a href="web.php?controller=property&action=delete&id=<?=$property['PropertyId'] ?>"
                            class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php  } 
                ?>
            </tbody>
        </table>
    </div>

</div>
<?php include_once "layouts/footer.php"; ?>