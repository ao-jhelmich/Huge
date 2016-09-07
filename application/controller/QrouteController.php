<?php 

class QrouteController extends Controller
{
	public function index()
	{
		$this->View->render('Qroute/index'); 
	}

	public function admin()
	{
		$this->View->render('Qroute/admin', array(
			'questions' => QrouteModel::getAllQuestions()
			));
	}

	public function create()
    {
        QrouteModel::createQuestion(Request::post('question_text'), Request::post('question_answer'),	
        Request::post('location_id'));
        Redirect::to('qroute/admin');
    }

    public function delete($question_id)
    {
    	QrouteModel::deleteQuestion($question_id);
    	Redirect::to('qroute/admin');
    }


	public function edit($question_id)
	{
		$this->View->render('qroute/edit', array(
			'question' => QrouteModel::getQuestion($question_id)
			));
	}

	public function howto()
	{
		$this->View->render('Qroute/howto');
	}


	public function route($question_id)
	{
		if ($question_id == 0) {
			$question_id = 1;
		}

		$this->View->render('Qroute/route', array(
			'question' => QrouteModel::getQuestion($question_id)
		));
	}

	public function submitAnswer()
	{
		QrouteModel::checkAnswer(Request::post('answer'), Request::post('id'));
		Redirect::to('Qroute/scan');	
	}

	public function scan($question_id)
	{
		$this->View->render('Qroute/scan', array(
			'question' => QrouteModel::getQuestion($question_id)
		));
	}

}