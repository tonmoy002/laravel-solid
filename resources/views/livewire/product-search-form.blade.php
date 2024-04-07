<div>
    <form id="product-search-form" class="ph-24" wire:submit="submit" >
        <fieldset>
            <legend>Search products</legend>

            <label for="property_value">
                <span class="label">Property value:</span>
                <input type="text" name="property_value" id="property_value" wire:model="propertyValue">
            </label>

            <label for="deposit_amount">
                <span class="label">Deposit amount:</span>
                <input type="text" name="deposit_amount" id="deposit_amount" wire:model="depositAmount">
            </label>

            <button type="submit" class="button mt-30">
                Find products
            </button>
        </fieldset>
    </form>
</div>
