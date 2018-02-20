<div class="container">
    <h2>Резултаты поиска</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Город доставки</th>
            <th>Город Получения</th>
            <th>Мин. срок доставки</th>
            <th>Мах. срок доставки</th>
        </tr>
        </thead>
        <tbody>
        <td><?=$result['result']['city-from-name']?></td>
        <td><?=$result['result']['city-to-name']?></td>
        <td><?=$result['result']['deliveryPeriodMin']?></td>
        <td><?=$result['result']['deliveryPeriodMax']?></td>
        </tbody>
    </table>
</div>
