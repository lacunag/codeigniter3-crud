<?php echo validation_errors(); ?>

<form method="post" action="<?php echo base_url().'user/add_user'; ?> ">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone">
    </div>
    <div class="form-group">
        <label for="picture">Picture</label>
        <input type="file" class="form-control" id="picture" name="picture" placeholder="Enter picture">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>



