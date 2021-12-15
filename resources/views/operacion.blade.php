<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Operacion') }}

            <button type="button" class="btn btn-primary ml-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Buscar visitas abiertas
            </button>

            @include('components.modalcerrarV')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <main class="form-signin">
                            <p class="fs-2">Nueva Visita</p>
                            <div class="card-group">

                                <div class="card">
                                    <div class="video-wrap">
                                        <video id="video" width="800" height="1000" autoplay>
                                        <source src=".mp4" />
                                        </video>
                                    </div>
            
                                    <div class="card-body">
                                        <center>
                                            <h5 class="card-title">Camara Ine</h5>
                                        </center>
                                        <center><button id="snap" class="btn btn-dark">CAPTURAR</button></center>
                                        <br>
                                        <label for="brightnesswebcam" class="form-label">Brillo</label>
                                        <input onchange="brightw(this)" min="0" max="200" type="range"
                                            class="form-range" id="brightnesswebcam" step="5">
                                        <label for="contrastwebcam" class="form-label">Contraste</label>
                                        <input onchange="contrastw(this)" min="0" max="200" type="range"
                                            class="form-range" id="contrastwebcam" step="5">
                                    </div>
                                </div>

                                <div class="card">

                                    <video style="background: black url(loader.gif) center no-repeat;" id="remoteVideo"
                                        width="800" height="1000" autoplay="" playsinline="" muted=""
                                        ></video>

                                    <div class="card-body">
                                        <center>
                                            <h5 class="card-title">Camara Placas</h5>
                                        </center>
                                        <center><button id="snap2" class="btn btn-dark">CAPTURAR</button></center>
                                        <br>
                                        <label for="brightnesslicense" class="form-label">Brillo</label>
                                        <input onchange="brightl(this)" min="0" max="200" type="range"
                                            class="form-range" id="brightnesslicense" step="5">
                                        <label for="contrastlicense" class="form-label">Contraste</label>
                                        <input onchange="contrastl(this)" min="0" max="200" type="range"
                                            class="form-range" id="contrastlicense" step="5">
                                    </div>
                                </div>
                                <div class="card">
                                    <video style="background: black url(loader.gif) center no-repeat;" id="remoteVideo2"
                                        width="800" height="1000" autoplay="" playsinline="" muted=""
                                        ></video>

                                    <div class="card-body">
                                        <center>
                                            <h5 class="card-title">Frente de calle</h5>
                                        </center>
                                        <center><button id="snap3" class="btn btn-dark">CAPTURAR</button></center>
                                        <br>
                                        <label for="brightnesslicense" class="form-label">Brillo</label>
                                        <input onchange="brights(this)" min="0" max="200" type="range"
                                            class="form-range" id="brightnessstreet" step="5">
                                        <label for="contraststreet" class="form-label">Contraste</label>
                                        <input onchange="contrasts(this)" min="0" max="200" type="range"
                                            class="form-range" id="contraststreet" step="5">
                                    </div>
                                </div>
                            </div>
                            <br>



                            <div class="card-group">
                                <div class="card">
                                    <canvas id="canvas" width="640" height="480"></canvas>
                                </div>
                                <div class="card">
                                    <canvas id="canvas2" width="640" height="480"></canvas>
                                </div>
                                <div class="card">
                                    <canvas id="canvas3" width="640" height="480"></canvas>
                                </div>
                            </div>
                            <div class="card">
                            </div>
                            <div class="card">
                            </div>
                    </div>

                    <br>

                    <form method="POST" class="formulario_guardar" action="{{ route('crear-visitante') }}">
                        @csrf

                        
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif


                        <div class="input-group mb-3">
                            <input value="{{old ('nombre')}}" onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px"
                                required placeholder="Nombre completo" name="nombre" type="text" class="form-control"
                                id="basic-url" aria-describedby="basic-addon3">
                        </div>

                        <div class="input-group mb-3">
                            <input value="{{old ('telefono')}}" onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px"
                                required placeholder="Telefono" name="telefono" type="number" class="form-control"
                                id="basic-url" aria-describedby="basic-addon3">
                            <input value="{{old ('ine')}}" onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px"
                                required placeholder="INE" name="ine" type="text" class="form-control" id="basic-url"
                                aria-describedby="basic-addon3">
                        </div>

                        <div class="input-group mb-3">
                            <input value="{{old ('placa')}}" onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px"
                                required placeholder="Placa" name="placa" type="text" class="form-control"
                                id="basic-url" aria-describedby="basic-addon3">
                            <input readonly value="<?php echo date('Y-m-d'); ?>" style="margin: 2px" placeholder="Fecha"
                                name="fecha" type="text" class="form-control" id="basic-url"
                                aria-describedby="basic-addon3">
                        </div>

                        <div class="input-group mb-3">
                            <select required name="idr" style="margin: 2px;" class="form-select" id="inputGroupSelect04"
                                aria-label="Example select with button addon">
                                <option value="">Seleccione al residente que visita</option>

                                @foreach ($idr as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['nombre'] }}</option>
                                @endforeach



                            </select>
                        </div>

                        <div class="form-floating">
                            <textarea  required name="motivo" class="form-control" placeholder="Leave a comment here"
                                id="floatingTextarea2" style="height: 100px">{{old ('motivo')}}</textarea>
                            <label for="floatingTextarea2">Motivo de la visita</label>
                        </div>

                        <br>
                        <center><input type="submit" onclick="post()" value="GUARDAR DATOS" name="guardar"
                                class="btn btn-primary">

                    </form>
                    </center>
                    <br>
                    <center>
                        <button class="btn btn-dark ml-1" onclick="fetch('api/open')
                        .then(response => response)
                        .then(json => console.log(json))
                        .catch(err => console.log(err))">ABRIR PLUMA</button>
                    </center>

                    <a class="btn btn-sm btn-warning ml-1" onclick="fetch('api/close')
                    .then(response => response)
                    .then(json => console.log(json))
                    .catch(err => console.log(err))">cerrar pluma</a>
                    </main>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>

