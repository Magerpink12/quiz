&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div>
    <div class="display_image2" id="display_image2">
        <img src="<?php echo file_exists("../admin/" . $user->picture) && $user->picture != "" ? "../admin/" . $user->picture : "../admin/profile_img/avatar.jpg"; ?>"
            alt="Profile" class="rounded-circle img2">
    </div>
</div>
&nbsp;&nbsp;
<div class=" badge bg-success text-light">
    <?php echo $user->name ?>
</div>