const TaskList = (props) => {

    return (
        <>
            <h2 className="task_list__header">{props.header} {props.task.length}</h2>
            <ul className="task_list__list">
                {props.children}
            </ul>
        </>
    );
}

export default TaskList;