<a href="<?php echo base_url() . 'user/add_user'; ?> " class="btn btn-success mb-4">Add User</a>

<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Picture</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($info_users as $user) { ?>
            <tr>
                <td><?php echo $user->name; ?></td>
                <td><?php echo $user->email; ?></td>
                <td><?php echo $user->phone; ?></td>
                <td><img src="<?php echo base_url() . 'assets/upload/' . $user->picture; ?>" width="100" height="100"></td>
                <td>
                    <a href="<?php echo base_url() . 'user/edit_user/' . $user->id; ?>" class="btn btn-primary">Edit</a>
                    <a href="<?php echo base_url() . 'user/delete_user/' . $user->id; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>