<form id="calculator-form" class="booking-form" name="form1" method="post" action="/">
    <div class="h1">Расчет срок доставки</div>

    <div id="form-content">
        <div class="group">
            <label for="city-from">Город отправления</label>
            <div class="addon-right">
                <select  name="city-from" id="cd"></select>
                <input id="city-from" class="form-control" type="hidden" value="" >
                <input id="city-from-name" name="city-from-name" class="form-control" type="hidden" value="" >
            </div>
        </div>

        <div class="group">
            <label for="city-to">Город доставки</label>
            <div class="addon-right">
                <select  name="city-to" id=""></select>
                <input id="city-to" class="form-control" type="hidden" value="" >
                <input id="city-to-name" name="city-to-name" class="form-control" type="hidden" value="" >
            </div>
        </div>

        <div class="group submit">
            <label class="empty"></label>
            <div><input name="submit" type="submit" value="Расчитать" id="submit"/></div>
        </div>

    </div>
</form>

<div id="table_delivery"></div>