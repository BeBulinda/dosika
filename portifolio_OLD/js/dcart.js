// JavaScript Document
(dcart=new function(){
	var c=this, base=$('base').attr('href').replace('index.php',''), items={},
		ccookie={
			add:function(cname,cvalue,exdays){
				(d=new Date()).setTime(d.getTime()+(exdays*24*60*60*1000));
				document.cookie = cname + "=" + escape(cvalue) + "; expires="+d.toGMTString()+"; path=/;";
			},
			get:function(cname){
				return (ckie=(unescape(document.cookie)+';').match(new RegExp(cname+'=(.[^;]*);')))?ckie[1]:'{}';
			}
		},
		csvamount=function(amount){
			return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		};
	
	c.amount_to_csv=function(amnt){ return csvamount(amnt); }
	
	if($.trim( ccookie.get('items'))=='') ccookie.add('items', JSON.stringify({}), 1);
	
	c.plugin={
		btn_checkout:function(ph){
			$(ph).html('<div class="checkout btn" onclick="dcart.plugin.cart()">Shopping Cart <span class="counter">(0)</span></div>')
			.find('.counter')
			.html('('+(function(){ c=0; for(i in eval('('+($.trim(ccookie.get('items'))==''?'{}':ccookie.get('items'))+')'))c++; return c;}())+')');
		},
		btn_addToCart:function(ph){ 
			var isin=false;
			for(i in (Item=eval('('+$(ph).attr('item')+')')))
				if(i in (items=eval('('+($.trim(ccookie.get('items'))==''?'{}':ccookie.get('items'))+')'))){
					isin=true;
					break;
				}
				
			if(!isin)  $(ph).html('Add To Cart').attr('class', 'btn checkout');
			else $(ph).html('Already In Cart').attr('class', 'btn');
		},
		cart:function(){
			var listing=[];
			if($.trim(ccookie.get('items'))!='{}'){
			var total=0, vat=0;
			listing.push('<div class="header">');
			listing.push('<div class="row"><div class="col1">Item</div><div class="col2">Qty</div>');
			listing.push('<div class="col3">@</div><div class="col4">Amount(Ksh)</div></div></div>');
			listing.push('<div '+(!arguments[0]?'300':'550')+' class="body">');
			listing.push('');
			for(i in (items=eval('('+($.trim(ccookie.get('items'))==''?'{}':ccookie.get('items'))+')'))){
				var at=items[i].price/items[i].qty; total+=items[i].price; vat+=items[i].vat;
				listing.push('<div class="row"><div class="col1"><span class="btn" title="Remove" onclick="dcart.remove('+i+', $(\'#itm'+i+'\'))">x</span>');
				listing.push('<a href="'+$('base').attr('href')+'/items/item/'+i+'"><img src="'+items[i].img+'" height="32" />'+items[i].name+'</a></div>');
				listing.push('<div class="col2"><input type="number" name="qty[]" value="'+items[i].qty+'" min=1 ');
				listing.push('style="width:50px; text-align:center" onChange="dcart.setQty('+i+', parseInt($(this).val()))" /></div>');
				listing.push('<div class="col3">'+csvamount(parseFloat(at).toFixed(2))+'</div>');
				listing.push('<div class="col4">'+csvamount(parseFloat(items[i].price).toFixed(2))+'</div>');
				listing.push('</div>');
			}
			listing.push('</div><div class="footer">');
			listing.push('<div class="row"><div class="col3"><strong>Sub Total</strong></div>');
			listing.push('<div class="col4"><strong>'+csvamount(parseFloat(total).toFixed(2))+'</strong></div></div>');
			listing.push('<div class="row"><div class="col3"><strong>Vat</strong></div>');
			listing.push('<div class="col4"><strong>'+csvamount(parseFloat(vat).toFixed(2))+'</strong></div></div>');
			listing.push('<div class="row"><div class="col3"><strong>Total</strong></div>');
			listing.push('<div class="col4"><strong>'+csvamount(parseFloat(total).toFixed(2))+'</strong></div></div></div>');
			
			}
			else listing.push('<h1 align=center>Your shopping cart is empty</h1>');
			if(!arguments[0]){ 
				var buttons={};
				if($.trim(ccookie.get('items'))!='{}'){
					buttons["EMPTY CART"]=function(){
						
						ccookie.add('items', '{}', 1);
						$('#cart').dialog('close');
						$('.counter').html('(0)');
						dcart.plugin.cart();
						
						/*for( i in (items=eval('('+($.trim(ccookie.get('items'))==''?'{}':ccookie.get('items'))+')')) )
							dcart.remove(i, $('#itm'+i));
							
							ccookie.add('items', '{}', 1);
							$('#cart').dialog('close');
							$('.counter').html('(0)');
							dcart.plugin.cart();*/
						}
				}
				buttons["CONTINUE SHOPPING"]=function(){
					$('#cart').dialog('close');
				}
				if($.trim(ccookie.get('items'))!='{}'){
					buttons["PAY NOW"]=function(){ window.location=$('base').attr('href')+'/items/pay'; }
				}
				$('body').prepend('<div id="cart" title="Your Shopping Cart"><p>To pay for the items, click the Pay Now button below</p>'+listing.join('')+'</div>')
				.find('#cart').dialog({
					modal:true,
					buttons:buttons,
					close:function(){
						$('#cart').dialog('destroy');
						$('#cart').remove();
					},
					open: function(event) {
						 $('.ui-dialog-buttonpane').find('button:contains("PAY NOW")').addClass('checkout')
						 .parent().find('button:contains("EMPTY CART")').addClass('white')
						 .parent().find('button:contains("CONTINUE SHOPPING")').addClass('blue').css({color:'#fff'});
						 $('.ui-dialog-title').css({color:'#000'});
					 }
				});
			}
			else $(arguments[0]).html(listing.join(''));
		}
	}
	
	c.add=function(){
		
		if(!(Item=arguments[0])) return;
		for(i in Item)
			if((items=eval('('+($.trim(ccookie.get('items'))==''?'{}':ccookie.get('items'))+')'))[i]){
				items[i].qty++;
				items[i].price=Item[i].price*items[i].qty;
				items[i].vat=Item[i].vat*items[i].qty;
			}
			else items[i]=Item[i];
		
		$('.counter').html('('+(function(){ c=0; for(i in items)c++; return c;}())+')');
		ccookie.add( 'items', JSON.stringify(items), 5 );
		dcart.plugin.cart();
		if(arguments[1]) dcart.plugin.btn_addToCart(arguments[1]);
		
	}
	
	c.remove=function(){
		if(!(itemid=arguments[0])) return;
		var newItems={};
		for(i in items) if(i != itemid) newItems[i]=items[i];
		$('.counter').html('('+(function(){ c=0; for(i in newItems)c++; return c;}())+')');
		ccookie.add( 'items', JSON.stringify(newItems), 1 );
		$('#cart').dialog('close');
		dcart.plugin.cart();
		if(arguments[1]) dcart.plugin.btn_addToCart(arguments[1]);
	}
	
	c.setQty=function(itemid, qty){
		if($.trim(ccookie.get('items'))=='') return;
		var items=eval('('+($.trim(ccookie.get('items'))==''?'{}':ccookie.get('items'))+')');
		var price=items[itemid].price/items[itemid].qty, 
			vat=items[itemid].vat/items[itemid].qty;
		items[itemid].qty=qty;
		items[itemid].price=price*items[itemid].qty;
		items[itemid].vat=vat*items[itemid].qty
		ccookie.add( 'items', JSON.stringify(items), 1 );
		$('#cart').dialog('close');
		dcart.plugin.cart();
	}
	
	c.check=function(){
		if(!(itemid=arguments[0])) return false;
		for(i in itemid) if(i in (items=eval('('+($.trim(ccookie.get('items'))==''?'{}':ccookie.get('items'))+')'))) return items[i];
		return false;
	}
	
}());