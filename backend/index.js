const express = require('express');
const cors = require('cors');
const server = express();
const port = 3333;

require('./src/config/database');

server.use(cors());
server.use(express.urlencoded({extended: false}));
server.use(express.json());

require('./src/config/routes')(server);

server.listen(port, () => {
  console.log(`Backend is running in port ${port}`);
});