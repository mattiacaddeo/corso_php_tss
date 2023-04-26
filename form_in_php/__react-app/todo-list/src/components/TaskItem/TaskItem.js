
const TaskItem = ({ nome_task, done }) => {
    return (
        <li className={done ? 'task_gia_fatta':''}>
            <input defaultChecked={done} className="form-check-input me-1" type="checkbox" value="" aria-label="..." />
            <label htmlFor="checkbox" id="text">
                {nome_task}
            </label>
            <button className="btn btn-primary btn-sm" href="index.php" data-mdb-toggle="tooltip" title="Remove TaskItem"> X </button>
        </li>
    );
}

export default TaskItem;