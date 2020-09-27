var $kd=jQuery.noConflict();
$kd(function($){
	
	var note = $('#note'),
		ts = (new Date(2014, 3, 15)).getTime() + 3*24*60*60*1000;
		newYear = true;
	
	if((new Date()) > ts){
		// Задаем точку отсчета для примера. Пусть будет очередной Новый год или дата через 10 дней.
		// Обратите внимание на *1000 в конце - время должно задаваться в миллисекундах
		$('.button_act span').html('249$');
                $('.button_act').attr('href','http://alexandrkazakov.e-autopay.com/order1/67868');
                $('.polnaya_stoimost .ac_st').remove();
		newYear = false;
	}
		
	$('.countdown').countdown({
		timestamp	: ts,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			
			message += "Дней: " + days +", ";
			message += "часов: " + hours + ", ";
			message += "минут: " + minutes + " и ";
			message += "секунд: " + seconds + " <br />";
			
			if(newYear){
				message += "осталось до Нового года!";
			}
			else {
				message += "осталось до момента через 10 дней!";
			}
			
			note.html(message);
		}
	});
	$('.countdown2').countdown({
		timestamp	: ts,
		callback	: function(days, hours, minutes, seconds){

			var message = "";

			message += "Дней: " + days +", ";
			message += "часов: " + hours + ", ";
			message += "минут: " + minutes + " и ";
			message += "секунд: " + seconds + " <br />";

			if(newYear){
				message += "осталось до Нового года!";
			}
			else {
				message += "осталось до момента через 10 дней!";
			}

			note.html(message);
		}
	});
        $('.countdown3').countdown({
		timestamp	: ts,
		callback	: function(days, hours, minutes, seconds){

			var message = "";

			message += "Дней: " + days +", ";
			message += "часов: " + hours + ", ";
			message += "минут: " + minutes + " и ";
			message += "секунд: " + seconds + " <br />";

			if(newYear){
				message += "осталось до Нового года!";
			}
			else {
				message += "осталось до момента через 10 дней!";
			}

			note.html(message);
		}
	});
        $('.submit_land').click(function(){
        $('.name_land').css('border','none');
          $('.email_land').css('border','none');
         var name=$('.name_land').val();
         var email=$('.email_land').val();
         var pat = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
        if($.trim(name) && pat.test(email)){
            $.ajax({
               type: "POST",
               url: "form_land.php",
               data: ({
                   name:name,
                   email:email,
                   country:$('.country_land').val(),
                   city:$('.city_land').val(),
                   phone:$('.phone_land').val()
               }),
               success: function(msg){
                 alert( "Ваши данные приняты. Мы свяжемся с Вами в ближайшее время." );
                  $('.name_land').css('border','none');
                  $('.email_land').css('border','none');
                  $('.name_land').val('');
                  $('.country_land').val('');
                  $('.phone_land').val('');
                  $('.city_land').val('');
                  $('.email_land').val('');
               }
             });
         }else{
            
             if(!$.trim(name)){;
                 $('.name_land').css('border','1px solid red');
             }
             if((!pat.test(email)) || (!$.trim(email))){
                 $('.email_land').css('border','1px solid red');
             }
         }
        });
});
