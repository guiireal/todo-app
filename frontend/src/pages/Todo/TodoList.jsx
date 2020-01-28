import React from 'react';
import IconButton from "../../components/IconButton";
import {faTrash, faCheck, faUndo} from "@fortawesome/free-solid-svg-icons";

import './styles.css';

const TodoList = (
  {list, handleRemove, handleMarkAsDone, handleMarkAsPending}
) => {
  const renderRows = () => {
    const listArray = list || [];
    return listArray.map(todo => (
      <tr key={todo._id}>
        <td className={todo.done ? 'marked-as-done' : ''}>{todo.description}</td>
        <td>
          <IconButton
            styles='success'
            hide={todo.done}
            icon={faCheck}
            onClick={() => handleMarkAsDone(todo)}
          />
          <IconButton
            styles='warning'
            hide={!todo.done}
            icon={faUndo}
            onClick={() => handleMarkAsPending(todo)}
          />
          <IconButton
            styles='danger'
            icon={faTrash}
            hide={!todo.done}
            onClick={() => handleRemove(todo)}
          />
        </td>
      </tr>
    ));
  };

  return (
    <table className="table">
      <thead>
      <tr>
        <th>Descrição</th>
        <th>Ações</th>
      </tr>
      </thead>
      <tbody>
      {renderRows()}
      </tbody>
    </table>
  );
};

export default TodoList;
