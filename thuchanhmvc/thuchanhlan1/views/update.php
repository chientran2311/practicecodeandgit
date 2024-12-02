<?php 
include_once "layouts/default.php";
?>
<div class="container mt-5 mb-3">
    <div class="title">
        <h3>Update property</h3>
    </div>
    <div class="mb-3">
        <form action="web.php?controller=property&action=save" method="post">
            <label for="" class="form-label">PropertyId</label>
            <input type="text" class="form-control" name="PropertyId" id="" aria-describedby="helpId"
                value="<?= $id?>" />

            <label for="" class="form-label">AgentId</label>
            <select class="form-select form-select-lg" name="AgentId" id="">
                <?php
                foreach ($agentList as $agent) {
                    ?>
                <option <?= $selectedAgentId === $agent['AgentId'] && "selected" ?> value="<?= $agent['AgentId'] ?>">
                    <?= $agent['AgentName'].": ".$agent['ContactInfo'] ?>
                </option>
                <?php
                }
                ?>
            </select>
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="PropertyName" id="" aria-describedby="helpId"
                value="<?= $property['PropertyName']?>" />
            <label for="" class="form-label">Type</label>
            <input type="text" class="form-control" name="Type" id="" aria-describedby="helpId"
                value="<?= $property['Type']?>" />
            <label for="" class="form-label">Location</label>
            <input type="text" class="form-control" name="Location" id="" aria-describedby="helpId"
                value="<?= $property['Location']?>" />
            <label for="" class="form-label">Price</label>
            <input type="text" class="form-control" name="Price" id="" aria-describedby="helpId"
                value="<?= $property['Price']?>" />
            <button type="submit" class="btn btn-primary">
                Update
            </button>

        </form>
    </div>
</div>
<?php
include_once "layouts/footer.php";
?>