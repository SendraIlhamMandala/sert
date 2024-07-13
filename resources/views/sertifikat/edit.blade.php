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



                    <div class="grid grid-cols-1 sm:grid-cols-2 grid-rows-1 gap-4">
                        <div>
                            <form method="POST" action="{{ route('sertifikat.updatedata', $sertifikat->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div id="A" class="bg-white rounded overflow-hidden shadow-lg p-6 mx-4 my-4">
                                    <div class="mb-4">
                                        <label for="name"
                                            class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                                        <input type="text" name="name" id="name"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            value="{{ $sertifikat->name }}" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="keterangan"
                                            class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                                        <textarea name="keterangan" id="keterangan" rows="3"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $sertifikat->keterangan }}</textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label for="tanggal"
                                            class="block text-gray-700 text-sm font-bold mb-2">Date:</label>
                                        <input type="date" name="tanggal" id="tanggal"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            value="{{ $sertifikat->tanggal }}">
                                    </div>

                                    <div class="mb-4">
                                        <label for="nomor_sertifikat"
                                            class="block text-gray-700 text-sm font-bold mb-2">Nomor
                                            sertifikat:</label>
                                        <input type="text" name="nomor_sertifikat" id="nomor_sertifikat"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            value="{{ $sertifikat->nomor_sertifikat }}" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="gambar"
                                            class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                                        <input type="file" name="gambar" id="gambar"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        <p class="text-gray-600 text-xs">Current image: {{ $sertifikat->gambar }}</p>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <button type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div>
                            <a href="{{ route('sertifikat.addusers', $sertifikat->id) }}"
                                class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Add Users
                            </a>
                            <div class="table-responsive">

                                <div
                                    class="w-full p-4 mb-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">

                                    <div id="C" class="grid grid-cols-2 grid-rows-1 gap-4">
                                        <div>

                                            <h5 class="mb-2 text-base font-bold text-gray-900 dark:text-white">
                                                {{ $sertifikat->name }}</h5>
                                            <p class="mb-5 text-base text-gray-500 sm:text-sm dark:text-gray-400">
                                                {{ $sertifikat->keterangan }}</p>
                                            <p class="mb-5 text-sm text-gray-500 sm:text-sm dark:text-gray-400">
                                                {{ $sertifikat->tanggal }}</p>

                                        </div>
                                        <div class="flex justify-center items-center">
                                            <img class="rounded-lg" height="100" width="100"
                                                src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ request()->getHttpHost() }}/sertifikat/{{ $sertifikat->id }}"
                                                alt="">
                                        </div>
                                    </div>




                                    <div id="B" class="relative overflow-x-auto" style=" overflow-y: auto;">
                                        <table
                                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <thead
                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        No.
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        User Name
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Sebagai
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($sertifikat->users as $user)
                                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ $loop->iteration }}
                                                        </th>
                                                        <td
                                                            class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ $user->name }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ DB::table('user_sertifikats')->where('user_id', $user->id)->where('sertifikat_id', $sertifikat->id)->get()->first()->sebagai }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <a href="{{ route('sertifikat.removeuser', [$sertifikat->id.'-'.$user->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Hapus</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>




                    </div>
                </div>
            </div>

            <div class="flex justify-center items-center">
                <canvas id="myCanvas" style="border:1px solid #d3d3d3;">
                    Your browser does not support the HTML canvas tag.
                </canvas>
            </div>
            <form id="form" action="{{ route('sertifikat.update', $sertifikat) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mt-4">
                    <label for="text" class="block text-sm font-medium text-gray-700">Text:</label>
                    <input type="text" id="text" name="text"
                        value="{{ $sertifikat->lokasigambar->text }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mt-4">
                    <label for="x" class="block text-sm font-medium text-gray-700">Text X Position:</label>
                    <input type="number" id="x" name="x" value="{{ $sertifikat->lokasigambar->x }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mt-4">
                    <label for="y" class="block text-sm font-medium text-gray-700">Text Y Position:</label>
                    <input type="number" id="y" name="y" value="{{ $sertifikat->lokasigambar->y }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="mt-4">
                    <label for="font" class="block text-sm font-medium text-gray-700">Text Font:</label>
                    <input type="text" id="font" name="font"
                        value="{{ $sertifikat->lokasigambar->font }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>


                <div class="mt-4">
                    <label for="color" class="block text-sm font-medium text-gray-700">Color:</label>
                    <input type="color" id="color" name="color"
                        value="{{ $sertifikat->lokasigambar->color }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="mt-4">
                    <label for="xSebagai" class="block text-sm font-medium text-gray-700">Text X Sebagai
                        Position:</label>
                    <input type="number" id="xSebagai" name="xSebagai"
                        value="{{ $sertifikat->lokasigambar->xSebagai }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mt-4">
                    <label for="ySebagai" class="block text-sm font-medium text-gray-700">Text Y Sebagai
                        Position:</label>
                    <input type="number" id="ySebagai" name="ySebagai"
                        value="{{ $sertifikat->lokasigambar->ySebagai }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="mt-4">
                    <label for="xQR" class="block text-sm font-medium text-gray-700">X QR Position:</label>
                    <input type="number" step="0.000001" id="xQR" name="xQR"
                        value="{{ $sertifikat->lokasigambar->xQR }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mt-4">
                    <label for="yQR" class="block text-sm font-medium text-gray-700">Y QR Position:</label>
                    <input type="number" step="0.000001" id="yQR" name="yQR"
                        value="{{ $sertifikat->lokasigambar->yQR }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="mt-4">
                    <label for="fontSebagai" class="block text-sm font-medium text-gray-700">Text Sebagai
                        Font:</label>
                    <input type="text" id="fontSebagai" name="fontSebagai"
                        value="{{ $sertifikat->lokasigambar->fontSebagai }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="mt-4">
                    <label for="colorSebagai" class="block text-sm font-medium text-gray-700">Color Sebagai:</label>
                    <input type="color" id="colorSebagai" name="colorSebagai"
                        value="{{ $sertifikat->lokasigambar->colorSebagai }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="mt-4">
                    <label for="ukuranQR" class="block text-sm font-medium text-gray-700">Ukuran QR:</label>
                    <input type="number" id="ukuranQR" name="ukuranQR"
                        value="{{ $sertifikat->lokasigambar->ukuranQR }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="mt-4">
                    <label for="fontUrl" class="block text-sm font-medium text-gray-700">Font URL :</label>
                    <input type="text" id="fontUrl" name="fontUrl"
                        value="{{ $sertifikat->lokasigambar->fontUrl }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <button id="saveButton" type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save</button>

            </form>
            <button id="addInputButton"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add
                Inputs</button>
            <button id="remove"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Remove
                Inputs</button>

            <div id="mydiv">
            </div>

            <script type="text/javascript"></script>
            <script></script>


            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
            <script type="text/javascript">
                var img = new Image();
                var i = 0;

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
                            var scale = Math.min(window.innerWidth / canvas.width / 1.5, window.innerHeight / canvas
                                .height / 1.5 );
                            canvas.style.width = (canvas.width * scale) + 'px';
                            canvas.style.height = (canvas.height * scale) + 'px';

                            context.drawImage(image, 0, 0, canvas.width, canvas.height);


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

                            count = dataMultple ? Object.keys(dataMultple).length : 0;
                            countX = dataMultple['x'] ? Object.keys(dataMultple['x']).length : 0;
                            // console.log(textArray, xArray, yArray, fontArray);
                            for (let index = 1; index <= countX; index++) {
                                console.log(textArray[index], xArray[index], yArray[index], fontArray[index],
                                    colorArray[index]);
                                createInput(xArray[index] - (canvas.width / 2), yArray[index] - (canvas.height / 2),
                                    textArray[index], fontArray[index], colorArray[index]);
                            }

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

                                context.fillText(text, canvas.width / 2 + parseFloat(xText), canvas.height / 2 +
                                    parseFloat(yText));
                                context.fillStyle = colorSebagai;
                                context.font =
                                    fontSebagai; // replace 'desiredFontSize' with the font size you want
                                context.fillText("sebagai", canvas.width / 2 + parseFloat(xSebagai), canvas.height / 2 +
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
                                } else if (target.id === 'xQR') {
                                    xQR = target.value;
                                } else if (target.id === 'yQR') {
                                    yQR = target.value;
                                } else if (target.id === 'font') {
                                    font = target.value;
                                } else if (target.id === 'color') {
                                    color = target.value;
                                } else if (target.id === 'colorSebagai') {
                                    colorSebagai = target.value;
                                } else if (target.id === 'fontSebagai') {
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
                                    } else if (target.id === 'color'.concat(index)) {
                                        colorArray[index] = target.value;
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
                                    context.fillStyle = colorArray[index];

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
                                    context.fillStyle = colorArray[index];

                                    context.fillText(textArray[index], xArray[index], yArray[index]);
                                    // console.log(textArray + " " + xArray + " " + yArray);
                                }

                                context.drawImage(qr_code, xQR, yQR, qr_code.width * parseFloat(
                                        ukuranQR),
                                    qr_code.height * parseFloat(ukuranQR));
                            });

                            document.getElementById('addInputButton').addEventListener('click', function() {

                                var xDiv = '150';
                                var yDiv = '150';
                                var textDiv = 'text';
                                var fontDiv = '100px Arial';
                                var colorDiv = '#000000';
                                createInput(xDiv, yDiv, textDiv, fontDiv, colorDiv);

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
                    // Attach an event listener to the download button
                    // document.getElementById('downloadButton').addEventListener('click', function() {
                    //     // Log a message to the console
                    //     // console.log(1231212312);

                    //     // Membuat canvas baru
                    //     var newCanvas = document.createElement('canvas');
                    //     newCanvas.width = canvas.width * 1;
                    //     newCanvas.height = canvas.height * 1;

                    //     var context = newCanvas.getContext('2d');
                    //     context.scale(1, 1);
                    //     context.drawImage(canvas, 0, 0);

                    //     // Membuat elemen gambar baru
                    //     var img = document.createElement('img');
                    //     img.src = newCanvas.toDataURL('image/png', 1.0);

                    //     // Membuat elemen tautan baru
                    //     var link = document.createElement('a');
                    //     link.href = img.src;
                    //     link.download = 'download.png';
                    //     link.click();

                    // });


                    var divA = document.getElementById('A');
                    var divB = document.getElementById('B');
                    var divC = document.getElementById('C');
                    var lastHeight = divA.offsetHeight; // Get the initial height

                    divB.style.height = lastHeight - divC.offsetHeight - 100 + 'px';

                    setInterval(function() {
                        var newHeight = divA.offsetHeight; // Get the new height
                        if (lastHeight != newHeight) { // If the height has changed
                            divB.style.height = newHeight - divC.offsetHeight - 100 + 'px'; // Set the height of div B
                            lastHeight = newHeight; // Update the last height
                        }
                    }, 100); // Check every 100ms


                }



                function createInput(x, y, text, font, color) {


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
                    xInput.name = "multiple[x]" + "[".concat(i) + "]";
                    xInput.value = x;
                    xInput.className =
                        "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md";
                    var xLabel = document.createElement('label');
                    xLabel.htmlFor = "x".concat(i);
                    xLabel.innerHTML = "Text ".concat(i) + " X Position:";
                    xLabel.className = "block text-sm font-medium text-gray-700";
                    divnew.appendChild(xLabel);
                    divnew.appendChild(xInput);

                    var divnew2 = document.createElement('div');


                    var yInput = document.createElement('input');
                    yInput.type = "number";
                    yInput.id = "y".concat(i);
                    yInput.name = "multiple[y]" + "[".concat(i) + "]";
                    yInput.value = y;
                    yInput.className =
                        "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md";
                    var yLabel = document.createElement('label');
                    yLabel.htmlFor = "y".concat(i);
                    yLabel.innerHTML = "Text ".concat(i) + " Y Position:";
                    yLabel.className = "block text-sm font-medium text-gray-700";
                    divnew2.appendChild(yLabel);
                    divnew2.appendChild(yInput);

                    var divnew3 = document.createElement('div');


                    var textInput = document.createElement('input');
                    textInput.type = "text";
                    textInput.id = "text".concat(i);
                    textInput.name = "multiple[text]" + "[".concat(i) + "]";
                    textInput.value = text;
                    textInput.className =
                        "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md";
                    var textLabel = document.createElement('label');
                    textLabel.htmlFor = "text".concat(i);
                    textLabel.innerHTML = "Text  ".concat(i) + " :";
                    textLabel.className = "block text-sm font-medium text-gray-700";
                    divnew3.appendChild(textLabel);
                    divnew3.appendChild(textInput);

                    var divnew4 = document.createElement('div');

                    var fontInput = document.createElement('input');
                    fontInput.type = "text";
                    fontInput.id = "font".concat(i);
                    fontInput.name = "multiple[font]" + "[".concat(i) + "]";
                    fontInput.value = font;
                    fontInput.className =
                        "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md";
                    var fontLabel = document.createElement('label');
                    fontLabel.htmlFor = "font".concat(i);
                    fontLabel.innerHTML = "font  ".concat(i) + "  :";
                    fontLabel.className = "block text-sm font-medium text-gray-700";
                    divnew4.appendChild(fontLabel);
                    divnew4.appendChild(fontInput);



                    var divnew5 = document.createElement('div');

                    var colorInput = document.createElement('input');
                    colorInput.type = "color";
                    colorInput.id = "color".concat(i);
                    colorInput.name = "multiple[color]" + "[".concat(i) + "]";
                    colorInput.value = color;
                    colorInput.className =
                        "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md";
                    var colorLabel = document.createElement('label');
                    colorLabel.htmlFor = "color".concat(i);
                    colorLabel.innerHTML = "color  ".concat(i) + "  :";
                    colorLabel.className = "block text-sm font-medium text-gray-700";
                    divnew5.appendChild(colorLabel);
                    divnew5.appendChild(colorInput);



                    // Inserting the inputs into the form with id 'form'
                    var form = document.getElementById('form');
                    div.appendChild(divnew);
                    div.appendChild(divnew2);
                    div.appendChild(divnew3);
                    div.appendChild(divnew4);
                    div.appendChild(divnew5);
                    form.appendChild(div);
                    // Get the button with id "saveButton"
                    const saveButton = document.getElementById("saveButton");

                    // Remove the button from its parent node
                    saveButton.parentNode.removeChild(saveButton);

                    // Add the button back to its parent node
                    form.appendChild(saveButton);

                    console.log(i);
                }

                console.log(i);
                // Assuming i is defined and accessible within this scope
                // Add event listener to the button with id 'remove'
                document.getElementById('remove').addEventListener('click', function() {
                    // Remove elements and their labels with id "text".concat(i), "x".concat(i), "y".concat(i), "font".concat(i), "color".concat(i)
                    var ids = ['text', 'x', 'y', 'font', 'color'];
                    ids.forEach(function(id) {
                        var element = document.getElementById(id.concat(i));
                        var label = document.querySelector('label[for="' + id.concat(i) + '"]');
                        if (element) {
                            element.parentNode.removeChild(element);
                        }
                        if (label) {
                            label.parentNode.removeChild(label);
                        }
                    });

                    if (i > 0) {
                        i = i - 1;
                    }
                    console.log(i);
                });
            </script>

</x-app-layout>