<script>

var start = function () {
    const video = document.getElementById("video"),
        vendorURL = window.URL || window.webkitURL;

    if (navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(function (stream) {
                video.srcObject = stream;
            }).catch(function (error) {
                console.log("Something went wrong");
            });
    }
}

$(function () { start(); });
</script>

<script>
    'use strict';
    const video = document.getElementById('video');
    const video2 = document.getElementById('remoteVideo');
    const video3 = document.getElementById('remoteVideo2');
    const canvas = document.getElementById('canvas');
    const canvas2 = document.getElementById('canvas2');
    const canvas3 = document.getElementById('canvas3');
    const snap = document.getElementById("snap");
    const snap2 = document.getElementById("snap2");
    const snap3 = document.getElementById("snap3");
    const constraints = {
        audio: true,
        video: {
            
            width: 800,
            height: 600
        }
    };
    // Access webcam
    async function init() {
        try {
            const stream = await
            navigator.mediaDevices.getUserMedia(constraints);
            handleSuccess(stream);
        } catch (e) {}
    }
    // Success
    function handleSuccess(stream) {
        window.stream = stream;
        video.srcObject = stream;
    }
    // Load init
    init();

    var context = canvas.getContext(
        '2d'); //
    snap.addEventListener("click", function() { //
        const br = document.getElementById('brightnesswebcam').value;
        const con = document.getElementById('contrastwebcam').value;
        context.filter = "brightness(" + br + "%) contrast(" + con + "%)"
        context.drawImage(video, 0, 0, 640,
            480);
        // img.src=canvas.toDataUrl();
    });
    var context2 = canvas2.getContext('2d');
    snap2.addEventListener("click",
        function() {
            const br = document.getElementById('brightnesslicense').value;
            const con = document.getElementById('contrastlicense').value;
            context2.filter = "brightness(" + br + "%) contrast(" + con + "%)"
            context2.drawImage(video2, 0, 0, 640, 480);
        });
    var context3 = canvas3.getContext('2d');
    snap3.addEventListener("click", function() {
        const br = document.getElementById('brightnessstreet').value;
        const con = document.getElementById('contraststreet').value;
        context3.filter = "brightness(" + br + "%) contrast(" + con + "%)"
        context3.drawImage(video3, 0, 0, 640, 480);
    });

    function brightw(e) {
        var val = e.value;
        video.setAttribute("style", "filter: brightness(" + val + "%);");
    }

    function brightl(e) {
        var val = e.value;
        video2.setAttribute("style", "filter: brightness(" + val + "%);");
    }

    function brights(e) {
        var val = e.value;
        video3.setAttribute("style", "filter: brightness(" + val + "%);");
    }

    function contrastw(e) {
        var val = e.value;
        video.setAttribute("style", "filter: contrast(" + val + "%);");
    }

    function contrastl(e) {
        var val = e.value;
        video2.setAttribute("style", "filter: contrast(" + val + "%);");
    }

    function contrasts(e) {
        var val = e.value;
        video3.setAttribute("style", "filter: contrast(" + val + "%);");
    }

    function open() {
        fetch('api/open')
            .then(response => response)
            .then(json => console.log(json))
            .catch(err => console.log(err));
    }

    function close() {
        fetch('api/close')
            .then(response => response)
            .then(json => console.log(json))
            .catch(err => console.log(err));
    }

    function post() {
        const nombre = document.getElementsByName('nombre')[0].value;
        const telefono = document.getElementsByName('telefono')[0].value;
        const ine = document.getElementsByName('ine')[0].value;
        const fecha = document.getElementsByName('fecha')[0].value;
        const placa = document.getElementsByName('placa')[0].value;
        const motivo = document.getElementsByName('motivo')[0].value;
        const idr = document.getElementsByName('idr')[0].value;

        var dataURL = canvas.toDataURL("");
        var dataURL2 = canvas2.toDataURL("");
        var dataURL3 = canvas3.toDataURL("");
        let data = new FormData();
        data.append('nombre', nombre);
        data.append('telefono', telefono);
        data.append('ine', ine);
        data.append('fecha', fecha);
        data.append('placa', placa);
        data.append('motivo', motivo);
        data.append('idr', idr);
        data.append('ine_foto', dataURL);
        data.append('placa_foto', dataURL2);
        data.append('cara_foto', dataURL3);


        fetch('api/operacion', {
                method: "POST",
                body: data,
            })
            .then(response => response)
            .then(json => console.log(json))
            .catch(err => console.log(err));
    }
</script>