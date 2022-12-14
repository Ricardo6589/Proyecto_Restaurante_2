window.addEventListener('load', () => {
    if (document.getElementById("reserva-campo")) {
        var reserva = document.getElementById("reserva-campo");
        var incidencia = document.getElementById("incidencia-campo");

        incidencia.classList.add('nav-resp');
        reserva.innerHTML = '';
        incidencia.innerHTML = '';
        var select = document.getElementById('final-reserva');
        reserva.innerHTML = `
                    <label for="">DNI Reserva</label>
                    <input type="text" name="reserva" id="nombre_reserva"><br><br> 
                    <label for="">Fecha</label>
                    <input type="date" name="fecha1" id="fecha1">
                    <label for="">Hora</label>
                    <select name="hora1" id="hora1">
                        <option value="12">12:00</option>
                        <option value="13">13:00</option>
                        <option value="14">14:00</option>
                        <option value="15">15:00</option>
                        <option value="16">16:00</option>
                        <option value="17">17:00</option>
                        <option value="20">20:00</option>
                        <option value="21">21:00</option>
                        <option value="22">22:00</option>
                        <option value="23">23:00</option>
                        <option value="00">00:00</option>
                    </select>              

                `;


        select.addEventListener("change", () => {
            if (document.getElementById('final-reserva').value == 'reserva') {
                incidencia.innerHTML = '';
                reserva.innerHTML = `
                    <label for="">DNI Reserva</label>
                    <input type="text" name="reserva" id="nombre_reserva"><br><br>      
                    <label for="">Fecha</label>
                    <input type="date" name="fecha1" id="fecha1">
                    <label for="">Hora</label>
                    <select name="hora1" id="hora1">
                        <option value="12">12:00</option>
                        <option value="13">13:00</option>
                        <option value="14">14:00</option>
                        <option value="15">15:00</option>
                        <option value="16">16:00</option>
                        <option value="17">17:00</option>
                        <option value="20">20:00</option>
                        <option value="21">21:00</option>
                        <option value="22">22:00</option>
                        <option value="23">23:00</option>
                        <option value="00">00:00</option>
                    </select>                                                   
                `;
                incidencia.classList.add('nav-resp');
                reserva.classList.remove('nav-resp');
            } else if (document.getElementById('final-reserva').value == 'incidencia') {
                incidencia.innerHTML = `
                    <label for="">Motivo Incidencia</label>
                    <input type="text-area" name="incidencia">
                    <br>
                `;
                reserva.innerHTML = '';
                reserva.classList.add('nav-resp');
                incidencia.classList.remove('nav-resp');

            }

        });
    }


    if (document.getElementsByClassName('active') && document.getElementById('activa')) {
        document.getElementById('activa').classList.add('active');
        document.getElementById('test').classList.add('activa')

        ver(document.getElementById('activa').value);

        document.getElementById('activa').onclick = () => {
            document.getElementsByClassName('active')[0].classList.remove('active');
            document.getElementById('test').classList.add('activa')
            document.getElementById('activa').classList.add('active');
            document.getElementsByTagName('body')[0].classList.remove('resp-scroll');
            document.getElementById('test').classList.remove('resp');
            ver(document.getElementById('activa').value);
        }
        document.getElementById('finalizar').onclick = () => {
            document.getElementsByClassName('active')[0].classList.remove('active');
            document.getElementById('test').classList.remove('activa')
            document.getElementById('finalizar').classList.add('active');
            document.getElementsByTagName('body')[0].classList.remove('resp-scroll');
            document.getElementById('test').classList.remove('resp');
            ver(document.getElementById('finalizar').value);
        }
        document.getElementById('estadis').onclick = () => {
            document.getElementsByClassName('active')[0].classList.remove('active');
            document.getElementById('estadis').classList.add('active');
            document.getElementById('test').classList.remove('activa')
            document.getElementsByTagName('body')[0].classList.add('resp-scroll');
            document.getElementById('test').classList.toggle('resp');
            document.getElementsByClassName('b-reserva')[0].classList.add('graph')
            ver(document.getElementById('estadis').value);
        }
        document.getElementById('activa2').onclick = () => {
            document.getElementsByClassName('active')[0].classList.remove('active');
            document.getElementById('test').classList.add('activa')
            document.getElementById('activa2').classList.add('active');
            document.getElementsByTagName('body')[0].classList.remove('resp-scroll');
            document.getElementById('test').classList.remove('resp');
            ver(document.getElementById('activa2').value);
        }
        document.getElementById('finalizar2').onclick = () => {
            document.getElementsByClassName('active')[0].classList.remove('active');
            document.getElementById('test').classList.remove('activa')
            document.getElementById('finalizar2').classList.add('active');
            document.getElementsByTagName('body')[0].classList.remove('resp-scroll');
            document.getElementById('test').classList.remove('resp');
            ver(document.getElementById('finalizar2').value);
        }
        document.getElementById('estadis2').onclick = () => {
            document.getElementsByClassName('active')[0].classList.remove('active');
            document.getElementById('estadis2').classList.add('active');
            document.getElementById('test').classList.remove('activa')
            document.getElementsByTagName('body')[0].classList.add('resp-scroll');
            document.getElementById('test').classList.toggle('resp');
            document.getElementsByClassName('b-reserva')[0].classList.add('graph')
            ver(document.getElementById('estadis2').value);
        }
    }
});