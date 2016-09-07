<div class="container">
    <h1>QrouteController/admin</h1>
    <div class="box">
    <table class="overview-table">
            <form method="post" action="<?php echo Config::get('URL');?>qroute/create">
                <label>Niewe vraag toevoegen: </label><br><br>
                <label>Vraag: <input type="text" name="question_text" placeholder="vraag" /></label>
                <label> Antwoord: <input type="text" name="question_answer" placeholder="antwoord" /></label>
                <label>Locatie:
                <select type="text" name="location_id">
                    <?php foreach ($this->questions as $key => $value) { ?>
                        <option value="<?= $value->location_id;?>"><?= $value->location_name;?></option>
                    <?php } ?> 
                 </select> 
                 </label>
                <br><br>
                <input value="verzenden" type="submit">
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
                            <td><?= $value->location_url; ?></td>
                            <td><a href="<?= Config::get('URL') . 'qroute/edit/' . $value->question_id; ?>">Edit</a></td>
                            <td><a href="<?= Config::get('URL') . 'qroute/delete/' . $value->question_id; ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
    </div>
</div>  
