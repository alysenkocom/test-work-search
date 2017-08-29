<?php
/* Smarty version 3.1.31, created on 2017-08-28 21:43:20
  from "/Applications/XAMPP/xamppfiles/htdocs/templates/main/content.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59a47258e24335_77507239',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5d0aa7342e8371f6d33f677c8cacda545e903641' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/templates/main/content.tpl',
      1 => 1503949305,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59a47258e24335_77507239 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Page Content -->
<div class="container">

    <div class="container my-4">

        <div class="row">
            <div class="col-lg-3">
                <h5 class="card-header">Filters</h5>
                <div class="card-body">

                    <form action="/main/index/">
                        <div class="input-group">
                            <input name="text" class="form-control" placeholder="Search for..." <?php if (isset($_smarty_tpl->tpl_vars['searchData']->value['text'])) {?>value="<?php echo $_smarty_tpl->tpl_vars['searchData']->value['text'];?>
"<?php }?>>
                        </div>
                        <div class="input-group my-4">
                            <select name="brand" class="form-control">
                                <option value="0">Brand...</option>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['brands']->value, 'brand');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->value) {
?>
                                    <option <?php if (isset($_smarty_tpl->tpl_vars['searchData']->value['brand']) && $_smarty_tpl->tpl_vars['searchData']->value['brand'] === intval($_smarty_tpl->tpl_vars['brand']->value['id'])) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['brand']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['brand']->value['name'];?>
</option>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

                            </select>
                        </div>
                        <div class="input-group my-4">
                            <select <?php if (!isset($_smarty_tpl->tpl_vars['searchData']->value['size']) && !isset($_smarty_tpl->tpl_vars['searchData']->value['size']['selected'])) {?>disabled<?php }?> name="size" class="form-control">
                                <option value="0">Size...</option>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['searchData']->value['size']['data'], 'size');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['size']->value) {
?>
                                    <option <?php if (isset($_smarty_tpl->tpl_vars['searchData']->value['size']['selected']) && $_smarty_tpl->tpl_vars['searchData']->value['size']['selected'] === intval($_smarty_tpl->tpl_vars['size']->value['id'])) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['size']->value['id'];?>
">
                                        <?php echo $_smarty_tpl->tpl_vars['size']->value['name'];?>

                                    </option>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Find!">
                    </form>

                </div>
            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">
                <div class="row">
                    <?php if (count($_smarty_tpl->tpl_vars['lastProducts']->value) > 0) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lastProducts']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
                            <div class="col-lg-3">
                                <div class="card h-100">
                                    <a href="#"><img class="card-img-top" src="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_img'];?>
" alt=""></a>
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['product']->value['brand_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
</p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">Size: <?php echo $_smarty_tpl->tpl_vars['product']->value['size_name'];?>
</small>
                                    </div>
                                </div>
                            </div>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

                    <?php } else { ?>
                        <div class="col-lg-12 text-center">
                            there are no products..
                        </div>
                    <?php }?>
                </div>
            </div>

        </div>
        <!-- /.row -->

    </div>

</div>


<?php }
}
