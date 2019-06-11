<aside class="cart">
    <h3>Cart</h3>

    <table class="table">
        <thead>
            <tr>
                <th class="product">Product</th>
                <th>X</th>
                <th>Prijs</th>
            </tr>
        </thead>
        <tbody id="cart">
            <tr>
                <td class="">Naam van een product</td>
                <td>1</td>
                <td class="price">&euro; 0,00</td>
            </tr>
            <tr>
                <td colspan="2">Totaal</td>
                <td class="price"><b>&euro; 0,00</b></td>
            </tr>
        </tbody>
    </table>

    <a class="btn btn-success" href="<?=Http::asset('afrekenen'); ?>">Afrekenen</a>
</aside>
