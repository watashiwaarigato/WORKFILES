var cards = Create2DArray(400);

$(document).ready(function(){

	var url = "/get_variables";
	$.get(url, function (data) {

		var data = data.split("][");
		for(i=0; i<=data.length - 2; i++){
			var temp = data[i].replace(/"/g,'');
			var data2 = temp.split(",");
			
			var id = parseInt(data2[0]);
			if(id <= Number(9)){
				id = "00" + id;
			}
			else if(id <= Number(99)){
				id = "0" + id;
			}
			
			if(data2[0] != null){
				temp2 = parseInt(data2[0]);
				cards[temp2][0] = id;
				cards[temp2][1] = data2[1];
				cards[temp2][2] = data2[2];
				cards[temp2][3] = data2[3];
				cards[temp2][4] = data2[4];
				cards[temp2][5] = data2[5];
				cards[temp2][6] = data2[6];
				cards[temp2][7] = data2[7];
				cards[temp2][8] = data2[8];
			}//endif
		}//endfor
	})

});

function Create2DArray(rows) {
	var arr = [];
	for (var i=0;i<rows;i++) {
		arr[i] = [];
	}
	return arr;
}


function get_card_class(id){
	id = parseInt(id);
	return cards[id][1];
}
function get_card_name(id){
	id = parseInt(id);
	return cards[id][2];
}
function get_card_level(id){
	id = parseInt(id);
	return cards[id][3];
}
function get_card_attrib(id){
	id = parseInt(id);
	return cards[id][4];
}
function get_card_type(id){
	id = parseInt(id);
	return cards[id][5];
}
function get_card_atk(id){
	id = parseInt(id);
	return cards[id][6];
}
function get_card_def(id){
	id = parseInt(id);
	return cards[id][7];
}
function get_card_desc(id){
	id = parseInt(id);
	return cards[id][8];
}


function get_deck_put_array(deck_name, user_id){
	var url = "/get_variables/" + deck_name + "/" + user_id;
	$.get(url, function (data) {
		
		
		var data = data.replace(/"/g,'');
		data = data.split(",");
		var test = "";
		
		for(i=0; i<=data.length-2; i++){
			
			var id = data[i];
			if(typeof id !== typeof undefined && id !== false){
				if(id != ""){
					deck[i] = parseInt(data[i]);
				}
			}
		}
		
		fixed_deck();
	})
}