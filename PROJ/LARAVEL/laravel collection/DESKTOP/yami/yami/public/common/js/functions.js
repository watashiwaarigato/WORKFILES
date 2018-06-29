$(document).ready(function(){
	
	battle_start();
	
	//BATTLE START ===================================================================================================
	function battle_start(){
		start_deck_shuffle();
		
		setTimeout(function(){
			stop_deck_shuffle();
			
			first_draw_both();

			$('#narator').html('<p>Battle Start</p>');
			$('#narator').show();

			setTimeout(function(){
				$('.modal').fadeOut('slow');
			},2000);
			
			
		},3000);

	}
	
	
	//DECK SHUFFLE ===================================================================================================
	function start_deck_shuffle(){
		$('#shuffle').fadeIn('fast');
	}
	function stop_deck_shuffle(){
		$('#shuffle').hide();
	}
	
	
	
	
	//PHASE =========================================================================================================
	function draw_phase(){
		
	}
	function standby_phase(){

	}
	
	

	//DRAW CARD=======================================================================================================
	function first_draw_both(){
		for(i=1;i<=5;i++){
			draw_char();
			draw_enemy();
		}
	}
	function draw_char(){
		$('.char .deck .card_bg').animate({
			top : '100px',
			opacity : 0
		},700, function(){
			$('footer ul').append('<li></li>');
			$('.char .deck .card_bg').css({
				top : '0',
				opacity : 1
			});
		});
	}
	function draw_enemy(){
		$('.enemy .deck .card_bg').animate({
			top : '-100px',
			opacity : 0
		},700, function(){
			$('header ul').append('<li><div class="card_bg"></div></li>');
			$('.enemy .deck .card_bg').css({
				top : '0',
				opacity : 1
			});
		});
	}
	
	//FLIP CARD==================================================================================================
	function flip_char(field_id){

	}
	function flip_enemy(field_id){

	}
	
//MONSTERS#############################################################################################################
	//SUMMON MONSTER===================================================================================================
	function summon_monster_char(hand_id,field_id){
		$('footer ul li').eq(hand_id).remove();
		$('.char .monsters ul li').eq(field_id).html('<div class="card_monster"></div>');
		$('.char .monsters ul li').eq(field_id).find('.card_monster').animate({
			bottom : '0'
		},500);
	}
	function summon_monster_enemy(hand_id,field_id){
		$('header ul li').eq(hand_id).remove();
		$('.enemy .monsters ul li').eq(field_id).html('<div class="card_monster"></div>');
		$('.enemy .monsters ul li').eq(field_id).find('.card_monster').animate({
			bottom : '0'
		},500);
	}

//SPELLS###############################################################################################################
	//ACTIVATE MAGIC CARD==============================================================================================
	function activate_spell_char(hand_id,field_id){
		$('footer ul li').eq(hand_id).remove();
		$('.char .spells ul li').eq(field_id).html('<div class="card_magic"></div>');
		$('.char .spells ul li').eq(field_id).find('.card_magic').animate({
			bottom : '0'
		},500);
	}
	function activate_spell_enemy(hand_id,field_id){
		$('header ul li').eq(hand_id).remove();
		$('.enemy .spells ul li').eq(field_id).html('<div class="card_magic"></div>');
		$('.enemy .spells ul li').eq(field_id).find('.card_magic').animate({
			bottom : '0'
		},500);
	}
	//SET MAGIC CARD===================================================================================================
	function set_spell_char(hand_id,field_id){
		$('footer ul li').eq(hand_id).remove();
		$('.char .spells ul li').eq(field_id).html('<div class="card_bg"></div>');
		$('.char .spells ul li').eq(field_id).find('.card_bg').animate({
			bottom : '0'
		},500);
	}
	
	
	
	
	/*setTimeout(function(){
		summon_monster_char(1,1);
	}, 1000);
	setTimeout(function(){
		move_graveyard_char('monsters',1);
	}, 2000);*/
	
	//MOVE TO GRAVEYARD================================================================================================
	function move_graveyard_char(type,field_id){
		//type = monsters/spells
		var temp = ".char ." + type + " ul li";
		$(temp).eq(field_id).find('div').animate({
			opacity : 0
		},'slow',function(){
			$(this).remove();
		});
	}
	
	
});







