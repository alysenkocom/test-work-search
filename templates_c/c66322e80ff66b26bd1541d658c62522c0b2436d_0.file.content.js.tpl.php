<?php
/* Smarty version 3.1.31, created on 2017-08-28 16:48:35
  from "/Applications/XAMPP/xamppfiles/htdocs/templates/main/content.js.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59a42d434c7373_96376510',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c66322e80ff66b26bd1541d658c62522c0b2436d' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/templates/main/content.js.tpl',
      1 => 1503931713,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59a42d434c7373_96376510 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>

    $('select[name="brand"]').change(function(){
        var brandId = parseInt(this.value);
        if (brandId > 0) {

            $.ajax({
                method: "POST",
                url: '/main/ajax/',
                dataType: "json",
                data: {
                    ajax: true,
                    brandId: brandId
                }
            }).done(function(data) {
                var content = $('select[name="size"]:first-child option')[0].outerHTML;
                if (data.error === false) {
                    $('select[name="size"]').prop( "disabled", false );
                    if (data.result.length > 0) {
                        $.each(data.result, function(key, val){
                            content += '<option value="' + val.id + '">' + val.name + '</option>';
                        });
                        $('select[name="size"]').html(content);
                    }
                } else {
                    $('select[name="size"]').prop( "disabled", true ).html(content);
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                $('select[name="size"]').prop( "disabled", true );
            });

        }
    });

<?php echo '</script'; ?>
><?php }
}
