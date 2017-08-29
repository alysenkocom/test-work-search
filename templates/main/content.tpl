<!-- Page Content -->
<div class="container">

    <div class="container my-4">

        <div class="row">
            <div class="col-lg-3">
                <h5 class="card-header">Filters</h5>
                <div class="card-body">

                    <form action="/main/index/">
                        <div class="input-group">
                            <input name="text" class="form-control" placeholder="Search for..." {if isset($searchData['text'])}value="{$searchData['text']}"{/if}>
                        </div>
                        <div class="input-group my-4">
                            <select name="brand" class="form-control">
                                <option value="0">Brand...</option>
                                {foreach from=$brands item=brand}
                                    <option {if isset($searchData['brand']) && $searchData['brand'] === intval($brand.id)}selected{/if} value="{$brand.id}">{$brand.name}</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="input-group my-4">
                            <select {if !isset($searchData['size']) && !isset($searchData['size']['selected'])}disabled{/if} name="size" class="form-control">
                                <option value="0">Size...</option>
                                {foreach from=$searchData['size']['data'] item=size}
                                    <option {if isset($searchData['size']['selected']) && $searchData['size']['selected'] === intval($size.id)}selected{/if} value="{$size.id}">
                                        {$size.name}
                                    </option>
                                {/foreach}
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Find!">
                    </form>

                </div>
            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">
                <div class="row">
                    {if count($lastProducts) > 0}
                        {foreach from=$lastProducts item=product}
                            <div class="col-lg-3">
                                <div class="card h-100">
                                    <a href="#"><img class="card-img-top" src="{$product.product_img}" alt=""></a>
                                    <div class="card-body">
                                        <p class="card-text">{$product.brand_name} {$product.product_name}</p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">Size: {$product.size_name}</small>
                                    </div>
                                </div>
                            </div>
                        {/foreach}
                    {else}
                        <div class="col-lg-12 text-center">
                            there are no products..
                        </div>
                    {/if}
                </div>
            </div>

        </div>
        <!-- /.row -->

    </div>

</div>


