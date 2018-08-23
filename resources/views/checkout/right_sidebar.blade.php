<div class="col-lg-3">
	<div id="order-summary" class="box mb-4 p-0">
		<div class="box-header mt-0">
			<h3>Order summary</h3>
		</div>
		<p class="text-muted text-small">Shipping and additional costs are calculated based on the values you have entered.</p>
		<div class="table-responsive">
			<table class="table">
				<tbody>
					<tr>
						<td>Order subtotal</td>
						<th>{{ $checkout->subtotalStringFormatted() }}</th>
					</tr>
					<tr>
						<td>Shipping</td>
						<th>{{ $checkout->shippingCostStringFormatted() }}</th>
					</tr>
					<tr class="total">
						<td>Total</td>
						<th>{{ $checkout->totalAmountStringFormatted() }}</th>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>