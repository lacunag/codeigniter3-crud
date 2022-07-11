<?php echo validation_errors(); ?>

Edit User
<form method="post" action="<?php echo base_url().'user/edit_user/'.$user->id; ?> ">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="<?php echo $user->name; ?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo $user->email; ?>">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone" value="<?php echo $user->phone; ?>">
    </div>
    <div class="form-group">
        <label for="picture">Picture</label>
        <input type="file" class="form-control" id="picture" name="picture" placeholder="Enter picture" value="<?php echo $user->picture; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>