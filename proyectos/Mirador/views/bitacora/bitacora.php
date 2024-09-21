<article class="logbook">


    <header class="logbook__subtitle">Libro de Bitácora </header>

    <form>
        <fieldset class="grid">
            <div class="horaAsunto">
                <input
                    type="datetime-local"
                    id="meeting-time"
                    name="meeting-time"
                    value="2018-06-12T19:30"
                    min="2018-06-07T00:00"
                    max="2018-06-14T00:00" />
                <select name="favorite-cuisine" aria-label="Selectiona el asunto" required>
                    <option selected disabled value="">
                        Selecciona el asunto
                    </option>

                    <option>Nota</option>
                    <option>Pedido</option>
                    <option>Alarma</option>
                    <option>Recibe</option>
                    <option>Termino</option>
                </select>
            </div>
            <div class="detalle">
                <textarea name="" id="" placeholder="Detalle del asunto">
                </textarea>
            </div>
            <div class="guardar">
                <input type="submit" value="Guardar en bitácora">
            </div>
        </fieldset>
    </form>

    <table class="logbook_table">
        <thead class="logbook_thead">
            <tr class="logbook_tr">
                <th scope="col" class="logbook_date">Hora</th>
                <th scope="col">Asunto</th>
                <th scope="col">Detalle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">10:10</th>
                <td>Pedido</td>
                <td>LLega pedido para el depto #404 a nombre de Julio, 5 bolsas de Jumbo, se llama y notifica a la residencia</td>

            </tr>
            <tr>
                <th scope="row">10:37</th>
                <td>Alarma</td>
                <td>Se activa la alarma de incendios en la residencia #802, se llama para corroborar el asunto, notifica que todo está en orden, por lo que se procede a desactivar la alarma</td>
            </tr>
            <tr>
                <th scope="row">11:02</th>
                <td>Nota</td>
                <td>Recidente del depto #1404 llama e informa que el depto superior, es decir, el #1504 realiza ruidos molestos, se llama al depto #1504 para informar dicha queja, pero no se logró recibir respuesta</td>
            </tr>
            <tr>
                <th scope="row">Mars</th>
                <td>6,779</td>
                <td>1.52</td>
            </tr>
        </tbody>
    </table>

</article>