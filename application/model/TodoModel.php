<?php

class TodoModel
{
	public static function getAllActivities()
	{
		$database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT todo_id, todo_text FROM todo";
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
	}

	public static function createActivity($todo_text)
	{
		 if (!$todo_text || strlen($todo_text) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_TODO_CREATION_FAILED'));
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT INTO todo (todo_text) VALUES (:todo_text)";
        $query = $database->prepare($sql);
        $query->execute(array(':todo_text' => $todo_text));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_TODO_CREATION_FAILED'));
        return false;
	}
}