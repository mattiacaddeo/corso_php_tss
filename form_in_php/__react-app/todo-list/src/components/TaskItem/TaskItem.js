import { useState } from "react";
import { updateTask } from "../../service/TodoService";

const TaskItem = ({ nome_task, done, id, parentRemoveTask, listaTask}) => {
    const [taskCheked, setTaskChecked] = useState(done);
    function onRemoveTask() {
        console.log(id);
        parentRemoveTask(id);
    }

    function onUpdateStatus(event) {
        if(event) {
            setTaskChecked(event.target.checked);
            const singolaTask = listaTask.filter(task => task.id_task == id);
            singolaTask[0].done= event.target.checked;
            updateTask(singolaTask[0], listaTask)
            console.log(listaTask);
        }
    }

    function onUpdateTask() {
        <input type="text" id="task" name="task" value={} className="form-control" />
        const singolaTask = listaTask.filter(task => task.id_task == id);
    }

    return (
        <li className={done ? 'task_gia_fatta':''}>
            <input onChange={event => onUpdateStatus(event)} checked={taskCheked} 
                   className="form-check-input me-1" type="checkbox" value="" aria-label="..." />
            <label htmlFor="checkbox" id="text">
                {nome_task}
            </label>
            <button onClick={onUpdateTask} className="btn btn-primary btn-sm" 
                    href="index.php" data-mdb-toggle="tooltip" title="Edit TaskItem">Edit</button>
            <button onClick={onRemoveTask} className="btn btn-primary btn-sm" 
                    href="index.php" data-mdb-toggle="tooltip" title="Remove TaskItem">X</button>
        </li>
    );
}

export default TaskItem;