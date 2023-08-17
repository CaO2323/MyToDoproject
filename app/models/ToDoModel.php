<?php
class ToDoModel extends Model
{
    private $jsonFile;
    private $tasks;
public function readJson()
{
    $this->jsonFile = file_get_contents(ROOT_PATH.'/app/models/data/data.json');
    $this->tasks = json_decode($this->jsonFile, true);
    return $this->tasks;
}
function crearTask($user, $task, $endDate)
{
    $id = count($this-> readJson()) + 1;
    $data = [
        'id' => $id,
        'user' => $user,
        'task' => $task,
        'status' => 'pending',
        'startDate' => date('Y-m-d'),
        'endDate' => $endDate
    ];
    $this->tasks[] = $data;
    $this-> addJson($this->tasks);
}

function addJson($task)
{
    if(!empty($task)){
        file_put_contents($this->jsonFile, json_encode($task, JSON_PRETTY_PRINT));
    }
}

}






?>