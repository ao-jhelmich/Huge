<div class="container">
    <h1>TodoController/index</h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <p>
            <form method="post" action="<?php echo Config::get('URL');?>todo/create">
                <label>Text of new activity: </label><input type="text" name="todo_text" />
                <input type="submit" value='Create this activity' autocomplete="off" />
            </form>
        </p>

        <?php if ($this->activities) { ?>
            <table class="note-table">
                <thead>
                <tr>
                    <td>Id</td>
                    <td>Activity</td>
                    <td>EDIT</td>
                    <td>DELETE</td>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($this->activities as $key => $value) { ?>
                        <tr>
                            <td><?= $value->todo_id; ?></td>
                            <td><?= htmlentities($value->todo_text); ?></td>
                            <td><a href="<?= Config::get('URL') . 'todo/edit/' . $value->todo_id; ?>">Edit</a></td>
                            <td><a href="<?= Config::get('URL') . 'todo/delete/' . $value->todo_id; ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } else { ?>
                <div>No activities yet. Create some !</div>
            <?php } ?>
    </div>
</div>
