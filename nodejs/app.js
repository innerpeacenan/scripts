var express = require('express');
var app = express();

var server = app.listen(3000, function (){
  var host = server.address().address;
  //console.error('host is' + host);
  var port = server.address().port;
  console.log('demo: listening at http://%s:%s', host, port);
});

app.use(express.static('public'));
app.get("/", function (req, res){res.send('deno or express router!');});
