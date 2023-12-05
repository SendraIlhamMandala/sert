<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="bg-white rounded overflow-hidden shadow-lg p-6 mx-4 my-4">
                        <div class="font-bold text-xl mb-2">{{ $sertifikat->name }}</div>
                        <p class="text-gray-700 text-base">{{ $sertifikat->keterangan }}</p>
                        <p class="text-gray-700 text-base">{{ $sertifikat->tanggal }}</p>
                        <p class="text-gray-700 text-base">{{ $sertifikat->gambar }}</p>
                    </div>



                    <a href="{{ route('sertifikat.addusers', $sertifikat->id) }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Add Users
                    </a>


                    <div class="table-responsive">



                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Sertifikat ID') }}</th>
                                    <th>{{ __('Sertifikat Name') }}</th>
                                    <th>{{ __('QR Code') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $sertifikat->id }}</td>
                                    <td>{{ $sertifikat->name }}</td>
                                    <td> <img
                                            src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ request()->getHttpHost() }}/sertifikat/{{ $sertifikat->id }}"
                                            alt=""></td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('User ID') }}</th>
                                    <th>{{ __('User Name') }}</th>
                                    <th>{{ __('User sebagai') }}</th>
                                    <th>{{ __('Download Sertifikat') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sertifikat->users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ DB::table('user_sertifikats')->where('user_id', $user->id)->where('sertifikat_id', $sertifikat->id)->get()->first()->sebagai }}
                                        </td>
                                        <td><a href="{{ route('sertifikat.download', $user->id . '-' . $sertifikat->id) }}"
                                                target="_blank">Download</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <canvas id="myCanvas" style="border:1px solid #d3d3d3;">
            Your browser does not support the HTML canvas tag.
        </canvas>
<form id="form" action="{{ route('sertifikat.update', $sertifikat) }}" method="POST">
    @csrf
    @method('PUT')

<div class="mt-4">
    <label for="text" class="block text-sm font-medium text-gray-700">Text:</label>
    <input type="text" id="text" name="text" value="{{$sertifikat->lokasigambar->text}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="mt-4">
    <label for="x" class="block text-sm font-medium text-gray-700">Text X Position:</label>
    <input type="number" id="x" name="x" value="{{$sertifikat->lokasigambar->x}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="mt-4">
    <label for="y" class="block text-sm font-medium text-gray-700">Text Y Position:</label>
    <input type="number" id="y" name="y" value="{{$sertifikat->lokasigambar->y}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>

<div class="mt-4">
    <label for="font" class="block text-sm font-medium text-gray-700">Text Font:</label>
    <input type="text" id="font" name="font" value="{{$sertifikat->lokasigambar->font}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>


<div class="mt-4">
    <label for="color" class="block text-sm font-medium text-gray-700">Color:</label>
    <input type="color" id="color" name="color" value="{{$sertifikat->lokasigambar->color}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>

<div class="mt-4">
    <label for="xSebagai" class="block text-sm font-medium text-gray-700">Text X Sebagai Position:</label>
    <input type="number" id="xSebagai" name="xSebagai" value="{{$sertifikat->lokasigambar->xSebagai}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="mt-4">
    <label for="ySebagai" class="block text-sm font-medium text-gray-700">Text Y Sebagai Position:</label>
    <input type="number" id="ySebagai" name="ySebagai" value="{{$sertifikat->lokasigambar->ySebagai}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>

<div class="mt-4">
    <label for="xQR" class="block text-sm font-medium text-gray-700">X QR Position:</label>
    <input type="number" step="0.000001" id="xQR" name="xQR" value="{{$sertifikat->lokasigambar->xQR}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>
<div class="mt-4">
    <label for="yQR" class="block text-sm font-medium text-gray-700">Y QR Position:</label>
    <input type="number" step="0.000001" id="yQR" name="yQR" value="{{$sertifikat->lokasigambar->yQR}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>

<div class="mt-4">
    <label for="fontSebagai" class="block text-sm font-medium text-gray-700">Text Sebagai Font:</label>
    <input type="text" id="fontSebagai" name="fontSebagai" value="{{$sertifikat->lokasigambar->fontSebagai}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>

