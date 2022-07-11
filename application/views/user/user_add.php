
<h1>Add User</h1>

<?php echo validation_errors('<div class="text-danger">', '</div>'); ?>

<?php echo form_open_multipart('user/add_user');?>
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
    <div class="mt-2">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="<?php echo base_url() . 'user/users'; ?> " class="btn btn-secondary">Back</a>
    </div>
   
</form>



