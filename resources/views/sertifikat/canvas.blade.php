<!DOCTYPE html>
<html>
<body>

<canvas id="myCanvas" style="border:1px solid #d3d3d3;">
Your browser does not support the HTML canvas tag.
</canvas>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
<script>
window.onload = function() {
    var canvas = document.getElementById('myCanvas');
    var context = canvas.getContext('2d');
    var image = new Image();

    image.src = '/image/sertcontoh.svg';
  
    image.onload = function() {

        canvas.width = image.width*1.5;
        canvas.height = image.height*1.5;
        context.drawImage(image, 0, 0, canvas.width, canvas.height);

        // Set the properties for the text
        context.font = '90px Arial';
        context.fillStyle = 'black';
        context.textAlign = 'center';
        context.textBaseline = 'middle';

        // Draw the text at the center of the canvas
        context.fillText('Achenk Tsubaru Hariyono bin Satoru', canvas.width / 2,(canvas.height / 2) - 40);
    };

    canvas.onclick = function() {
        var imgData = canvas.toDataURL("image/jpeg", 1.0);
        var pdf = new jsPDF('landscape');


         // Adjust the dimensions of the image when adding it to the PDF
        var pdfWidth = pdf.internal.pageSize.getWidth();
        var pdfHeight = pdf.internal.pageSize.getHeight();
        pdf.addImage(imgData, 'JPEG', 0, 0, pdfWidth, pdfHeight);
        pdf.save("download.pdf");
    };
};
</script>

</body>
</html>
