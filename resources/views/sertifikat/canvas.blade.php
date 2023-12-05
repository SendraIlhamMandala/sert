<!DOCTYPE html>
<html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

</head>

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

            image.src = '/image/sertifikat3.svg';
            // qr_code.src = '/qrlib/{{ request()->getHttpHost() }}_sertifikat_{{ $sertifikat_id }}';
            // console.log(qr_code.src);

            qr_code.src = 'https://api.qrserver.com/v1/create-qr-code/?format=jpg&size=150x150&data={{request()->getHttpHost()}}/sertifikat/{{$sertifikat_id}}';
            qr_code.setAttribute('crossorigin', 'anonymous');
            console.log(qr_code.src);
            
    

           
            image.onload = function() {

                var newLinkElement = document.createElement("link");

                newLinkElement.rel = "stylesheet";
                // newLinkElement.href = "https://fonts.googleapis.com/css2?family=Poppins&display=swap";

                document.head.appendChild(newLinkElement);
                var panjang = 1 ;
                var tinggi = -300 ;
                var tinggiSebagai = 200;
                var panjangSebagai = 1 ;

                canvas.width = image.width * 1.5;
                canvas.height = image.height * 1.5;
                context.drawImage(image, 0, 0, canvas.width, canvas.height);

                // Set the properties for the text
                context.font = '150px Poppins';
                context.fillStyle = 'black';
                context.textAlign = 'center';
                context.textBaseline = 'middle';

                // Draw the text at the center of the canvas
                context.fillText('{{ $user->name }}', canvas.width / 2 + panjang, (canvas.height / 2) + tinggi);
                context.fillText('{{ $sebagai }}', canvas.width / 2 + panjang, (canvas.height / 2) + tinggiSebagai);
            };

            qr_code.onload = function() {

                
                var newLinkElement = document.createElement("link");

                newLinkElement.rel = "stylesheet";
                // newLinkElement.href = "https://fonts.googleapis.com/css2?family=Poppins&display=swap";

                document.head.appendChild(newLinkElement);

                var panjang=2 ;
                var lebar =2;
                var qr_width = qr_code.width * panjang ;
                var qr_height = qr_code.height * lebar ;

                var locX =200;
                var locY =100;

                // Set the properties for the text
                context.font = '150px Poppins';
                context.fillStyle = 'black';
                context.textAlign = 'center';
                context.textBaseline = 'middle';
                var x = (canvas.width / 2) - (qr_width / 2) + locX ;
                var y = (canvas.height / 2) - (qr_height / 2) + locY;

                context.drawImage(qr_code, x, y, qr_width, qr_height);

                setTimeout(function() {
    var imgData = canvas.toDataURL("image/png");
var link = document.createElement('a');
link.href = imgData;
link.download = 'download.png';
link.click();
}, 1000); // 1000 milliseconds = 1 second
            };

          
        };
    </script>

</body>

</html>
