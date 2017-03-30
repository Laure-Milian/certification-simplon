(function() {
	let orderApp = {
		
		init: function() {
			this.listeners();
			this.setShippingCost("shipping_method_1");
		},

		listeners: function() {
			$('#shipping_method').on('change', function() {
				orderApp.setShippingCost(this.value);
			});
		},

		setShippingCost: function(shipping_method) {
			let shipping_cost;
			if (shipping_method === "shipping_method_1") {
				shipping_cost = 0;
			}
			else if (shipping_method === "shipping_method_2") {
				shipping_cost = 50;
			}
			else if (shipping_method === "shipping_method_3") {
				shipping_cost = 300;
			}
			$(".delivery_cost").text(shipping_cost / 100);
			this.setTotalOrderPrice(shipping_cost);
		},

		setTotalOrderPrice: function(shipping_cost) {
			let products_price = parseInt($(".products_total_price").text(), 10) * 100;
			let order_total_price = (shipping_cost + products_price) / 100;
			$(".order_total_price").text(order_total_price);
		}
	
	}

	orderApp.init()
})();