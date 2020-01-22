const mongoose = require('mongoose');

const hostname = 'localhost';
const port = '27017';
const database = 'TodoApp';

mongoose.connect(`mongodb://${hostname}:${port}/${database}`, {
  useNewUrlParser: true,
  useUnifiedTopology: true
});