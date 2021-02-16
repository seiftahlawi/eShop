$('.btn-cart').click(function (e) {

  var Add = e.target.name;

  $.ajax({
    url: "../Controler/add.php",
    type: "POST",
    data: { n: Add },
    success: function () {
      console.log('done')

    }
  });

});


$('.removeItem').click(function (e) {

  var d = e.target.name;

  $.ajax({
    url: "../Controler/delete.php",
    type: "POST",
    data: { n: d },
    success: function () {
      console.log('deleted')
      location.reload();
    }
  });

});