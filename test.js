
// server.js
const express = require('express');
const http = require('http');
const socketIo = require('socket.io');

const app = express();
const server = http.createServer(app);
const io = socketIo(server);

let rideRequests = [];

io.on('connection', (socket) => {
  console.log('Client connected');

  socket.on('requestRide', (request) => {
    request.id = Date.now();
    rideRequests.push(request);
    io.emit('newRideRequest', request);
  });

  socket.on('disconnect', () => {
    console.log('Client disconnected');
  });
});

server.listen(3000, () => {
  console.log('Server running on port 3000');
});


console.log("hi");