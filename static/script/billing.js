window.onload = function() {
          
    document.getElementById("download-invoice").addEventListener("click", ()=> {
        const invoice = this.document.getElementById("pricing");
        
        console.log(invoice);
        console.log(window);
        html2pdf().set().from(invoice).save("invoice.pdf");

    })

};



$(function() {

    function autoCalcSetup() {
      $('form#cart').jAutoCalc('destroy');
      $('form#cart tr.line_items').jAutoCalc({keyEventsFire: true, decimalPlaces: 2, emptyAsZero: true});
      $('form#cart').jAutoCalc({decimalPlaces: 2});
    }
    autoCalcSetup();


    $('button.row-remove').on("click", function(e) {
      e.preventDefault();

      var form = $(this).parents('form')
      $(this).parents('tr').remove();
      autoCalcSetup();

    });

    $('button.row-add').on("click", function(e) {
      e.preventDefault();

      var $table = $(this).parents('table');
      var $top = $table.find('tr.line_items').first();
      var $new = $top.clone(true);

      $new.jAutoCalc('destroy');
      $new.insertBefore($top);
      $new.find('input[type=text]').val('');
      autoCalcSetup();

    });
    $('button.row-addpost-lyt').on("click", function(e) {
      e.preventDefault();

      var $table = $(this).parents('table');
      var $top = $table.find('tr.line_items_post_lyt').first();
      var $new = $top.clone(true);

      $new.jAutoCalc('destroy');
      $new.insertAfter($top);
      $new.find('input[type=text]').val('');
      autoCalcSetup();

    });
    $('button.row-addpost-dgts').on("click", function(e) {
      e.preventDefault();

      var $table = $(this).parents('table');
      var $top = $table.find('tr.line_items_post_dgts').first();
      var $new = $top.clone(true);

      $new.jAutoCalc('destroy');
      $new.insertAfter($top);
      $new.find('input[type=text]').val('');
      autoCalcSetup();

    });

    $('button.row-pdf').on("click", function(e) {
    e.preventDefault();
    const invoice = document.getElementById("pricing");
    var opt = {
        margin : 0.5,
        image: {type: 'jpeg', quality: 0.98},
        html2canvas: {scale:1},
        jsPDF: {unit: 'in', format: 'A4', orientation: 'landscape'}

    };
    html2pdf().set(opt).from(invoice).save("GeoCircle_Invoice.pdf");

    });

    
  });
  //-->