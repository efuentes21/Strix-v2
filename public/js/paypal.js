paypal.Buttons({
    style: {
      layout: 'horizontal',
      color:  'blue',
      shape:  'rect',
      label:  'pay',
      disableMaxWidth: true,
      tagline: false,
    },
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: price
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      actions.order.capture().then(function (details) {
        console.log(route);
        if(route) {
          window.location.href = route;
        } else {
          document.getElementById('paypal-form').submit();
        }
      });
    },
    onCancel: function(data) {
      alert("Pago cancelado");
    }
}).render('#paypal-button-container');