import React from 'react';

import {FontAwesomeIcon} from '@fortawesome/react-fontawesome';
import {faCalendarCheck} from '@fortawesome/free-solid-svg-icons'

const Menu = () => {
  return (
    <nav className="navbar navbar-expand navbar-dark bg-dark">
      <a className="navbar-brand" href="#/">
        <FontAwesomeIcon icon={faCalendarCheck}/> TodoApp
      </a>
      <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span className="navbar-toggler-icon"></span>
      </button>
      <div className="collapse navbar-collapse" id="navbarSupportedContent">
        <ul className="navbar-nav mr-auto">
          <li className="nav-item active">
            <a className="nav-link" href="#/todos">Tarefas</a>
          </li>
          <li className="nav-item">
            <a className="nav-link" href="#/about">Sobre</a>
          </li>
        </ul>
      </div>
    </nav>
  );
};

export default Menu;
