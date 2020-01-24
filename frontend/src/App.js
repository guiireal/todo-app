import React from 'react';

import Routes from "./routes";
import Menu from "./components/Menu";

function App() {
  return (
    <div className="container">
      <Menu />
      <Routes/>
    </div>
  );
}

export default App;
