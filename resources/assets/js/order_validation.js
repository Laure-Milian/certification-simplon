(function() {
	let orderApp = {
		
		init: function() {
			this.listeners();
			this.setShippingCost("point-relais");
			this.getLastOrder();
		},

		listeners: function() {
			$('#shipping_method').on('change', function() {
				orderApp.setShippingCost(this.value);
			});
		},

		setShippingCost: function(shipping_method) {
			let shipping_cost;
			if (shipping_method === "point-relais") {
				shipping_cost = 0;
			}
			else if (shipping_method === "colissimo") {
				shipping_cost = 50;
			}
			else if (shipping_method === "chronopost") {
				shipping_cost = 300;
			}
			$(".delivery_cost").text(shipping_cost / 100);
			this.setTotalOrderPrice(shipping_cost);
		},

		setTotalOrderPrice: function(shipping_cost) {
			let products_price = parseInt($(".products_total_price").text(), 10) * 100;
			let order_total_price = (shipping_cost + products_price) / 100;
			$(".order_total_price").text(order_total_price);
		},

		getLastOrder: function() {
			$known_address = $(".known_address").val();
			if ($known_address === "true") {
				let last_order = JSON.parse($(".last_order").val());
				$("#last_name").val(last_order.last_name);
				$("#first_name").val(last_order.first_name);
				$("#address").val(last_order.address);
				$("#zip_code").val(last_order.zip_code);
				$("#city").val(last_order.city);
				$("#phone").val(last_order.phone);
				$("#delivery_comment").val(last_order.comment);
			} else {
				return false;
			}
		}
	
	}

	orderApp.init()
})();