paypal.Buttons({
    style: {
      layout: 'vertical',
      color:  'blue',
      shape:  'rect',
      label:  'pay',
      disableMaxWidth: true
    },
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: 100
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      actions.order.capture().then(function (details) {
        document.getElementById('inscription-form').submit();
      });
    },
    onCancel: function(data) {
      alert("Pago cancelado");
    }
}).render('#paypal-button-container');