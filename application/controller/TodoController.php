<?php

class TodoController extends Controller
{
	public function index()
	{
		$this->View->render('todo/index', array(
            'activities' => TodoModel::getAllActivities()
        ));
	}
	
	public function create()
    {
        TodoModel::createActivity(Request::post('todo_text'));
        Redirect::to('todo');
    }

}