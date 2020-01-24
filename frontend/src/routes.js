import React from "react";
import {
  BrowserRouter as Router,
  Route,
  Switch,
  Redirect
} from "react-router-dom";

import Todo from "./pages/Todo";
import About from "./pages/About";

const Routes = () => {
  return (
    <>
      <Router>
        <Switch>
          <Route path='/todos' exact component={Todo}/>
          <Route path='/about' exact component={About}/>
          <Redirect from='*' to='/todos'/>
        </Switch>
      </Router>
    </>
  );
};

export default Routes;
