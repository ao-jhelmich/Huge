<?php 

class QrouteModel
{
    public static function updateQuestion($question_id)
    {

    }
    
    public static function deleteQuestion($question_id)
    {
        if (!$question_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM question WHERE question_id = :question_id";
        $query = $database->prepare($sql);
        $query->execute(array(':question_id' => $question_id));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_DELETION_FAILED'));
        return false;
    }

    public static function createQuestion($question_text, $question_answer, $location_id)
    {

            if (!$question_text || strlen($question_text) == 0) {
            echo "Je question_text is niet aanwezig";
            return false;
        }
            if (!$question_answer || strlen($question_answer) == 0) {
            echo "Je question_answer is niet aanwezig";
            return false;
        }
            if (!$location_id || strlen($location_id) == 0) {
            echo "Je location_id is niet aanwezig";
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT INTO question (question_text, question_answer, question_location_id) 
                VALUES (:question_text, :question_answer, :question_location_id)";
        echo $sql;
        $query = $database->prepare($sql);
        $query->execute(array(':question_text' => $question_text, ':question_answer' => $question_answer, 
                                ':question_location_id' => $location_id));
    }

    public static function getAllQuestions()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM question LEFT JOIN location ON question.question_location_id = location.location_id ORDER BY question_id ASC";
        $query = $database->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that gets a single result
        return $query->fetchAll();
    }
	public static function getQuestion($question_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT question_id, question_text, question_answer, question_location_id 
        		FROM question 
                LEFT JOIN location ON question.question_location_id = location.location_id
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