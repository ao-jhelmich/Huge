<div class="container">
    <h1>QrouteController/admin</h1>
    <div class="box">
    <table class="overview-table">
            <form method="get" action="<?php echo Config::get('URL');?>qroute/create">
                <label>Niewe vraag toevoegen: </label><br><br>
                <input type="text" name="question_text" placeholder="vraag" />
                <input type="text" name="question_text" placeholder="antwoord" />
                <input type="text" name="question_text" placeholder="locatie" />
                <input type="submit" autocomplete="off" />
            </form>
                <thead>
                <tr>
               
                    <td>Id</td>
                    <td>question</td>
                    <td>question_answer</td>
                    <td>question_location</td>  
                    <td>edit</td>
                    <td>delete</td>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($this->questions as $key => $value) { ?>
                        <tr>
                            <td><?= $value->question_id; ?></td>
                            <td><?= $value->question_text; ?></td>
                            <td><?= $value->question_answer; ?></td>
                            <td><?= $value->question_location; ?></td>
                            <td><a href="<?= Config::get('URL') . 'Qroute/edit/' . $value->question_id; ?>">Edit</a></td>
                            <td><a href="<?= Config::get('URL') . 'Qroute/delete/' . $value->question_id; ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
    </div>
</div>  
