var deck = [];

$(document).ready(function(){
	$('li').hover(function(){
		var id = $(this).attr('id');
		if(typeof id !== typeof undefined && id !== false){
			if(id != ""){
				//name
				var temp = get_card_name(id);
				$('.name').html(temp);

				//desc
				var temp = get_card_desc(id);
				$('.description .desc').html(temp);

				//atk
				var temp = get_card_atk(id);
				$('.atk').html(temp);

				//def
				var temp = get_card_def(id);
				$('.def').html(temp);

				//picture
				var temp = "<img src='/common/images/cards/" + id + ".jpg'>";
				$('.card_information01').html(temp);

				//type
				var temp = get_card_type(id);
				switch (temp) {
					case 'Continuous':
						temp = '[ <img src="/common/images/magic_icon_continues.png"> Continues ]';
						break;
					case 'Counter':
						temp = '[ <img src="/common/images/magic_icon_counter.png"> Counter ]';
						break;
					case 'Equip':
						temp = '[ <img src="/common/images/magic_icon_equip.png"> Equip ]';
						break;
					case 'Field':
						temp = '[ <img src="/common/images/magic_icon_field.png"> Field ]';
						break;
					case 'Quick':
						temp = '[ <img src="/common/images/magic_icon_quick.png"> Quick ]';
						break;
					case 'Ritual':
						temp = '[ <img src="/common/images/magic_icon_ritual.png"> Ritual ]';
						break;
					default:
						temp = "[ " + temp + " ]";
				}
				$('.type').html(temp);

				//level
				var temp = get_card_level(id);
				$('.level').html('');
				var temp2 = "";
				for(i=0;i<temp; i++){
					temp2 = temp2 + '<img src="/common/images/star_level.png">';
				}
				$('.level').html(temp2);
			}
		}
	});

	
	//CARD LIST TO DECK
	$('.card-list ul li').click(function(){
		if($(this).attr('id') != null){
			var id = $(this).attr('id');
			
			if(deck.length >= 50){
				//maximum card on deck reach
			}
			else {
				//forbiden cards
				var forbiden = ['40','45'];
				var index = contains.call(forbiden, id);
				if(index == true){
					var max = 1;
				}
				else {
					var max = 3;
				}
				
				var ctr = count_same_cards(id);
				if(ctr >= max){
					//maximum 3 cards reach
				}
				else {
					
					
					deck[deck.length] = id;
					check_null();
				}
			}
		}
	});
	
	//DECK TO CARD LIST
	$('.deck ul li').click(function(){
		var id = $(this).attr('id');
		
		if((id == null) || (id == "")){ }
		else {
			var index = $(this).index();
			deck[index] = null;
			check_null();
		}
	});
	
	//RESET DECK
	$('#reset').click(function(){
		reset_deck();
	});
	$('#save_deck').click(function(){
		save_deck();
	});
	
	//BACK TO HOMEPAGE
	
	$('#gotohome').click(function(){
		location = '/'
	});
});




//=========================================================FUNCTIONS======================================================//


function count_same_cards(target){
	var numTrue = 0;
	for(i=0; i<deck.length; i++){
		if(deck[i] == target){
			numTrue++;
		}
	}
	return numTrue;
}

function check_null(){
	for(i=0; i<=deck.length-1; i++){
		var id = deck[i];

		if((id == null) || (id == "")){
			for(j=i; j<=deck.length-1; j++){
				deck[j] = deck[j + 1];
			}
			deck.length = deck.length-1;
		}
	}
	fixed_deck();
}

function fixed_deck(){
	$('.deck ul li').attr('id','');
	$('.deck ul li').html('');
	
	for(i=0; i<=deck.length-1; i++){
		var id = deck[i];
	
		if(id != null){
			$('.deck ul li').eq(i).attr('id',id);
			$('.deck ul li').eq(i).html("<img src='/common/images/cards/" + id + ".jpg'>");
		}
	}
}

function reset_deck(){
	for(i=0; i<=deck.length-1; i++){
		deck[i] = null;
	}
	deck.length = 0;
	fixed_deck();
}

function save_deck(){
	var token = $('meta[name="csrf-token"]').attr('content');
	var user_id = $('#user_id').val();
	var user_name = $('#user_name').val();
	var deck_name = $('#deck_name').val();
	
	if(deck.length <= 39){
		$('#warning').removeClass('alert-success');
		$('#warning').addClass('alert-danger');
		$('#warning').find('p').html('<strong>Warning!</strong> Deck should be in minimum of 40 cards');
		$('#warning').fadeIn('fast');
	}
	else {
		$.ajax({
			type: "POST",
			url: "/deck_save",
			data: { _token: token, deck: deck, user_id: user_id, user_name: user_name, deck_name: deck_name},
			cache: false,
			success: function(data){
				if(data == "saved"){
					$('#warning').removeClass('alert-danger');
					$('#warning').addClass('alert-success');
					$('#warning').find('p').html('<strong>Success!</strong> Deck successfully saved!');
					$('#warning').fadeIn('fast');

					$('#myModal').modal('hide');
				}
				else {
					$('#warning').removeClass('alert-success');
					$('#warning').addClass('alert-danger');
					$('#warning').find('p').html('<strong>Warning!</strong> Please enter deck title!');
					$('#warning').fadeIn('fast');
				}
			}
		});
	}
}


//check if in array
var contains = function(needle) {
	var findNaN = needle !== needle;
	var indexOf;
	if(!findNaN && typeof Array.prototype.indexOf === 'function') {
		indexOf = Array.prototype.indexOf;
	} else {
		indexOf = function(needle) {
			var i = -1, index = -1;
			for(i = 0; i < this.length; i++) {
				var item = this[i];
				if((findNaN && item !== item) || item === needle) {
					index = i;
					break;
				}
			}
			return index;
		};
	}
	return indexOf.call(this, needle) > -1;
};






