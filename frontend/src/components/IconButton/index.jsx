import React from 'react';
import './styles.css';

import If from "../../utils/If";

import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";

const IconButton = ({styles, hide, onClick, icon}) => (
  <If test={!hide}>
    <button
      className={`btn btn-${styles}`}
      onClick={onClick}
    >
      <FontAwesomeIcon icon={icon}/>
    </button>
  </If>
);

export default IconButton;
