<?php
class ToDoModel 
{
    private $jsonFile;
    private $tasks;
public function readJson()
{
    $this->jsonFile = file_get_contents(ROOT_PATH.'/app/models/data/data.json');
    $this->tasks = json_decode($this->jsonFile, true);
    return $this->tasks;
}
function createTask($user, $task, $endDate)
{
    $id = count($this-> readJson()) + 1;
    $data = [
        'id' => $id,
        'user' => $user,
        'task' => $task,
        'status' => 'pending',
        'startDate' => date('Y-m-d'),
        'end_date' => $endDate
    ];
    $this->tasks[] = $data;
    $this-> addJson($this->tasks);
}

function addJson($task)
{
    if(!empty($task)){
        file_put_contents(ROOT_PATH.'/app/models/data/data.json', json_encode($task, JSON_PRETTY_PRINT));
    }
}
function getTasks()
{
    return $this->readJson();
}

}






?>