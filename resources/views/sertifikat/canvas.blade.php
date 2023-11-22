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
            var qr_code = new Image();

            image.src = '/image/sertcontoh.svg';
            // qr_code.src = '/qrlib/{{ request()->getHttpHost() }}_sertifikat_{{ $sertifikat_id }}';
            // console.log(qr_code.src);

            qr_code.src = 'https://api.qrserver.com/v1/create-qr-code/?format=jpg&size=150x150&data={{request()->getHttpHost()}}/sertifikat/{{$sertifikat_id}}';
            qr_code.setAttribute('crossorigin', 'anonymous');
            console.log(qr_code.src);
            
    

           
            image.onload = function() {

                canvas.width = image.width * 1.5;
                canvas.height = image.height * 1.5;
                context.drawImage(image, 0, 0, canvas.width, canvas.height);

                // Set the properties for the text
                context.font = '90px Arial';
                context.fillStyle = 'black';
                context.textAlign = 'center';
                context.textBaseline = 'middle';

                // Draw the text at the center of the canvas
                context.fillText('{{ $user->name }}', canvas.width / 2, (canvas.height / 2) - 40);
            };

            qr_code.onload = function() {
                var panjang=1 ;
                var tinggi =1;
                var qr_width = qr_code.width * panjang ;
            var qr_height = qr_code.height * tinggi ;
                // Set the properties for the text
                context.font = '90px Arial';
                context.fillStyle = 'black';
                context.textAlign = 'center';
                context.textBaseline = 'middle';
                var x = (canvas.width / 2) - (qr_width / 2);
                var y = (canvas.height / 2) - (qr_height / 2) + 400;

                context.drawImage(qr_code, x, y, qr_width, qr_height);

                setTimeout(function() {
    var imgData = canvas.toDataURL("image/jpeg", 1.0);
    var pdf = new jsPDF('landscape');

    // Adjust the dimensions of the image when adding it to the PDF
    var pdfWidth = pdf.internal.pageSize.getWidth();
    var pdfHeight = pdf.internal.pageSize.getHeight();
    pdf.addImage(imgData, 'JPEG', 0, 0, pdfWidth, pdfHeight);
    pdf.save("download.pdf");
}, 1000); // 1000 milliseconds = 1 second
            };

          
        };
    </script>

</body>

</html>
