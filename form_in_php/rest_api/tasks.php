<?php

use crud\TaskCRUD;
use models\Task;

include "../config.php";
require "../autoload.php";

$crud = new TaskCRUD();

switch ($_SERVER['REQUEST_METHOD']) {

    case 'GET':
        $id_user = filter_input(INPUT_GET,'id_user');
        $id_task = filter_input(INPUT_GET,'id_task');
        if(!is_null($id_user)){
            $res = $crud->readTask($id_user);
            if($res == false){
                $response = [
                    'errors' => [
                        [
                            'status' => 404,
                            'title' => "risorsa non trovata",
                            'details' => filter_input(INPUT_GET,'id_user')
                         ]
                    ]    
                ];  
                echo json_encode($response);
            } else{
                $response = [
                    'data' => $res,
                    'status' => 200
                ]; 
                echo json_encode($response);
            }
        } else if(!is_null($id_task)){
            $res = $crud->readTaskId($id_task);
            if($res == false){
                $response = [
                    'errors' => [
                        [
                            'status' => 404,
                            'title' => "Task ID non trovato",
                            'details' => filter_input(INPUT_GET,'id_task')
                         ]
                    ]    
                ];  
                echo json_encode($response);
            } else{
                $response = [
                    'data' => $res,
                    'status' => 200
                ]; 
                echo json_encode($response);
            }
        } else{
            $tasks = $crud->readTask();
            $response = [
                'data' => $tasks,
                'status' => 200
            ]; 
            echo json_encode($response);
        }
        break;

    case 'POST':
        $input = file_get_contents('php://input');
        $request = json_decode($input, true);
        $task = Task::arrayToTask($request);
        $last_id = $crud->createTask($task);

        $task = (array) $task;
        $task['id_task'] = $last_id;
        $response = [
            'data' => $task,
            'status' => 201
        ];
        echo json_encode($response);
        break;

    case 'DELETE':
        $id_task = filter_input(INPUT_GET, 'id_task', FILTER_VALIDATE_INT);
        if(!is_null($id_task)) {
            $rows = $crud->deleteTask($id_task);
            if($rows == 1) {
                http_response_code(200);
                $response = [
                    'data' => $id_task,
                    'status' => 200
                ];
            }
            if($rows == 0) {
                http_response_code(404);
                $response = [
                    'errors' => [
                        [
                            "status" => 404,
                            "title" =>  "Task non trovata",
                            "detail" => $id_task
                        ]
                    ]
                ];
            }
            echo json_encode($response);
        }
        break;

    case 'PUT':
        $id_task = filter_input(INPUT_GET, 'id_task', FILTER_VALIDATE_INT);
        $input = file_get_contents('php://input');
        $request = json_decode($input, true);
        $task = Task::arrayToTask($request);

        $tasks = $crud->readTask();
        $invalid_id = false;
        for ($i=0; $i < sizeof($tasks); $i++) {
            if($tasks[$i]->id_task == $id_task) {
                break;
            } else {
                $invalid_id = true;
            }
        }
        print_r($invalid_id);
        if (!is_null($id_task)) {
            if($invalid_id) {
                http_response_code(404);
                $response = [
                    'errors' => [
                        [
                            "status" => "404",
                            "title" =>  "ID non esistente",
                            "detail" => $id_task
                        ]
                    ]
                ];
            } else {
                $rows = $crud->updateTask($task);
                if ($rows == 1) {
                    http_response_code(202);
                    $task->id_task = $id_task;
                    $response = [
                        'data' => $task,
                        'status' => 202
                    ];
                }
                if ($rows == 0) {
                    http_response_code(404);
                    $response = [
                        'errors' => [
                            [
                                "title" =>  "Nessuna modifica",
                                "detail" => $id_task
                            ]
                        ]
                    ];
                }
            }
            echo json_encode($response); 
        }
        
        break;

    default:

        break;

}


?>