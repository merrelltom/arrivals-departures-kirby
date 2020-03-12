    var board_line = 1;
    var letter_no = 1;

  var socket = io.connect('http://134.209.184.8:44444');

  socket.on('connect', function(data) {
    	socket.emit('join', 'Hello World from client');
    	console.log('connected to socket');
  }); 
 
  socket.on('new_arrival', function(data) {
	console.log(data);
    resetContainers();
	data.forEach(function(item) {
        var date = item["date"].split("");
        var name = item["name"].split("");
        date.forEach(addDate);
        name.forEach(addName);
	  board_line += 1;
	});
      board_line = 1;
      letter_no = 1;
  });

function addDate(item, index) {
    document.getElementById('board-date-'+board_line).innerHTML +='<span class="letter-'+ letter_no +'">'+ item + '</span>';
    letter_no +=1;
}

function addName(item, index) {
    document.getElementById('board-name-'+board_line).innerHTML +='<span class="letter-'+ letter_no +'">'+ item + '</span>';
    letter_no +=1;
}

function resetContainers() {
    let dateContainers = document.getElementsByClassName("date");
    let nameContainers = document.getElementsByClassName("name");
    console.log(dateContainers);
    for (item of dateContainers){
        item.innerHTML = '';
    }
    for (item of nameContainers){
        item.innerHTML = '';
    }   
}
