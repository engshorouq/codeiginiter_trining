<o style="list-style: none;">
    <?php //$rows=Modules::run('admin/Groups/display');
    //var_dump($rows);
    //echo $group_id;
    //var_dump($rows);

    //var_dump($ids);
    //var_dump($rows);
    foreach($rows as $row){


                ?>

                <li><input type="checkbox" <?php echo $row['IS_CHECK'];?> name="group[]"
                           value="<?php echo $row['ID'] ?>" class="check">

                    &nbsp; &nbsp;<label for="user" class="control-label"><?php echo $row['GROUPNAME'] ?>
                </li>


<?php }?>

</o>