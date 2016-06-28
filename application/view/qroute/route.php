<div class="container">
    <h1>QrouteController/route</h1>
    <div class="box">
		<?php var_dump($this->question); ?>
		<p><?=$this->question->question_text ?></p>
		<form method="post"  action="<?php echo Config::get('URL');?>Qroute/submitAnswer">
			<input type="hidden" name="id" value="<?=$this->question->question_id?>">
			<input type="number" name="answer" placeholder="uw antwoord">
			<input type="submit" value="submit" autocomplete="off">
		</form>
    </div>
</div>

