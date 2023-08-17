<?php


class ToDoController extends Controller
{

public function createAction()
{
    $list = new ToDoModel();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $data = $_POST;
        $list-> createTask($data['user'],$data['task'],$data['end_date']);
    }
}

public function showTasksAction()
{
    $tasksList = new ToDoModel();
    $this->view->content =  $tasksList->getTasks();
}



}



?>