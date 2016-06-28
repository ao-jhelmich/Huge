<?php 

class QrouteModel
{
    public static function createQuestion($question_text, $question_answer, $question_location)
    {

            if (!$question_text || strlen($question_text) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
        }
            if (!$question_answer || strlen($question_answer) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
        }
            if (!$question_location || strlen($question_location) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;

        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT INTO question (question_text, question_answer, question_location) 
                VALUES (:questio_text, :question_answer, :question_location)";
        $query = $database->prepare($sql);
        $query->execute();

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
        return false;
    }

    public static function getAllQuestions()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM question";
        $query = $database->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that gets a single result
        return $query->fetchAll();
    }
	public static function getQuestion($question_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT question_id, question_text, question_answer, question_location 
        		FROM question 
        		WHERE question_id = :question_id";
        $query = $database->prepare($sql);
        $query->execute(array("question_id" => $question_id));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    public static function checkAnswer($answer, $question_id)
	{
		 if (!$answer || strlen($answer) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_SUBMIT_ACTION_FAILED'));
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT question_answer FROM question WHERE question_id = :question_id";
        $query = $database->prepare($sql);
        $query->execute(array(':question_id' => $question_id));
        $result = $query->fetch();

        if ($answer == $result->question_answer) {
            Session::add('feedback_positive', 'Goed beantwoord!');
            return true;
        } 

        Session::add('feedback_negative', 'Fout beantwoord!');
        return false;
	}
}