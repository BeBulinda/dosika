// JavaScript Document
(nsd_desktop=function(){
	var nsd=this, baseurl=$('base').attr('href');
	
	// make a form submit using ajax
	nsd.ajaxform=function(frm){
		var afterclick=arguments[1]||function(){};
		$(frm).unbind('submit').submit(function(){
			console.log($(this).attr('action'));
			var url=$(this).attr('action'), request=$(this).attr('method')=='get'?$.get:$.post, data={},
			submitBtnText=(sbmtBtn=$(this).find('input[type="submit"]')).val();
			sbmtBtn.val('Please Wait...').attr('disabled', 'disabled');
			$(this).find('input, select, textarea').each(function(){
				if($(this).attr('type')=='radio'||$(this).attr('type')=='checkbox'){
					if($(this).is(':checked')) data[$(this).attr('name')]=$(this).val();
				}
				else data[$(this).attr('name')]=$(this).val();
			});
			
			request(url, data, function(response){
				sbmtBtn.val(submitBtnText).attr('disabled', false);
				afterclick(response);
			}).error(function(e){ sbmtBtn.val(submitBtnText).attr('disabled', false); console.log(e.statusText); });
			return false;
		});
	}
	
	nsd.activateAjaxReservation=function(){
		(ajaxize_reservation=function(){
			nsd_desktop().ajaxform('form[name="reservationfrm"]', function(d){ 
				if($('<div>'+d+'</div>').find('#reservation_frm').length) $('#reservation_frm').replaceWith(d);
				else $('#reservation_frm').html(d);
				
				if($('#reservation_frm form[name="reservationfrm"]').length) ajaxize_reservation();
				else{
					(ajaxize_any_form_returned=function(){
						nsd_desktop().ajaxform('#reservation_frm form', function(resp){
							try{
								var response=eval('('+resp+')');
								if(response.success){
									$('#reservation_frm').html('<div class="success"><h3>Login Successful</h3><p>Wait while the reservation is being completed</p></div>');
									$.post(baseurl+'/items/reserve', function(reserve_response){
										$('#reservation_frm').html(reserve_response);
									});
								}
							}catch(e){
								console.log(resp);
								$('#reservation_frm').html(resp);
								if($('#reservation_frm form').length) ajaxize_any_form_returned();
							}
						})
					})();
				}
			});
		})();
	}
	
	nsd.cookie={
		get:function(){
			
		},
		set:function(){
			
		},
		delete:function(){
			
		}
	}
	
	nsd.infopop=function(source){
		if(!$(source).parent().find('.infopop').length){
			var popHtml='<div class="infopop"><div align="right"><span class="close" onclick="$(this).parent().parent().remove();">X</span></div>';
			popHtml+='<div class="inner">Loading...</div></div>';
			$(source).before(popHtml);
			(infopop=$(source).parent().find('.infopop')).css({marginTop:(-infopop.height()-20)+'px'});
			$.get($(source).attr('href'), {r:Math.random()}, function(d){
				$(infopop).find('.inner').html(d);
			});
		}
	}
	
	nsd.requestLocation=function(reqmsg, address, afterpick){
		if(navigator.geolocation){
			
			$('body').append('<div id="locfinder" style="padding:5px; background:#FFF" title="Your Location"></div>')
			.find('#locfinder').append('<p>'+reqmsg+'</p>').dialog({
				width:500,
				modal:true,
				buttons:{
					PICK:function(){
						$('#locfinder').dialog('close');
					}
				},
				close:function(){
					afterpick({address:$('#locfinder textarea[name="address"]').val(), latlng:$('input[name="latlng"]').val()});
					$('#locfinder').dialog('destroy');
					$('#locfinder').remove();
				}
			});
			
			var fillLocFields=function(latlngStr, address){
				$('#locfinder input[name="latlng"]').val(latlngStr);
				$('#locfinder textarea[name="address"]').val(address);
			},
			afterload=function(position){
				$('#locfinder').html('<p>Drag the marker to where you want shopping delivered</p>')
				.append('<div id="loccanvas" style="width:100%; height:350px"></div>')
				.append('<div align="center"><textarea name="address" cols="30" rows="2" style="width:98%"></textarea></div>')
				.append('<input type="hidden" name="latlng" />');
				
				var myLatlng = new google.maps.LatLng(position.lat, position.lng),
				map = new google.maps.Map(document.getElementById("loccanvas"), {
					zoom: 13,
					center: myLatlng
				}),
				marker = new google.maps.Marker({
					position: myLatlng,
					map: map,
					draggable:true,
					title:"Place me exactlly where you are"
				}),
				getAddress=function(params){
					$('#locfinder p .prog').remove();
					$('#locfinder p').append('<span class="prog">Loading...</span>');
					$.getJSON('http://maps.googleapis.com/maps/api/geocode/json', params, function(locdata){
						$('#locfinder p .prog').remove();
						fillLocFields(params.latlng, locdata.results[0].formatted_address);
					});
				};
				
				google.maps.event.addListener(marker, 'dragend', function(event){
					var latlngStr=event.latLng.lat()+','+event.latLng.lng();
					getAddress({latlng:latlngStr, sensor:false});
				});
				getAddress({latlng:position.lat+','+position.lng, sensor:false});
			},
			requestClientLoc=function(){
				navigator.geolocation.getCurrentPosition(function(position){
					afterload({lat:position.coords.latitude, lng:position.coords.longitude});
				}, function(error){
					
				}, { enableHighAccuracy:true });
			}
			
			if($.trim(address)=='') requestClientLoc();
			else{
				$('#locfinder p').append('<span class="prog">Loading...</span>');
				$.getJSON('http://maps.googleapis.com/maps/api/geocode/json', {address:address, sensor:false}, function(locdata){
					if(!locdata.results.length) requestClientLoc();
					else{
						$('#locfinder p .prog').remove();
						latlngStr=locdata.results[0].geometry.location.lat+','+locdata.results[0].geometry.location.lng;
						afterload({lat:locdata.results[0].geometry.location.lat, lng:locdata.results[0].geometry.location.lng});
					}
				});
			}
		}
	}
	
	return nsd;
}());