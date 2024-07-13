<!DOCTYPE html>
<html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    @foreach ($font_urls as $font)
    @if ($font!='-')
        <style id="fontstyle{{ $loop->iteration }}">
            
        @import url('{{ $font }}');
        </style>
        @else
        <style id="fontstyle{{ $loop->iteration }}">
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        </style>
        @endif
    @endforeach
</head>

<body>

    <canvas id="myCanvas" style="border:1px solid #d3d3d3;">
        Your browser does not support the HTML canvas tag.
    </canvas>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script>
        // var img = new Image();

        function toDataURL(url, callback) {
            var xhr = new XMLHttpRequest();
            xhr.onload = function() {
                var reader = new FileReader();
                reader.onloadend = function() {
                    callback(reader.result);
                }
                reader.readAsDataURL(xhr.response);
            };
            xhr.open('GET', url);
            xhr.responseType = 'blob';
            xhr.send();
        }



        window.onload = function() {




            var count = 1;
            var canvas = document.getElementById('myCanvas');
            var context = canvas.getContext('2d');
            var image = new Image();
            var qr_code = new Image();
            image.onload = function() {
                qr_code.onload = function() {
                    // Set canvas size to image size
                    canvas.width = image.width * 3;
                    canvas.height = image.height * 3;

                    // Scale the canvas to fit the screen
                    var scale = Math.min(window.innerWidth / canvas.width, window.innerHeight / canvas.height);
                    canvas.style.width = (canvas.width * scale) + 'px';
                    canvas.style.height = (canvas.height * scale) + 'px';


                    var textElementArray = [];
                    var xElementArray = [];
                    var yElementArray = [];
                    var fontElementArray = [];
                    var colorElementArray = [];
                    var textArray = [];
                    var xArray = [];
                    var yArray = [];
                    var fontArray = [];
                    var colorArray = [];


                    let dataMultple = {!! $sertifikat->lokasigambar->multiple !!};
                    console.log(dataMultple);
                    var inum = 0;
                    Object.keys(dataMultple).forEach((key, index) => {
                        Object.keys(dataMultple[key]).forEach((key1, index1) => {
                            console.log(dataMultple[key]);

                            textArray[key1] = dataMultple['text'][key1];
                            xArray[key1] = canvas.width / 2 + parseFloat(dataMultple['x'][
                                key1
                            ]);
                            yArray[key1] = canvas.height / 2 + parseFloat(dataMultple['y'][
                                key1
                            ]);
                            fontArray[key1] = dataMultple['font'][key1];
                            colorArray[key1] = dataMultple['color'][key1];
                        });
                    });

                    count = Object.keys(dataMultple).length;
                    console.log(textArray, xArray, yArray, fontArray);

                    var text = '{{ $user->name }}';
                    var xText = {{ $sertifikat->lokasigambar->x }};
                    var yText = {{ $sertifikat->lokasigambar->y }};
                    var font = '{{ $sertifikat->lokasigambar->font }}';
                    var color = '{{ $sertifikat->lokasigambar->color }}';
                    var colorSebagai = '{{ $sertifikat->lokasigambar->colorSebagai }}';
                    var xSebagai = {{ $sertifikat->lokasigambar->xSebagai }};
                    var ySebagai = {{ $sertifikat->lokasigambar->ySebagai }};
                    var fontSebagai = '{{ $sertifikat->lokasigambar->fontSebagai }}';
                    var ukuranQR = {{ $sertifikat->lokasigambar->ukuranQR }};
                    var xQR = {{ $sertifikat->lokasigambar->xQR }};
                    var yQR = {{ $sertifikat->lokasigambar->yQR }};
                    var fontUrl = '{{ $sertifikat->lokasigambar->fontUrl }}';




                    var newFontElement = document.createElement("style");
                    document.head.appendChild(newFontElement);

                    function renderCanvas() {


                        var fontUrlArray = [];


                        // console.log(fontUrlArray);

                        // Create a new <style> element
                        var newFontElement = document.createElement('style');

                        // Iterate over each font URL in the array
                        fontUrlArray.forEach(function(fontUrldata) {
                            // Append a CSS import statement for each font URL to the newFontElement
                            newFontElement.innerHTML += `@import url('${fontUrldata}');`;
                            // console.log(newFontElement.innerHTML);
                        });
                        // Remove the previous font elements
                        var existingFontElements = document.querySelectorAll('style[id^="font-"]');
                        existingFontElements.forEach(function(element) {
                            element.remove();
                        });

                        // Append the new updated font element
                        newFontElement.id = 'font-' + Date.now();
                        document.head.appendChild(newFontElement);

                        // Clear the canvas before drawing the new qr_code
                        context.clearRect(0, 0, canvas.width, canvas.height);

                        context.drawImage(image, 0, 0, canvas.width, canvas.height);

                        context.font = font;
                        context.fillStyle = color;
                        context.textAlign = 'center';
                        context.textBaseline = 'middle';
                        text = text;

                        context.fillText(text, canvas.width / 2 + parseFloat(xText), canvas.height / 2 +
                            parseFloat(yText));
                        context.fillStyle = colorSebagai;
                        context.font =
                            fontSebagai; // replace 'desiredFontSize' with the font size you want
                        context.fillText("{{ $sebagai }}", canvas.width / 2 + parseFloat(xSebagai), canvas.height / 2 +
                            parseFloat(ySebagai));

                        for (let index = 1; index <= count; index++) {
                            context.font = fontArray[index];
                            context.fillStyle = colorArray[index];

                            context.fillText(textArray[index], xArray[index], yArray[index]);
                            // console.log(textArray + " " + xArray + " " + yArray);
                        }


                        context.drawImage(qr_code, xQR, yQR, qr_code.width * parseFloat(
                                ukuranQR),
                            qr_code.height * parseFloat(ukuranQR));

                    }



                    console.log('{{ $sertifikat->lokasigambar->font }}');
                    document.fonts.check('{{ $sertifikat->lokasigambar->font }}'); // false


                    renderCanvas();


                    document.fonts.ready.then(function() {
                        renderCanvas();

                    });

                    document.fonts.onloadingdone = function(fontFaceSetEvent) {
                        // alert('onloadingdone we have ' + fontFaceSetEvent.fontfaces.length +
                        //     ' font faces loaded');
                        // alert('Loaded fonts:' + fontFaceSetEvent.fontfaces.map(function(fontFace) {
                        //     return fontFace.family
                        // }).join(', '));
                        renderCanvas();
                        // setTimeout(function() {
                        //     var imgData = canvas.toDataURL("image/png");
                        //     var link = document.createElement('a');
                        //     link.href = imgData;
                        //     link.download = 'download.png';
                        //     link.click();
                        // }, 1000); // 1000 milliseconds = 1 second

                    };

                    setTimeout(function() {
                            var imgData = canvas.toDataURL("image/png");
                            var link = document.createElement('a');
                            link.href = imgData;
                            link.download = '{{ $sertifikat->name}}-{{$user->name}}.png';
                            link.click();
                        }, 1000); // 1000 milliseconds = 1 second


                };
            };

            // Mengubah cara mendapatkan dataUrl gambar sertifikat
            toDataURL('/storage/{{ $sertifikat->gambar }}', function(dataUrl) {
                image.src = dataUrl;
                // console.log("image.src = " + image.src);
            })

            // Mengubah cara mendapatkan dataUrl QR code
            toDataURL('https://api.qrserver.com/v1/create-qr-code/?format=svg&size=150x150&data=' +
                '{{ request()->getHttpHost() }}/sertifikat/{{ $sertifikat->id }}',
                function(dataUrl1) {
                    qr_code.src = dataUrl1;
                })




        }

        // qr_code.onload = function() {


        //     var newLinkElement = document.createElement("link");

        //     newLinkElement.rel = "stylesheet";
        //     // newLinkElement.href = "https://fonts.googleapis.com/css2?family=Poppins&display=swap";

        //     document.head.appendChild(newLinkElement);

        //     var x=2 ;
        //     var lebar =2;
        //     var qr_width = qr_code.width * x ;
        //     var qr_height = qr_code.height * lebar ;

        //     var locX =200;
        //     var locY =100;

        //     // Set the properties for the text
        //     context.font = '150px Poppins';
        //     context.fillStyle = 'black';
        //     context.textAlign = 'center';
        //     context.textBaseline = 'middle';
        //     var x = (canvas.width / 2) - (qr_width / 2) + locX ;
        //     var y = (canvas.height / 2) - (qr_height / 2) + locY;

        //     context.drawImage(qr_code, x, y, qr_width, qr_height);


        // };
    </script>

</body>

</html>
