import React, {Component} from 'react';
import api from "../../services/api";

import PageHeader from "../../components/PageHeader";
import TodoForm from "./TodoForm";
import TodoList from "./TodoList";

export default class Todo extends Component {

  state = {
    description: '',
    list: []
  };

  async componentDidMount() {
    this.refresh();
  }

  refresh = async (description = '') => {
    const search = description ? `&description__regex=/${description}/` : '';
    const response = await api.get(`/todos?sort=-createdAt${search}`);
    this.setState({list: response.data});
  };

  handleAdd = async () => {
    const description = this.state.description;
    const response = await api.post('/todos', {description});
    this.setState({description: '', list: [...this.state.list, response.data]});
  };

  handleSearch = async () => {
    await this.refresh(this.state.description);
  };

  handleChange = event => {
    this.setState({description: event.target.value});
  };

  handleRemove = async todo => {
    await api.delete(`/todos/${todo._id}`);
    this.refresh();
  };

  handleMarkAsDone = async todo => {
    await api.put(`/todos/${todo._id}`, {...todo, done: true});
    this.refresh();
  };

  handleMarkAsPending = async todo => {
    await api.put(`/todos/${todo._id}`, {...todo, done: false});
    this.refresh();
  };

  render() {
    return (
      <>
        <PageHeader name='Tarefas' small='Cadastro'/>
        <TodoForm
          description={this.state.description}
          handleAdd={this.handleAdd}
          handleChange={this.handleChange}
          handleSearch={this.handleSearch}
        />
        <TodoList
          list={this.state.list}
          handleRemove={this.handleRemove}
          handleMarkAsDone={this.handleMarkAsDone}
          handleMarkAsPending={this.handleMarkAsPending}
        />
      </>
    );
  }
}