import React from 'react';

import './styles.css';

const PageHeader = ({name, small}) => {
  return (
    <div className='page-header'>
      <header className="page-header">
        <h2>{name} <small>{small}</small></h2>
      </header>
    </div>
  );
};

export default PageHeader;