<div class="mt-4">
    <label for="colorSebagai" class="block text-sm font-medium text-gray-700">Color Sebagai:</label>
    <input type="color" id="colorSebagai" name="colorSebagai" value="{{$sertifikat->lokasigambar->colorSebagai}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>

<div class="mt-4">
    <label for="ukuranQR" class="block text-sm font-medium text-gray-700">Ukuran QR:</label>
    <input type="number" id="ukuranQR" name="ukuranQR" value="{{$sertifikat->lokasigambar->ukuranQR}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>

<div class="mt-4">
    <label for="fontUrl" class="block text-sm font-medium text-gray-700">Font URL :</label>
    <input type="text" id="fontUrl" name="fontUrl" value="{{$sertifikat->lokasigambar->fontUrl}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
</div>

            <button id="saveButton" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save</button>

        </form>

        <button id="downloadButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Download
        </button>

        <button id="addInputButton">Add Inputs</button>

        <div id="mydiv">
        </div>

        <script type="text/javascript"></script>
        <script></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
        <script type="text/javascript">
            var img = new Image();

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
                    // Set canvas size to image size
                    canvas.width = image.width * 3;
                    canvas.height = image.height * 3;

                    // Scale the canvas to fit the screen
                    var scale = Math.min(window.innerWidth / canvas.width, window.innerHeight / canvas.height);
                    canvas.style.width = (canvas.width * scale) + 'px';
                    canvas.style.height = (canvas.height * scale) + 'px';

                    context.drawImage(image, 0, 0, canvas.width, canvas.height);
                    // qr_code.onload = function() {

                    //     context.drawImage(qr_code, 0, 0, qr_code.width, qr_code.height);
                    //     var text = document.getElementById('text').value;
                    //     var x = document.getElementById('x').value;
                    //     var y = document.getElementById('y').value;
                    //     var font = document.getElementById('font').value;
                    //     var color = document.getElementById('color').value;
                    //     var colorSebagai = document.getElementById('colorSebagai').value;
                    //     var fontSebagai = document.getElementById('fontSebagai');
                    //     var ukuranQR = document.getElementById('ukuranQR');

                    //     context.font = font;
                    //     context.textAlign = 'center';
                    //     context.textBaseline = 'middle';
                    //     context.fillText(text, (canvas.width / 2) + x, (canvas.height / 2) + y);
                    // };

         
          


                    var formElement = document.getElementById('form');
                    var textElement = document.getElementById('text');
                    var xElement = document.getElementById('x');
                    var yElement = document.getElementById('y');
                    var fontElement = document.getElementById('font');
                    var colorElement = document.getElementById('color');
                    var colorSebagaiElement = document.getElementById('colorSebagai');
                    var xElementSebagai = document.getElementById('xSebagai');
                    var yElementSebagai = document.getElementById('ySebagai');
                    var xElementQR = document.getElementById('xQR');
                    var yElementQR = document.getElementById('yQR');
                    var fontSebagaiElement = document.getElementById('fontSebagai');
                    var ukuranQRElement = document.getElementById('ukuranQR');
                    var fontUrlElement = document.getElementById('fontUrl');


                    var textElementArray = [];
                    var xElementArray = [];
                    var yElementArray = [];
                    var fontElementArray = [];
                    var textArray = [];
                    var xArray = [];
                    var yArray = [];
                    var fontArray = [];


                        let dataMultple = {!!$sertifikat->lokasigambar->multiple!!};                        
                        console.log(dataMultple );
                        var inum = 0;
                        Object.keys(dataMultple).forEach((key, index) => {
                            Object.keys(dataMultple[key]).forEach((key1,index1) => {
                                console.log(dataMultple[key]);

                                 textArray[key1] = dataMultple['text'][key1] ;
                                 xArray[key1]  = canvas.width / 2 + parseFloat(dataMultple['x'][key1]) ;
                                 yArray[key1] = canvas.height / 2 + parseFloat(dataMultple['y'][key1]) ;
                                 fontArray[key1] = dataMultple['font'][key1] ;
                            });
                        });

                        count = Object.keys(dataMultple).length;
                        console.log(textArray, xArray, yArray, fontArray);

                    var text = textElement.value;
                    var xText = xElement.value;
                    var yText = yElement.value;
                    var font = fontElement.value;
                    var color = colorElement.value;
                    var colorSebagai = colorSebagaiElement.value;
                    var xSebagai = xElementSebagai.value;
                    var ySebagai = yElementSebagai.value;
                    var fontSebagai = fontSebagaiElement.value;
                    var ukuranQR = ukuranQRElement.value;
                    var xQR = xElementQR.value;
                    var yQR = yElementQR.value;

                    var fontUrl = fontUrlElement.value;



                    var newFontElement = document.createElement("style");
                    document.head.appendChild(newFontElement);

                    function renderCanvas() {
                        
                    
                        var fontUrlArray = [];

                        // Check if the fontUrl contains multiple URLs separated by ';'
                        if (fontUrl.includes(';')) {
                            // Split the fontUrl into an array of URLs
                            fontUrlArray = fontUrl.split(';');
                        } else {
                            // If there is only one URL, add it to the array
                            fontUrlArray.push(fontUrl);
                        }

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
                        text = text.toLowerCase().split(' ').map(function(word) {
                            return word.charAt(0).toUpperCase() + word.slice(1);
                        }).join(' ');

                        context.fillText(text, canvas.width / 2 + parseFloat(xText) , canvas.height / 2 + parseFloat(yText));
                        context.fillStyle = colorSebagai;
                        context.font =
                            fontSebagai; // replace 'desiredFontSize' with the font size you want
                        context.fillText("sebagai", canvas.width / 2 + parseFloat(xSebagai), canvas.height / 2 + parseFloat(ySebagai));

                        for (let index = 1; index <= count; index++) {
                            context.font = fontArray[index];
                            context.fillText(textArray[index], canvas.width / 2 + xArray[index] ,  canvas.height / 2 + yArray[index]);
                            // console.log(textArray + " " + xArray + " " + yArray);
                        }

                        context.drawImage(qr_code, xQR, yQR, qr_code.width * parseFloat(
                                ukuranQR),
                            qr_code.height * parseFloat(ukuranQR));

                    }
                    renderCanvas();

                    formElement.addEventListener('input', function(event) {
                        var target = event.target;
                        if (target.id === 'text') {
                            text = target.value;
                        } else if (target.id === 'x') {
                            xText = canvas.width / 2 + parseFloat(target.value);
                            // console.log("x val = " + target.value + " xText = " + xText);
                        } else if (target.id === 'y') {
                            yText = canvas.height / 2 + parseFloat(target.value);
                            // console.log("y val = " + target.value);
                        } else if (target.id === 'xSebagai') {
                            xSebagai = canvas.width / 2 + parseFloat(target.value);
                        } else if (target.id === 'ySebagai') {
                            ySebagai = canvas.height / 2 + parseFloat(target.value);
                        }else if (target.id === 'xQR') {
                            xQR = target.value;
                        } else if (target.id === 'yQR') {
                            yQR = target.value;
                        }else if (target.id === 'font') {
                            font = target.value;
                        } else if (target.id === 'color') {
                            color = target.value;
                        }else if (target.id === 'colorSebagai') {
                            colorSebagai = target.value;
                        }  else if (target.id === 'fontSebagai') {
                            fontSebagai = target.value;
                        } else if (target.id === 'ukuranQR') {
                            ukuranQR = target.value;
                        } else if (target.id === 'fontUrl') {
                            fontUrl = target.value;
                        }
                        for (let index = 1; index <= count; index++) {

                            if (target.id === 'text'.concat(index)) {
                                textArray[index] = target.value;
                            } else if (target.id === 'x'.concat(index)) {
                                xArray[index] = canvas.width / 2 + parseFloat(target.value);
                            } else if (target.id === 'y'.concat(index)) {
                                yArray[index] = canvas.height / 2 + parseFloat(target.value);
                            } else if (target.id === 'font'.concat(index)) {
                                fontArray[index] = target.value;
                            }

                        }
                    });
                    // console.log("x old : " + xText + " y old : " + yText);

                    xText = canvas.width / 2 + parseFloat(xText);
                    yText = canvas.height / 2 + parseFloat(yText);

                    xSebagai = canvas.width / 2 + parseFloat(xSebagai);
                    ySebagai = canvas.height / 2 + parseFloat(ySebagai);
                    // console.log("x new : " + xText + " y new : " + yText);
                    var form1 = document.getElementById('form');



                    form1.addEventListener('input', function(event) {

                        var fontUrlArray = [];

                        // Check if the fontUrl contains multiple URLs separated by ';'
                        if (fontUrl.includes(';')) {
                            // Split the fontUrl into an array of URLs
                            fontUrlArray = fontUrl.split(';');
                        } else {
                            // If there is only one URL, add it to the array
                            fontUrlArray.push(fontUrl);
                        }

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
                        text = text.toLowerCase().split(' ').map(function(word) {
                            return word.charAt(0).toUpperCase() + word.slice(1);
                        }).join(' ');

                        context.fillText(text, xText, yText);
                        context.fillStyle = colorSebagai;
                        context.font =
                            fontSebagai; // replace 'desiredFontSize' with the font size you want
                        context.fillText("sebagai", xSebagai, ySebagai);

                        for (let index = 1; index <= count; index++) {
                            context.font = fontArray[index];
                            context.fillText(textArray[index], xArray[index], yArray[index]);
                            // console.log(textArray + " " + xArray + " " + yArray);
                        }

                        context.drawImage(qr_code, xQR, yQR, qr_code.width * parseFloat(
                                ukuranQR),
                            qr_code.height * parseFloat(ukuranQR));
                    });

                    canvas.addEventListener('click', function(event) {
                        var rect = canvas.getBoundingClientRect();
                        var x = (event.clientX - rect.left) / scale;
                        var y = (event.clientY - rect.top) / scale;
                        // Set the position of qr_code to the x, y point
                        xQR = x;
                        yQR = y;
                        xElementQR.value = x.toFixed(6);
                        yElementQR.value = y.toFixed(6);
                        // Clear the canvas before drawing the new qr_code
                        context.clearRect(0, 0, canvas.width, canvas.height);

                        context.drawImage(image, 0, 0, canvas.width, canvas.height);

                        context.font = font;
                        context.fillStyle = color;
                        context.textAlign = 'center';
                        context.textBaseline = 'middle';
                        text = text.toLowerCase().split(' ').map(function(word) {
                            return word.charAt(0).toUpperCase() + word.slice(1);
                        }).join(' ');

                        context.fillText(text, xText, yText);

                        context.font =
                            fontSebagai; // replace 'desiredFontSize' with the font size you want
                        context.fillStyle = colorSebagai;
                        context.fillText("sebagai", xSebagai, ySebagai);
                        for (let index = 1; index <= count; index++) {
                            context.font = fontArray[index];
                            context.fillText(textArray[index], xArray[index], yArray[index]);
                            // console.log(textArray + " " + xArray + " " + yArray);
                        }

                        context.drawImage(qr_code, xQR, yQR, qr_code.width * parseFloat(
                                ukuranQR),
                            qr_code.height * parseFloat(ukuranQR));
                    });

                    var i = 0;
                    document.getElementById('addInputButton').addEventListener('click', function() {
                        var existingDiv = document.getElementById('array');
                        if (existingDiv) {
                            var div = existingDiv;
                        } else {
                            var div = document.createElement('div');
                            div.id = "array";
                            // Append mainDiv to wherever you want to add it
                        }
                        i = i + 1;

                        var divnew = document.createElement('div');

                        var xInput = document.createElement('input');
                        xInput.type = "number";
                        xInput.id = "x".concat(i);
                        xInput.name = "multiple[x]"+"[".concat(i)+"]";
                        xInput.value = "0";
                        xInput.className = "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md";
                        var xLabel = document.createElement('label');
                        xLabel.htmlFor = "x".concat(i);
                        xLabel.innerHTML = "Text X Position:";
                        xLabel.className = "block text-sm font-medium text-gray-700";
                        divnew.appendChild(xLabel);
                        divnew.appendChild(xInput);

                        var divnew2 = document.createElement('div');


                        var yInput = document.createElement('input');
                        yInput.type = "number";
                        yInput.id = "y".concat(i);
                        yInput.name = "multiple[y]"+"[".concat(i)+"]";
                        yInput.value = "0";
                        yInput.className = "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md";
                        var yLabel = document.createElement('label');
                        yLabel.htmlFor = "y".concat(i);
                        yLabel.innerHTML = "Text Y Position:";
                        yLabel.className = "block text-sm font-medium text-gray-700";
                        divnew2.appendChild(yLabel);
                        divnew2.appendChild(yInput);

                        var divnew3 = document.createElement('div');


                        var textInput = document.createElement('input');
                        textInput.type = "text";
                        textInput.id = "text".concat(i);
                        textInput.name = "multiple[text]"+"[".concat(i)+"]";
                        textInput.value = "new text".concat(i);
                        textInput.className = "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md";
                        var textLabel = document.createElement('label');
                        textLabel.htmlFor = "text".concat(i);
                        textLabel.innerHTML = "Text:";
                        textLabel.className = "block text-sm font-medium text-gray-700";
                        divnew3.appendChild(textLabel);
                        divnew3.appendChild(textInput);

                        var divnew4 = document.createElement('div');

                        var fontInput = document.createElement('input');
                        fontInput.type = "text";
                        fontInput.id = "font".concat(i);
                        fontInput.name = "multiple[font]"+"[".concat(i)+"]";
                        fontInput.value = "100px Arial";
                        fontInput.className = "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md";
                        var fontLabel = document.createElement('label');
                        fontLabel.htmlFor = "font".concat(i);
                        fontLabel.innerHTML = "font:";
                        fontLabel.className = "block text-sm font-medium text-gray-700";
                        divnew4.appendChild(fontLabel);
                        divnew4.appendChild(fontInput);


                        // Inserting the inputs into the form with id 'form'
                        var form = document.getElementById('form');
                        div.appendChild(divnew);
                        div.appendChild(divnew2);
                        div.appendChild(divnew3);
                        div.appendChild(divnew4);
                        form.appendChild(div);
                        // Get the button with id "saveButton"
                        const saveButton = document.getElementById("saveButton");

                        // Remove the button from its parent node
                        saveButton.parentNode.removeChild(saveButton);

                        // Add the button back to its parent node
                        form.appendChild(saveButton);
                                                

                        var xElementArray = document.getElementById('array');
                        var inputElements = xElementArray.querySelectorAll('input');

                        count = inputElements.length / 4;

                        for (let index = 1; index <= count; index++) {


                            textElementArray[index] = document.getElementById('text'.concat(index));
                            xElementArray[index] = document.getElementById('x'.concat(index));
                            yElementArray[index] = document.getElementById('y'.concat(index));
                            fontElementArray[index] = document.getElementById('font'.concat(index));

                            // console.log(index, count, textElementArray[index]);


                            textArray[index] = textElementArray[index].value;
                            xArray[index] = xElementArray[index].value;
                            yArray[index] = yElementArray[index].value;
                            fontArray[index] = fontElementArray[index].value;

                        }

                    });


                };

                // Mengubah cara mendapatkan dataUrl gambar sertifikat
                toDataURL('/storage/{{$sertifikat->gambar}}', function(dataUrl) {
                    image.src = dataUrl;
                    // console.log("image.src = " + image.src);
                })

                // Mengubah cara mendapatkan dataUrl QR code
                toDataURL('https://api.qrserver.com/v1/create-qr-code/?format=svg&size=150x150&data=' +
                    '{{ request()->getHttpHost() }}/sertifikat/{{ $sertifikat->id }}',
                    function(dataUrl1) {
                        qr_code.src = dataUrl1;
                    })
                // Attach an event listener to the download button
                document.getElementById('downloadButton').addEventListener('click', function() {
                    // Log a message to the console
                    // console.log(1231212312);

                    // Membuat canvas baru
                    var newCanvas = document.createElement('canvas');
                    newCanvas.width = canvas.width * 1;
                    newCanvas.height = canvas.height * 1;

                    var context = newCanvas.getContext('2d');
                    context.scale(1, 1);
                    context.drawImage(canvas, 0, 0);

                    // Membuat elemen gambar baru
                    var img = document.createElement('img');
                    img.src = newCanvas.toDataURL('image/png', 1.0);

                    // Membuat elemen tautan baru
                    var link = document.createElement('a');
                    link.href = img.src;
                    link.download = 'download.png';
                    link.click();

                });




            }
        </script>

</x-app-layout>
