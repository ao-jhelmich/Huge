<div class="container">
    <h1>QrouteController/edit</h1>
    <div class="box">
		<?php foreach($this->questions as $key => $value) { ?>
            <tr>
                <td><?= $value->question_id; ?></td>
                <td><?= $value->question_text; ?></td>
                <td><?= $value->question_answer; ?></td>
                <td><?= $value->location_url; ?></td>
                <td><a href="<?= Config::get('URL') . 'qroute/edit/' . $value->question_id; ?>">Edit</a></td>
                <td><a href="<?= Config::get('URL') . 'qroute/delete/' . $value->question_id; ?>">Delete</a></td>
            </tr>
        <?php } ?>	
    </div>
</div>