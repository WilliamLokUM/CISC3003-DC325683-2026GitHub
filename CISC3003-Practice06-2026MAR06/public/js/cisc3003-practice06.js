/* add loop and other code here ... in this simple exercise we are not
   going to concern ourselves with minimizing globals, etc */

   var subtotal = 0;

   for (var i = 0; i < filenames.length; i++) {

       var total = calculateTotal(quantities[i], prices[i]);

       subtotal += total;

       outputCartRow(filenames[i], titles[i], quantities[i], prices[i], total);
   }

   var tax = calculateTax(subtotal, 0.10);

   var shipping = calculateShipping(subtotal, 1000);

   var grandTotal = calculateGrandTotal(subtotal, tax, shipping);

   document.write("<tr class='totals'>");
   document.write("<td colspan='4'>Subtotal</td>");
   document.write("<td>" + outputCurrency(subtotal) + "</td>");
   document.write("</tr>");

   document.write("<tr class='totals'>");
   document.write("<td colspan='4'>Tax</td>");
   document.write("<td>" + outputCurrency(tax) + "</td>");
   document.write("</tr>");

   document.write("<tr class='totals'>");
   document.write("<td colspan='4'>Shipping</td>");
   document.write("<td>" + outputCurrency(shipping) + "</td>");
   document.write("</tr>");

   document.write("<tr class='totals focus'>");
   document.write("<td colspan='4'>Grand Total</td>");
   document.write("<td>" + outputCurrency(grandTotal) + "</td>");
   document.write("</tr>");