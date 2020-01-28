import React from 'react';

import {faPlus, faSearch, faRecycle} from "@fortawesome/free-solid-svg-icons";

import IconButton from "../../components/IconButton";
import Grid from "../../components/Grid";

const TodoForm = (
  {handleAdd, handleChange, handleSearch, handleClear, description}
) => {

  const keyHandler = e => {
    switch (e.key) {
      case 'Enter':
        e.shiftKey ? handleSearch() : handleAdd();
        break;
      case 'Escape':
        handleClear();
        break;
      default:
    }
  };

  return (
    <div role='form' className='todo-form'>
      <div className="row">
        <Grid cols='12 9 10'>
          <input
            type="text"
            id="description"
            className="form-control"
            placeholder='Adicione uma tarefa'
            value={description}
            onKeyUp={keyHandler}
            onChange={handleChange}
          />
        </Grid>
        <Grid cols='12 3 2'>
          <IconButton
            styles='primary'
            icon={faPlus}
            onClick={handleAdd}
          />
          <IconButton
            styles='info'
            icon={faSearch}
            onClick={handleSearch}
          />
          <IconButton
            styles='secondary'
            icon={faRecycle}
            onClick={handleClear}
          />
        </Grid>
      </div>
    </div>
  );
};

export default TodoForm;
