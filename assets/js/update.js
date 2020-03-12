  var board_line = 1;
  var letter_no = 1;


  var socket = io.connect('http://134.209.184.8:44444');

  socket.on('connect', function(data) {
    	socket.emit('join', 'Hello World from client');
    	console.log('connected to socket');
  }); 
 
  socket.on('new_arrival', function(data) {
            console.log(data);
    resetArrivals();
	data.forEach(function(item) {
        var date = item["date"].split("");
        var name = item["name"].split("");
        date.forEach(function(item){
            document.getElementById('a-board-date-'+board_line).innerHTML +='<span class="letter-'+ letter_no +'">'+ item + '</span>';
            letter_no +=1;   
        });
        name.forEach(function(item){
            document.getElementById('a-board-name-'+board_line).innerHTML +='<span class="letter-'+ letter_no +'">'+ item + '</span>';
            letter_no +=1;
        });
	    board_line += 1;
	});
      board_line = 1;
      letter_no = 1;
  });

  socket.on('new_departure', function(data) {
    resetDepartures();
	data.forEach(function(item) {
        var date = item["date"].split("");
        var name = item["name"].split("");
        date.forEach(function(item){
            document.getElementById('d-board-date-'+board_line).innerHTML +='<span class="letter-'+ letter_no +'">'+ item + '</span>';
            letter_no +=1;   
        });
        name.forEach(function(item){
            document.getElementById('d-board-name-'+board_line).innerHTML +='<span class="letter-'+ letter_no +'">'+ item + '</span>';
            letter_no +=1;
        });
	    board_line += 1;
	});
     board_line = 1;
     letter_no = 1;
  });


function resetArrivals() {
    let dateContainers = document.querySelectorAll('#arrivals-board .date');
    let nameContainers = document.querySelectorAll('#arrivals-board .name');
    console.log(dateContainers);
    for (item of dateContainers){
        item.innerHTML = '';
    }
    for (item of nameContainers){
        item.innerHTML = '';
    }   
}

function resetDepartures() {
    let dateContainers = document.querySelectorAll('#departures-board .date');
    let nameContainers = document.querySelectorAll('#departures-board .name');
    console.log(dateContainers);
    for (item of dateContainers){
        item.innerHTML = '';
    }
    for (item of nameContainers){
        item.innerHTML = '';
    }   
}
